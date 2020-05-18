<template>
    <div>
        <div class="form-group">
            <input placeholder="Title" :name="'meta[work_video'+parent_index+'][title]'" type="text" :value="work_video.title" class="form-control" v-if="work_video.title">
            <input placeholder="Title" :name="'meta[work_video'+parent_index+'][title]'" type="text" value="" class="form-control" v-else>
        </div> 
        <div class="form-group">
            <input placeholder="Subtitle":name="'meta[work_video'+parent_index+'][subtitle]'" type="text" :value="work_video.subtitle" class="form-control" v-if="work_video.subtitle">
            <input placeholder="Subtitle":name="'meta[work_video'+parent_index+'][subtitle]'" type="text" value="" class="form-control" v-else>
        </div>
        <div class="form-group">
            <input placeholder="Video Link" :name="'meta[work_video'+parent_index+'][video]'" type="text" :value="work_video.video" class="form-control" v-if="work_video.video">
            <input placeholder="Video Link" :name="'meta[work_video'+parent_index+'][video]'" type="text" value="" class="form-control" v-else>
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Description" :name="'meta[work_video'+parent_index+'][description]'" v-if="work_video.description">{{work_video.description}}</textarea>
            <textarea class="form-control" placeholder="Description" :name="'meta[work_video'+parent_index+'][description]'" v-else></textarea>
        </div>
    </div>
</template>
<script>
export default {
    props:['work_video_data', 'page_id','parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    data() {
        return {
            work_video:{},
        }
    },
    created: function() {
        if (this.work_video_data && this.work_video_data[this.section_id]) {
            this.work_video = this.work_video_data[this.section_id]
        }
    }
};
</script>
