<template>
  <div>
    <div class="wt-tabscontenttitle wt-addnew">
      <h2>{{ trans('lang.add_your_edu') }}</h2>
      <a
        href="javascript:void(0);"
        @click="addEducation"
        class="add-education-btn"
      >{{ trans('lang.add_edu') }}</a>
    </div>
    <ul class="wt-experienceaccordion accordion" id="education-list">
      <span v-if="stored_educations" class="education-inner-list">
        <li
          v-for="(stored_education, index) in stored_educations"
          :key="index"
          class="education-element"
        >
          <div class="wt-accordioninnertitle">
            <span
              :id="'educationaccordion-'+index+''"
              data-toggle="collapse"
              :data-target="'#educationaccordioninner-'+index+''"
            >{{stored_education.degree_title}} ({{stored_education.start_date}} - {{stored_education.end_date}})</span>
            <div class="wt-rightarea">
              <a
                href="javascript:void(0);"
                class="wt-addinfo wt-skillsaddinfo"
                :id="'educationaccordion-'+index+''"
                data-toggle="collapse"
                :data-target="'#educationaccordioninner-'+index+''"
                aria-expanded="true"
              >
                <i class="lnr lnr-pencil"></i>
              </a>
              <a
                href="javascript:void(0);"
                class="wt-deleteinfo"
                @click="removeStoredEducation(index)"
              >
                <i class="lnr lnr-trash"></i>
              </a>
            </div>
          </div>
          <div
            class="wt-collapseexp collapse hide"
            :id="'educationaccordioninner-'+index+''"
            :aria-labelledby="'educationaccordion-'+index+''"
            data-parent="#accordion"
          >
            <fieldset>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  :value="stored_education.degree_title"
                  v-bind:name="'education['+[index]+'][degree_title]'"
                  class="form-control"
                  :placeholder="ph_job_title"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="stored_education.start_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'education['+[index]+'][start_date]'"
                  :value="stored_education.start_date"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="stored_education.end_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'education['+[index]+'][end_date]'"
                  :value="stored_education.end_date"
                />
              </div>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  :value="stored_education.institute_title"
                  v-bind:name="'education['+[index]+'][institute_title]'"
                  class="form-control"
                  :placeholder="ph_institute_title"
                />
              </div>
              <div class="form-group">
                <textarea
                  :value="stored_education.description"
                  v-bind:name="'education['+[index]+'][description]'"
                  class="form-control"
                  :placeholder="ph_desc"
                ></textarea>
              </div>
              <div class="form-group">
                <span>{{ trans('lang.date_note') }}</span>
              </div>
            </fieldset>
          </div>
        </li>
      </span>
      <span class="education-inner-list">
        <li
          v-for="(education, index) in educations"
          :key="index"
          ref="educationlistelement"
          class="education-inner-list-item"
        >
          <div class="wt-accordioninnertitle">
            <span
              :id="'educationaccordion-'+education.count+''"
              data-toggle="collapse"
              :data-parent="'#educationaccordioninner-'+education.count+''"
            >{{education.degree_title}} ( {{education.start_date}} - {{education.end_date}} )</span>
            <div class="wt-rightarea">
              <a
                href="javascript:void(0);"
                class="wt-addinfo wt-skillsaddinfo"
                :id="'educationaccordion-'+education.count+''"
                data-toggle="collapse"
                :data-target="'#educationaccordioninner-'+education.count+''"
                aria-expanded="true"
              >
                <i class="lnr lnr-pencil"></i>
              </a>
              <a href="javascript:void(0);" class="wt-deleteinfo delete-education">
                <i class="lnr lnr-trash"></i>
              </a>
            </div>
          </div>
          <div
            class="wt-collapseexp collapse hide"
            :id="'educationaccordioninner-'+education.count+''"
            :aria-labelledby="'educationaccordion-'+education.count+''"
            data-parent="#accordion"
          >
            <fieldset>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  v-bind:name="'education['+[education.count]+'][degree_title]'"
                  class="form-control"
                  :placeholder="ph_job_title"
                  v-model="education.degree_title"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="education.start_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'education['+[education.count]+'][start_date]'"
                  :value="education.start_date"
                  :placeholder="ph_start_date"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="education.end_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'education['+[education.count]+'][end_date]'"
                  :value="education.end_date"
                  :placeholder="ph_end_date"
                />
              </div>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  v-bind:name="'education['+[education.count]+'][institute_title]'"
                  class="form-control"
                  :placeholder="ph_institute_title"
                />
              </div>
              <div class="form-group">
                <textarea
                  v-bind:name="'education['+[education.count]+'][description]'"
                  class="form-control"
                  :placeholder="ph_desc"
                ></textarea>
              </div>
              <div class="form-group">
                <span>{{ trans('lang.date_note') }}</span>
              </div>
            </fieldset>
          </div>
        </li>
      </span>
    </ul>
  </div>
</template>

<script>
import DatePick from "vue-date-pick";
import dateTime from "./DateTimeComponent";
export default {
  components: { DatePick, dateTime },
  props: [
    "widget_title",
    "ph_job_title",
    "ph_institute_title",
    "ph_desc",
    "ph_degree_title",
    "ph_start_date",
    "ph_end_date"
  ],
  data() {
    return {
      start_date: "",
      end_date: "",
      stored_educations: [],
      education: {
        institute_title: this.ph_institute_title,
        start_date: this.ph_start_date,
        end_date: this.ph_end_date,
        degree_title: this.ph_degree_title,
        description: this.ph_desc,
        count: 0
      },
      educations: [],
      freelancer_educations: [],
      count: 0
    };
  },
  methods: {
    getEducations() {
      let self = this;
      axios
        .get(APP_URL + "/freelancer/get-freelancer-educations")
        .then(function(response) {
          self.stored_educations = response.data.educations;
          console.log(self.stored_educations);
        });
    },
    addEducation: function() {
      var education_list_count = jQuery(".add-education-btn")
        .parents(".wt-tabsinfo")
        .find("ul#education-list span.education-inner-list li").length;
      console.log(education_list_count);
      if (this.$refs.educationlistelement) {
        this.education.count =
          education_list_count + this.$refs.educationlistelement.length;
      } else {
        this.education.count = education_list_count - 1;
      }
      this.educations.push(
        Vue.util.extend({}, this.education, this.education.count++)
      );
    },
    removeStoredEducation: function(index) {
      //console.log(this.stored_educations);
      //Vue.delete(this.stored_educations, index);
      this.stored_educations.splice(index, 1);
    }
  },
  mounted: function() {
    // var today = new Date();
    // var dd = today.getDate();
    // var mm = today.getMonth() + 1; //January is 0!
    // var yyyy = today.getFullYear();
    // this.start_date = yyyy + '-' + mm + '-' + dd;
    // this.end_date = yyyy + '-' + mm + '-' + dd;
    // this.education.start_date = yyyy + '-' + mm + '-' + dd;
    // this.education.end_date = yyyy + '-' + mm + '-' + dd;
    jQuery(document).on("click", ".delete-education", function(e) {
      e.preventDefault();
      var _this = jQuery(this);
      _this.parents(".education-inner-list-item").remove();
    });
  },
  created: function() {
    this.getEducations();
  }
};
</script>