<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DISKREMONT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>

    <main style="padding-top: 100px;">

        <section class="calc-bar">
            <div class="container">
                <div id="calc-app"></div>
            </div>
        </section>

    </main>

    <script>
        const calcConfig = {
            apiUrl: '/calc_api.php',
            moveDuration: 1,
            values: {
                carColorList: [
                    {
                        hash: 'ffffff',
                        name: 'Белый'
                    },
                    {
                        hash: 'ffff00',
                        name: 'Желтый'
                    },
                    {
                        hash: 'ff0000',
                        name: 'Красный'
                    },
                    {
                        hash: '721919',
                        name: 'Темно красный'
                    },
                    {
                        hash: '009900',
                        name: 'зелёный'
                    },
                    {
                        hash: '0000ff',
                        name: 'синий'
                    },
                    {
                        hash: '888888',
                        name: 'серый'
                    },
                    {
                        hash: '000000',
                        name: 'черный'
                    }
                ],
                diskColorList: [
                    {
                        hash: 'ffffff',
                        name: 'Белый'
                    },
                    {
                        hash: 'ffff00',
                        name: 'Желтый'
                    },
                    {
                        hash: 'ff0000',
                        name: 'Красный'
                    },
                    {
                        hash: '721919',
                        name: 'Темно красный'
                    },
                    {
                        hash: '009900',
                        name: 'зелёный'
                    },
                    {
                        hash: '0000ff',
                        name: 'синий'
                    },
                    {
                        hash: '888888',
                        name: 'серый'
                    },
                    {
                        hash: '000000',
                        name: 'черный'
                    }
                ],
                diskSizeList: [
                    {
                        size: 18,
                        label: '18"'
                    },
                    {
                        size: 20,
                        label: '20"'
                    },
                    {
                        size: 22,
                        label: '22"'
                    },
                    {
                        size: 24,
                        label: '24"'
                    }
                ]
            }
        }
    </script>

    <script src="js/app.js"></script>
    </body>
</html>