<template>
    <div class="wt-location wt-tabsinfo">
        <h6>{{trans('lang.sec_bg_img')}}</h6>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform" v-if="this.welcome_background">
                <div v-if="this.image">
                    <upload-image 
                        :id="'welcome_background'+parent_index" 
                        :img_ref="'home_banner_ref'+parent_index" 
                        :url="url+'/admin/pages/upload-temp-image/welcome_background'+parent_index"
                        :name="'welcome_background'+parent_index"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+page_id+'/'+welcome_background" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_welcome_background'+parent_index)"></a></em>
                    </div>
                </div>
                <input type="hidden" :name="'meta[welcome'+parent_index+'][welcome_background]'" :id="'hidden_welcome_background'+parent_index" :value="welcome_background"> 
            </div>
            <div class="wt-formtheme wt-userform" v-else>
                <upload-image 
                    :id="'welcome_background'+parent_index" 
                    :img_ref="'home_banner_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/welcome_background'+parent_index"
                    :name="'welcome_background'+parent_index"
                    >
                </upload-image>
                <input type="hidden" :name="'meta[welcome'+parent_index+'][welcome_background]'" :id="'hidden_welcome_background'+parent_index"> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['welcome_background', 'fileName', 'fileSize', 'page_id', 'parent_index'],
    data() {
        return {
            url:APP_URL,
            image: false,
        }
    },
    created: function(){
        console.log(this.welcome_background)
    },
    methods: {
        removeImage: function (id) {
                this.image = true;
                document.getElementById(id).value = '';
            },
    },
};
</script>
