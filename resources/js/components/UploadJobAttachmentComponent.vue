<template>
  <div class="multile-file-attachments wt-haslayout">
    <vue-dropzone :options="this.dropzoneOptions" v-on:vdropzone-file-added="addedFile" id="upload" ref="success_ref" :useCustomSlot=true v-on:vdropzone-error="failed">
        <div class="form-group form-group-label">
            <div class="wt-labelgroup">
                <label for="file">
                    <span class="wt-btn">{{ trans('lang.select_files') }}</span>
                </label>
                <span>{{ trans('lang.drop_files') }}</span>
            </div>
        </div>
    </vue-dropzone>
  </div>
</template>

<script>
const getTemplate = () => `
  <li class="wt-uploadlist">
      <span><span data-dz-name></span></span> 
      <em>File size: <span data-dz-size></span></em>
  </li>`;
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ['temp_url', 'img_ref', 'max_file', 'file_type'],
 data () {
    return {
      options: {
          error: {
              position: 'center',
              timeout: 3000,
          },
      },
      dropzoneOptions: {
          url: this.getUrl(),
          maxFiles: this.getMaxFiles(),
          addRemoveLinks: true,
          previewTemplate: getTemplate(),
          previewsContainer: '.dropzone-previews',
          acceptedFiles:this.getAcceptedFiles(),
          headers: {
              'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
          },
          init: function() {
              var count = 0;
              var myDropzone = this;
              this.on("removedfile", function(file) { 
              });
          }
      },
    }
  },
  methods:{
    getAcceptedFiles(){
      if(this.file_type) {
          return this.file_type
      } 
    },
    showError(message){
      return this.$toast.error(' ', message, this.options.error);
    },
    getUrl() {
        return this.temp_url;
    },
    getMaxFiles() {
      if (this.max_file) {
        return this.max_file
      } else {
        return 20
      }
    },
    addedFile: function(file) {
      let parentClass = this.$refs.success_ref.id;
      parent = document.getElementsByClassName('wt-attachfile')
      var listitems= parent[0].getElementsByTagName("li")
      var i;
      for (i=0; i<listitems.length; i++) {
          if (!(listitems[i].id)) {
            listitems[i].setAttribute("id", "attachmentList-"+i);
            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", 'attachments['+i+']'); 
            input.setAttribute("value", file.name);
            input.setAttribute("id", 'attachment-'+i);
          }
      }
      var listParent = document.getElementById(file.previewElement.id)
      listParent.appendChild(input);
    },
    failed:function(file,message,xhr){
      this.showError(message);
      this.$refs.success_ref.removeFile(file);
    }
  },
  mounted: function () {
    jQuery(document).on('click', '.image_upload_anchor', function(e){
      e.preventDefault();
      var _this = jQuery(this);
      _this.parents('li').next('input[type=hidden]').remove();
      _this.parents('li').remove();
    })
  },
  components: {
    vueDropzone
  }
};
</script>