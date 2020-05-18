<template>
    <div class="wt-haslayout wt-bannerholdervtwo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="wt-bannercontent">
                        <div class="wt-postbtn col-lg-12">
                            <a href="#" class="wt-btn col-sm-4 col-md-4 col-lg-4">Post a project</a>
                        </div>
                        <!-- <div class="wt-bannerhead">
                            <div class="wt-title">
                                <h1><span>{{slider.title}}</span>{{slider.subtitle}}</h1>
                            </div>
                            <div class="wt-description">
                                <p v-if="slider.description">{{escapeHtml(strip_tags(slider.description))}}</p>
                            </div>
                        </div> -->
                        <!-- <search-form
                        :widget_type="'home'"
                        :placeholder="trans('lang.looking_for')"
                        :freelancer_placeholder="trans('lang.search_filter_list.freelancer')"
                        :employer_placeholder="trans('lang.search_filter_list.employers')"
                        :job_placeholder="trans('lang.search_filter_list.jobs')"
                        :service_placeholder="trans('lang.search_filter_list.services')"
                        :no_record_message="trans('lang.no_record')"
                        >
                        </search-form> -->
                        <!-- <div class="wt-videoholder" v-if="slider.video_link && slider.video_link !='#'">
                            <div class="wt-videoshow">
                                <a data-rel="prettyPhoto[video]" :href="slider.video_link" rel="prettyPhoto[video]"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="wt-videocontent">
                                <span>{{slider.video_title}} <em>{{slider.video_description}}</em></span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="wt-bgworkslider" class="wt-bgworkslider owl-carousel">
            <div class="item" v-for="(slide, index) in slider.slider_image" :key="index">
                <figure>
                    <img :src="imageUrl+slide" alt="slideimg">
                </figure>
            </div>
        </div>
    </div>	
</template>
<script>
export default {
    props:['page_id'],
    data() {
        return {
            imageUrl:APP_URL+'/uploads/pages/'+this.page_id+'/',
            slider:[],
        }
        console.log("imageUrl+slide", imageUrl+slide);
    },
    updated() {
        var slider = jQuery('.owl-carousel')
        slider.owlCarousel({
            items: 1,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop:true,
            nav:false,
            margin: 0,
            autoplay:true,
        });
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
    },
    methods:{
        getSlider: function() {
            var self = this;
            axios
            .get(APP_URL + "/get-home-slider/"+self.page_id)
            .then(function(response) {
                if (response.data.type == "success") {
                   self.slider = response.data.slider
                }
            })
            .catch(function(error) {  });
        }
    },
    created: function() {
        this.getSlider()
    },
};
</script>