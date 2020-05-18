<template>
    <div class="la-section-settings">
        <background 
            :welcome_background="welcome.welcome_background"
            :page_id="page_id"
            :parent_index="parent_index"
            v-if="welcome.welcome_background">
        </background>
        <background 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </background>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.first_section_detail')}}</h6>
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="First Section Title" :name="'meta[welcome'+parent_index+'][first_title]'" :value="welcome.first_title" class="form-control" v-if="welcome.first_title">
                <input type="text" placeholder="First Section Title" :name="'meta[welcome'+parent_index+'][first_title]'" value="" class="form-control" v-else>
            </div> 
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="First Section url" :name="'meta[welcome'+parent_index+'][first_url]'" :value="welcome.first_url" class="form-control" v-if="welcome.first_url">
                <input type="text" placeholder="First Section url" :name="'meta[welcome'+parent_index+'][first_url]'"  value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <input type="text" placeholder="First Section Button text":name="'meta[welcome'+parent_index+'][first_url_button]'" :value="welcome.first_url_button" class="form-control" v-if="welcome.first_url_button">
                <input type="text" placeholder="First Section Button text":name="'meta[welcome'+parent_index+'][first_url_button]'"  value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <textarea placeholder="First Section Description" :name="'meta[welcome'+parent_index+'][first_description]'" class="form-control" v-if="welcome.first_description">{{welcome.first_description}}</textarea>
                <textarea placeholder="First Section Description" :name="'meta[welcome'+parent_index+'][first_description]'" class="form-control" v-else></textarea>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.second_section_detail')}}</h6>
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="Second Section Title" :name="'meta[welcome'+parent_index+'][second_title]'"  :value="welcome.second_title" class="form-control" v-if="welcome.second_title">
                <input type="text" placeholder="Second Section Title" :name="'meta[welcome'+parent_index+'][second_title]'"  value="" class="form-control" v-else>
            </div> 
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="Second Section url" :name="'meta[welcome'+parent_index+'][second_url]'"  :value="welcome.second_url" class="form-control" v-if="welcome.second_url">
                <input type="text" placeholder="Second Section url" :name="'meta[welcome'+parent_index+'][second_url]'"  value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Second Section Button text" :name="'meta[welcome'+parent_index+'][second_url_button]'" :value="welcome.second_url_button" class="form-control" v-if="welcome.second_url_button">
                <input type="text" placeholder="Second Section Button text" :name="'meta[welcome'+parent_index+'][second_url_button]'"  value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <textarea placeholder="Second Section Description" :name="'meta[welcome'+parent_index+'][second_description]'" class="form-control" v-if="welcome.second_description">{{welcome.second_description}}</textarea>
                <textarea placeholder="Second Section Description" :name="'meta[welcome'+parent_index+'][second_description]'" class="form-control" v-else></textarea>
            </div>
        </div>
    </div>
</template>
<script>
import background from './background'
export default {
    components:{background},
    props:['welcome_data', 'page_id', 'parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    data() {
        return {
            welcome_section_display:true, 
            url:APP_URL,
            welcome:{},
        }
    },
    created: function() {
        if (this.welcome_data && this.welcome_data[this.section_id]) {
            this.welcome = this.welcome_data[this.section_id]
        }
    }
};
</script>
