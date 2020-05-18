<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>
            <div class="amt-slot-title">
                <span class="color-settings">
                    <verte v-model="app.sectionColor" menuPosition="left" model="hex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                            <path style="fill: #000" d="M29.73,17.26,18.23,5.75a1.46,1.46,0,0,0-.56-.36V4.65a4.65,4.65,0,0,0-9.3,0v8.77L5.63,16.17a3.88,3.88,0,0,0,0,5.48l8.22,8.22A3.89,3.89,0,0,0,16.59,31a3.85,3.85,0,0,0,2.73-1.13L29.73,19.45A1.56,1.56,0,0,0,29.73,17.26ZM9.92,4.65a3.1,3.1,0,0,1,6.2,0v1a.24.24,0,0,0-.08.06L9.92,11.87Zm17.9,13.18H6.31a2.33,2.33,0,0,1,.42-.57l9.39-9.39v3.19a1.55,1.55,0,1,0,1.55,0V7.39L28.15,17.88A.91.91,0,0,0,27.82,17.83Z"/>
                            <path style="fill: #000" d="M35.5,27.5a3.5,3.5,0,1,1-7,0c0-1.41,1.86-4.75,2.86-6.46a.72.72,0,0,1,1.26,0C33.64,22.75,35.5,26.09,35.5,27.5Z"/>
                            <rect v-bind:style="{ fill: app.sectionColor}" y="35" width="40" height="5" rx="2.5"/>
                        </svg>
                    </verte>
                </span>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.section_style')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <div class="wt-sliderbox__form">
                            <div class="form-group">
                                <span class="wt-select">
                                    <select class="form-control" :name="'meta[app'+parent_index+'][style]'" v-model="app.style">
                                        <option value="null" disabled>select section style</option>
                                        <option v-for="(style, index) in styles" :key="index" :value="style.value">{{style.title}}</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.sec_bg_img')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'app_background'+parent_index" 
                            :img_ref="'app_banner_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/app_background'+parent_index"
                            :name="'app_background'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_name="'meta[app'+parent_index+'][background_image]'"
                            :hidden_id="'hidden_app_background'+parent_index"
                            @addedFile="fileAdded('app-background-pre'+parent_index, 'hidden_app_background'+parent_index, 'background_image')" 
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'app-background-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="app.background_image">
                            <figure><img :src="imageURL+app.background_image" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{app.background_image}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('app-background-pre'+parent_index)"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[app'+parent_index+'][background_image]'" :value="app.background_image" :id="'hidden_app_background'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.app_image')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'app_image'+parent_index" 
                            :img_ref="'app_image_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/app_image'+parent_index"
                            :name="'app_image'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_name="'meta[app'+parent_index+'][app_image]'"
                            :hidden_id="'hidden_app_image'+parent_index"
                            @addedFile="fileAdded('app-image-pre'+parent_index, 'hidden_app_image'+parent_index, 'app_image')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'app-image-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="app.app_image">
                            <figure><img :src="imageURL+app.app_image" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{app.app_image}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('app-image-pre'+parent_index)"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[app'+parent_index+'][app_image]'" :value="app.app_image" :id="'hidden_app_image'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.detail')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input type="text" placeholder="Title" v-model="app.title" :name="'meta[app'+parent_index+'][title]'"  value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input type="text" placeholder="SubTitle" v-model="app.subtitle" :name="'meta[app'+parent_index+'][subtitle]'"  value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input type="text" placeholder="Android app link" v-model="app.andriod_url" :name="'meta[app'+parent_index+'][andriod_url]'"  value="" class="form-control">
                        </div>
                        <div class="form-group form-group-half">
                            <input type="text" placeholder="IOS app link" v-model="app.ios_url" :name="'meta[app'+parent_index+'][ios_url]'"  value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <tinymce-editor 
                                v-model="app.description" 
                                :init="{plugins: 'paste link code advlist autolink lists link image charmap print', toolbar1: 'undo redo code | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist', menubar:false, statusbar: false, extended_valid_elements:'span[style],i[class]'}">
                            </tinymce-editor>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Editor from '@tinymce/tinymce-vue'
export default {
    components: {
        'tinymce-editor': Editor
    },
    props:['parent_index', 'element_id', 'apps', 'styles', 'component', 'page_id'],
    data() {
        return {
            url:APP_URL,
            app:{},
            imageURL:this.getImageUrl()
        }
    },
    methods:{
        getImageUrl: function() {
            if (this.component == 'edit') {
                return APP_URL+'/uploads/pages/'+this.page_id+'/'
            } else {
                return APP_URL+'/uploads/pages/temp/'
            }
        },
        removeImage: function (id) {
            jQuery('#'+id).remove();
        },
        fileAdded: function(id, hiddenID, imageType) {
            if (document.getElementById(hiddenID)) {
                let image = document.getElementById(hiddenID).value
                if (image) {
                    if (imageType == 'background_image') {
                        this.app.background_image = image
                    } else {
                        this.app.app_image = image
                    }
                    jQuery('#'+id).addClass('remove-preview')
                }
            } else {
                if (imageType == 'background_image') {
                    this.app.background_image = null
                } else {
                    this.app.app_image = null
                }
            }
        },
        getArrayIndex (array, attr, value) {
            for (var i = 0; i < array.length; i += 1) {
                if (array[i][attr] == value) {
                return i
                }
            }
            return -1
        },
        removeSection: function() {
            this.$emit("removeElement", 'remove-section');
        }
    },
    created: function() {
        var index = this.getArrayIndex(this.apps, 'id', this.element_id)
        if (this.apps[index]) {
            this.app = this.apps[index]
            this.app.style = this.apps[index].style
            this.app.sectionColor = this.apps[index].sectionColor
        }
        this.app.parentIndex = this.parent_index
        
    },   
};
</script>
