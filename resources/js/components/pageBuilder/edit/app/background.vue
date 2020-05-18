<template>
    <div class="wt-location wt-tabsinfo">
        <h6>{{trans('lang.sec_bg_img')}}</h6>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform" v-if="this.app_background">
                <div v-if="this.background_image">
                    <upload-image 
                        :id="'app_background'+parent_index" 
                        :img_ref="'app_banner_ref'+parent_index" 
                        :url="url+'/admin/pages/upload-temp-image/app_background'+parent_index"
                        :name="'app_background'+parent_index"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+page_id+'/'+app_background" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('app_background_image'+parent_index)"></a></em>
                    </div>
                </div>
                <input type="hidden" :name="'meta[app'+parent_index+'][background_image]'" :id="'hidden_app_background'+parent_index" :value="app_background"> 
            </div>
            <div class="wt-formtheme wt-userform" v-else>
                <upload-image 
                    :id="'app_background'+parent_index" 
                    :img_ref="'app_banner_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/app_background'+parent_index"
                    :name="'app_background'+parent_index"
                    >
                </upload-image>
                <input type="hidden" :name="'meta[app'+parent_index+'][background_image]'" :id="'hidden_app_background'+parent_index"> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['app_background', 'fileName', 'fileSize', 'page_id', 'parent_index'],
    data() {
        return {
            url:APP_URL,
            background_image: false,
        }
    },
    methods: {
        removeImage: function (id) {
                this.background_image = true;
                document.getElementById(id).value = '';
            },
    },
};
</script>
