<template>
  <div class="row"> 
    <div class="preloader-section" v-if="loading" v-cloak>
        <div class="preloader-holder">
            <div class="loader"></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 float-left">
      <div class="wt-dashboardbox">
        <div class="wt-dashboardboxtitle">
            <h2>{{ trans('lang.add_page') }}</h2>
        </div>
        <div class="wt-dashboardboxcontent wt-ad-pages">
          <form method="POST" id="update_page" class="wt-formtheme wt-formprojectinfo wt-formcategory" @submit.prevent="updatePage()">
            <fieldset>
              <div class="form-group">
                <input type="text" placeholder="Title" name="title" :value="pageData.title" class="form-control">
              </div>
            </fieldset>
            <draggable 
              class="list-group dragArea" 
              :list="sections" 
              ref="sortable_section" 
              group="section" 
              @start="sortData" 
              @change="updateSection">
              <div
                class="list-group-item"
                v-for="(element, index) in sections"
                :key="index"
                :id="'section'+index">
                <a-collapse accordion>
                  <a-collapse-panel :header="element.name" :key="element.id" :class="'section-'+element.section">
                    <description 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :parent_index="index" 
                      @removeElement="removeSection(index)" 
                      v-if="element.section =='content_section'">
                    </description>
                    <slider 
                      :element_id="element.id"
                      :sliders="form.meta.sliders"
                      @removeElement="removeSection(index)" 
                      :parent_index="index" 
                      :styles="sliderStyleList" 
                      v-else-if="element.section =='slider'">
                    </slider>
                    <!-- <slider 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :slider_data="pageData.sections" 
                      :styles="sliderStyleList" 
                      v-if="element.section =='slider'">
                    </slider> -->
                    <categories 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :cat_data="pageData.sections" 
                      v-if="element.section =='category'">
                    </categories>
                    <welcome-section 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :welcome_data="pageData.sections"
                      v-else-if="element.section =='welcome_section'">
                    </welcome-section>
                    <app-section 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :app_date="pageData.sections"
                      :styles="appStyleList" 
                      v-else-if="element.section =='app_section'">
                    </app-section>
                    <!-- <service-section 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :service_data="pageData.sections"
                      v-else-if="element.section =='service_section'">
                    </service-section> -->
                     <service-section 
                      :element_id="element.id"
                      :services="form.meta.services"
                      @removeElement="removeSection(index)" 
                      :parent_index="index" 
                      v-else-if="element.section =='service_section'">
                    </service-section>
                    <work-video-section 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :work_video_data="pageData.sections" 
                      v-else-if="element.section =='work_video_section'">
                    </work-video-section>
                    <work-tab-section 
                      :parent_index="index" 
                      :name="element.name"
                      :section="element.section"
                      :value="element.value"
                      :icon="element.icon"
                      :section_id="element.id"
                      :page_id="pageData.id" 
                      :work_tab_data="pageData.sections" 
                      v-else-if="element.section =='work_tab_section'">
                    </work-tab-section>
                    <freelancer-section 
                      :parent_index="index" 
                      :element_id="element.id"
                      :page_id="pageData.id" 
                      :freelancer_data="pageData.sections.freelancers" 
                      :freelancers="form.meta.freelancers"
                      @removeElement="removeSection(index)" 
                      v-else-if="element.section =='freelancer_section'">
                    </freelancer-section>
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
              <div class="form-group" v-if="has_child">
                <span class="wt-select" v-if="pageList.length > 0">
                  <select name="parent_id" class="form-control jf-select2" v-if="selected_parent">
                    <option v-for="(page, pageIndex) in pageList" :key="'page'+pageIndex" :value="page.id" v-if="selected_parent == page.id" selected>{{page.title}}</option>
                  </select>
                  <select name="parent_id" class="form-control jf-select2" v-else>
                    <option value="" selected="selected">Select parent</option>
                    <option v-for="(page, pageIndex) in pageList" :key="'page'+pageIndex" :value="page.id">{{page.title}}</option>
                  </select>
                </span>
              </div>
              <div class="wt-securitysettings wt-tabsinfo wt-haslayout">
                  <div class="wt-tabscontenttitle">
                      <h2>{{ trans('lang.seo_meta_desc') }}</h2>
                  </div>
                  <div class="wt-settingscontent">
                      <div class="form-group">
                          <textarea class="form-group seo-meta" name="seo_desc" placeholder="description">{{this.seo_desc}}</textarea>
                      </div>
                  </div>
              </div>
              <div class="wt-tabscontenttitle la-switch-option">
                  <h2>{{ trans('lang.add_menu_to_navbar') }}</h2>
                  <switch_button v-model="show_page">{{ trans('lang.add_menu_to_navbar') }}</switch_button>
                  <input type="hidden" :value="show_page" name="show_page">
              </div>
              <div class="wt-tabscontenttitle la-switch-option">
                  <h2>{{ trans('lang.show_page_banner') }}</h2>
                  <switch_button v-model="show_page_banner">{{ trans('lang.show_hide_banner') }}</switch_button>
                  <input type="hidden" :value="show_page_banner" name="show_page_banner">
              </div>
              <div class="wt-settingscontent">
                <div class="wt-formtheme wt-userform" v-if="pageData.banner">
                  <div v-if="page_banner">
                    <upload-image
                      :id="'page_banner'"
                      :img_ref="'f_banner_ref'"
                      :url="url+'/admin/pages/upload-temp-image/page_banner'"
                      :name="'page_banner'">
                    </upload-image>
                  </div>
                  <div class="wt-uploadingbox" v-else>
                    <figure><img :src="url+'/uploads/pages/'+pageData.id+'/'+pageData.banner" alt=""></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename" v-if="pageData.banner_detail.name">{{pageData.banner_detail.name}}</div>
                        <em>{{ trans('lang.file_size') }} <span v-if="pageData.banner_detail.size">{{pageData.banner_detail.size}}</span><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_page_banner')"></a></em>
                    </div>
                  </div>
                  <input type="hidden" name="page_banner" id="hidden_page_banner" :value="pageData.banner">
                </div>
                <div class="wt-formtheme wt-userform" v-else>
                  <upload-image
                      :id="'page_banner'"
                      :img_ref="'f_banner_ref'"
                      :url="url+'/admin/pages/upload-temp-image/page_banner'"
                      :name="'page_banner'">
                  </upload-image>
                  <input type="hidden" name="page_banner" id="hidden_page_banner">
                </div>
              </div>
              <div class="form-group wt-btnarea">
                <input type="submit" class="wt-btn" value="add page">
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
       <div class="wt-dashboardbox wt-section-create"> 
          <div class="sj-checkoutjournal">
              <div class="wt-dashboardboxtitle">
                  <h2>{{trans('lang.add_sections')}}</h2>
              </div> 
              <draggable 
                class="wt-draggable-group dragArea" 
                :list="list"
                ref="sortable_section" 
                :clone="cloneSection"
                :group="{ name: 'section', pull: 'clone', put: false }">
                <div
                  class="list-group-item"
                  v-for="(element, listIndex) in list"
                  :key="element.name" >
                  {{ element.name }} 
                </div>
              </draggable>
          </div>
       </div>
    </div>
  </div>
