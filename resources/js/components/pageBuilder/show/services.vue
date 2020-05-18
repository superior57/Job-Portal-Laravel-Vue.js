<template>
    <section class="wt-haslayout wt-main-section" v-bind:style="{ background: service.sectionColor}">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
                    <div class="wt-sectionhead wt-textcenter wt-topservices-title">
                        <div class="wt-sectiontitle">
                            <h2 v-if="service.title">{{ service.title }}</h2>
                            <span v-if="service.subtitle">{{ service.subtitle }}</span>
                        </div>
                        <div class="wt-description" v-if="service.description" v-html="service.description"></div>
                    </div>
                </div>
                <div class="wt-freelancers-holder wt-freelancers-home row" v-if="access_type == 'service' || access_type == 'both'">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left" v-for="(service_item, index) in serviceList" :key="index">
                        <div :class="'wt-freelancers-info ' +service_item.no_attachments">
                            <div :class="'wt-freelancers ' +service_item.enable_slider" v-if="service_item.attachments && service_item.seller.length > 0">
                                <figure class="item" v-for="(attachment, attachmentIndex) in service_item.attachments" :key="attachmentIndex">
                                    <a :href="baseUrl+'/profile/'+service_item.seller[0].slug" v-if="service_item.seller[0].slug"><img :src="attachment" alt="img description" class="item"></a>
                                </figure>
                            </div>
                            <span class="wt-featuredtagvtwo" v-if="service_item.is_featured = 'true'">{{ trans('lang.featured') }}</span>
                            <div class="wt-freelancers-details">
                                <figure class="wt-freelancers-img" v-if="service_item.seller_count > 0">
                                    <img :src="service_item.seller_image" alt="img description">
                                </figure>
                                <div class="wt-freelancers-content">
                                    <div class="dc-title">
                                        <a :href="baseUrl+'/profile/'+service_item.seller[0].slug" v-if="service_item.seller_count > 0">
                                            <i class="fa fa-check-circle"></i> {{service_item.seller_name}}
                                        </a>
                                        <a :href="baseUrl+'/service/'+service_item.slug"><h3>{{service_item.title}}</h3></a>
                                        <span><strong>{{ service_item.symbol }} {{service_item.price}}</strong> {{trans('lang.starting_from')}}</span>
                                    </div>
                                </div>
                                <div class="wt-freelancers-rating">
                                    <ul>
                                        <li><span><i class="fa fa-star"></i>{{service_item.service_rating}}/<i>5</i> ({{service_item.service_reviews}})</span></li>
                                        <li>
                                            <i class="fa fa-spinner fa-spin" v-if="service_item.total_orders > 0"></i>
                                            {{service_item.total_orders}} {{ trans('lang.in_queue') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props:['parent_index', 'element_id', 'services', 'type', 'access_type'],
    data() {
        return {
            service: {},
            serviceList:[],
            baseUrl: APP_URL,
        }
    },
    methods:{
        getServices: function() {
            var self = this;
            axios
            .get(APP_URL + "/get-services")
            .then(function(response) {
                if (response.data.type == "success") {
                    self.serviceList =response.data.services
                    console.log(self.serviceList)
                    setTimeout(function(){
                        var _wt_freelancerslider = jQuery('.wt-freelancerslider')
                        _wt_freelancerslider.owlCarousel({
                            items: 1,
                            loop:true,
                            nav:true,
                            margin: 0,
                            autoplay:false,
                            navClass: ['wt-prev', 'wt-next'],
                            navContainerClass: 'wt-search-slider-nav',
                            navText: ['<span class="lnr lnr-chevron-left"></span>', '<span class="lnr lnr-chevron-right"></span>'],
                        });
                    },500);
                }
            })
            .catch(function(error) {  });
        }
    },
    mounted: function() {
        
        
    },
    created: function() {
        var index = this.getArrayIndex(this.services, 'id', this.element_id)
        if (this.services[index]) {
            this.service = this.services[index]
        }
        this.service.parentIndex = this.parent_index
        this.getServices()
    }, 
};
</script>
