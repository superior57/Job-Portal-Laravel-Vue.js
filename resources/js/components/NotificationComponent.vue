<template>
   
</template>

<script>
import Event from '../event.js';
export default {
  props: ['message'],
  data () {
    return {
      flash_message:this.message,
      options: {
        success: {
          position: "topRight",
          timeout: 3000
        },
        error: {
          position: "topRight",
          timeout: 4000
        },
        completed: {
          position: 'center',
          timeout: 1000,
        },
        info: {
          overlay: true,
          zindex: 999,
          position: 'center',
          timeout: 3000,
          onClosing: function(instance, toast, closedBy){
              vmpostJob.showCompleted('Process Comnpleted Successfully');
              }
          },
          message: {
              position: 'center',
              timeout: 900,
              progressBar:false
        }
      }
    }
  },
  methods: {
      // showCompleted(message){
      //     return this.$toast.success(' ', message, this.notificationSystem.options.completed);
      // },
      showInfo(message){
          return this.$toast.info(' ', message, this.notificationSystem.options.info);
      },
      showSuccess(message){
          return this.$toast.success(' ', message, this.notificationSystem.options.success);
      },
      showError(error){
          return this.$toast.error(' ', error, this.notificationSystem.options.error);
      },
      showMessage(message){
          return this.$toast.success(' ', message, this.notificationSystem.options.message);
      },
  },
  mounted(){
    Event.$on('showCompletedMessage', function(data){
        console.log(data);
        return this.$toast.success(' ', data.message, this.notificationSystem.options.completed);
    });
    //Event.$on('showCompletedMessage', 'hello');
  },
  created() {
    // Event.$on('showCompletedMessage', function(data){
    //     console.log(data);
    //     return this.$toast.success(' ', data.message, this.notificationSystem.options.completed);
    // });
    //Event.$on('showCompletedMessage', this.showCompleted, {'message':this.flash_message})
  },
}
</script>