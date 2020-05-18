<template>
    <div :server_error_message="server_errors">
        <div class="wt-tabscontenttitle wt-addnew">
            <h2>{{ trans('lang.add_your_awards')}}</h2>
            <a href="javascript:void(0);" @click="addAward" class="add-award-btn">{{ trans('lang.add_awards') }}</a>
        </div>
        <ul class="wt-experienceaccordion accordion" id="award-list">
            <span v-if="stored_awards" class="award-inner-list">
                 <li v-for="(stored_award, index) in stored_awards" :key="index" class="award-element" :id="'award-element-'+index">
                    <updateaward
                        :stored_image_name="stored_award.award_image"
                        :dropzone_id ="award.img_id+'-'+index"
                        :img_hidden_id ="'hidden_banner-'+index"
                        :img_hidden_name="'award['+[index]+'][award_hidden_image]'"
                        :img_ref="award.img_ref+'_'+index"
                        :main_accordion_id="'awardaccordion['+index+']'"
                        :inner_accordion_id="'awardaccordioninner['+index+']'"
                        :stored_award_title="stored_award.award_title"
                        :stored_award_date="stored_award.award_date"
                        :stored_award_img="stored_award.award_hidden_image"
                        :award_title_name="'award['+[index]+'][award_title]'"
                        :award_date_name="'award['+[index]+'][award_date]'"
                        :remove_uploded_image_id="'upload_id-'+index"
                        :uploaded_image_remove_id="'remove_upload_id-'+index"
                        :date_model="stored_award.award_date"
                        @removeElement="removeStoredAward(index)"
                    >
                    </updateaward>   
                </li>
            </span>
            <span class="award-inner-list">
                <li v-for="(award, index) in awards" :key="index" ref="awardlistelement" class="award-inner-list-item">
                    <div class="wt-accordioninnertitle">
                        <div :id="'awardaccordion['+award.count+']'" class="wt-projecttitle collapsed" data-toggle="collapse" :data-target="'#awardaccordioninner['+award.count+']'">
                            <figure :class="award.preview_class"></figure>
                            <h3>{{award.award_title}}<span>{{award.date}}</span></h3>
                        </div>
                        <div class="wt-rightarea">
                            <a href="javascript:void(0);" class="wt-addinfo wt-skillsaddinfo" :id="'awardaccordion['+award.count+']'" data-toggle="collapse" :data-target="'#awardaccordioninner['+award.count+']'" aria-expanded="true"><i class="lnr lnr-pencil"></i></a>
                            <a href="javascript:void(0);" class="wt-deleteinfo delete-award"><i class="lnr lnr-trash"></i></a>
                        </div>
                    </div>
                    <div class="wt-collapseexp collapse hide" :id="'awardaccordioninner['+award.count+']'" :aria-labelledby="'awardaccordion['+award.count+']'" data-parent="#accordion">
                        <fieldset>
                            <div class="form-group form-group-half">
                                <input type="text" v-bind:name="'award['+[award.count]+'][award_title]'" class="form-control" :placeholder="ph_award_title" v-model="award.award_title">
                            </div>
                            <div class="form-group form-group-half">
                                <date-pick v-model="award.date"></date-pick>
                                <input type="hidden" v-bind:name="'award['+[award.count]+'][award_date]'" :value="award.date">
                            </div>
                            <div class="form-group award_image_uploaded_placeholder" style="display:none">
                            <ul class="wt-attachfile">
                                <li>
                                    <span class="uploaded-img-name"></span> 
                                    <em><a class="dz-remove" href="javascript:;" :id="'remove-award-image-'+award.count" @click="removeUploadedImage($event)" >
                                            <span class="lnr lnr-cross"></span>
                                        </a>
                                    </em>
                                </li>
                            </ul>
                            </div>
                            <uploadimage :option="award.option" :id="award.img_id+'-'+award.count" :img_ref="award.img_ref+'_'+award.count"></uploadimage>
                            <input type="hidden" v-bind:name="'award['+[award.count]+'][award_hidden_image]'" :id="'hidden_award_img-'+award.count">
                        </fieldset>
                    </div>
                </li>
            </span>
        </ul>
    </div>
