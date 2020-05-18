<template>
    <div>
        <!-- <div class="wt-userlistinghold wt-userlistingsingle" v-for="(commentIndex, index) in commentsToShow" :key="index" v-if="index <= reviews.length">	
            <figure class="wt-userlistingimg" v-if="reviews[index]">
                <img src="images/client/img-01.jpg" alt="image description">
            </figure>
            <div class="wt-userlistingcontent">
                <div class="wt-contenthead">
                    <div class="wt-title">
                        <a href="javascript:void(0);"><i class="fa fa-check-circle"></i> Themeforest Company</a>
                        <h3>Translation and Proof Reading (Multi Language)</h3>
                    </div>
                    <ul class="wt-userlisting-breadcrumb">
                        <li><span><i class="fa fa-dollar-sign"></i> Beginner</span></li>
                        <li><span><img src="images/flag/img-04.png" alt="img description"> England</span></li>
                        <li><span><i class="fas fa-spinner fa-spin"></i> In Progress</span></li>
                    </ul>
                </div>
            </div>
        </div> -->

<!--         
        <div v-for="(commentIndex, index) in commentsToShow" :key="index" v-if="index <= reviews.length">
            <div class="wt-experiencelisting wt-bgcolor" v-if="reviews[index]">
                <div class="wt-title" v-if="reviews[index]">
                    <h3>{{reviews[index].job_title}}</h3>
                </div>
                <div class="wt-experiencecontent">
                    <ul class="wt-userlisting-breadcrumb">
                        <li v-if="reviews[index]"><span><i class="far fa-building"></i> {{reviews[index].company_title}}</span></li>
                        <li v-if="reviews[index]"><span><i class="far fa-calendar"></i> {{reviews[index].start_date}} - {{reviews[index].end_date}}</span></li>
                    </ul>
                    <div class="wt-description" v-if="reviews[index]">
                        <p>“ {{reviews[index].description}} ”</p>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="divheight"></div>
        <div class="wt-btnarea">
            <!-- <a href="javascript:void(0);" class="wt-btn"  @click="commentsToShow += 3" v-if="commentsToShow < reviews.length">
                {{ trans('lang.btn_load_more') }}
            </a> -->
        </div>
    </div>
</template>

<script>
    export default{
        props: ['service_id', 'no_of_post'],
        data() {
            return {
                reviews: [],
                base_url:APP_URL,
                commentsToShow: this.no_of_post,
            }
        },
        methods: {
            getReviews(){
                let self = this;
                axios.post(APP_URL + '/get-freelancer-reviews',{
                    service_id:self.service_id
                })
                .then(function (response) {
                    console.log(response.data);
                    self.reviews = response.data.reviews;
                });
            },
        },
        mounted:function(){
            
        },
        created: function(){
            this.getReviews();
        },
    }
</script>