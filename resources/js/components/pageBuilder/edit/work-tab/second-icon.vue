<template>
    <div>
        <div class="wt-formtheme wt-userform" v-if="this.second_tab_icon">
            <div v-if="this.second_tab_image">
                <upload-image 
                    :id="'second_tab_icon'+parent_index" 
                    :img_ref="'second_tab_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/second_tab_icon'+parent_index"
                    :name="'second_tab_icon'+parent_index"
                    >
                </upload-image>
            </div>
            <div class="wt-uploadingbox" v-else>
                <figure><img :src="url+'/uploads/pages/'+page_id+'/'+second_tab_icon" alt=""></figure>
                <div class="wt-uploadingbar">
                    <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                    <em><span v-if="fileSize"> {{ trans('lang.file_size') }} {{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('work_second_tab_icon'+parent_index)"></a></em>
                </div>
            </div>
            <input type="hidden" :name="'meta[work_tab'+parent_index+'][second_tab_icon]'" :id="'work_second_tab_icon'+parent_index" :value="second_tab_icon">            
        </div>
        <div class="wt-formtheme wt-userform" v-else>
            <upload-image 
               :id="'second_tab_icon'+parent_index" 
                :img_ref="'second_tab_ref'+parent_index" 
                :url="url+'/admin/pages/upload-temp-image/second_tab_icon'+parent_index"
                :name="'second_tab_icon'+parent_index"
                >
            </upload-image>
            <input type="hidden" :name="'meta[work_tab'+parent_index+'][second_tab_icon]'" :id="'work_second_tab_icon'+parent_index"> 
        </div>
    </div>
</template>
<script>
export default {
    props:['second_tab_icon', 'fileName', 'fileSize', 'page_id', 'parent_index'],
    data() {
        return {
            url:APP_URL,
            second_tab_image: false,
        }
    },
    methods: {
        removeImage: function (id) {
                this.second_tab_image = true;
                document.getElementById(id).value = '';
            },
    },
};
</script>
