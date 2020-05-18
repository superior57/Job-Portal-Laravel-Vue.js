<template>
    <div class="la-section-settings">
        <div class="wt-location wt-tabsinfo">
            <div class="form-group">
                <input placeholder="Title" :name="'meta[cat'+parent_index+'][title]'" :value="category.title" class="form-control" v-if="category.title">
                <input placeholder="Title" :name="'meta[cat'+parent_index+'][title]'" type="text" value="" class="form-control" v-else>
            </div> 
            <div class="form-group">
                <input placeholder="Subtitle" :name="'meta[cat'+parent_index+'][subtitle]'" type="text" :value="category.subtitle" class="form-control" v-if="category.subtitle">
                <input placeholder="Subtitle" :name="'meta[cat'+parent_index+'][subtitle]'" type="text" value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <textarea placeholder="Description" :name="'meta[cat'+parent_index+'][description]'" class="form-control" v-if="category.description">{{category.description}}</textarea>
                <textarea placeholder="Description" :name="'meta[cat'+parent_index+'][description]'" class="form-control" v-else></textarea>
            </div>
        </div>
        
    </div>
</template>
<script>
export default {
    props:['cat_data', 'page_id','parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    data() {
        return {
            category:{},
        }
    },
    created: function() {
        if (this.cat_data && this.cat_data[this.section_id]) {
            this.category = this.cat_data[this.section_id]
        }
    }
};
</script>
