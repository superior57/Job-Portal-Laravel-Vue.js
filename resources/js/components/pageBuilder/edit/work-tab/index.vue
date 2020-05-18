<template>
    <div class="la-section-settings">
        <background 
            :work_tab_background="work_tab.background"
            :page_id="page_id"
            :parent_index="parent_index"
            v-if="work_tab.background">
        </background>
        <background 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </background>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.detail')}}</h6>
            <div class="wt-settingscontent">
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][title]'" type="text" :value="work_tab.title" class="form-control" v-if="work_tab.title">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][title]'" type="text" value="" class="form-control" v-else>
                </div> 
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Subtitle" :name="'meta[work_tab'+parent_index+'][subtitle]'" type="text" :value="work_tab.subtitle" class="form-control" v-if="work_tab.subtitle">
                    <input placeholder="Subtitle" :name="'meta[work_tab'+parent_index+'][subtitle]'" type="text" value="" class="form-control" v-else>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Description" :name="'meta[work_tab'+parent_index+'][description]'" v-if="work_tab.description">{{work_tab.description}}</textarea>
                    <textarea class="form-control" placeholder="Description" :name="'meta[work_tab'+parent_index+'][description]'" v-else></textarea>
                </div>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.first_tab')}}</h6>
            <div class="wt-settingscontent">
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][first_tab_title]'" type="text" :value="work_tab.first_tab_title" class="form-control" v-if="work_tab.first_tab_title">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][first_tab_title]'" type="text" value="" class="form-control" v-else>
                </div> 
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Subtitle" :name="'meta[work_tab'+parent_index+'][first_tab_subtitle]'" type="text" :value="work_tab.first_tab_subtitle" class="form-control" v-if="work_tab.first_tab_subtitle">
                    <input placeholder="Subtitle" :name="'meta[work_tab'+parent_index+'][first_tab_subtitle]'" type="text" value="" class="form-control" v-else>
                </div>
                <first-icon 
                    :first_tab_icon="work_tab.first_tab_icon"
                    :page_id="page_id"
                    :parent_index="parent_index"
                    v-if="work_tab.first_tab_icon">
                </first-icon>
                <first-icon 
                    :page_id="page_id"
                    :parent_index="parent_index"
                    v-else>
                </first-icon>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.second_tab')}}</h6>
            <div class="wt-settingscontent">
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][second_tab_title]'" type="text" :value="work_tab.second_tab_title" class="form-control" v-if="work_tab.second_tab_title">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][second_tab_title]'" type="text" value="" class="form-control" v-else>
                </div> 
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Subtitle" :name="'meta[work_tab'+parent_index+'][second_tab_subtitle]'" type="text" :value="work_tab.second_tab_subtitle" class="form-control" v-if="work_tab.second_tab_subtitle">
                    <input placeholder="Subtitle" :name="'meta[work_tab'+parent_index+'][second_tab_subtitle]'" type="text" value="" class="form-control" v-else>
                </div>
                <second-icon 
                    :second_tab_icon="work_tab.second_tab_icon"
                    :page_id="page_id"
                    :parent_index="parent_index"
                    v-if="work_tab.second_tab_icon">
                </second-icon>
                <second-icon 
                    :page_id="page_id"
                    :parent_index="parent_index"
                    v-else>
                </second-icon>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.third_tab')}}</h6>
            <div class="wt-settingscontent">
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][third_tab_title]'" type="text" :value="work_tab.third_tab_title" class="form-control" v-if="work_tab.third_tab_title">
                    <input placeholder="Title" :name="'meta[work_tab'+parent_index+'][third_tab_title]'" type="text" value="" class="form-control" v-else>
                </div> 
                <div class="form-group form-group-half toolip-wrapo">
                    <input placeholder="Subtitle":name="'meta[work_tab'+parent_index+'][third_tab_subtitle]'" type="text" :value="work_tab.third_tab_subtitle" class="form-control" v-if="work_tab.third_tab_subtitle">
                    <input placeholder="Subtitle":name="'meta[work_tab'+parent_index+'][third_tab_subtitle]'" type="text" value="" class="form-control" v-else>
                </div>
                <third-icon 
                    :third_tab_icon="work_tab.third_tab_icon"
                    :page_id="page_id"
                    :parent_index="parent_index"
                    v-if="work_tab.third_tab_icon">
                </third-icon>
                <third-icon 
                    :page_id="page_id"
                    :parent_index="parent_index"
                    v-else>
                </third-icon>
            </div>
        </div>
    </div>
</template>
<script>
import background from './background'
import FirstIcon from './first-icon'
import SecondIcon from './second-icon'
import ThirdIcon from './third-icon'
export default {
    components: {background, FirstIcon, SecondIcon, ThirdIcon},
    props:['work_tab_data', 'page_id','parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    data() {
        return {
            url:APP_URL,
            work_tab:{},
        }
    },
    created: function() {
        if (this.work_tab_data && this.work_tab_data[this.section_id]) {
            this.work_tab = this.work_tab_data[this.section_id]
        }
    }
};
</script>
