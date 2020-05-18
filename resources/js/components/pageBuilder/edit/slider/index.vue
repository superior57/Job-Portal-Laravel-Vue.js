<template>
    <div class="la-section-settings">
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.slider_style')}}</h6>
            <div class="wt-settingscontent">
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <span class="wt-select">
                            <select class="form-control" :name="'meta[slider'+parent_index+'][slider_style]'" :id="'style_list'+parent_index" v-model="slider.style" >
                                <option value="null" disabled>select section style</option>
                                <option v-for="(style, index) in styles" :key="index" :value="style.value">{{style.title}}</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.slider_image')}}</h6>
            <div class="wt-settingscontent">
                <div class="wt-formtheme wt-userform">
                    <upload-image 
                        :id="'banner_image'+parent_index" 
                        :img_ref="'slider_banner_ref'+parent_index" 
                        :url="url+'/admin/pages/upload-temp-image/banner_image'+parent_index"
                        :name="'banner_image'+parent_index"
                        :max_images="10"
                        :hidden_name="'meta[slider'+parent_index+'][attachment]'"
                        >
                    </upload-image>
                    <div :class="'banner_image'+parent_index">
                        <div class="wt-uploadingbox"  v-for="(slide, slideIndex) in slider.slider_image" :key="slideIndex" :id="'list_id_image'+slideIndex" v-if="slider.slider_image">
                            <div class="dz-preview dz-file-preview">
                                <figure><img :src="url+'/uploads/pages/'+page_id+'/'+slide" alt=""></figure>
                                <div class="wt-uploadingbar">
                                    <div class="dz-filename" v-if="slide">{{slide}}</div>
                                </div>
                            </div>
                            <input type="hidden" :name="'meta[slider'+parent_index+'][attachment]['+slideIndex+']'" :id="'attachment-'+slideIndex" :value="slide"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <inner-image 
            :inner_banner_image="slider.inner_banner_image"
            :page_id="page_id"
            :parent_index="parent_index"
            v-if="slider.inner_banner_image">
        </inner-image>
        <inner-image 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </inner-image>
        <first-floating 
            :parent_index="parent_index"
            :floating_image="slider.floating_image01"
            :page_id="page_id"
            v-if="slider.floating_image01">
        </first-floating>
        <first-floating 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </first-floating>
        <second-floating 
            :parent_index="parent_index"
            :floating_image="slider.floating_image02"
            :page_id="page_id"
            v-if="slider.floating_image02">
        </second-floating>
        <second-floating 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </second-floating>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.detail')}}</h6>
            <div class="wt-settingscontent">
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Title" :name="'meta[slider'+parent_index+'][title]'" type="text" :value="slider.title" class="form-control" v-if="slider.title">
                    <input placeholder="Title" :name="'meta[slider'+parent_index+'][title]'" type="text" value="" class="form-control" v-else>
                </div> 
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Subtitle" :name="'meta[slider'+parent_index+'][subtitle]'" type="text" :value="slider.subtitle" class="form-control" v-if="slider.subtitle">
                    <input placeholder="Subtitle" :name="'meta[slider'+parent_index+'][subtitle]'" type="text" value="" class="form-control" v-else>
                </div>    
                <div class="form-group">
                    <textarea :name="'meta[slider'+parent_index+'][description]'" placeholder="Description" class="form-control" v-if="slider.description">{{slider.description}}</textarea>
                    <textarea :name="'meta[slider'+parent_index+'][description]'" placeholder="Description" class="form-control" v-else></textarea>
                </div>    
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Video Link" :name="'meta[slider'+parent_index+'][video_link]'" type="text" :value="slider.video_link" class="form-control" v-if="slider.video_link">
                    <input placeholder="Video Link" :name="'meta[slider'+parent_index+'][video_link]'" type="text" value="" class="form-control" v-else>
                    <span>{{ trans('lang.video_note') }}</span>
                </div> 
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Video Title" :name="'meta[slider'+parent_index+'][video_title]'" type="text" :value="slider.video_title" class="form-control" v-if="slider.video_title">
                    <input placeholder="Video Title" :name="'meta[slider'+parent_index+'][video_title]'" type="text" value="" class="form-control" v-else>
                </div>    
                <div class="form-group">
                    <textarea :name="'meta[slider'+parent_index+'][video_description]'" placeholder="Video Description" class="form-control" v-if="slider.video_description">{{slider.video_description}}</textarea>
                    <textarea :name="'meta[slider'+parent_index+'][video_description]'" placeholder="Video Description" class="form-control" v-else></textarea>
                </div>    
            </div>
        </div>
    </div>
</template>
<script>
import InnerImage from './slider-inner-image'
import FirstFloating from './first-floating-image'
import SecondFloating from './second-floating-image'
export default {
    components:{InnerImage, FirstFloating, SecondFloating},
    // props:['slider_data', 'styles', 'page_id','parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    props:['parent_index','element_id', 'sliders', 'styles'],
    data() {
        return {
            url:APP_URL,
            slider: {}
        }
    },
    methods:{
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
        // if (this.slider_data && this.slider_data[this.section_id]) {
        //     this.slider = this.slider_data[this.section_id]
        //     if (this.slider.slider_style) {
        //         this.selected_styles = this.slider.slider_style
        //     }
        // }
        var index = this.getArrayIndex(this.sliders, 'id', this.element_id)
        if (this.sliders[index]) {
            this.slider = this.sliders[index]
            this.slider.style = this.sliders[index].style
        }
        this.slider.parentIndex = this.parent_index
    }
};
</script>
