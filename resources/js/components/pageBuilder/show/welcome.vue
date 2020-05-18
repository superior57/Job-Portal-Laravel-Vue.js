<template>
    <section class="wt-haslayout wt-main-section wt-paddingnull wt-companyinfohold" v-bind:style="style">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wt-companydetails">
                        <div class="wt-companycontent">
                            <div class="wt-companyinfotitle">
                                <h2>{{welcome.first_title}}</h2>
                            </div>
                            <div class="wt-description" v-html="welcome.first_description"></div>
                            <div class="wt-btnarea">
                                <a :href="welcome.first_url" class="wt-btn">{{welcome.first_url_button}}</a>
                            </div>
                        </div>
                        <div class="wt-companycontent">
                            <div class="wt-companyinfotitle">
                                <h2>{{welcome.second_title}}</h2>
                            </div>
                            <div class="wt-description" v-html="welcome.second_description"></div>
                            <div class="wt-btnarea">
                                <a :href="welcome.second_url" class="wt-btn">{{ welcome.second_url_button }}</a>
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
    props:['parent_index', 'element_id', 'welcome_data', 'type', 'page_id'],
    data() {
        return {
            url:APP_URL,
            welcome:{},
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
        var index = this.getArrayIndex(this.welcome_data, 'id', this.element_id)
        if (this.welcome_data[index]) {
            this.welcome = this.welcome_data[index]
            if (this.welcome.welcome_background) {
                this.style.backgroundImage = 'url('+this.imageURL+'/'+this.welcome.welcome_background+')' 
            } else {
                this.style.background = this.welcome.sectionColor
            }
        }
        this.welcome.parentIndex = this.parent_index
    },
};
</script>