</template>
<script>
const getImageUploadTemplate = () => `
<div class="wt-uploadingbox">
<div class="dz-preview dz-file-preview">
    <img data-dz-thumbnail />
</div>
</div>
`;
import uploadimage from './ProjectAwardUploadComponent'
import updateaward from './EditAwardComponent'
import Event from '../event.js';
import DatePick from 'vue-date-pick';
export default{
    components: {uploadimage, updateaward, DatePick},
    props: ['widget_title', 'server_error_message', 'server_errors', 'ph_award_title'],
        data(){
            return {
                stored_awards:[],
                error_message:this.server_errors,
                award: {
                    image_uploaded: false,
                    award_title: this.ph_award_title,
                    award_hidden_image:'',
                    award_url:'Award url here',
                    date:'Select Award date',
                    count: 0,
                    img_id: 'award_img',
                    img_ref: 'award_img_ref',
                    preview_class:'dropzone-award-previews',
                    option:{
                        url: APP_URL+'/freelancer/upload-temp-image',
                        maxFilesize: 2, // MB
                        maxFiles: 1,
                        previewTemplate: getImageUploadTemplate(),
                        previewsContainer: '.dropzone-award-previews',
                        paramName:'award_img',
                        headers: {
                            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                        },
                        init: function() {
                            var myDropzone = this;
                            this.on("addedfile", function(file) { 
                                var input_hidden_id = jQuery('#'+myDropzone.element.id).next('input[type=hidden]').attr('id');
                                document.getElementById(input_hidden_id).value = file.name;
                                jQuery('#'+myDropzone.element.id).css("display","none");
                                jQuery('#'+myDropzone.element.id).parents('.award-inner-list-item').find('.award_image_uploaded_placeholder').css("display","block");
                                jQuery('#'+myDropzone.element.id).parents('.award-inner-list-item').find('.award_image_uploaded_placeholder ul li span.uploaded-img-name').text(file.name);

                            });
                            this.on("removedfile", function(file) { 
                                document.getElementById('hidden_banner').value = ''; 
                            });
                        }
                    },
                },
                awards: [],
            }
        },
        methods: {
            getAwards(){
                let self = this;
                axios.get(APP_URL + '/freelancer/get-freelancer-awards')
                .then(function (response) {
                    if(response.data.type == 'success') {
                        self.stored_awards = response.data.awards;
                    }
                });
            },
            addAward: function () {
                var expereience_list_count = jQuery('.add-award-btn').parents('.wt-tabsinfo').find('ul#award-list span.award-inner-list li').length;
                var image_placeholder_count = jQuery('.add-award-btn').parents('.wt-tabsinfo').find('ul#award-list span.award-inner-list li').find('figure.dropzone-previews').length;
                if(this.$refs.awardlistelement) {
                    this.award.count = expereience_list_count + this.$refs.awardlistelement.length;
                } else {
                    this.award.count = expereience_list_count -1;
                }
                if(image_placeholder_count) {
                    image_placeholder_count++
                }
                this.awards.push(Vue.util.extend({}, this.award, this.award.count++, this.award.preview_class = this.award.preview_class+'-'+image_placeholder_count ))
                this.award.option.previewsContainer = this.award.option.previewsContainer+'-'+image_placeholder_count;
            },
            removeStoredAward: function (index) {
                this.stored_awards.splice(index, 1);
            },
            removeUploadedImage: function (event) {
                var element = event.currentTarget;
                var elementID = element.getAttribute('id');
                jQuery('#'+elementID).parents('.award_image_uploaded_placeholder').css("display","none");
                jQuery('#'+elementID).parents('.award-inner-list-item').find('.wt-uploadingbox').remove();
                jQuery('#'+elementID).parents('.award-inner-list-item').find('.vue-dropzone').css("display","block");
            }
        },
        mounted: function () {
            Event.$emit('award-component-render', { error: this.error_message});
            jQuery(document).on('click', '.delete-award', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.award-inner-list-item').remove();
            });
        },
        created: function() {
            this.getAwards();
        } 
    }
</script>