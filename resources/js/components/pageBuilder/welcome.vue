<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>
            <div class="amt-slot-title">
                <span class="color-settings">
                    <verte v-model="welcome.sectionColor" menuPosition="left" model="hex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                            <path style="fill: #000" d="M29.73,17.26,18.23,5.75a1.46,1.46,0,0,0-.56-.36V4.65a4.65,4.65,0,0,0-9.3,0v8.77L5.63,16.17a3.88,3.88,0,0,0,0,5.48l8.22,8.22A3.89,3.89,0,0,0,16.59,31a3.85,3.85,0,0,0,2.73-1.13L29.73,19.45A1.56,1.56,0,0,0,29.73,17.26ZM9.92,4.65a3.1,3.1,0,0,1,6.2,0v1a.24.24,0,0,0-.08.06L9.92,11.87Zm17.9,13.18H6.31a2.33,2.33,0,0,1,.42-.57l9.39-9.39v3.19a1.55,1.55,0,1,0,1.55,0V7.39L28.15,17.88A.91.91,0,0,0,27.82,17.83Z"/>
                            <path style="fill: #000" d="M35.5,27.5a3.5,3.5,0,1,1-7,0c0-1.41,1.86-4.75,2.86-6.46a.72.72,0,0,1,1.26,0C33.64,22.75,35.5,26.09,35.5,27.5Z"/>
                            <rect v-bind:style="{ fill: welcome.sectionColor}" y="35" width="40" height="5" rx="2.5"/>
                        </svg>
                    </verte>
                </span>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.sec_bg_img')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme wt-userform">
                        <upload-image 
                            :id="'welcome_background'+parent_index" 
                            :img_ref="'home_banner_ref'+parent_index" 
                            :url="url+'/admin/pages/upload-temp-image/welcome_background'+parent_index"
                            :name="'welcome_background'+parent_index"
                            :dynamicHidden="'true'"
                            :hidden_name="'meta[welcome'+parent_index+'][welcome_background]'"
                            :hidden_id="'hidden_welcome_background'+parent_index"
                            @addedFile="fileAdded('hidden_welcome_background'+parent_index)" 
                            >
                        </upload-image>
                    </div>
                    <div class="wt-formtheme wt-userform" :id="'welcome-background-pre'+parent_index">
                        <div class="wt-uploadingbox" v-if="welcome.welcome_background">
                            <figure><img :src="imageURL+welcome.welcome_background" alt=""></figure>
                            <div class="wt-uploadingbar">
                                <div class="dz-filename">{{welcome.welcome_background}}</div>
                                <em><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('welcome-background-pre'+parent_index)"></a></em>
                            </div>
                            <input type="hidden" :name="'meta[welcome'+parent_index+'][welcome_background]'" :value="welcome.welcome_background" :id="'hidden_welcome_background'+parent_index"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.first_section_detail')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half toolip-wrapo">
                            <input type="text" v-model="welcome.first_title" placeholder="First Section Title" :name="'meta[welcome'+parent_index+'][first_title]'"  value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half toolip-wrapo">
                            <input type="text" v-model="welcome.first_url" placeholder="First Section url" :name="'meta[welcome'+parent_index+'][first_url]'"  value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="welcome.first_url_button" placeholder="First Section Button text" :name="'meta[welcome'+parent_index+'][first_url_button]'"  value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <tinymce-editor 
                                v-model="welcome.first_description" 
                                :init="{plugins: 'paste link code advlist autolink lists link image charmap print', toolbar1: 'undo redo code | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist', menubar:false, statusbar: false, extended_valid_elements:'span[style],i[class]'}">
                            </tinymce-editor>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>{{trans('lang.second_section_detail')}}</h6>
                <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                        <div class="form-group form-group-half">
                            <input type="text" v-model="welcome.second_title" placeholder="Second Section Title" :name="'meta[welcome'+parent_index+'][second_title]'"  value="" class="form-control">
                        </div> 
                        <div class="form-group form-group-half">
                            <input type="text" v-model="welcome.second_url" placeholder="Second Section url" :name="'meta[welcome'+parent_index+'][second_url]'"  value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="welcome.second_url_button" placeholder="Second Section Button text" :name="'meta[welcome'+parent_index+'][second_url_button]'"  value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <tinymce-editor 
                                v-model="welcome.second_description" 
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
    props:['parent_index', 'element_id', 'welcome_data', 'component', 'page_id'],
    data() {
        return {
            url:APP_URL,
            welcome:{},
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
        fileAdded: function(id) {
            if (document.getElementById(id)) {
                let image = document.getElementById(id).value
                if (image) {
                    this.welcome.welcome_background = image
                    jQuery('#welcome-background-pre'+this.parent_index).addClass('remove-preview')
                }
            } else {
                this.welcome.welcome_background = null
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
        var index = this.getArrayIndex(this.welcome_data, 'id', this.element_id)
        if (this.welcome_data[index]) {
            this.welcome = this.welcome_data[index]
            this.welcome.sectionColor = this.welcome_data[index].sectionColor
        }
        this.welcome.parentIndex = this.parent_index
    },
};
</script>
