<template>
    <div class="la-section-settings">
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.section_style')}}</h6>
            <div class="wt-settingscontent">
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <span class="wt-select">
                            <select class="form-control" :name="'meta[app'+parent_index+'][style]'" v-model="app_style">
                                <option value="null" disabled>select section style</option>
                                <option v-for="(style, index) in styles" :key="index" :value="style.value">{{style.title}}</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <background 
            :app_background="app.background_image"
            :page_id="page_id"
            :parent_index="parent_index"
            v-if="app.background_image">
        </background>
        <background 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </background>
        <app-image 
            :app_image="app.app_image"
            :page_id="page_id"
            :parent_index="parent_index"
            v-if="app.app_image">
        </app-image>
        <app-image 
            :parent_index="parent_index"
            :page_id="page_id"
            v-else>
        </app-image>
        <div class="wt-location wt-tabsinfo">
            <h6>{{trans('lang.detail')}}</h6>
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="Title" :name="'meta[app'+parent_index+'][title]'" :value="app.title" class="form-control" v-if="app.title">
                <input type="text" placeholder="Title" :name="'meta[app'+parent_index+'][title]'" value="" class="form-control" v-else>
            </div> 
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="SubTitle" :name="'meta[app'+parent_index+'][subtitle]'" :value="app.subtitle" class="form-control" v-if="app.subtitle">
                <input type="text" placeholder="SubTitle" :name="'meta[app'+parent_index+'][subtitle]'" value="" class="form-control" v-else>
            </div> 
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="Android app link" :name="'meta[app'+parent_index+'][andriod_url]'" :value="app.andriod_url" class="form-control" v-if="app.andriod_url">
                <input type="text" placeholder="Android app link" :name="'meta[app'+parent_index+'][andriod_url]'" value="" class="form-control" v-else>
            </div>
            <div class="form-group form-group-half toolip-wrapo">
                <input type="text" placeholder="IOS app link" :name="'meta[app'+parent_index+'][ios_url]'" :value="app.ios_url" class="form-control" v-if="app.ios_url">
                <input type="text" placeholder="IOS app link" :name="'meta[app'+parent_index+'][ios_url]'"  value="" class="form-control" v-else>
            </div>
            <div class="form-group">
                <textarea placeholder="Description" :name="'meta[app'+parent_index+'][description]'" class="form-control" v-if="app.description">{{app.description}}</textarea>
                <textarea placeholder="Description" :name="'meta[app'+parent_index+'][description]'" class="form-control" v-else></textarea>
            </div>
        </div>
    </div>
</template>
<script>
import background from './background'
import AppImage from './app-image'
export default {
    components:{background, AppImage},
    props:['app_date', 'styles', 'page_id', 'parent_index', 'name', 'section', 'value', 'icon', 'section_id'],
    data() {
        return {
            url:APP_URL,
            app_style:null,
            app:{},
        }
    },
    created: function() {
        if (this.app_date && this.app_date[this.section_id]) {
            this.app = this.app_date[this.section_id]
            if (this.app.style) {
                this.app_style = this.app.style
            }
        }
        
    }
};
</script>
