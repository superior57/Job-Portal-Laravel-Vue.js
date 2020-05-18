<template>
    <section class="wt-haslayout" v-bind:style="{ background: content.sectionColor}">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wt-greeting-holder" v-if="content.description" v-html="content.description">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        }        
    },
};
</script>
