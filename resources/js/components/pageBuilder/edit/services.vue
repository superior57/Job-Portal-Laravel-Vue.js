<template>
    <div class="la-section-settings">
        <div class="wt-location wt-tabsinfo">
            <div class="form-group form-group-half toolip-wrapo">
                <input placeholder="Title" :name="'meta[service'+parent_index+'][title]'" type="text" :value="service.title" class="form-control" v-if="service.title">
                <input placeholder="Title" :name="'meta[service'+parent_index+'][title]'" type="text" class="form-control" v-else>
            </div> 
            <div class="form-group form-group-half toolip-wrapo">
                <input placeholder="Subtitle" :name="'meta[service'+parent_index+'][subtitle]'" type="text" :value="service.subtitle" class="form-control" v-if="service.subtitle">
                <input placeholder="Subtitle" :name="'meta[service'+parent_index+'][subtitle]'" type="text" class="form-control" v-else>
            </div>
            <div class="form-group">
                <textarea placeholder="Description" :name="'meta[service'+parent_index+'][description]'" class="form-control" v-if="service.description">{{service.description}}</textarea>
                <textarea placeholder="Description" :name="'meta[service'+parent_index+'][description]'" class="form-control" v-else></textarea>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    // props:['service_data', 'page_id','parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    props:['parent_index', 'element_id', 'services', 'name', 'section', 'value', 'icon'],
    data() {
        return {
            service:{},
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
        removeSection: function() {
            this.$emit("removeElement", 'remove-section');
        },
    },
    created: function() {
        var index = this.getArrayIndex(this.services, 'id', this.element_id)
        if (this.services[index]) {
            this.service = this.services[index]
        }
        this.service.parentIndex = this.parent_index
    }
};
</script>
