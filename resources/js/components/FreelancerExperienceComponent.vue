<template>
    <div>
        <div v-for="(commentIndex, index) in commentsToShow" :key="index" v-if="index <= experiences.length">
            <div class="wt-experiencelisting wt-bgcolor" v-if="experiences[index]">
                <div class="wt-title" v-if="experiences[index]">
                    <h3>{{experiences[index].job_title}}</h3>
                </div>
                <div class="wt-experiencecontent">
                    <ul class="wt-userlisting-breadcrumb">
                        <li v-if="experiences[index]"><span><i class="far fa-building"></i> {{experiences[index].company_title}}</span></li>
                        <li v-if="experiences[index]"><span><i class="far fa-calendar"></i> {{experiences[index].start_date}} - {{experiences[index].end_date}}</span></li>
                    </ul>
                    <div class="wt-description" v-if="experiences[index]">
                        <p>“ {{experiences[index].description}} ”</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="divheight"></div>
        <div class="wt-btnarea">
            <a href="javascript:void(0);" class="wt-btn"  @click="commentsToShow += 3" v-if="commentsToShow < experiences.length">
                {{ trans('lang.btn_load_more') }}
            </a>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['freelancer_id', 'no_of_post'],
        data() {
            return {
                experiences: [],
                base_url:APP_URL,
                commentsToShow: this.no_of_post,
            }
        },
        methods: {
            getExperiences(){
                let self = this;
                axios.post(APP_URL + '/get-freelancer-experiences',{
                    id:self.freelancer_id
                })
                .then(function (response) {
                    self.experiences = response.data.experience;
                });
            },
        },
        mounted:function(){
            
        },
        created: function(){
            this.getExperiences();
        },
    }
</script>