<?php

namespace App\Http\Controllers\Voyager\ContentTypes;

use TCG\Voyager\Http\Controllers\ContentTypes\Image as BaseImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image as InterventionImage;
use \Imagick;

class Image extends BaseImage
{

    private function OptimJPG($infile, $outfile, $qual = 85, $xres = -1, $yres = -1)
    {
        $im = new Imagick();
        $im->readImage($infile);
        $im->stripImage();
        $im->setImageColorSpace(Imagick::COLORSPACE_SRGB);
        if (($xres > 0) && ($yres > 0)) {
            $im->adaptiveResizeImage($xres, $yres);
        };
        $im->setImageCompressionQuality($qual);
        $im->setSamplingFactors(array('2x2', '1x1', '1x1'));
        $image1 = $im->getImageBlob();
        $im->setInterlaceScheme(Imagick::INTERLACE_PLANE);
        $image2 = $im->getImageBlob();
        if (strlen($image1) > strlen($image2)) {
            file_put_contents($outfile, $image2);
        } else {
            file_put_contents($outfile, $image1);
        };
        $im->clear();
        $im->destroy();
    }

    private function OptimPNG($infile, $outfile, $qual = 85, $xres = -1, $yres = -1)
    {
        $im = new Imagick();
        $im->readImage($infile);
        $im->stripImage();
        $im->setImageColorSpace(Imagick::COLORSPACE_SRGB);
        if (($xres > 0) && ($yres > 0)) {
            $im->adaptiveResizeImage($xres, $yres);
        };
        $im->setImageCompression(Imagick::COMPRESSION_UNDEFINED);
        $im->setImageCompressionQuality(0);
        $im->setSamplingFactors(array('2x2', '1x1', '1x1'));
        $image1 = $im->getImageBlob();
        file_put_contents($outfile, $image1);
        $im->clear();
        $im->destroy();
    }

    function resizeAndConvertImageWebP(
        $width,
        $height,
        $density,
        $originalFilepath,
        $resizedFilepath)
    {
        $newWidth = $width * $density;
        $newHeight = $height * $density;

        $image = new Imagick($originalFilepath);
        $origImageDimens = $image->getImageGeometry();
        $origImgWidth = $origImageDimens['width'];
        $origImgHeight = $origImageDimens['height'];

        if ($newWidth == 0) {
            $ratioOfHeight = $newHeight / $origImgHeight;
            $newWidth = $origImgWidth * $ratioOfHeight;
        }

        if ($newHeight == 0) {
            $ratioOfWidth = $newWidth / $origImgWidth;
            $newHeight = $origImgHeight * $ratioOfWidth;
        }

        $widthRatios = $origImgWidth / $newWidth;
        $heightRatios = $origImgHeight / $newHeight;

        if ($widthRatios <= $heightRatios) {
            $cropWidth = $origImgWidth;
            $cropHeight = $newWidth * $widthRatios;
        } else {
            $cropWidth = $newHeight * $heightRatios;
            $cropHeight = $origImgHeight;
        }

        $cropX = ($origImgWidth - $cropWidth) / 2;
        $cropY = ($origImgHeight - $cropHeight) / 2;

        $image->stripImage();
        $image->cropImage($cropWidth, $cropHeight, $cropX, $cropY);
        $image->resizeImage($newWidth, $newHeight, imagick::FILTER_LANCZOS, 0.9);
        $image->setImageFormat('webp');
        $image->setImageAlphaChannel(imagick::ALPHACHANNEL_ACTIVATE);
        $image->setBackgroundColor(new ImagickPixel('transparent'));
        $image->writeImage($resizedFilepath);
    }


    private function OptImg($path, $ext, $quality = 85) {
        switch ($ext) {
            case "jpg":
            case "jpeg":
                $this->OptimJPG($path, $path, $quality);
                break;
            case "png":
                $this->OptimPNG($path, $path, $quality);
                break;
        }
    }


