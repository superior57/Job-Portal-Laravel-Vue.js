<template>
  <div>
    <div v-for="(element, index) in sections" :key="index" :id="'section'+index">
      <slider  
        :element_id="element.id"
        :sliders="selectedPage.meta.sliders" 
        :page_id="pageData.id"
        v-if="element.section =='slider'">
      </slider>
      <categories
        :element_id="element.id"
        :categories="selectedPage.meta.cat" 
        :page_id="pageData.id"
        v-if="element.section =='category'">
      </categories>
      <!-- <services
        :element_id="element.id"
        :services="selectedPage.meta.services" 
        :page_id="pageData.id"
        :access_type="type"
        v-if="element.section =='service_section'">
      </services> -->
     <welcome  
        :element_id="element.id"
        :welcome_data="selectedPage.meta.welcome_sections" 
        :page_id="pageData.id"
        v-if="element.section =='welcome_section'">
      </welcome>
      <!-- <app  
        :element_id="element.id"
        :apps="selectedPage.meta.app_section" 
        :page_id="pageData.id"
        v-if="element.section =='app_section'">
      </app> -->
      <work-tab  
        :element_id="element.id"
        :work_tabs="selectedPage.meta.work_tabs" 
        :page_id="pageData.id"
        v-if="element.section =='work_tab_section'">
      </work-tab>
      <!-- <freelancer  
        :element_id="element.id"
        :freelancers="selectedPage.meta.freelancers" 
        :page_id="pageData.id"
        v-if="element.section =='freelancer_section'">
      </freelancer> -->
      <articles  
        :element_id="element.id"
        :articles="selectedPage.meta.articles" 
        :page_id="pageData.id"
        v-if="element.section =='article_section'">
      </articles>
       <work-video  
        :element_id="element.id"
        :work_videos="selectedPage.meta.work_videos" 
        :page_id="pageData.id"
        v-if="element.section =='work_video_section'">
      </work-video>
      <description
        :element_id="element.id"
        :content_section="selectedPage.meta.content"
        :page_id="pageData.id"
        v-if="element.section =='content_section'">
      </description>
      <freelancer-job
        :element_id="element.id"
        :page_id="pageData.id"
        v-if="element.section =='freelancer-job'">
      </freelancer-job>
    </div>
  </div>
</template>
<script>
import slider from './sliders/index'
import categories from './categories'
import services from './services'
import welcome from './welcome'
import app from './app/index'
import workTab from './work_tab'
import freelancer from './freelancers'
import workVideo from './work_video'
import articles from './articles'
import description from './description'
import freelancerJob from './freelancer_job'
export default {
  components:{slider, categories, services, welcome, app, workTab, freelancer, workVideo, articles, description, freelancerJob},
  props: [
    "sections_list", "page", "type"
  ],
  data() {
    return {
      selectedPage: {
        sections: [],
        title: "",
        meta: {
          freelancers: [],
          cat: [],
          welcome_sections: [],
          content: [],
          services: [],
          work_tabs: [],
          work_videos: [],
          sliders: [],
          app_section: [],
          articles:[],
          title: {
            show: true
          }
        },
        show_page_banner: true,
        show_page: false,
        page_banner_value:'',
        seo_desc:'',
        parent_id: null,
      },
      list: JSON.parse(this.sections_list),
      pageData: JSON.parse(this.page),
      sections: [],
    };
  },
  mounted: function() {},
  created: function() {
  this.getPageData()
  console.log(this.type)
  },
  methods: {
    getPageData: function() {
      var self = this;
      axios
        .get(APP_URL + "/page/get-page-data/" + self.pageData.id)
        .then(function(response) {
          if (response.data.type == "success") {
            self.pageData.sections = response.data.section_data;
            if (self.pageData.section_list) {
              self.sections = self.pageData.section_list;
              if (self.pageData.sections) {
                var sectionArray = Object.keys(self.pageData.sections).map(i => self.pageData.sections[i]);
                sectionArray.forEach(element => {
                  element = element.filter(function(sec) {
                    return self.sections.find(function(e) {
                      if (typeof sec != "string") {
                        if (e.id == sec.id) {
                          self.selectedPage.meta[e.value].push(sec);
                        }
                      }
                    });
                  });
                });
              }
            }
          }
        })
        .catch(function(error) {  });
    },
  }
};
</script>