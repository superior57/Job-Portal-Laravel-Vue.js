<template>
    <div>
        <vue-dropzone :options="this.dropzoneOptions" v-on:vdropzone-file-added="addedFile" :id="this.id" :useCustomSlot=true :ref="this.img_ref" v-on:vdropzone-error="failed">
            <div class="form-group form-group-label">
                <div class="wt-labelgroup">
                    <label for="file">
                        <span class="wt-btn">{{ trans('lang.select_files') }}</span>
                    </label>
                    <span>{{ trans('lang.drop_files') }}</span>
                </div>
            </div>
        </vue-dropzone> 
        <div :class="this.id" v-if="this.dropzoneOptions.maxFiles == 1"></div>
    </div>
</template>

<script>
// const getImageUploadTemplate = () => `
//     <div class="wt-uploadingbox">
//     <div class="dz-preview dz-file-preview">
//         <figure><img data-dz-thumbnail /></figure>
//         <div class="wt-uploadingbar">
//         <div class="dz-filename"><span data-dz-name></span></div>
//         <em><div class="dz-size" data-dz-size></div><a class="lnr lnr-cross" href="javascript:;" data-dz-remove=""></a>
//         <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
//         <div class="dz-success-mark"><i class="fa fa-check"></i></div>
//         </em>
//         </div>
//     </div>
//     </div>
// `;
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ['id', 'img_ref', 'url', 'name', 'max_images', 'hidden_name', 'hidden_id', 'dynamicHidden'],    
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
        is_show:true,
        options: {
            error: {
                position: 'center',
                timeout: 3000,
            },
        },
        dropzoneOptions: {
                url: this.getUrl(),
                maxFilesize: 2, // MB
                maxFiles: this.getMaxImages(),
                previewTemplate: this.getImageUploadTemplate(),
                previewsContainer: '.'+this.getPreviewerClass(),
                paramName:this.getName(),
                acceptedFiles:'image/*',
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                },
                init: function() {
                    var myDropzone = this;
                    // this.on("addedfile", function(file) { 
                    //     var input_hidden_id = jQuery('#'+myDropzone.element.id).parents('.wt-settingscontent').find('.wt-userform input[type=hidden]').attr('id');
                    //     console.log(input_hidden_id);
                    //     document.getElementById(input_hidden_id).value = file.name;     
                    // });
                    this.on("removedfile", function(file) { 
                        if (jQuery('#'+myDropzone.element.id).parents('.wt-settingscontent').find('.wt-userform input[type=hidden]')) {
                            console.log('remove func')
                            var input_hidden_id = jQuery('#'+myDropzone.element.id).parents('.wt-settingscontent').find('.wt-userform input[type=hidden]').attr('id');
                            if (document.getElementById(input_hidden_id) && document.getElementById(input_hidden_id).value) {
                                document.getElementById(input_hidden_id).value = ''; 
                            }
                        }
                        
                    });
                }
            },
        }
    },
    methods:{
        getImageUploadTemplate() {
            return `
                    <div class="wt-uploadingbox">
                    <div class="dz-preview dz-file-preview">
                        <figure><img data-dz-thumbnail /></figure>
                        <div class="wt-uploadingbar">
                        <div class="dz-filename"><span data-dz-name></span></div>
                        <em><div class="dz-size" data-dz-size></div><a class="lnr lnr-cross" href="javascript:;" data-dz-remove=""></a>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                        <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                        </em>
                        </div>
                    </div>
                    </div>
                `;
        },
        showError(message){
            return this.$toast.error(' ', message, this.options.error);
        },
        getUrl() {
            return this.url;
        },
        getMaxImages() {
            if (this.max_images) {
                return this.max_images
            } else {
                return 1
            }
        },
        getName() {
            return this.name;
        },
        getPreviewerClass() {
            return this.id;
        },
        addedFile: function(file) {
            console.log(file)
            if (this.max_images > 1) {
                let parentClass = this.$refs[this.img_ref].id;
                parent = document.getElementsByClassName(this.id)
                // var listitems= parent[0].getElementsByTagName("li")
                var listitems= parent[0].getElementsByClassName("wt-uploadingbox")
                var i;
                for (i=0; i<listitems.length; i++) {
                    if (!(listitems[i].id)) {
                        listitems[i].setAttribute("id", parentClass+"-"+i);
                        var input = document.createElement("input");
                        input.setAttribute("type", "hidden");
                        input.setAttribute("name", this.hidden_name+'['+i+']'); 
                        input.setAttribute("value", file.name);
                        input.setAttribute("id", parentClass+'-attachment-'+i);
                    }
                }
                if (document.getElementById(file.previewElement.id)) {
                    var listParent = document.getElementById(file.previewElement.id)
                    listParent.appendChild(input);
                }
                this.$emit("addedFile", 'file-add');
            } else {
                if (this.dynamicHidden == 'true') {
                        let parentClass = this.$refs[this.img_ref].id;
                        parent = document.getElementsByClassName(this.id)
                        var listitems= parent[0].getElementsByClassName("wt-uploadingbox")
                        listitems[0].setAttribute("id", parentClass+"-"+this.id);
                        var input = document.createElement("input");
                        input.setAttribute("type", "hidden");
                        input.setAttribute("name", this.hidden_name); 
                        input.setAttribute("value", file.name);
                        input.setAttribute("id", this.hidden_id);
                        if (document.getElementById(file.previewElement.id)) {
                            var listParent = document.getElementById(file.previewElement.id)
                            listParent.appendChild(input);
                        }
                } else {
                    var input_hidden_id = jQuery('#'+this.$refs[this.img_ref].id).parents('.wt-settingscontent').find('.wt-userform input[type=hidden]').attr('id');
                    document.getElementById(input_hidden_id).value = file.name;  
                }
                this.$emit("addedFile", 'file-add');
            }
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
}
</script>