    public function handle()
    {
        if ($this->request->hasFile($this->row->field)) {
            $file = $this->request->file($this->row->field);

            $path = $this->slug . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR;

            $filename = $this->generateFileName($file, $path);

            $image = InterventionImage::make($file);

            $fullPath = $path . $filename . '.' . $file->getClientOriginalExtension();

            $resize_width = null;
            $resize_height = null;
            if (isset($this->options->resize) && (
                    isset($this->options->resize->width) || isset($this->options->resize->height)
                )) {
                if (isset($this->options->resize->width)) {
                    $resize_width = $this->options->resize->width;
                }
                if (isset($this->options->resize->height)) {
                    $resize_height = $this->options->resize->height;
                }
            } else {
                $resize_width = $image->width();
                $resize_height = $image->height();
            }

            $resize_quality = isset($options->quality) ? intval($this->options->quality) : 90;

            if ($this->options) {
                $image = $image->resize(
                    $resize_width,
                    $resize_height,
                    function (Constraint $constraint) {
                        $constraint->aspectRatio();
                        if (isset($this->options->upsize) && !$this->options->upsize) {
                            $constraint->upsize();
                        }
                    }
                )->encode($file->getClientOriginalExtension(), 100);
            } else {
                $image = (string)file_get_contents($file);
                //dd((string) file_get_contents($file));
            }


            if ($this->is_animated_gif($file)) {
                Storage::disk(config('voyager.storage.disk'))->put($fullPath, file_get_contents($file), 'public');
                $fullPathStatic = $path . $filename . '-static.' . $file->getClientOriginalExtension();
                Storage::disk(config('voyager.storage.disk'))->put($fullPathStatic, (string)$image, 'public');
            } else {
                Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string)$image, 'public');
            }


            if ($this->options) {
                $imagePath = Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix('public/' . $fullPath);
                $this->OptImg($imagePath, $file->getClientOriginalExtension(), $resize_quality);
            }


            if (isset($this->options->thumbnails)) {
                foreach ($this->options->thumbnails as $thumbnails) {
                    if (isset($thumbnails->name) && isset($thumbnails->scale)) {
                        $scale = intval($thumbnails->scale) / 100;
                        $thumb_resize_width = $resize_width;
                        $thumb_resize_height = $resize_height;

                        if ($thumb_resize_width != null && $thumb_resize_width != 'null') {
                            $thumb_resize_width = intval($thumb_resize_width * $scale);
                        }

                        if ($thumb_resize_height != null && $thumb_resize_height != 'null') {
                            $thumb_resize_height = intval($thumb_resize_height * $scale);
                        }

                        $image = InterventionImage::make($file)->resize(
                            $thumb_resize_width,
                            $thumb_resize_height,
                            function (Constraint $constraint) {
                                $constraint->aspectRatio();
                                if (isset($options->upsize) && !$this->options->upsize) {
                                    $constraint->upsize();
                                }
                            }
                        )->encode($file->getClientOriginalExtension(), 100);
                    } elseif (isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
                        $crop_width = $thumbnails->crop->width;
                        $crop_height = $thumbnails->crop->height;
                        $image = InterventionImage::make($file)
                            ->fit($crop_width, $crop_height)
                            ->encode($file->getClientOriginalExtension(), 100);
                    }

                    Storage::disk(config('voyager.storage.disk'))->put(
                        $path . $filename . '-' . $thumbnails->name . '.' . $file->getClientOriginalExtension(),
                        (string)$image,
                        'public'
                    );

                    if ($this->options) {
                        $thumbPath = Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix('public/' . $path . $filename . '-' . $thumbnails->name . '.' . $file->getClientOriginalExtension());
                        $this->OptImg($thumbPath, $file->getClientOriginalExtension(), $resize_quality);
                    }
                }
            }

            return $fullPath;
        }
    }

    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @param $path
     *
     * @return string
     */
    protected function generateFileName($file, $path)
    {
        if (isset($this->options->preserveFileUploadName) && $this->options->preserveFileUploadName) {
            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
            $filename_counter = 1;

            // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
            while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
                $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . (string)($filename_counter++);
            }
        } else {
            $filename = Str::random(20);

            // Make sure the filename does not exist, if it does, just regenerate
            while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
                $filename = Str::random(20);
            }
        }

        return $filename;
    }

    private function is_animated_gif($filename)
    {
        $raw = file_get_contents($filename);

        $offset = 0;
        $frames = 0;
        while ($frames < 2) {
            $where1 = strpos($raw, "\x00\x21\xF9\x04", $offset);
            if ($where1 === false) {
                break;
            } else {
                $offset = $where1 + 1;
                $where2 = strpos($raw, "\x00\x2C", $offset);
                if ($where2 === false) {
                    break;
                } else {
                    if ($where1 + 8 == $where2) {
                        $frames++;
                    }
                    $offset = $where2 + 1;
                }
            }
        }

        return $frames > 1;
    }
}