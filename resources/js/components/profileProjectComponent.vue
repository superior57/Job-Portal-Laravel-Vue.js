<template>
    <div>
        <div class="wt-tabscontenttitle wt-addnew">
            <h2>{{trans('lang.add_your_project')}}</h2>
            <a href="javascript:void(0);" @click="addProject" class="add-project-btn">{{trans('lang.add_project')}}</a>
        </div>
        <ul class="wt-experienceaccordion accordion" id="project-list">
            <span v-if="stored_projects" class="project-inner-list">
                 <li v-for="(stored_project, index) in stored_projects" :key="index" class="project-element project-inner-list-item" :id="'project-element-'+index">
                    <updateProject
                        :stored_image_name="stored_project.project_image"
                        :dropzone_id ="project.img_id+'-'+index"
                        :img_hidden_id ="'stored_hidden_banner_'+index"
                        :img_hidden_name="'project['+[index]+'][project_hidden_image]'"
                        :img_ref="project.img_ref+'_'+index"
                        :main_accordion_id="'projectaccordion['+index+']'"
                        :inner_accordion_id="'projectaccordioninner['+index+']'"
                        :stored_project_title="stored_project.project_title"
                        :stored_project_url="stored_project.project_url"
                        :stored_project_img="stored_project.project_hidden_image"
                        :project_title_name="'project['+[index]+'][project_title]'"
                        :project_url_name="'project['+[index]+'][project_url]'"
                        :remove_uploded_image_id="'upload_id-'+index"
                        :uploaded_image_remove_id="'remove_upload_id-'+index"
                        :project_title="project.project_title"
                        :project_url="project.project_url"
                        @removeElement="removeStoredProject(index)"
                    >
                    </updateProject>
                </li>
            </span>
            <span class="project-inner-list">
                <li v-for="(project, index) in projects" :key="index" ref="projectlistelement" class="project-inner-list-item">
                    <div class="wt-accordioninnertitle">
                        <div :id="'projectaccordion['+project.count+']'" class="wt-projecttitle collapsed" data-toggle="collapse" :data-target="'#projectaccordioninner['+project.count+']'">
                            <figure :class="project.preview_class"></figure>
                            <h3>{{project.project_title}}<span>{{project.project_url}}</span></h3>
                        </div>
                        <div class="wt-rightarea">
                            <a href="javascript:void(0);" class="wt-addinfo wt-skillsaddinfo" :id="'projectaccordion['+project.count+']'" data-toggle="collapse" :data-target="'#projectaccordioninner['+project.count+']'" aria-expanded="true"><i class="lnr lnr-pencil"></i></a>
                            <a href="javascript:void(0);" class="wt-deleteinfo delete-project"><i class="lnr lnr-trash"></i></a>
                        </div>
                    </div>
                    <div class="wt-collapseexp collapse hide" :id="'projectaccordioninner['+project.count+']'" :aria-labelledby="'projectaccordion['+project.count+']'" data-parent="#accordion">
                        <fieldset>
                            <div class="form-group form-group-half">
                                <input type="text" v-bind:name="'project['+[project.count]+'][project_title]'" class="form-control" :placeholder="ph_project_title" v-model="project.project_title">
                            </div>
                            <div class="form-group form-group-half">
                                <input type="text" v-bind:name="'project['+[project.count]+'][project_url]'" class="form-control" :placeholder="ph_project_url" v-model="project.project_url">
                            </div>
                            <div class="form-group image_uploaded_placeholder" style="display:none">
                            <ul class="wt-attachfile">
                                <li>
                                    <span class="uploaded-img-name"></span>
                                    <em><a class="dz-remove" href="javascript:;" :id="'remove-uploded-image-'+project.count" @click="removeUploadedImage($event)" >
                                            <span class="lnr lnr-cross"></span>
                                        </a>
                                    </em>
                                </li>
                            </ul>
                            </div>
                            <uploadimage :option="project.option" :id="project.img_id+'-'+project.count" :img_ref="project.img_ref+'_'+project.count"></uploadimage>
                            <input type="hidden" v-bind:name="'project['+project.count+'][project_hidden_image]'" :id="'hidden_banner-'+project.count">
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
import dateTime from './DateTimeComponent'
import uploadimage from './ProjectAwardUploadComponent'
import updateProject from './EditProjectComponent'
export default{
    components: {dateTime, uploadimage, updateProject},
    props: ['widget_title', 'ph_project_title', 'ph_project_url', ],
        data(){
            return {
                start_date: '',
                end_date: '',
                stored_projects:[],
                project: {
                    image_uploaded: false,
                    project_title: this.ph_project_title,
                    project_hidden_image:'',
                    project_url: this.ph_project_url,
                    count: 0,
                    img_id: 'profile_banner',
                    img_ref: 'profile_banner_ref',
                    preview_class:'dropzone-previews',
                    option:{
                        url: APP_URL+'/freelancer/upload-temp-image',
                        maxFilesize: 2, // MB
                        maxFiles: 1,
                        previewTemplate: getImageUploadTemplate(),
                        previewsContainer: '.dropzone-previews',
                        paramName:'project_img',
                        headers: {
                            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                        },
                        init: function() {
                            var myDropzone = this;
                            this.on("addedfile", function(file) {
                                var fileName = file.name;
                                // console.log(fileName.replace(/\s/g,''))
                                var input_hidden_id = jQuery('#'+myDropzone.element.id).next('input[type=hidden]').attr('id');
                                document.getElementById(input_hidden_id).value = file.name;
                                jQuery('#'+myDropzone.element.id).css("display","none");
                                jQuery('#'+myDropzone.element.id).parents('.project-inner-list-item').find('.image_uploaded_placeholder').css("display","block");
                                jQuery('#'+myDropzone.element.id).parents('.project-inner-list-item').find('.image_uploaded_placeholder ul li span.uploaded-img-name').text(file.name);
                            });
                            this.on("removedfile", function(file) {
                                document.getElementById('hidden_banner').value = '';
                            });
                        }
                    },
                },
                projects: [],
            }
        },
        methods: {
            getProjects(){
                let self = this;
                axios.get(APP_URL + '/freelancer/get-freelancer-projects')
                .then(function (response) {
                    if(response.data.type == 'success') {
                        self.stored_projects = response.data.projects;
                    }
                });
            },
            addProject: function () {
                var expereience_list_count = jQuery('.add-project-btn').parents('.wt-tabsinfo').find('ul#project-list span.project-inner-list li').length;
                var image_placeholder_count = jQuery('.add-project-btn').parents('.wt-tabsinfo').find('ul#project-list span.project-inner-list li').find('figure.dropzone-previews').length;
                if(this.$refs.projectlistelement) {
                    this.project.count = expereience_list_count + this.$refs.projectlistelement.length;
                } else {
                    this.project.count = expereience_list_count -1;
                }
                if(image_placeholder_count) {
                    image_placeholder_count++
                }
                this.projects.push(Vue.util.extend({}, this.project, this.project.count++, this.project.preview_class = this.project.preview_class+'-'+image_placeholder_count ))
                this.project.option.previewsContainer = this.project.option.previewsContainer+'-'+image_placeholder_count;
            },
            removeStoredProject: function (index) {
                this.stored_projects.splice(index, 1);
            },
            removeUploadedImage: function (event) {
                var element = event.currentTarget;
                var elementID = element.getAttribute('id');
                jQuery('#'+elementID).parents('.image_uploaded_placeholder').css("display","none");
                jQuery('#'+elementID).parents('.project-inner-list-item').find('.wt-uploadingbox').remove();
                jQuery('#'+elementID).parents('.project-inner-list-item').find('.vue-dropzone').css("display","block");
            }
        },
        mounted: function () {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            this.start_date = yyyy + '-' + mm + '-' + dd;
            this.end_date = yyyy + '-' + mm + '-' + dd;
            this.project.start_date = yyyy + '-' + mm + '-' + dd;
            this.project.end_date = yyyy + '-' + mm + '-' + dd;
            jQuery(document).on('click', '.delete-project', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.project-inner-list-item').remove();
            });
        },
        created: function() {
            this.getProjects();
        }
    }
</script>
