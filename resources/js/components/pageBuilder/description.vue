<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>'
            <div class="amt-slot-title">
                <span class="color-settings">
                    <verte v-model="content.sectionColor" menuPosition="left" model="hex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                            <path style="fill: #000" d="M29.73,17.26,18.23,5.75a1.46,1.46,0,0,0-.56-.36V4.65a4.65,4.65,0,0,0-9.3,0v8.77L5.63,16.17a3.88,3.88,0,0,0,0,5.48l8.22,8.22A3.89,3.89,0,0,0,16.59,31a3.85,3.85,0,0,0,2.73-1.13L29.73,19.45A1.56,1.56,0,0,0,29.73,17.26ZM9.92,4.65a3.1,3.1,0,0,1,6.2,0v1a.24.24,0,0,0-.08.06L9.92,11.87Zm17.9,13.18H6.31a2.33,2.33,0,0,1,.42-.57l9.39-9.39v3.19a1.55,1.55,0,1,0,1.55,0V7.39L28.15,17.88A.91.91,0,0,0,27.82,17.83Z"/>
                            <path style="fill: #000" d="M35.5,27.5a3.5,3.5,0,1,1-7,0c0-1.41,1.86-4.75,2.86-6.46a.72.72,0,0,1,1.26,0C33.64,22.75,35.5,26.09,35.5,27.5Z"/>
                            <rect v-bind:style="{ fill: content.sectionColor}" y="35" width="40" height="5" rx="2.5"/>
                        </svg>
                    </verte>
                </span>
            </div>
            <div class="wt-sliderbox__form">
                <div class="form-group">
                    <tinymce-editor 
                        v-model="content.description" 
                        :init="{plugins: 'paste link code advlist autolink lists link image charmap print', toolbar1: 'undo redo code | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist', menubar:false, statusbar: false, extended_valid_elements:'span[style],i[class]'}">
                    </tinymce-editor>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Editor from '@tinymce/tinymce-vue'

export default {
    props:['parent_index', 'element_id', 'content_section'],
    data() {
        return {
            content:{}
        }
    },
    components: {
        'tinymce-editor': Editor
    },
    methods:{
        getArrayIndex (array, attr, value) {
            for (var i = 0; i < array.length; i += 1) {
                if (array[i][attr] == value) {
                return i
                }
            }
            return -1
        },
        removeSection: function() {
            this.$emit("removeElement", 'remove-section');
        }
    },
    created: function() {
        var index = this.getArrayIndex(this.content_section, 'id', this.element_id)
        if (this.content_section[index]) {
            this.content = this.content_section[index]
            this.content.sectionColor = this.content_section[index].sectionColor
        }
        this.content.parentIndex = this.parent_index
        
    },
};
</script>
