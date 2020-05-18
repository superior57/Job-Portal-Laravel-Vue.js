<template>
    <div class="wt-location wt-tabsinfo">
        <h6>{{trans('lang.slider_second_floating_image')}}</h6>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform" v-if="this.floating_image02">
                <div v-if="this.image">
                    <upload-image 
                        :id="'floating_image02'+parent_index" 
                        :img_ref="'floating2_banner_ref'" 
                        :url="url+'/admin/pages/upload-temp-image/floating_image02'+parent_index"
                        :name="'floating_image02'+parent_index"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+page_id+'/'+floating_image02" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="fileName">{{fileName}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="fileSize">{{fileSize}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_floating_image02'+parent_index)"></a></em>
                    </div>
                </div>
                <input type="hidden" :name="'meta[slider'+parent_index+'][floating_image02]'" :id="'hidden_floating_image02'+parent_index" :value="floating_image02"> 
           </div>
            <div class="wt-formtheme wt-userform" v-else>
                <upload-image 
                    :id="'floating_image02'+parent_index" 
                    :img_ref="'floating2_banner_ref'" 
                    :url="url+'/admin/pages/upload-temp-image/floating_image02'+parent_index"
                    :name="'floating_image02'+parent_index"
                    >
                </upload-image>
                <input type="hidden" :name="'meta[slider'+parent_index+'][floating_image02]'" :id="'hidden_floating_image02'+parent_index"> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['floating_image', 'fileName', 'fileSize', 'page_id', 'parent_index'],
    data() {
        return {
            floating_image02:this.floating_image,
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
