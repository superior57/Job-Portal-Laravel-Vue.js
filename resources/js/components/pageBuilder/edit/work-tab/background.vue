<template>
    <div class="wt-location wt-tabsinfo">
        <h6>{{trans('lang.sec_bg_img')}}</h6>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform" v-if="this.work_tab_background">
                <div v-if="this.background_image">
                    <upload-image 
                        :id="'background_image'+parent_index" 
                        :img_ref="'work_background_ref'+parent_index" 
                        :url="url+'/admin/pages/upload-temp-image/background_image'+parent_index"
                        :name="'background_image'+parent_index"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+page_id+'/'+work_tab_background" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('work_background_image'+parent_index)"></a></em>
                    </div>
                </div>
                <input type="hidden" :name="'meta[work_tab'+parent_index+'][background]'" :id="'work_background_image'+parent_index" :value="work_tab_background"> 
            </div>
            <div class="wt-formtheme wt-userform" v-else>
                <upload-image 
                   :id="'background_image'+parent_index" 
                    :img_ref="'work_background_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/background_image'+parent_index"
                    :name="'background_image'+parent_index"
                    >
                </upload-image>
                <input type="hidden" :name="'meta[work_tab'+parent_index+'][background]'" :id="'work_background_image'+parent_index"> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['work_tab_background', 'fileName', 'fileSize', 'page_id', 'parent_index'],
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
