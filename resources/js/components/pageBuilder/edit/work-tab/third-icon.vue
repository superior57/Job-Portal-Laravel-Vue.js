<template>
    <div>
        <div class="wt-formtheme wt-userform" v-if="this.third_tab_icon">
            <div v-if="this.third_tab_image">
                <upload-image 
                   :id="'third_tab_icon'+parent_index" 
                    :img_ref="'third_tab_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/third_tab_icon'+parent_index"
                    :name="'third_tab_icon'+parent_index"
                    >
                </upload-image>
            </div>
            <div class="wt-uploadingbox" v-else>
                <figure><img :src="url+'/uploads/pages/'+page_id+'/'+third_tab_icon" alt=""></figure>
                <div class="wt-uploadingbar">
                    <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                    <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('work_third_tab_icon'+parent_index)"></a></em>
                </div>
            </div>
            <input type="hidden" :name="'meta[work_tab'+parent_index+'][third_tab_icon]'" :id="'work_third_tab_icon'+parent_index" :value="third_tab_icon">
        </div>
        <div class="wt-formtheme wt-userform" v-else>
            <upload-image 
                :id="'third_tab_icon'+parent_index" 
                :img_ref="'third_tab_ref'+parent_index" 
                :url="url+'/admin/pages/upload-temp-image/third_tab_icon'+parent_index"
                :name="'third_tab_icon'+parent_index"
                >
            </upload-image>
            <input type="hidden" :name="'meta[work_tab'+parent_index+'][third_tab_icon]'" :id="'work_third_tab_icon'+parent_index"> 
        </div>
    </div>
</template>
<script>
export default {
    props:['third_tab_icon', 'fileName', 'fileSize', 'page_id', 'parent_index'],
    data() {
        return {
            url:APP_URL,
            third_tab_image: false,
        }
    },
    methods: {
        removeImage: function (id) {
                this.third_tab_image = true;
                document.getElementById(id).value = '';
            },
    },
};
</script>
