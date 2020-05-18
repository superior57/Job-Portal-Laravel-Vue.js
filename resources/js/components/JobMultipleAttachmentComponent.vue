<template>
  <div class="multile-file-attachments wt-haslayout">
    <vue-dropzone :options="this.dropzoneOptions" id="upload" :useCustomSlot=true>
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
  <li>
      <span><span data-dz-name></span></span> 
      <em>File size: <span data-dz-size></span>
          <a class="dz-remove" href="javascript:;" data-dz-remove="">
              <span class="lnr lnr-cross"></span>
          </a>
      </em>
  </li>
`;
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props: ['option','int', 'temp_url'],
 data () {
    return {
      dropzoneOptions: {
          url: this.getUrl(),
          maxFiles: 20,
          addRemoveLinks: true,
          previewTemplate: getTemplate(),
          previewsContainer: '.dropzone-previews',
          headers: {
              'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
          },
          init: function() {
              var count = 0;
              var myDropzone = this;
              this.on("addedfile", function(file) { 
                var list_count = jQuery('#'+myDropzone.element.id).parents('.wt-jobskills').find('.form-group ul.wt-attachfile li').length;
                count = list_count + 1;
                jQuery('#'+myDropzone.element.id).parents('.wt-jobskills').find('.dropzone-previews').append('<input type="hidden" value="'+file.name+'" class="" name="attachments['+[count]+']">');
                count++
              });
              this.on("removedfile", function(file) { 
                  
              });
          }
      },
    }
  },
  methods:{
    getUrl() {
        return this.temp_url;
    },
  },
  components: {
    vueDropzone
  }
};
</script>