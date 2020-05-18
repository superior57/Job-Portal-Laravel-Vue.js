<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>
            <div class="wt-sliderbox__form">
                <div class="form-group" v-if="section_data.content">
                    <input type="text" class="form-control" :name="'meta[text'+parent_index+'][content]'" placeholder="Enter text here" :value="section_data.content">
                </div>
                <div class="form-group" v-else>
                    <input type="text" class="form-control" :name="'meta[text'+parent_index+'][content]'" placeholder="Enter text here">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['text_data','parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    data() {
        return {
            section_data : {},
        }
    },
    methods:{
        removeSection: function() {
            this.$emit("removeElement", 'remove-section');
        }
    },
    created: function() {
        console.log(this.text_data)
        if (this.text_data && this.text_data[this.section_id]) {
            this.section_data = this.text_data[this.section_id]
        }
    }
};
</script>
