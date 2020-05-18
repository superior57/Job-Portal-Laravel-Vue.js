<template>
    <div>
        <div class="wt-experiencelisting-hold" v-for="(commentIndex, index) in commentsToShow" :key="index" v-if="educations[index]">
            <div class="wt-experiencelisting wt-bgcolor">
                <div class="wt-title" v-if="educations[index]">
                    <h3>{{ educations[index].degree_title }}</h3>
                </div>
                <div class="wt-experiencecontent" v-if="educations[index]">
                    <ul class="wt-userlisting-breadcrumb">
                        <li><span><i class="far fa-building"></i> {{ educations[index].institute_title }}</span></li>
                        <li><span><i class="far fa-calendar"></i> {{ educations[index].start_date }} - {{ educations[index].end_date }}</span></li>
                    </ul>
                    <div class="wt-description">
                        <p>“ {{educations[index].description}} ”</p>
                    </div>
                </div>
            </div>
            <div class="divheight"></div>
            <div class="wt-btnarea">
                <a href="javascript:void(0);" class="wt-btn"  @click="commentsToShow += 3" v-if="commentsToShow < educations.length">
                    {{ trans('lang.btn_load_more') }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['freelancer_id', 'no_of_post'],
        data() {
            return {
                educations: [],
                base_url:APP_URL,
                commentsToShow: this.no_of_post,
            }
        },
        methods: {
            getEducation(){
                let self = this;
                axios.post(APP_URL + '/get-freelancer-education',{
                    id:self.freelancer_id
                })
                .then(function (response) {
                    self.educations = response.data.education;
                });
            },
        },
        mounted:function(){
            
        },
        created: function(){
            this.getEducation();
        },
    }
</script>