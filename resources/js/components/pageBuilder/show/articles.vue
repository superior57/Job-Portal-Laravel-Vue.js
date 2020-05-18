<template>
    <section class="wt-haslayout wt-main-section wt-latearticles" v-bind:style="{ background: article.sectionColor}">
        <div class="container">
            <div class="row justify-content-md-center">
                <!-- <div class="col-lg-8">
                    <div class="wt-sectionhead wt-textcenter">
                        <div class="wt-sectiontitle">
                            <h2>{{article.title}}</h2>
                            <span>{{article.subtitle}}</span>
                        </div>
                        <div class="wt-description" v-if="article.description" v-html="article.description"></div>
                    </div>
                </div> -->
                <div class="wt-articlesholder">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left" v-for="(articleData, index) in articleList" :key="index">
                        <div class="wt-articles">
                            <figure class="wt-articleimg">
                                <img :src="articleData.banner" alt="img description">
                            </figure>
                            <div class="wt-articlecontents">
                                <div class="wt-title">
                                    <div class="wt-article-tag">
                                        <a :href="baseURL+'/articles/'+cat.slug" class="wt-articleby" v-for="(cat, catIndex) in articleData.cat" :key="catIndex">{{cat.title}}</a>
                                    </div>
                                    <h3><a :href="baseURL+'/article/'+articleData.slug">{{articleData.title}}</a></h3>
                                    <span class="wt-datetime"><i class="ti-calendar"></i> {{articleData.published_date}}</span>
                                </div>
                                <!-- <ul class="wt-moreoptions">
                                    <li><a href="javascript:void(0);"><i class="ti-comment"></i> Comments</a></li>
                                    <li><a href="javascript:void(0);"><i class="ti-eye"></i> 1,26,558</a></li>
                                    <li><a href="javascript:void(0);" class="wt-sharelink"><i class="ti-share"></i> Share</a></li>
                                </ul> -->
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
    props:['parent_index', 'element_id', 'articles'],
    data() {
        return {
            article: {},
            baseURL: APP_URL,
            articleList:[],
        }
    },
    methods:{
        getArticles: function() {
            var self = this;
            axios
            .get(APP_URL + "/get-articles")
            .then(function(response) {
                if (response.data.type == "success") {
                    self.articleList =response.data.articles
                }
            })
            .catch(function(error) {  });
        }
    },
    created: function() {
        var index = this.getArrayIndex(this.articles, 'id', this.element_id)
        if (this.articles[index]) {
            this.article = this.articles[index]
        }
        this.article.parentIndex = this.parent_index
        this.getArticles()
    },
};
</script>
