<template>
    <section class="wt-haslayout wt-main-section wt-latearticles" v-bind:style="{ background: freelancer.sectionColor}">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-8">
                    <div class="wt-sectionhead wt-textcenter">
                        <div class="wt-sectiontitle">
                            <h2>{{freelancer.title}}</h2>
                            <span>{{freelancer.subtitle}}</span>
                        </div>
                        <div class="wt-description" v-if="freelancer.description" v-html="freelancer.description"></div>
                    </div>
                </div>
                <div class="wt-topfreelancers">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 float-left" v-for="(freelancer, index) in topFreelancers" :key="index">
                        <div class="wt-freelanceritems">
                            <div class="wt-userlistinghold wt-featured">
                                <div class="wt-userlistingcontent">
                                    <figure>
                                        <img :src="freelancer.image" alt="image">
                                        <div class="wt-userdropdown wt-away template-content tipso_style wt-tipso" data-tipso="Offline"></div>
                                    </figure>
                                    <div class="wt-contenthead">
                                        <div class="wt-title">
                                            <a :href="baseURL+'/profile/'+freelancer.slug"><i class="fa fa-check-circle"></i> {{freelancer.name}}</a>
                                            <h2>{{freelancer.tagline}}</h2>
                                        </div>
                                    </div>
                                    <div class="wt-viewjobholder">
                                        <ul>
                                            <li><span><i class="far fa-money-bill-alt"></i>{{freelancer.symbol}}{{freelancer.hourly_rate}} / hr</span></li>
                                            <li><span><em><img :src="baseURL+freelancer.flag" alt="img description"></em>{{freelancer.location}}</span></li>
                                            <li v-if="freelancer.save_freelancers.includes(freelancer.id)" class="wt-btndisbaled">
                                                <a href="javascript:void(0);" class="wt-clicksave"><i class="fa fa-heart"></i>{{ trans('lang.saved') }}</a>
                                            </li>
                                            <li v-else>
                                                <a href="javascrip:void(0);" class="wt-clicklike" :id="'freelancer-'+freelancer.id" @click.prevent="add_wishlist('freelancer-'+freelancer.id, freelancer.id, 'saved_freelancer')">
                                                    <i class="fa fa-heart"></i><span class="save_text">{{trans("lang.click_to_save")}}</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0);" class="wt-freestars"><i class="fas fa-star"> </i>{{freelancer.average_rating_count}}{{ trans('lang.5') }} <em> ({{freelancer.total_reviews}} {{ trans('lang.feedbacks') }})</em></a>
                                            </li>
                                        </ul>
                                    </div>
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
    props:['parent_index', 'element_id', 'freelancers', 'type'],
    data() {
        return {
            freelancer: {},
            topFreelancers:[],
            baseURL: APP_URL,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                }
            },
        }
    },
    methods:{
        showMessage(message) {
            return this.$toast.success(' ', message, this.notificationSystem.options.success);
        },
        showError(error) {
            return this.$toast.error(' ', error, this.notificationSystem.options.error);
        },
        add_wishlist: function (element_id, id, column, saved_text) {
            var self = this;
            axios.post(APP_URL + '/user/add-wishlist', {
                id: id,
                column: column,
            })
            .then(function (response) {
                if (response.data.authentication == true) {
                    if (response.data.type == 'success') {
                        if (column == 'saved_freelancer') {
                            jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                            jQuery('#' + element_id).addClass('wt-clicksave');
                            jQuery('#' + element_id).find('.save_text').text(Vue.prototype.trans('lang.saved'));
                            self.disable_btn = 'wt-btndisbaled';
                            self.text = Vue.prototype.trans('lang.btn_save');
                            self.saved_class = 'fa fa-heart';
                            self.click_to_save = 'wt-clicksave'
                        }
                        self.showMessage(response.data.message);
                    } else {
                        self.showError(response.data.message);
                    }
                } else {
                    self.showError(response.data.message);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            },
        getTopFreelancers: function() {
            var self = this;
            axios
            .get(APP_URL + "/get-top-freelancers")
            .then(function(response) {
                if (response.data.type == "success") {
                    self.topFreelancers =response.data.freelancers
                    console.log(self.topFreelancers)
                }
            })
            .catch(function(error) {  });
        }
    },
    created: function() {
        var index = this.getArrayIndex(this.freelancers, 'id', this.element_id)
        if (this.freelancers[index]) {
            this.freelancer = this.freelancers[index]
        }
        this.freelancer.parentIndex = this.parent_index
        this.getTopFreelancers()
    },
    mounted: function() {
       
    }
};
</script>