</template>
<script>
let id = 3;
import 'ant-design-vue/dist/antd.css';
import draggable from "vuedraggable";
import slider from '../slider'
import categories from './categories'
import WelcomeSection from './welcome/index'
import AppSection from './app/index'
import ServiceSection from './services'
import WorkVideoSection from './work_video'
import WorkTabSection from './work-tab/index'
import FreelancerSection from './freelancers'
import PageTitle from './page_title'
import description from './page_description'
import TextareaSection from './textarea'
import TextSection from './text-section'

// import Event from '../../event';
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
    TextareaSection,
    TextSection,
    PageTitle,
    description
  },
  props:['pages', 'selected_parent', 'page', 'has_child', 'seo_desc', 'app_styles', 'slider_styles', 'sections_list', 'description'],
  data() {
    return {
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
            title:{
              show:true
            }
        },
      },
      loading: false,
      pageObj:{
        description:''
      },
      pageData: JSON.parse(this.page),
      pageList: JSON.parse(this.pages),
      appStyleList: JSON.parse(this.app_styles),
      sliderStyleList: JSON.parse(this.slider_styles),
      show_page_banner: true,
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
  mounted: function(){
  },
  created: function() {
    if (this.pageData.section_list) {
      this.sections = this.pageData.section_list
      var sectionArray = Object.keys(this.pageData.sections).map(i => this.pageData.sections[i])
      console.log(sectionArray)
      var self = this
      sectionArray.forEach(element => {
        element = element.filter(function(sec){
          return self.sections.find(function(e) {
            if (typeof sec == 'string') {
              if (sec == 1) {
                self.form.meta[e.value].show = true  
              } else {
                self.form.meta[e.value].show = false  
              }
            } else if (e.id == sec.id) {
              console.log(sec)
              self.form.meta[e.value].push(sec)
            }
          });
        }); 
      });
    } 
    self.getPageOption();
    // console.log(self.form.meta)
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
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.freelancers.push(freelancer)
        } else if(evt.added.element.section == 'category') {
          var category = {
            title: '',
            subtitle: '',
            description: '',
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
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.welcome_sections.push(welcome)
        } else if (evt.added.element.section == 'service_section') {
          var service = {
            title: '',
            subtitle: '',
            description: '',
            id:this.sections[evt.added.newIndex].id,
            parentIndex:''
          }
          this.form.meta.services.push(service)
        } else if (evt.added.element.section == 'content_section') {
          var desciption = {
            description: '',
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
            fourth_tab_icon:'',
            title: '',
            subtitle: '',
            description: '',
            first_tab_title: '',
            first_tab_subtitle: '',
            second_tab_title: '',
            second_tab_subtitle: '',
            third_tab_title: '',
            third_tab_subtitle: '',
            fourth_tab_title: '',
            fourth_tab_subtitle: '',
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
    updatePage: function () {
      this.loading= true
      // var items = this.sections.map(function(item, index) {
      //     return { section: item.section, id: index }
      // })
      let page_Form = document.getElementById('update_page');
      let form_data = new FormData(page_Form);
      var description = tinyMCE.get('wt-tinymceeditor').getContent();
      form_data.append('content', description);
      form_data.append('sections', JSON.stringify(this.sections));
      var self = this;
      axios.post(APP_URL + '/admin/pages/update-page/'+this.pageData.id, form_data)
        .then(function (response) {
            if (response.data.type == 'success') {
                self.showMessage(response.data.message);
                setTimeout(function () {
                    window.location.replace(APP_URL + '/admin/pages');
                }, 4000)
            } else {
                self.loading= false
                self.showError(response.data.message);
            }
        })
        .catch(function (error) {
            self.loading= false
            if (error.response.data.errors.title) {
                self.showError(error.response.data.errors.title[0]);
            }
            if (error.response.data.errors.content) {
                self.showError(error.response.data.errors.content[0]);
            }
        });
      },
    removeSection(index) {
      this.list.splice(index, 1);
    },
    removeImage: function (id) {
        this.page_banner = true;
        document.getElementById(id).value = '';
    },
    // add: function() {
    //   this.list.push({ name: "Juan" });
    // },
    // replace: function() {
    //   this.list = [{ name: "Edgard" }];
    // },
    clone: function(el) {
      return {
        name: el.name + " cloned"
      };
    },
    log: function(evt) {
      window.console.log(evt);
    },
    getPageOption: function () {
      var segment_str = window.location.pathname;
      var segment_array = segment_str.split('/');
      var id = segment_array[segment_array.length - 1];
      if (segment_str == '/admin/pages/edit-page/' + id) {
          let self = this;
          axios.post(APP_URL + '/admin/get-page-option', {
              page_id: id
          })
          .then(function (response) {
              if (response.data.type == 'success') {
                  if (response.data.show_page == 'true') {
                      self.show_page = true;
                  } else {
                      self.show_page = false;
                  }
                  if (response.data.show_banner == 'true') {
                      self.show_page_banner = true;
                  } else {
                      self.show_page_banner = false;
                  }
              }
          });
      }
    },
  },
};
</script>
<style scoped>
.button {
  margin-top: 35px;
}
.handle {
  float: left;
  padding-top: 8px;
  padding-bottom: 8px;
}
.close {
  float: right;
  padding-top: 8px;
  padding-bottom: 8px;
}
input {
  display: inline-block;
  width: 50%;
}
.text {
  margin: 20px;
}
</style>