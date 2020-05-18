<template>
  <div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{this.title}}</h2>
    </div>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform hello" v-if="this.existed_icon">
            <div v-if="this.uploaded_icon">
                <upload-image 
                    :id="this.icon_id" 
                    :img_ref="this.icon_ref" 
                    :url="this.temp_url" 
                    :name="this.icon_name">
                </upload-image>
                <input type="hidden" :name="this.icon_hidden_name" :id="icon_hidden_id">
            </div>
            <div class="wt-uploadingbox" v-else>
                <figure><img :src="this.image_url" alt=""></figure>
                <div class="wt-uploadingbar">
                    <div class="dz-filename">{{this.existed_icon}}</div>
                    <em>file size<a href="javascript:void(0);" class="lnr lnr-cross"  @click="removeImage(icon_hidden_id)"></a></em>
                </div>
            <input type="hidden" :name="this.icon_hidden_name" :id="icon_hidden_id" :value="this.existed_icon">
            </div>
            
        </div>
        <div class="wt-formtheme wt-userform" v-else>
            <upload-image 
                :id="this.icon_id" 
                :img_ref="this.icon_ref" 
                :url="this.temp_url" 
                :name="this.icon_name">
            </upload-image>
            <input type="hidden" :name="this.icon_hidden_name" :id="icon_hidden_id">
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['icon', 'icon_id', 'icon_ref', 'icon_name', 'icon_hidden_name', 'icon_hidden_id', 'title', 'icon_hidden_key', 'existed_icon'],
    data () {
    return {
        uploaded_icon:false,
        temp_url:APP_URL+'/admin/upload-temp-image/'+this.icon_name,
        image_url:APP_URL+'/uploads/settings/icon/'+this.existed_icon,
    }
  },
  methods: {
      removeImage: function (id) {
        if (this.icon) {
            this.uploaded_icon = true;
        } else {
            this.uploaded_icon = false;
        }
      },
  },
  mounted: function () {
    
  },
};
</script>