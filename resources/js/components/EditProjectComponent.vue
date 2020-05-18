<template>
    <div>
        <div class="wt-accordioninnertitle">
                <div v-if="this.stored_project_img" :id="this.main_accordion_id" class="wt-projecttitle collapsed" data-toggle="collapse" :data-target="'#'+this.inner_accordion_id">
                    <figure v-if="uploaded_project_image == false">
                        <img :src="stored_project_img">
                        <a class="dz-remove" href="javascript:;" @click="removeImage()" >
                            <span class="lnr lnr-cross"></span>
                        </a>
                    </figure>
                    <div :class="img_hidden_id" v-else></div>
                    <h3>{{this.stored_project_title}}<span>{{this.stored_project_url}}</span></h3>
                </div>
                <div v-else :id="this.main_accordion_id" class="wt-projecttitle collapsed" data-toggle="collapse" :data-target="'#'+this.inner_accordion_id">
                    <div :class="img_hidden_id"></div>
                    <h3>{{this.stored_project_title}}<span>{{this.stored_project_url}}</span></h3>
                </div>
                <div class="wt-rightarea">
                    <a href="javascript:void(0);" class="wt-addinfo wt-skillsaddinfo" ref="storedProjectelement" :id="this.main_accordion_id" data-toggle="collapse"  :data-target="'#'+this.inner_accordion_id" aria-expanded="true"><i class="lnr lnr-pencil"></i></a>
                    <a href="javascript:void(0);" class="wt-deleteinfo" @click="removeElement()"><i class="lnr lnr-trash"></i></a>
                </div>
            </div>
            <div class="wt-collapseexp collapse hide" :id="this.inner_accordion_id" :aria-labelledby="this.main_accordion_id" data-parent="#accordion">
                <fieldset>
                    <div class="form-group form-group-half">
                        <input type="text" :value="this.stored_project_title" v-bind:name="this.project_title_name" class="form-control" :placeholder="this.project_title">
                    </div>
                    <div class="form-group form-group-half">
                        <input type="text" :value="this.stored_project_url" v-bind:name="this.project_url_name" class="form-control" :placeholder="this.project_url">
                    </div>
                    <div class="form-group" v-if="this.stored_project_img">
                        <div class="wt-labelgroup" v-if="uploaded_project_image">
                            <vue-dropzone :options="dropzoneOptions" :id="this.dropzone_id" :useCustomSlot=true :ref="this.img_ref" @vdropzone-file-added="vfileAdded" v-on:vdropzone-error="failed">
                                <div class="form-group form-group-label test">
                                    <div class="wt-labelgroup">
                                        <label for="file">
                                            <span class="wt-btn">Select Files</span>
                                        </label>
                                        <span>Drop files here to upload</span>
                                    </div>
                                </div>
                            </vue-dropzone>
                            <input type="hidden" v-bind:name="this.img_hidden_name" :id="this.img_hidden_id" value="">
                        </div>
                        <ul class="wt-attachfile" v-else>
                            <li>
                                <span>{{this.stored_image_name}}</span>
                                <em><a class="dz-remove" href="javascript:;" @click="removeImage(img_hidden_id)" :id="this.uploaded_image_remove_id" >
                                        <span class="lnr lnr-cross"></span>
                                    </a>
                                </em>
                                <input type="hidden" v-bind:name="this.img_hidden_name" :id="this.img_hidden_id" :value="this.stored_image_name">
                            </li>
                        </ul>
                    </div>
                    <div v-else>
                        <vue-dropzone :options="dropzoneOptions" :id="this.dropzone_id" :useCustomSlot=true :ref="this.img_ref" @vdropzone-file-added="vfileAdded" v-on:vdropzone-error="failed">
                            <div class="form-group form-group-label test">
                                <div class="wt-labelgroup">
                                    <label for="file">
                                        <span class="wt-btn">Select Files</span>
                                    </label>
                                    <span>Drop files here to upload</span>
                                </div>
                            </div>
                        </vue-dropzone>
                        <input type="hidden" v-bind:name="this.img_hidden_name" :id="this.img_hidden_id" value="">
                    </div>
                </fieldset>
            </div>
    </div>
</template>

<script>
const getImageUploadTemplate = () => `
<div class="wt-uploadingbox">
    <div class="dz-preview dz-file-preview">
        <figure><img data-dz-thumbnail /></figure>
        <em><div class="dz-size" data-dz-size></div><a class="lnr lnr-cross" href="javascript:;" data-dz-remove=""></a>
    </div>
</div>
`;
import vue2Dropzone from 'vue2-dropzone'
//import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ['stored_image_name', 'dropzone_id', 'img_hidden_id', 'img_hidden_name', 'img_ref', 'main_accordion_id', 'inner_accordion_id', 'stored_project_title', 'stored_project_url', 'stored_project_img', 'project_title_name', 'project_url_name', 'previewer_class', 'remove_uploded_image_id', 'uploaded_image_remove_id', 'project_title', 'project_url'],
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            options: {
            error: {
                position: 'center',
                    timeout: 3000,
                },
            },
            image_url:'',
            uploaded_project_image:false,
            stored_projects:[],
            img_preview: this.getImagePreview(),
            img_previews_container:'.'+this.img_hidden_id,
            img_uploder: this.getImageuploader(),
            dropzoneOptions: {
                url: APP_URL+'/freelancer/upload-temp-image',
                maxFilesize: 1, // MB
                maxFiles: 1,
                previewTemplate: getImageUploadTemplate(),
                previewsContainer: '.'+this.previewerClass(),
                paramName:'project_img',
                //addRemoveLinks: true,
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                },
                init: function() {
                    var myDropzone = this;
                    this.on("addedfile", function(file) {
                        var input_hidden_id = jQuery('#'+myDropzone.element.id).parents('.project-inner-list-item').find('fieldset input[type=hidden]').attr('id');
                        document.getElementById(input_hidden_id).value = file.name;
                    });
                    this.on("removedfile", function(file) {
                        var input_hidden_id = jQuery('#'+myDropzone.element.id).next('input[type=hidden]').attr('id');
                        document.getElementById(input_hidden_id).value = '';
                    });
                }
            }
        }
    },
    methods: {
        showError(message){
            return this.$toast.error(' ', message, this.options.error);
        },
        previewerClass() {
            return this.img_hidden_id;
        },
        removeElement() {
            this.$emit('removeElement');
        },
        removeImage: function() {
            this.uploaded_project_image = true;
        },
        getImagePreview() {
            if (this.stored_project_img) {
                return this.img_preview = true;
            } else {
                return this.img_preview = false;
            }
        },
        getImageuploader() {
            if (this.stored_project_img) {
                return this.img_uploder = true;
            } else {
                return this.img_uploder = false;
            }
        },
        vfileAdded(file) {
            console.log(this.$refs[this.img_ref].id);
        },
        failed:function(file,message,xhr){
            if (file.type != this.$refs[this.img_ref].options.acceptedFiles) {
                if (message == 'You can not upload any more files.') {
                    message = 'you need to remove file before uploading new one.'
                }
                this.showError(message);
                this.$refs[this.img_ref].removeFile(file);
                var input_hidden_id = jQuery('#'+this.$refs[this.img_ref].id).parents('.wt-settingscontent').find('.wt-userform input[type=hidden]').attr('id');
                document.getElementById(input_hidden_id).value = '';
            }
        }
    },
    mounted: function () {
        // if(this.stored_project_img){
        //     this.image_url = APP_URL+"/uploads/users/"+USERID+"/projects/"+this.stored_project_img;
        // }
    },
    created: function() {}
}
</script>
