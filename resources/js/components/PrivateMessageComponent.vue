<template>
  <div>
    <div class="preloader-section" v-if="isShow" v-cloak>
      <div class="preloader-holder">
        <div class="loader"></div>
      </div>
    </div>
    <ul id="accordion" class="wt-historycontentcol">
      <li class="wt-historycolhead">
        <h3>
          <span>{{ trans('lang.date') }}</span>
          <span>{{ trans('lang.msg') }}</span>
          <span>{{ trans('lang.attachment') }}</span>
        </h3>
      </li>
      <span v-for="(message, index) in messages" :key="index">
        <li class="collapsed" data-toggle="collapse" :data-target="'#collapseone-'+message.id">
          <div class="wt-dateandmsg">
            <span>
              <img :src="message.user_image" alt="img description" />
              {{message.created_at}}
            </span>
            <span>{{message.excerpt}}</span>
          </div>
          <div class="wt-rightarea wt-msgbtns">
            <a href="javascript:void(0);" class="wt-btn wt-msgbtn">
              <i class="lnr lnr-chevron-up"></i>
              {{ trans('lang.msg') }}
            </a>
            <a
              :href="attahcments_url+message.id"
              class="wt-btn wt-attachmentbtn"
              v-if="message.attachments == 1"
            >
              <i class="lnr lnr-download"></i>
              {{ trans('lang.attachment') }}
            </a>
          </div>
        </li>
        <li
          class="wt-historydescription collapse"
          :id="'collapseone-'+message.id"
          data-parent="#accordion"
        >
          <div class="wt-description">{{message.content}}</div>
        </li>
      </span>
    </ul>
    <form class="wt-formtheme wt-userform" id="send_message_form" @submit.prevent="sendMessage()">
      <fieldset>
        <div class="form-group">
          <textarea class="wt-tinymceeditor" id="wt-tinymceeditor" :placeholder="placeholder"></textarea>
        </div>
        <div class="wt-attachmentsholder">
          <div class="lara-attachment-files">
            <job_attachments :temp_url="this.upload_tmp_url" :img_ref="'multiple_attachments'"></job_attachments>
            <div class="form-group input-preview">
              <ul class="wt-attachfile dropzone-previews"></ul>
            </div>
          </div>
        </div>
        <input type="hidden" :value="this.recipent_id" name="recipent_id" />
        <input type="hidden" :value="this.id" name="proposal_id" />
        <div class="form-group wt-btnarea">
          <button type="submit" class="wt-btn">{{trans('lang.btn_sendnow')}}</button>
        </div>
      </fieldset>
    </form>
  </div>
</template>
<script>
export default {
  props: ["id", "recipent_id", "upload_tmp_url", "placeholder", "project_type"],
  data() {
    return {
      isShow: false,
      proposal_id: this.id,
      recipent: this.recipent_id,
      messages: [],
      received_messages: [],
      counts: 0,
      attahcments_url: APP_URL + "/proposal/download/message-attachments/",
      notificationSystem: {
        options: {
          completed: {
            position: "center",
            timeout: 1000
          },
          error: {
            position: "topRight",
            timeout: 2000
          }
        }
      }
    };
  },
  methods: {
    showCompleted(message) {
      return this.$toast.success(
        " ",
        message,
        this.notificationSystem.options.completed
      );
    },
    showError(error) {
      return this.$toast.error(
        " ",
        error,
        this.notificationSystem.options.error
      );
    },
    sendMessage() {
      var type = "";
      if (this.project_type) {
        type = this.project_type;
      } else {
        type = "job";
      }

      let register_Form = document.getElementById("send_message_form");
      let form_data = new FormData(register_Form);
      var description = tinyMCE.get("wt-tinymceeditor").getContent();
      form_data.append("description", description);
      form_data.append("project_type", type);
      this.isShow = true;
      var self = this;
      axios
        .post(APP_URL + "/proposal/send-message", form_data)
        .then(function(response) {
          self.isShow = false;
          if (response.data.type == "success") {
            jQuery(".wt-attachfile")
              .find("li")
              .remove();
            jQuery(".wt-attachfile")
              .find("input[type=hidden]")
              .remove();
            tinyMCE.activeEditor.setContent("");
            self.getMessages();
            self.showCompleted(response.data.message);
          } else if (response.data.type == "error") {
            jQuery(".wt-attachfile")
              .find("li")
              .remove();
            jQuery(".wt-attachfile")
              .find("input[type=hidden]")
              .remove();
            tinyMCE.activeEditor.setContent("");
            self.showError(response.data.message);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getMessages() {
      if (this.project_type) {
        var type = this.project_type;
      } else {
        var type = "job";
      }
      let self = this;
      axios
        .post(APP_URL + "/proposal/get-private-messages", {
          id: self.proposal_id,
          recipent_id: self.recipent,
          project_type: type
        })
        .then(function(response) {
          console.log(response.data);
          if (response.data.type == "success") {
            self.messages = response.data.messages;
            console.log(self.messages);
          }
        });
    }
  },
  mounted: function() {},
  created: function() {
    this.getMessages();
  }
};
</script>