<template>
    <div>
       <div class="wt-formtheme wt-skillsform">
            <transition name="fade">
                <div v-if="isShow" class="sj-jump-messeges">{{ trans('lang.no_record') }}</div>
            </transition>
            <fieldset>
                <div class="form-group">
                    <div class="form-group-holder">
                        <span class="wt-select">
                            <select id="freelancer_skill" class="job-skills">
                                <option v-if="is_empty">{{this.all_skills_selected}}</option>
                                <option v-for="(stored_skill, index) in stored_skills" :key="index+'-'+stored_skill.id" :value="stored_skill.id">{{stored_skill.title}}</option>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="form-group wt-btnarea">
                    <a href="javascript:void(0);" class="wt-btn" @click="addSkill">{{ trans('lang.add_skills') }}</a>
                </div>
            </fieldset>
        </div>
        <div class="wt-myskills">
            <ul id="skill_list" class="sortable list">
                <li v-for="(job_skill, index) in job_skills" :key="index" v-if="job_skills" class="skill-element">
                    <div class="wt-dragdroptool">
                        <a href="javascript:void(0)" class="lnr lnr-menu"></a>
                    </div>
                    <span class="skill-dynamic-html">
                        {{job_skill.title}}</span>
                    <span class="skill-dynamic-field sss">
                        <input type="hidden" v-bind:name="'skills['+index+'][id]'" :value="job_skill.id">
                    </span>
                    <div class="wt-rightarea">
                        <a href="javascript:void(0);" class="wt-deleteinfo delete-skill" @click="removeStoredSkill(index)"><i class="lnr lnr-trash"></i></a>
                    </div>
                </li>
                <li v-for="(skill, index) in skills" :key="index+skill.count">
                    <div class="wt-dragdroptool">
                        <a href="javascript:void(0)" class="lnr lnr-menu"></a>
                    </div>
                    <span class="skill-dynamic-html">{{skill.title}}</span>
                    <span class="skill-dynamic-field">
                        <input type="hidden" v-bind:name="'skills['+[skill.count]+'][id]'" :value="skill.id">
                    </span>
                    <div class="wt-rightarea">
                        <a href="javascript:void(0);" class="wt-deleteinfo" @click="removeSkill(index)"><i class="lnr lnr-trash"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
<script>
 export default{
    props: ['widget_title', 'placeholder'],
        data(){
            return {
                isShow: false,
                is_empty: false,
                all_skills_selected:this.placeholder,
                stored_skills:[],
                selected_skill: '',
                selected_rating:'',
                selected_skill_text:'',
                edit_class: false,
                edit_skill: '',
                skill: {
                    id: '',
                    rating: '',
                    title:'',
                    count: 0
                },
                skills: [],
                job_skills: [],
                counts:0,
                notificationSystem: {
                    options: {
                        info: {
                            position: 'center',
                            timeout: 3000,
                        },
                    }
                },
            }
        },
        methods: {
            showInfo(message){
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            getSkills(){
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split( '/' );
                var slug = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/skills/get-job-skills',{
                    slug: slug
                })
                .then(function (response) {
                    self.stored_skills = response.data.skills;
                    if(self.stored_skills.length == 0) {
                        self.all_skills_selected = response.data.message;
                        self.is_empty = true;
                    }
                });
            },
            addSkill: function () {
                if(this.is_empty == false) {
                    var skill_list_count = jQuery('.wt-btn').parents('.wt-skillsform').next('.wt-myskills').find('ul#skill_list li').length;
                    skill_list_count = skill_list_count - 1;
                    this.skill.count = skill_list_count;
                    var skillsSelect = document.getElementById("freelancer_skill");
                    if(skillsSelect.options[skillsSelect.selectedIndex]) {
                        this.selected_skill_text = skillsSelect.options[skillsSelect.selectedIndex].text;
                        this.selected_skill = document.getElementById("freelancer_skill").value;
                        this.skills.push(Vue.util.extend({}, this.skill, this.skill.count++, this.skill.title = this.selected_skill_text, this.skill.id = this.selected_skill, this.skill.rating = this.selected_rating ))
                        skillsSelect.remove(skillsSelect.selectedIndex);
                        if(skillsSelect.options.length == 0 ) {
                            this.is_empty = true;
                        }
                    } else {
                        this.is_empty = true;
                        this.showInfo('no more skills available for selection' );
                    }
                } else {
                    this.is_empty = true;
                    this.showInfo('no more skills available for selection' );
                }

            },
            getJobSkills(){
                let self = this;
                var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
                var segment_array = segment_str.split( '/' );
                var edit_url = segment_array[segment_array.length - 2];
                if(edit_url == "edit-job") {
                    var slug = segment_array[segment_array.length - 1];
                    axios.post(APP_URL + '/job/get-stored-job-skills',{
                        slug:slug
                    })
                    .then(function (response) {
                        if(response.data.type = 'success') {
                            self.job_skills = response.data.skills;
                        }
                    });
                }
            },
            removeStoredSkill: function (index) {
                var self = this;
                this.$swal({
                    title: "Deleted",
                    text: "Record Deleted",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                  }).then((result) => {
                    var self = this;
                    if(result.value) {
                        let option = self.job_skills[index];
                        var select = document.getElementById("freelancer_skill");
                        select.options[select.options.length] = new Option(option.title, option.id, false, false);
                        self.job_skills.splice(index, 1);
                        self.is_empty = false;
                        self.$swal('deleted', 'Record Deleted', 'success')
                    } else {
                        this.$swal.close()
                    }
                  })
            },
            removeSkill: function (index) {
                var self = this;
                this.$swal({
                    title: 'Are you Sure?',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                  }).then((result) => {
                    var self = this;
                    if(result.value) {
                        let option = self.skills[index];
                        var select = document.getElementById("freelancer_skill");
                        select.options[select.options.length] = new Option(option.title, option.id, false, false);
                        self.skills.splice(index, 1);
                        self.is_empty = false;
                        self.$swal('deleted', 'Skill delete successfully', 'success')
                    } else {
                        this.$swal.close()
                    }
                })
            },
            editInput: function (index) {
                this.edit_class = true;
            }
        },
        mounted: function () {
           jQuery(document).on('click', '.wt-skillsactive', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.removeClass('wt-skillsactive');
                _this.parents('li').removeClass('wt-skillsaddinfo');
                var edit_skill_value = _this.parents('li').find('.skill-dynamic-field input:text').val();
                _this.parents('li').find('.skill-dynamic-html em').html(edit_skill_value);
            });
        },
        created: function() {
            this.getSkills();
            this.getJobSkills();
        }
    }
</script>
