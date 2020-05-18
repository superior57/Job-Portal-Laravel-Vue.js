<template>
    <section class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
                    <div class="wt-sectionhead wt-textcenter wt-topservices-title">
                        <div class="wt-sectiontitle">
                            <h2 v-if="work_video.title">{{work_video.title}}</h2>
                            <span v-if="work_video.subtitle">{{work_video.subtitle}}</span>
                        </div>
                        <div class="wt-description" v-if="work_video.description" v-html="work_video.description"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 push-lg-1">
                    <div class="wt-workvideo-holder">
                        <figure class="wt-workvideo-img" v-if="work_video.video_poster">
                            <a data-rel="prettyPhoto[video]" :href="work_video.video" rel="prettyPhoto[video]">
                                <img :src="imageUrl+work_video.video_poster" alt="video img">
                            </a>
                        </figure>
                        <figure class="wt-workvideo" v-else>
                            <a data-rel="prettyPhoto[video]" :href="work_video.video" rel="prettyPhoto[video]">
                                <img :src="BaseURL+'/images/default-video.png'" alt="video img">
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props:['parent_index', 'element_id', 'work_videos', 'type', 'page_id'],
    data() {
        return {
            work_video: {},
            BaseURL: APP_URL,
            imageUrl:APP_URL+'/uploads/pages/'+this.page_id+'/',
        }
    },
    created: function() {
        var index = this.getArrayIndex(this.work_videos, 'id', this.element_id)
        if (this.work_videos[index]) {
            this.work_video = this.work_videos[index]
        }
        this.work_video.parentIndex = this.parent_index
    },
    mounted: function() {
        var self = this;
        setTimeout(function(){
            jQuery("a[data-rel]").each(function () {
                jQuery(this).attr("rel", jQuery(this).data("rel"));
            });
            jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
                animation_speed: 'normal',
                theme: 'dark_square',
                slideshow: 3000,
                default_width: 800,
                default_height: 500,
                allowfullscreen: true,
                autoplay_slideshow: false,
                social_tools: false,
                iframe_markup: "<iframe src='{path}' width='{width}' height='{height}' frameborder='no' allowfullscreen='true'></iframe>",
                deeplinking: false
            });
        },1000);
    } 
};
</script>
