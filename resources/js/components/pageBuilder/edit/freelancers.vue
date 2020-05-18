<template>
    <div class="la-section-settings">
        <div class="wt-location wt-tabsinfo">
            <div class="form-group form-group-half toolip-wrapo">
                <input placeholder="Title" :name="'meta[freelancer'+parent_index+'][title]'" type="text" :value="freelancer.title" class="form-control" v-if="freelancer.title">
                <input placeholder="Title" :name="'meta[freelancer'+parent_index+'][title]'" type="text" value="" class="form-control" v-else>
            </div> 
            <div class="form-group form-group-half toolip-wrapo">
                <input placeholder="Subtitle" :name="'meta[freelancer'+parent_index+'][subtitle]'" type="text" :value="freelancer.subtitle" class="form-control" v-if="freelancer.subtitle">
                <input placeholder="Subtitle" :name="'meta[freelancer'+parent_index+'][subtitle]'" type="text" value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <textarea placeholder="Description" :name="'meta[freelancer'+parent_index+'][description]'" class="form-control" v-if="freelancer.description">{{freelancer.description}}</textarea>
                <textarea placeholder="Description" :name="'meta[freelancer'+parent_index+'][description]'" class="form-control" v-else></textarea>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['parent_index', 'element_id', 'freelancers', 'freelancer_data'],
    data() {
        return {
            freelancer:{},
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
        var index = this.getArrayIndex(this.freelancers, 'id', this.element_id)
        if (this.freelancers[index]) {
            this.freelancer = this.freelancers[index]
        }
        this.freelancer.parentIndex = this.parent_index
    }
};
</script>
