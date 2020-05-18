<template>
  <div class="row"> 
    <div class="preloader-section" v-if="loading" v-cloak>
        <div class="preloader-holder">
            <div class="loader"></div>
        </div>
    </div>
    <div class="col-xl-9 float-left">
      <div class="wt-dashboardbox">
        <div class="wt-dashboardboxtitle">
            <h2>{{ trans('lang.add_page') }}</h2>
        </div>
        <div class="wt-dashboardboxcontent wt-ad-pages">
          <form method="POST" id="pages" class="wt-formtheme wt-formprojectinfo wt-formcategory" @submit.prevent="submitPage()">
            <fieldset>
              <div class="form-group">
                <input type="text" placeholder="Title" name="title" v-model="form.title" value="" class="form-control">
              </div>
            </fieldset>
            <draggable class="list-group dragArea" :list="sections" ref="sortable_section" group="section" @start="sortData" @change="updateSection">
              <div
                class="list-group-item"
                v-for="(element, index) in sections"
                :key="index" 
                :id="'section'+index">
                <a-collapse accordion>
                  <a-collapse-panel :key="element.id" :class="'amt-slot-header section-'+element.section" :id="'draggedElement-'+element.id">
                    <description 
                      :element_id="element.id"
                      :parent_index="index" 
                      :content_section="form.meta.content"
                      @removeElement="removeSection(index, 'content')"
                      v-if="element.section =='content_section'">
                    </description>
                    <slider 
                      :element_id="element.id"
                      :sliders="form.meta.sliders"
                      @removeElement="removeSection(index, 'sliders')"
                      :parent_index="index" 
                      :styles="sliderStyleList" 
                      v-else-if="element.section =='slider'">
                    </slider>
                    <categories 
                      :element_id="element.id"
                      :categories="form.meta.cat"
                      @removeElement="removeSection(index, 'cat')"
                      :parent_index="index" 
                      v-else-if="element.section =='category'">
                    </categories>
                    <welcome-section 
                      :element_id="element.id"
                      :welcome_data="form.meta.welcome_sections"
                      @removeElement="removeSection(index, 'welcome_sections')"
                      :parent_index="index" 
                      v-else-if="element.section =='welcome_section'">
                    </welcome-section>
                    <app-section 
                      :element_id="element.id"
                      :apps="form.meta.app_section"
                      @removeElement="removeSection(index, 'app_section')"
                      :parent_index="index" 
                      :styles="appStyleList" 
                      v-else-if="element.section =='app_section'">
                    </app-section>
                    <service-section 
                      :element_id="element.id"
                      :services="form.meta.services"
                      @removeElement="removeSection(index, 'services')"
                      :parent_index="index" 
                      v-else-if="element.section =='service_section'">
                    </service-section>
                    <work-video-section 
                      :element_id="element.id" 
                      :work_videos="form.meta.work_videos"
                      @removeElement="removeSection(index, 'work_videos')"
                      :parent_index="index" 
                      v-else-if="element.section =='work_video_section'">
                    </work-video-section>
                    <work-tab-section
                      :element_id="element.id" 
                      :work_tabs="form.meta.work_tabs"
                      @removeElement="removeSection(index, 'work_tabs')"
                      :parent_index="index" 
                      v-else-if="element.section =='work_tab_section'">
                    </work-tab-section>
                    <freelancer-section 
                      :element_id="element.id"
                      @removeElement="removeSection(index, 'freelancers')"
                      :parent_index="index" 
                      :freelancers="form.meta.freelancers"
                      v-else-if="element.section =='freelancer_section'">
                    </freelancer-section>
                    <article-section 
                      :element_id="element.id"
                      @removeElement="removeSection(index, 'articles')" 
                      :parent_index="index" 
                      :articles="form.meta.articles"
                      v-else-if="element.section =='article_section'">
                    </article-section>
                  </a-collapse-panel>
                </a-collapse>
              </div>
            </draggable>
            <div v-for="(element, hiddenIndex) in sections" :key="hiddenIndex" :id="element.id">
              <input type="hidden" :value="element.name" :name="'section['+element.value+hiddenIndex+'][parent][name]'">
              <input type="hidden" :value="element.section" :name="'section['+element.value+hiddenIndex+'][parent][section]'">
              <input type="hidden" :value="element.value" :name="'section['+element.value+hiddenIndex+'][parent][value]'">
              <input type="hidden" :value="element.icon" :name="'section['+element.value+hiddenIndex+'][parent][icon]'">
              <input type="hidden" :value="element.value+hiddenIndex" :name="'section['+element.value+hiddenIndex+'][parent][id]'">
            </div>
            <fieldset>
              <div class="form-group" v-if="pageList">
                <span class="wt-select">
                  <select name="parent_id" class="form-control jf-select2" v-model="form.parent_id">
                    <option value="null" disabled>select Parent</option>
                    <option
                      v-for="(page, pageIndex) in pageList"
                      :key="'page'+pageIndex"
                      :value="page.id"
                    >{{page.title}}</option>
                  </select>
                </span>
              </div>
              <div class="wt-securitysettings wt-tabsinfo wt-haslayout">
                  <div class="wt-tabscontenttitle">
                      <h2>{{ trans('lang.seo_meta_desc') }}</h2>
                  </div>
                  <div class="wt-settingscontent">
                    <div class="wt-sliderbox__form">
                      <div class="form-group">
                          <textarea class="form-group seo-meta" name="seo_desc" v-model="form.seo_desc" placeholder="description">{{this.form.seo_desc}}</textarea>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="wt-tabscontenttitle la-switch-option">
                <h2>{{ trans('lang.add_menu_to_navbar') }}</h2>
                <switch_button v-model="form.show_page">{{ trans('lang.add_menu_to_navbar') }}</switch_button>
                <input type="hidden" :value="form.show_page" name="show_page" />
              </div>
              <div class="wt-tabscontenttitle la-switch-option">
                <h2>{{ trans('lang.show_page_banner') }}</h2>
                <switch_button v-model="form.show_page_banner">{{ trans('lang.show_hide_banner') }}</switch_button>
                <input type="hidden" :value="form.show_page_banner" name="show_page_banner" />
              </div>
              <div class="wt-settingscontent">
                <div class="wt-formtheme wt-userform">
                  <upload-image
                      :id="'page_banner'"
                      :img_ref="'f_banner_ref'"
                      :url="url+'/admin/pages/upload-temp-image/page_banner'"
                      :name="'page_banner'">
                  </upload-image>
                  <input type="hidden" name="page_banner" id="hidden_page_banner">
                </div>
              </div>
              <div class="wt-updatall la-updateall-holder page-builder-savebtn">
                <i class="ti-announcement"></i> 
                <span>{{trans.save_changes_note}}</span> 
                <input type="submit" class="wt-btn" value="add page">
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="wt-dashboardbox wt-section-create"> 
      <div id="wt-btnsectiontoggle" class="wt-btnmenutoggle">
          <span class="menu-icon">
              <em></em>
              <em></em>
              <em></em>
          </span>
      </div>
      <div class="wt-section-area ">
        <div class="wt-dashboardboxtitle">
          <h2>{{trans('lang.add_sections')}}</h2>
        </div> 
        <div class="wt-tabscontenttitle la-switch-option">
          <h2>{{ trans('lang.show_page_title') }}</h2>
          <switch_button v-model="form.meta.title.show">{{ trans('lang.show_hide') }}</switch_button>
          <input type="hidden" id="show_title_btn" :value="form.meta.title.show">
        </div>
        <draggable 
          class="wt-draggable-group dragArea" 
          :list="list"
          ref="sortable_section" 
          :clone="cloneSection"
          :group="{ name: 'section', pull: 'clone', put: false }">
          <div class="amt-section-slot list-group-item"
            v-for="(element, listIndex) in list"
            :key="element.name">
            <img :src="IconPath+element.icon" alt="img description">
            <span>{{ element.name }}</span>
          </div>
        </draggable>
        
      </div>
    </div>
  </div>
