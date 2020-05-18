<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>
            <div class="amt-slot-title">
                <span class="color-settings">
                    <verte v-model="work.sectionColor" menuPosition="left" model="hex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                            <path style="fill: #000" d="M29.73,17.26,18.23,5.75a1.46,1.46,0,0,0-.56-.36V4.65a4.65,4.65,0,0,0-9.3,0v8.77L5.63,16.17a3.88,3.88,0,0,0,0,5.48l8.22,8.22A3.89,3.89,0,0,0,16.59,31a3.85,3.85,0,0,0,2.73-1.13L29.73,19.45A1.56,1.56,0,0,0,29.73,17.26ZM9.92,4.65a3.1,3.1,0,0,1,6.2,0v1a.24.24,0,0,0-.08.06L9.92,11.87Zm17.9,13.18H6.31a2.33,2.33,0,0,1,.42-.57l9.39-9.39v3.19a1.55,1.55,0,1,0,1.55,0V7.39L28.15,17.88A.91.91,0,0,0,27.82,17.83Z"/>
                            <path style="fill: #000" d="M35.5,27.5a3.5,3.5,0,1,1-7,0c0-1.41,1.86-4.75,2.86-6.46a.72.72,0,0,1,1.26,0C33.64,22.75,35.5,26.09,35.5,27.5Z"/>
                            <rect v-bind:style="{ fill: work.sectionColor}" y="35" width="40" height="5" rx="2.5"/>
                        </svg>
                    </verte>
                </span>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.sec_bg_img')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'background_image'+parent_index" 
                            :img_ref="'work_background_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/background_image'+parent_index"
                            :name="'background_image'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_id="'work_background_image'+parent_index"
                            @addedFile="fileAdded('background-pre-image'+parent_index, 'work_background_image'+parent_index, 'background_image')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'background-pre-image'+parent_index">
                        <div class="wt-uploadingbox" v-if="work.background_image">
                            <figure><img :src="imageURL+work.background_image" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{work.background_image}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('background-pre-image'+parent_index, 'background_image')"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[work_tab'+parent_index+'][background]'" :value="work.background_image" :id="'work_background_image'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.detail')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input placeholder="Title" v-model="work.title" :name="'meta[work_tab'+parent_index+'][title]'" type="text" value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input placeholder="Subtitle"  v-model="work.subtitle" :name="'meta[work_tab'+parent_index+'][subtitle]'" type="text" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <tinymce-editor 
                                v-model="work.description" 
                                :init="{plugins: 'paste link code advlist autolink lists link image charmap print', toolbar1: 'undo redo code | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist', menubar:false, statusbar: false, extended_valid_elements:'span[style],i[class]'}">
                            </tinymce-editor>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.first_tab')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input placeholder="Title" v-model="work.first_tab_title" :name="'meta[work_tab'+parent_index+'][first_tab_title]'" type="text" value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input placeholder="Subtitle" v-model="work.first_tab_subtitle" :name="'meta[work_tab'+parent_index+'][first_tab_subtitle]'" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'first_tab_icon'+parent_index" 
                            :img_ref="'first_tab_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/first_tab_icon'+parent_index"
                            :name="'first_tab_icon'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_id="'work_first_tab_icon'+parent_index"
                            @addedFile="fileAdded('first-tab-pre'+parent_index, 'work_first_tab_icon'+parent_index, 'first_tab_icon')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'first-tab-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="work.first_tab_icon">
                            <figure><img :src="imageURL+work.first_tab_icon" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{work.first_tab_icon}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('first-tab-pre'+parent_index, 'first_tab_icon')"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[work_tab'+parent_index+'][first_tab_icon]'" :value="work.first_tab_icon" :id="'work_first_tab_icon'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.second_tab')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input placeholder="Title" v-model="work.second_tab_title" :name="'meta[work_tab'+parent_index+'][second_tab_title]'" type="text" value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input placeholder="Subtitle" v-model="work.second_tab_subtitle" :name="'meta[work_tab'+parent_index+'][second_tab_subtitle]'" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'second_tab_icon'+parent_index" 
                            :img_ref="'second_tab_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/second_tab_icon'+parent_index"
                            :name="'second_tab_icon'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_id="'work_second_tab_icon'+parent_index"
                            @addedFile="fileAdded('second-tab-pre'+parent_index, 'work_second_tab_icon'+parent_index, 'second_tab_icon')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'second-tab-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="work.second_tab_icon">
                            <figure><img :src="imageURL+work.second_tab_icon" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{work.second_tab_icon}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('second-tab-pre'+parent_index, 'second_tab_icon')"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[work_tab'+parent_index+'][second_tab_icon]'" :value="work.second_tab_icon" :id="'work_second_tab_icon'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.third_tab')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input placeholder="Title" v-model="work.third_tab_title" :name="'meta[work_tab'+parent_index+'][third_tab_title]'" type="text" value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input placeholder="Subtitle" v-model="work.third_tab_subtitle" :name="'meta[work_tab'+parent_index+'][third_tab_subtitle]'" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'third_tab_icon'+parent_index" 
                            :img_ref="'third_tab_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/third_tab_icon'+parent_index"
                            :name="'third_tab_icon'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_id="'work_third_tab_icon'+parent_index"
                            @addedFile="fileAdded('third-tab-pre'+parent_index, 'work_third_tab_icon'+parent_index, 'third_tab_icon')"
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'third-tab-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="work.third_tab_icon">
                            <figure><img :src="imageURL+work.third_tab_icon" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{work.third_tab_icon}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('third-tab-pre'+parent_index, 'third_tab_icon')"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[work_tab'+parent_index+'][third_tab_icon]'" :value="work.third_tab_icon" :id="'work_third_tab_icon'+parent_index"> 
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
    props:['parent_index','element_id', 'work_tabs', 'component', 'page_id'],
    data() {
        return {
            url:APP_URL,
            work: {},
            imageURL:this.getImageUrl(),
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
        removeImage: function (id, imageType) {
            jQuery('#'+id).remove();
            this.work[imageType] = ''
        },
        fileAdded: function(id, hiddenID, imageType) {
            if (document.getElementById(hiddenID)) {
                let image = document.getElementById(hiddenID).value
                if (image) {
                    this.work[imageType] = image
                    jQuery('#'+id).addClass('remove-preview')
                }
            } else {
                this.work[imageType] = null
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
        var index = this.getArrayIndex(this.work_tabs, 'id', this.element_id)
        if (this.work_tabs[index]) {
            this.work = this.work_tabs[index]
            this.work.sectionColor = this.work_tabs[index].sectionColor
        }
        this.work.parentIndex = this.parent_index
    },
};
</script>
