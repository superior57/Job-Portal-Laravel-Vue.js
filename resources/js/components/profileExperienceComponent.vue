<template>
  <div :server_error_message="server_errors">
    <div class="wt-tabscontenttitle wt-addnew">
      <h2>{{ trans('lang.add_your_exp') }}</h2>
      <a
        href="javascript:void(0);"
        @click="addExperience"
        class="add-experience-btn"
      >{{ trans('lang.add_experience') }}</a>
    </div>
    <ul class="wt-experienceaccordion accordion" id="experience-list">
      <span v-if="stored_experiences" class="experience-inner-list">
        <li
          v-for="(stored_experience, index) in stored_experiences"
          :key="index"
          class="experience-element"
        >
          <div class="wt-accordioninnertitle">
            <span
              :id="'experienceaccordion-'+index+''"
              data-toggle="collapse"
              :data-target="'#experienceaccordioninner-'+index+''"
            >{{stored_experience.job_title}} ({{stored_experience.start_date}} - {{stored_experience.end_date}})</span>
            <div class="wt-rightarea">
              <a
                href="javascript:void(0);"
                class="wt-addinfo wt-skillsaddinfo"
                :id="'experienceaccordion-'+index+''"
                data-toggle="collapse"
                :data-target="'#experienceaccordioninner-'+index+''"
                aria-expanded="true"
              >
                <i class="lnr lnr-pencil"></i>
              </a>
              <a
                href="javascript:void(0);"
                class="wt-deleteinfo"
                @click="removeStoredExperience(index)"
              >
                <i class="lnr lnr-trash"></i>
              </a>
            </div>
          </div>
          <div
            class="wt-collapseexp collapse hide"
            :id="'experienceaccordioninner-'+index+''"
            :aria-labelledby="'experienceaccordion-'+index+''"
            data-parent="#accordion"
          >
            <fieldset>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  :value="stored_experience.job_title"
                  v-bind:name="'experience['+[index]+'][job_title]'"
                  class="form-control"
                  :placeholder="ph_job_title"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="stored_experience.start_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'experience['+[index]+'][start_date]'"
                  :value="stored_experience.start_date"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="stored_experience.end_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'experience['+[index]+'][end_date]'"
                  :value="stored_experience.end_date"
                />
              </div>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  :value="stored_experience.company_title"
                  v-bind:name="'experience['+[index]+'][company_title]'"
                  class="form-control"
                  :placeholder="ph_company_title"
                />
              </div>
              <div class="form-group">
                <textarea
                  :value="stored_experience.description"
                  v-bind:name="'experience['+[index]+'][description]'"
                  class="form-control"
                  :placeholder="ph_job_desc"
                ></textarea>
              </div>
              <div class="form-group">
                <span>{{ trans('lang.date_note') }}</span>
              </div>
            </fieldset>
          </div>
        </li>
      </span>
      <span class="experience-inner-list">
        <li
          v-for="(experience, index) in experiences"
          :key="index"
          ref="experiencelistelement"
          class="experience-inner-list-item"
        >
          <div class="wt-accordioninnertitle">
            <span
              :id="'experienceaccordion-'+experience.count+''"
              data-toggle="collapse"
              :data-parent="'#experienceaccordioninner-'+experience.count+''"
            >{{experience.job_title}} ( {{experience.start_date}} - {{experience.end_date}} )</span>
            <div class="wt-rightarea">
              <a
                href="javascript:void(0);"
                class="wt-addinfo wt-skillsaddinfo"
                :id="'experienceaccordion-'+experience.count+''"
                data-toggle="collapse"
                :data-target="'#experienceaccordioninner-'+experience.count+''"
                aria-expanded="true"
              >
                <i class="lnr lnr-pencil"></i>
              </a>
              <a href="javascript:void(0);" class="wt-deleteinfo delete-experience">
                <i class="lnr lnr-trash"></i>
              </a>
            </div>
          </div>
          <div
            class="wt-collapseexp collapse hide"
            :id="'experienceaccordioninner-'+experience.count+''"
            :aria-labelledby="'experienceaccordion-'+experience.count+''"
            data-parent="#accordion"
          >
            <fieldset>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  v-bind:name="'experience['+[experience.count]+'][job_title]'"
                  class="form-control"
                  :placeholder="ph_job_title"
                  v-model="experience.job_title"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="experience.start_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'experience['+[experience.count]+'][start_date]'"
                  :value="experience.start_date"
                  :placeholder="ph_start_date"
                />
              </div>
              <div class="form-group form-group-half">
                <date-pick v-model="experience.end_date"></date-pick>
                <input
                  type="hidden"
                  v-bind:name="'experience['+[experience.count]+'][end_date]'"
                  :value="experience.end_date"
                  :placeholder="ph_end_date"
                />
              </div>
              <div class="form-group form-group-half">
                <input
                  type="text"
                  v-bind:name="'experience['+[experience.count]+'][company_title]'"
                  class="form-control"
                  :placeholder="ph_company_title"
                />
              </div>
              <div class="form-group">
                <textarea
                  v-bind:name="'experience['+[experience.count]+'][description]'"
                  class="form-control"
                  :placeholder="ph_job_desc"
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
import Event from "../event.js";
export default {
  components: { DatePick },
  props: [
    "widget_title",
    "server_error_message",
    "server_errors",
    "ph_job_title",
    "ph_company_title",
    "ph_job_desc",
    "ph_start_date",
    "ph_end_date"
  ],
  data() {
    return {
      error_message: this.server_errors,
      start_date: "",
      end_date: "",
      stored_experiences: [],
      experience: {
        company_title: this.ph_company_title,
        start_date: this.ph_start_date,
        end_date: this.ph_end_date,
        job_title: this.ph_job_title,
        description: "",
        count: 0
      },
      experiences: [],
      freelancer_experiences: [],
      count: 0
    };
  },
  methods: {
    getExperiences() {
      let self = this;
      axios
        .get(APP_URL + "/freelancer/get-freelancer-experiences")
        .then(function(response) {
          self.stored_experiences = response.data.experiences;
        });
    },
    addExperience: function() {
      var expereience_list_count = jQuery(".add-experience-btn")
        .parents(".wt-tabsinfo")
        .find("ul#experience-list span.experience-inner-list li").length;
      if (this.$refs.experiencelistelement) {
        this.experience.count =
          expereience_list_count + this.$refs.experiencelistelement.length;
      } else {
        this.experience.count = expereience_list_count - 1;
      }
      this.experiences.push(
        Vue.util.extend({}, this.experience, this.experience.count++)
      );
    },
    removeStoredExperience: function(index) {
      this.stored_experiences.splice(index, 1);
    }
  },
  mounted: function() {
    Event.$emit("experience-component-render", { error: this.error_message });
    jQuery(document).on("click", ".delete-experience", function(e) {
      e.preventDefault();
      var _this = jQuery(this);
      _this.parents(".experience-inner-list-item").remove();
    });
  },
  created: function() {
    this.getExperiences();
  }
};
</script>
