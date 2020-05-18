<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.slider_style')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <form class="wt-sliderbox__form">
                            <div class="form-group">
                                <span class="wt-select">
                                    <select class="form-control" :name="'meta[slider'+parent_index+'][slider_style]'" :id="'style_list'+parent_index" v-model="slider.style">
                                        <option value="null" disabled>select section style</option>
                                        <option v-for="(style, index) in styles" :key="index" :value="style.value">{{style.title}}</option>
                                    </select>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.slider_image')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'slider_image'+parent_index" 
                            :img_ref="'slider_banner_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/slider_image'+parent_index"
                            :name="'slider_image'+parent_index"
                            :max_images="10"
                            :hidden_name="'meta[slider'+parent_index+'][attachment]'"
                            @addedFile="fileAdded('preview-wrapper'+parent_index, 'hidden_inner_slider_image'+parent_index, 'slider_image', parent_index)"
                            >
                        </upload-image>
                        <div :class="'slider_image'+parent_index" :id="'preview-wrapper'+parent_index">
                            <div :class="'wt-uploadingbox'+ ' db-pre'+parent_index" v-for="(slide, slideIndex) in slider.slider_image" :key="slideIndex" :id="'list_id_image'+parent_index+slideIndex" v-if="slider.slider_image">
                                <div class="dz-preview dz-file-preview">
                                    <figure><img :src="imageURL+slide" alt=""></figure>
                                    <div class="wt-uploadingbar">
                                        <div class="dz-filename" v-if="slide">{{slide}}</div>
                                        <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('list_id_image'+parent_index+slideIndex)"></a></em>
                                    </div>
                                </div>
                                <input type="hidden" :name="'meta[slider'+parent_index+'][attachment]['+slideIndex+']'" :id="'attachment-'+slideIndex" :value="slide"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.slider_inner_image')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'inner_banner_image'+parent_index" 
                            :img_ref="'inner_banner_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/inner_banner_image'+parent_index"
                            :name="'inner_banner_image'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_name="'meta[slider'+parent_index+'][inner_banner_image]'"
                            :hidden_id="'hidden_inner_banner_image'+parent_index"
                            @addedFile="fileAdded('inner-banner-pre'+parent_index, 'hidden_inner_banner_image'+parent_index, 'inner_banner_image')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'inner-banner-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="slider.inner_banner_image">
                            <figure><img :src="imageURL+slider.inner_banner_image" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{slider.inner_banner_image}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('inner-banner-pre'+parent_index)"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[slider'+parent_index+'][inner_banner_image]'" :value="slider.inner_banner_image" :id="'hidden_inner_banner_image'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.slider_first_floating_image')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'floating_image01'+parent_index" 
                            :img_ref="'floating1_banner_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/floating_image01'+parent_index"
                            :name="'floating_image01'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_name="'meta[slider'+parent_index+'][floating_image01]'"
                            :hidden_id="'hidden_floating_image01'+parent_index"
                            @addedFile="fileAdded('floating-image1-pre'+parent_index, 'hidden_floating_image01'+parent_index, 'floating_image01')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'floating-image1-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="slider.floating_image01">
                            <figure><img :src="imageURL+slider.floating_image01" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{slider.floating_image01}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('floating-image1-pre'+parent_index)"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[slider'+parent_index+'][floating_image01]'" :value="slider.floating_image01" :id="'hidden_floating_image01'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.slider_second_floating_image')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'floating_image02'+parent_index" 
                            :img_ref="'floating2_banner_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/floating_image02'+parent_index"
                            :name="'floating_image02'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_name="'meta[slider'+parent_index+'][floating_image02]'"
                            :hidden_id="'hidden_floating_image02'+parent_index"
                            @addedFile="fileAdded('floating-image2-pre'+parent_index, 'hidden_floating_image02'+parent_index, 'floating_image02')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'floating-image2-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="slider.floating_image02">
                            <figure><img :src="imageURL+slider.floating_image02" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{slider.floating_image02}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('floating-image2-pre'+parent_index)"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[slider'+parent_index+'][floating_image02]'" :value="slider.floating_image01" :id="'hidden_floating_image02'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.detail')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input placeholder="Title" v-model="slider.title" :name="'meta[slider'+parent_index+'][title]'" type="text" value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input placeholder="Subtitle" v-model="slider.subtitle" :name="'meta[slider'+parent_index+'][subtitle]'" type="text" value="" class="form-control">
                        </div>    
                        <div class="form-group">
                            <tinymce-editor 
                                v-model="slider.description" 
                                :init="{plugins: 'paste link code advlist autolink lists link image charmap print', toolbar1: 'undo redo code | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist', menubar:false, statusbar: false, extended_valid_elements:'span[style],i[class]'}">
                            </tinymce-editor>
                        </div>    
                        <div class="form-group form-group-half">
                            <input placeholder="Video Link" v-model="slider.video_link" :name="'meta[slider'+parent_index+'][video_link]'" type="text" value="" class="form-control">
                            <span class="wt-sliderbox__text">{{ trans('lang.video_note') }}</span>
                        </div> 
                        <div class="form-group form-group-half">
                            <input placeholder="Video Title" v-model="slider.video_title" :name="'meta[slider'+parent_index+'][video_title]'" type="text" value="" class="form-control">
                        </div>    
                        <div class="form-group">
                            <input placeholder="Video Description" v-model="slider.video_description" :name="'meta[slider'+parent_index+'][video_description]'" type="text" value="" class="form-control">
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
    props:['parent_index','element_id', 'sliders', 'styles', 'component', 'page_id'],
    data() {
        return {
            url:APP_URL,
            slider: {},
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
        getUploadedImages (listitems) {
            var i;
            var imageList = [];
            if (listitems.length > 0) {
                for (i=0; i<listitems.length; i++) {
                    var hidddenImage = document.querySelector('#'+listitems[i].id + ' input[type=hidden]');
                    let image = document.getElementById(hidddenImage.id).value
                    imageList.push(image)
                }
                return imageList
            } else {
                return imageList
            }
        },
        removeImage: function (id) {
            jQuery('#'+id).remove();
        },
        fileAdded: function(id, hiddenID, imageType, parentIndex) {
            if(imageType == 'slider_image') {
                var imageWrapper = document.getElementById(id)
                var childEmelemt = []
                var i;
                for(i = 0; i < imageWrapper.childNodes.length; i++){
                    var child = imageWrapper.childNodes[i];
                    childEmelemt.push(document.getElementById(child.id))
                }
                this.slider.slider_image  = this.getUploadedImages(childEmelemt)
                setTimeout(function(){ jQuery('.db-pre'+parentIndex).remove() }, 1000);
            } else {
                if (document.getElementById(hiddenID)) {
                    let image = document.getElementById(hiddenID).value
                    if (image) {
                        this.slider[imageType] = image
                        jQuery('#'+id).addClass('remove-preview')
                    }
                } else {
                    this.slider[imageType] = null
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
        var index = this.getArrayIndex(this.sliders, 'id', this.element_id)
        if (this.sliders[index]) {
            this.slider = this.sliders[index]
            this.slider.style = this.sliders[index].style
        }
        this.slider.parentIndex = this.parent_index
    },
    mounted: function() {
        jQuery('.wt-uploadingbox.db-pre'+this.parent_index).removeClass('db-pre'+this.parent_index)
    }
};
</script>
