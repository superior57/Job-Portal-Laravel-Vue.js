<template>
    <div class="wt-location wt-tabsinfo">
        <h6>{{trans('lang.sec_bg_img')}}</h6>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform" v-if="this.app_image">
                <div v-if="this.image">
                    <upload-image 
                        :id="'app_image'+parent_index" 
                        :img_ref="'app_image_ref'+parent_index" 
                        :url="url+'/admin/pages/upload-temp-image/app_image'+parent_index"
                        :name="'app_image'+parent_index"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+page_id+'/'+app_image" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_app_image'+parent_index)"></a></em>
                    </div>
                    <input type="hidden" :name="'meta[app'+parent_index+'][app_image]'" :id="'hidden_app_image'+parent_index" :value="app_image"> 
                </div>
            </div>
            <div class="wt-formtheme wt-userform" v-else>
                <upload-image 
                    :id="'app_image'+parent_index" 
                    :img_ref="'app_image_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/app_image'+parent_index"
                    :name="'app_image'+parent_index"
                    >
                </upload-image>
                <input type="hidden" :name="'meta[app'+parent_index+'][app_image]'" :id="'hidden_app_image'+parent_index"> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['app_image', 'fileName', 'fileSize', 'page_id', 'parent_index'],
    data() {
        return {
            url:APP_URL,
            image: false,
        }
    },
    methods: {
        removeImage: function (id) {
                this.image = true;
                document.getElementById(id).value = '';
            },
    },
};
</script>
