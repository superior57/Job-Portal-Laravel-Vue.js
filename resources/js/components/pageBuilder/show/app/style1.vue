<template>
    <section class="wt-haslayout wt-main-section" v-bind:style="{ background: app.sectionColor}">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
                    <figure class="wt-mobileimg">
                        <img :src="imageUrl+app.app_image" alt="image">
                    </figure>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
                    <div class="wt-experienceholder">
                        <div class="wt-sectionhead">
                            <div class="wt-sectiontitle">
                                <h2>{{app.title}}</h2>
                                <span>{{app.subtitle}}</span>
                            </div>
                            <div class="wt-description" v-html="app.description"></div>
                            <ul class="wt-appicon">
                                <li>
                                    <a :href="app.andriod_url">
                                        <figure><img :src="baseUrl+'/images/android.png'" alt="image"></figure>
                                    </a>
                                </li>
                                <li>
                                    <a :href="app.ios_url">
                                        <figure><img :src="baseUrl+'/images/ios.png'" alt="image"></figure>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props:['app', 'page_id'],
    data() {
        return {
            baseUrl: APP_URL,
            imageUrl:APP_URL+'/uploads/pages/'+this.page_id+'/',
        }
    },
    mounted: function() {
        
    } 
};
</script>