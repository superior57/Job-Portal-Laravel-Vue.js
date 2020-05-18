<template>
    <div class="la-section-settings">
        <div class="wt-sliderbox">
            <a href="javascript:;" v-on:click="removeSection()"><i class="fa fa-times close"></i></a>
            <p>You can change title order from this section</p>
        </div>
    </div>
</template>
<script>
export default {
    props:['parent_index', 'name', 'section', 'value', 'icon'],
    data() {
        return {
        
        }
    },
    methods:{
        removeSection: function() {
            this.$emit("removeElement", 'remove-section');
        }
    }
};
</script>
