<template>
    <div>
        <style1 
            :slider="slider" 
            :page_id="page_id"
            v-if="this.slider.style == 'style1'">
        </style1>
        <second-slider 
           :page_id="page_id"
           v-if="this.slider.style == 'style2' && this.slider.parentIndex > 0">
        </second-slider>
        <third-slider 
            :page_id="page_id"
            v-if="this.slider.style == 'style3' && this.slider.parentIndex > 0">
        </third-slider>
    </div>
</template>
<script>
import style1 from './style1'
export default {
    components: {style1},
    props:['parent_index', 'element_id', 'sliders', 'page_id'],
    data() {
        return {
            slider:{}
        }
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
    },
    created: function() {
        var index = this.getArrayIndex(this.sliders, 'id', this.element_id)
        if (this.sliders[index]) {
            this.slider = this.sliders[index]
        }
    },    
};
</script>
