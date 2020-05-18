<template>
    <section class="wt-haslayout"  v-bind:style="{ background: app.sectionColor}">
        <div class="wt-haslayout wt-main-section wt-nativeholder" :style="'background-image:url('+imageUrl+app.background_image+')'">
            <div class="container">
                <div class="row justify-content-center align-self-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2">
                        <div class="wt-sectionhead wt-textcenter wt-howswork">
                            <div class="wt-sectiontitle">
                                <h2>{{app.title}}</h2>
                                <h3>{{app.subtitle}}</h3>
                            </div>
                            <div class="wt-description" v-html="app.description"></div>
                            <ul class="wt-appicons">
                                <li><a :href="app.andriod_url"><img :src="baseUrl+'/images/app-icon/img-03.png'"  alt="img description"></a></li>
                                <li><a :href="app.ios_url"><img :src="baseUrl+'/images/app-icon/img-04.png'" alt="img description"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wt-nativemobile">
                            <figure>
                                <img :src="imageUrl+app.app_image" alt="img description">
                            </figure>										
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