</template>
<script>
let idGlobal = 1;
// import 'ant-design-vue/dist/antd.css';
import draggable from "vuedraggable";
import slider from './slider'
import categories from './categories'
import WelcomeSection from './welcome'
import AppSection from './app'
import ServiceSection from './services'
import WorkVideoSection from './work_video'
import WorkTabSection from './work_tab'
import FreelancerSection from './freelancers'
import description from './description'
import articleSection from './articles'
import Event from '../../event'
export default {
  name: "handle",
  display: "Handle",
  instruction: "Drag using the handle icon",
  order: 5,
  components: {
    draggable, 
    slider, 
    categories,
    WelcomeSection, 
    AppSection, 
    ServiceSection,
    WorkVideoSection,
    WorkTabSection,
    FreelancerSection,
    description,
    articleSection,
  },
  props:['pages', 'sections_list', 'app_styles', 'slider_styles'],
  data() {
    return {
      IconPath:APP_URL+'/images/page-builder/',
      form: {
        sections:[],
        title:'',
        meta:{
          freelancers:[],
          cat:[],
          welcome_sections:[],
          content:[],
          services:[],
          work_tabs:[],
          work_videos:[],
          sliders:[],
          app_section:[],
          articles:[],
          title:{
            show:true
          } 
        },
        show_page_banner: true,
        show_page: false,
        page_banner_value:'',
        seo_desc:'',
        parent_id: null,
      },
      freelancer:{},
      loading: false,
      pageList: JSON.parse(this.pages),
      appStyleList: JSON.parse(this.app_styles),
      sliderStyleList: JSON.parse(this.slider_styles),
      show_page_banner: true,
      show_page_title: true,
      show_page: false,
      page_banner: false,
      pageID: "",
      url:APP_URL,
      is_show: false,
      notificationSystem: {
          options: {
              success: {
                  position: "topRight",
                  timeout: 4000,
                  class: 'success_notification'
              },
              error: {
                  position: "topRight",
                  timeout: 4000,
                  class: 'error_notification'
              },
          }
      },
      sections:[],
      list: JSON.parse(this.sections_list),
      activeKey: [1],
    };
  },
  updated() {
    var self =this
    self.sections.map(function(item, index) {
      if (!(jQuery("#draggedElement-"+item.id).find(".item-inner").length >= 1)) {
        jQuery("#draggedElement-"+item.id).append(
          '<span><i><img src="'+self.IconPath+item.icon+'" alt="img description" class="item-inner">'+item.name+'</i></span>'
        );
      }
    })
  },
  methods: {
    getArrayIndex (array, attr, value) {
      for (var i = 0; i < array.length; i += 1) {
        if (array[i][attr] == value) {
          return i
        }
      }
      return -1
    },
    sortData: function(evt) {
      var area = document.getElementsByClassName('description-area')
      var self = this
      var i;
      for (i=0; i<area.length; i++) {
        self.sections.map(function(item, index) {
          if (item.section == 'content_section') {
            if (document.getElementById('tinymceeditor'+index)) {
              var descID = self.getArrayIndex(self.form.meta.content, 'id', item.id)
              self.form.meta.content[descID].description= tinyMCE.get('tinymceeditor'+index).getContent();
            }
          }
        })
      }
    },
    cloneSection: function(evt) {
      return {
        name: evt.name,
        section: evt.section,
        value: evt.value,
        icon: evt.icon,
        id: idGlobal++,
      };
    },
    updateSection: function(evt){
      if (evt.added) {
        if(evt.added.element.section == 'freelancer_section') {
          var freelancer = {
            title: '',
            subtitle: '',
            description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.freelancers.push(freelancer)
        } else if(evt.added.element.section == 'article_section') {
          var article = {
            title: '',
            subtitle: '',
            description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.articles.push(article)
        } else if(evt.added.element.section == 'category') {
          var category = {
            title: '',
            subtitle: '',
            description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.cat.push(category)
        } else if(evt.added.element.section == 'welcome_section') {
          var welcome = {
            welcome_background:'',
            first_title: '',
            first_url: '',
            first_url_button: '',
            first_description: '',
            second_title: '',
            second_url: '',
            second_url_button: '',
            second_description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.welcome_sections.push(welcome)
        } else if (evt.added.element.section == 'service_section') {
          var service = {
            title: '',
            subtitle: '',
            description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.services.push(service)
        } else if (evt.added.element.section == 'content_section') {
          var desciption = {
            description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.content.push(desciption)
        } else if (evt.added.element.section == 'work_tab_section') {
          var work = {
            background_image:'',
            first_tab_icon:'',
            second_tab_icon:'',
            third_tab_icon:'',
            title: '',
            subtitle: '',
            description: '',
            first_tab_title: '',
            first_tab_subtitle: '',
            second_tab_title: '',
            second_tab_subtitle: '',
            third_tab_title: '',
            third_tab_subtitle: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.work_tabs.push(work)
        } else if (evt.added.element.section == 'work_video_section') {
          var work_video = {
            title: '',
            subtitle: '',
            video: '',
            description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.work_videos.push(work_video)
        } else if (evt.added.element.section == 'slider') {
          var slider = {
            style:null,
            slider_image:[],
            inner_banner_image:'',
            floating_image01:'',
            floating_image02:"",
            title: '',
            subtitle: '',
            description: '',
            video_link: '',
            video_title: '',
            video_description: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.sliders.push(slider)
        } else if (evt.added.element.section == 'app_section') {
          var app = {
            title: '',
            subtitle: '',
            description: '',
            andriod_url: '',
            ios_url: '',
            style: null,
            background_image: '',
            app_image: '',
            sectionColor: '#ffffff',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.app_section.push(app)
        }
      } 
    }, 
    showMessage(message) {
      return this.$toast.success(' ', message, this.notificationSystem.options.success);
    },
    showError(error) {
      return this.$toast.error(' ', error, this.notificationSystem.options.error);
    },
    submitPage: function () {
      this.loading = true;
      var self = this;
      var l;
      self.sections.map(function(item, index) {
        if(self.form.meta[item.value]) {
          var formIndex = self.getArrayIndex(self.form.meta[item.value], 'id', item.id)
          self.form.meta[item.value][formIndex].parentIndex = index
        }
      })
      self.form.sections = JSON.stringify(self.sections)
      let image = document.getElementById('hidden_page_banner').value
      self.form.page_banner_value = image
      axios.post(APP_URL + '/admin/store-page', self.form)
        .then(function (response) {
          if (response.data.type == 'success') {
              self.showMessage(response.data.message);
              setTimeout(function () {
                  window.location.replace(APP_URL + '/admin/pages');
              }, 4000)
          } else {
              self.loading = false
              self.showError(response.data.message);
          }
        })
        .catch(function (error) {
          self.loading = false
          if (error.response.data.errors.title) {
              self.showError(error.response.data.errors.title[0]);
          }
        });
      },
    removeSection(index, section) {
      this.sections.splice(index, 1);
      var selectedSectionIndex = this.getArrayIndex(this.form.meta[section], 'parentIndex', index)
      this.form.meta[section].splice(selectedSectionIndex, 1);
    },
  },
};
</script>