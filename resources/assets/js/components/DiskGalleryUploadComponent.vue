<template>
    <div class="disk-gallery-upload panel panel-default">
        <div class="panel-heading text-center">
            <h4 style="padding: 12px 15px;margin: 0;">Загрузить изображения выполненных работ.</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Укажите услугу:</label>
                        <select v-model="dataProps.serviceId" class="form-control">
                            <option v-for="service in serviceList" :value="service.id">{{ service.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Укажите цвет:</label>
                        <select v-model="dataProps.colorId" class="form-control">
                            <option v-for="color in colorList" :value="color.id">{{ color.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Название:</label>
                        <input type="text" v-model="dataProps.name" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div style="padding: 10px" v-if="dataProps.serviceId > 0">
                        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"
                                      v-on:vdropzone-sending="sendingEvent"></vue-dropzone>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import _ from 'lodash';

    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';

    export default {
        name: 'disk-gallery-upload',
        data: function () {
            return {
                dataProps: {
                    colorId: 0,
                    serviceId: 0,
                    name: '',
                },
                colorList: [],
                serviceList: [],
                dropzoneOptions: {
                    url: '/admin/disk-gallery',
                    paramName: 'picture',
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i>Загрузить работы"
                }
            }
        },
        components: {
            vueDropzone: vue2Dropzone
        },
        mounted: function () {
            var that = this;
            that.getDataLists();
        },
        computed: {
            color: function () {
                return _.find(this.colorList, {id: this.dataProps.colorId});
            },
            service: function () {
                return _.find(this.serviceList, {id: this.dataProps.serviceId});
            }
        },
        watch: {
            color: function (val) {
                if (val) {
                    this.dataProps.name = val.name;
                }
            },
            service: function (val) {
                if (val) {
                    this.dataProps.name = val.name;
                }
            }
        },
        methods: {
            sendingEvent(file, xhr, formData) {
                formData.append('type_slug', 'disk-gallery');
                formData.append('name', this.dataProps.name);
                formData.append('description', '');
                formData.append('calc_color_id', this.dataProps.colorId);
                formData.append('disk_uslugi_id', this.dataProps.serviceId);
            },
            getDataLists: function () {
                var that = this;
                //gallery-lists
                axios.get('/disk-admin/gallery-lists').then((response) => {
                    //console.log(response.data)
                    that.colorList = response.data.data.colors;
                    that.serviceList = response.data.data.services;
                })
            }
        }
    }
</script>
