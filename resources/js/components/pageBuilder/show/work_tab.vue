<template>
    <section class="wt-haslayout wt-main-section wt-workholder" v-bind:style="style">
        <div class="container">
            <div class="row justify-content-center align-self-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2">
                    <div class="wt-sectionhead wt-textcenter wt-howswork">
                        <!-- <div class="wt-sectiontitle"> -->
                        <div>
                            <h2 v-if="work.title">{{work.title}}</h2>
                            <!-- <span v-if="work.subtitle">{{work.subtitle}}</span> -->
                        </div>
                        <!-- <div class="wt-description" v-if="work.description" v-html="work.description"></div> -->
                    </div>
                </div>
            </div>
            <div class="wt-haslayout wt-workprocess">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="wt-workdetails">
                                <div class="wt-workdetail" v-if="work.first_tab_icon">
                                    <figure>
                                        <img :src="imageURL+work.first_tab_icon" alt="img description">
                                    </figure>
                                </div>
                                <div class="wt-title">
                                    <h4 v-if="work.first_tab_title"><a href="javascript:void(0);">{{work.first_tab_title}}</a></h4>
                                    <span v-if="work.first_tab_subtitle">{{work.first_tab_subtitle}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="wt-workdetails wt-workdetails-border">
                                <div class="wt-workdetail" v-if="work.second_tab_icon">
                                    <figure>
                                        <img :src="imageURL+work.second_tab_icon" alt="img description">
                                    </figure>
                                </div>
                                <div class="wt-title">
                                    <h4 v-if="work.second_tab_title"><a href="javascript:void(0);">{{work.second_tab_title}}</a></h4>
                                    <span v-if="work.second_tab_subtitle">{{work.second_tab_subtitle}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="wt-workdetails wt-workdetails-bordertwo">
                                <div class="wt-workdetail" v-if="work.third_tab_icon">
                                    <figure>
                                        <img :src="imageURL+work.third_tab_icon" alt="img description">
                                    </figure>
                                </div>
                                <div class="wt-title">
                                    <h4 v-if="work.third_tab_title"><a href="javascript:void(0);">{{work.third_tab_title}}</a></h4>
                                    <span v-if="work.third_tab_subtitle">{{work.third_tab_subtitle}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="wt-workdetails wt-workdetails-bordertwo">
                                <div class="wt-workdetail" v-if="work.fourth_tab_icon">
                                    <figure>
                                        <img :src="imageURL+work.fourth_tab_icon" alt="img description">
                                    </figure>
                                </div>
                                <div class="wt-title">
                                    <h4 v-if="work.fourth_tab_title"><a href="javascript:void(0);">{{work.fourth_tab_title}}</a></h4>
                                    <span v-if="work.fourth_tab_subtitle">{{work.fourth_tab_subtitle}}</span>
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
    props:['parent_index', 'element_id', 'work_tabs', 'type', 'page_id'],
    data() {
        return {
            url:APP_URL,
            work: {},
            imageURL:APP_URL+'/uploads/pages/'+this.page_id+'/',
            style: {
                background: '',
                backgroundImage: ''
            }
        }
    },
    methods:{
    },
    created: function() {
        var index = this.getArrayIndex(this.work_tabs, 'id', this.element_id)
        if (this.work_tabs[index]) {
            this.work = this.work_tabs[index]
            if (this.work.background_image) {
                this.style.background = this.work.sectionColor
                // this.style.backgroundImage = 'url('+this.imageURL+'/'+this.work.background_image+')' 
            } else {
                this.style.background = this.work.sectionColor
            }
        }
        this.work.parentIndex = this.parent_index
    },
};
</script>
