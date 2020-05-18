<template>
    <div class="wt-haslayout wt-bannerholdervtwo wt-bannerholderthree">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="wt-bannercontent">
                        <div class="wt-bannerhead">
                            <div class="wt-title">
                                <h1><span><em>{{slider.title}}</em></span>{{slider.subtitle}}</h1>
                            </div>
                            <div class="wt-description" v-if="slider.description" v-html="slider.description"></div>
                        </div>
                        <search-form
                        :widget_type="'home'"
                        :placeholder="trans('lang.looking_for')"
                        :freelancer_placeholder="trans('lang.search_filter_list.freelancer')"
                        :employer_placeholder="trans('lang.search_filter_list.employers')"
                        :job_placeholder="trans('lang.search_filter_list.jobs')"
                        :service_placeholder="trans('lang.search_filter_list.services')"
                        :no_record_message="trans('lang.no_record')"
                        >
                        </search-form>
                        <div class="wt-videoholder" v-if="slider.video_link && slider.video_link !='#'">
                            <div class="wt-videoshow">
                                <a data-rel="prettyPhoto[video]" :href="slider.video_link" rel="prettyPhoto[video]"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="wt-videocontent" v-if="slider.video_description">
                                 <span><em>{{slider.video_description}}</em></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="wt-bannerslider-holder">
                        <div id="wt-bannerslider-two" class="wt-bannerslider-two owl-carousel">
                            <div class="item" v-for="(slide, index) in slider.slider_image" :key="index">
                                <figure class="wt-bannerimg">
                                    <img :src="imageUrl+slide" alt="slideimg">
                                </figure>
                            </div>
                        </div>
                        <figure class="wt-slidericons">
                             <img :src="imageUrl+slider.floating_image01" alt="img description">
                             <img :src="imageUrl+slider.floating_image02" alt="img description">
                        </figure>
                    </div>
                </div>
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