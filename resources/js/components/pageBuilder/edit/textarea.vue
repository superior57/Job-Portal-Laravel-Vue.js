<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>'
            <div class="wt-sliderbox__form">
                <div class="form-group" v-if="section_data">
                    <textarea :name="'meta[textarea'+parent_index+'][content]'" class="form-control" placeholder="Enter Text here" :value="section_data.content"></textarea>
                </div>
                <div class="form-group" v-else>
                    <textarea :name="'meta[textarea'+parent_index+'][content]'" class="form-control" placeholder="Enter Text here"></textarea>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['paragraph_data', 'parent_index', 'name', 'section', 'value', 'icon'],
    data() {
        return {
            section_data:{}
        }
    },
    methods:{
        removeSection: function() {
            this.$emit("removeElement", 'remove-section');
        }
    },
    created: function() {
        if (this.text_data && this.text_data[this.section_id]) {
            this.section_data = this.text_data[this.section_id]
        }
    }
};
</script>
