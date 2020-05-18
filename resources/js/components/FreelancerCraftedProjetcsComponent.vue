<template>
    <div>
    <div class="wt-projects">
        <div class="wt-project" v-if="index <= projects.length" v-for="(commentIndex, index) in commentsToShow" :key="index">
            <figure  v-if="projects[index]">
                <img :src="base_url+'/uploads/users/'+freelancer_id+'/projects/'+projects[index].project_hidden_image" :alt="projects[index].project_hidden_image" v-if="projects[index].project_hidden_image">
                <img :src="base_url+'/images/projects/img-01.jpg'" :alt="img" v-else>
            </figure>
            <div class="wt-projectcontent" v-if="projects[index]">
                <h3 v-if="projects[index].project_title">{{projects[index].project_title}}</h3>
                <a :href="projects[index].project_url" v-if="projects[index].project_url">{{projects[index].project_url}}</a>
            </div>
        </div>
        <div class="wt-btnarea">
            <a href="javascript:void(0);" class="wt-btn"  @click="commentsToShow += 3" v-if="commentsToShow < projects.length">
                {{ trans('lang.btn_load_more') }}
            </a>
        </div>
    </div>
    </div>
</template>

<script>
    export default{
        props: ['project', 'freelancer_id', 'img', 'no_of_post'],
        data() {
            return {
                projects: JSON.parse(this.project),
                base_url:APP_URL,
                commentsToShow: this.no_of_post,
            }
        },
        mounted:function(){
            
        }
    }
</script>