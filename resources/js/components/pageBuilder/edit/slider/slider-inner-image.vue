<template>
    <div class="wt-location wt-tabsinfo">
        <h6>{{trans('lang.slider_inner_image')}}</h6>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform" v-if="this.inner_banner_image">
                <div v-if="this.image">
                    <upload-image 
                        :id="'inner_banner_image'+parent_index" 
                        :img_ref="'inner_banner_image_ref'+parent_index" 
                        :url="url+'/admin/pages/upload-temp-image/inner_banner_image'+parent_index"
                        :name="'inner_banner_image'+parent_index"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+page_id+'/'+inner_banner_image" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_inner_banner_image'+parent_index)"></a></em>
                    </div>
                </div>
                <input type="hidden" :name="'meta[slider'+parent_index+'][inner_banner_image]'" :id="'hidden_inner_banner_image'+parent_index" :value="inner_banner_image"> 
           </div>
            <div class="wt-formtheme wt-userform" v-else>
                <upload-image 
                    :id="'inner_banner_image'+parent_index" 
                    :img_ref="'inner_banner_ref'+parent_index" 
                    :url="url+'/admin/pages/upload-temp-image/inner_banner_image'+parent_index"
                    :name="'inner_banner_image'+parent_index"
                    >
                </upload-image>
                <input type="hidden" :name="'meta[slider'+parent_index+'][inner_banner_image]'" :id="'hidden_inner_banner_image'+parent_index"> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['inner_banner_image', 'fileName', 'fileSize','page_id', 'parent_index'],
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
    created: function() {
        console.log(this.inner_banner_image)
    }
};
</script>
