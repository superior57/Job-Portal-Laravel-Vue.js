<template>
    <div class="wt-jobalerts">
        <b-alert :show="dismissCountDown"
                    dismissible
                    fade
                    :variant="this.message_class"
                    @dismissed="dismissCountDown=0"
                    @dismiss-count-down="countDownChanged">
                    <span :time="this.time">{{ message }}</span>
        </b-alert>
    </div>
</template>

<script>
export default {
  props: ['message','message_class','time'],
  data () {
    return {
     dismissSecs: this.time,
     dismissCountDown: 0,
     showDismissibleAlert: false
    }
  },
  methods: {
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    }
  },
  created() {
      flashVue.$on('showFlashMessage', this.showAlert)
  },
}
</script>

<style>
    .fade-enter{
        opacity: 0;
    }
    .fade-enter-active{
        transition: opacity 1s;
    }
    .fade-leave-active{
        transition: opacity 1s;
        opacity: 0;
    }
</style>
