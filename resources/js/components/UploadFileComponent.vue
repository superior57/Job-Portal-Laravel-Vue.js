<template>
    <vue-dropzone :options="this.option" id="upload" :useCustomSlot=true>
        <div class="form-group form-group-label">
            <div class="wt-labelgroup">
                <label for="file">
                    <span class="wt-btn">{{ trans('lang.select_files') }}</span>
                </label>
                <span>{{ trans('lang.drop_files') }}</span>
            </div>
        </div>
    </vue-dropzone>
</template>

<script>
import vueDropzone from "vue2-dropzone";
export default {
    props: ['option','int'],
 data () {
    return {
      dropzoneOptions: this.option
    }
  },
  components: {
    vueDropzone
  }
};
</script>