<template>
    <section class="wt-haslayout wt-main-section" v-bind:style="{ background: category.sectionColor}">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-sectionhead wt-textcenter">
                        <div class="wt-sectiontitle">
                            <h2 v-if="category.title">{{category.title}}</h2>
                            <span v-if="category.subtitle">{{category.subtitle}}</span>
                        </div>
                        <div class="wt-description" v-if="category.description" v-html="category.description"></div>
                    </div>
                </div>
                <div class="wt-categoryexpl">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left" v-for="(cat, index) in categoryList" :key="index">
                        <div class="wt-categorycontent">
                            <figure><img :src="baseUrl+'/uploads/categories/'+cat.image" :alt="cat.title"></figure>
                            <div class="wt-cattitle">
                                <h3><a :href="baseUrl+'/search-results?type='+type+'&category%5B%5D='+cat.slug">{{ cat.title }}</a></h3>                            
                            </div>
                            <div class="wt-categoryslidup">
                                <p v-if="cat.abstract">{{ cat.abstract }}</p>
                                <a :href="baseUrl+'/search-results?type='+type+'&category%5B%5D='+cat.slug">{{ trans('lang.explore') }} <i class="fa fa-arrow-right"></i></a>
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
    props:['parent_index', 'element_id', 'categories', 'type'],
    data() {
        return {
            category:{},
            categoryList:[],
            baseUrl: APP_URL,
        }
    },
    methods:{
        getCategories: function() {
            var self = this;
            axios
            .get(APP_URL + "/get-categories")
            .then(function(response) {
                if (response.data.type == "success") {
                    self.categoryList =response.data.categories
                }
            })
            .catch(function(error) {  });
        }
    },
    created: function() {
        var index = this.getArrayIndex(this.categories, 'id', this.element_id)
        if (this.categories[index]) {
            this.category = this.categories[index]
        }
        this.category.parentIndex = this.parent_index
        this.getCategories()
    },    
};
</script>
