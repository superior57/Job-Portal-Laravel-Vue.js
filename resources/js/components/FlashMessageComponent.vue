<script>
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';
Vue.use(VueIziToast);
export default {
    props: ['type','message'],
 data () {
    return {
        notificationSystem: {
        options: {
          show: {
            theme: "dark",
            icon: "icon-person",
            position: "topCenter",
            progressBarColor: "rgb(0, 255, 184)",
            buttons: [
              [
                "<button>Ok</button>",
                function(instance, toast) {
                  alert("Hello world!");
                },
                true
              ],
              [
                "<button>Close</button>",
                function(instance, toast) {
                  instance.hide(
                    {
                      transitionOut: "fadeOutUp",
                      onClosing: function(instance, toast, closedBy) {
                        console.info("closedBy: " + closedBy);
                      }
                    },
                    toast,
                    "buttonName"
                  );
                }
              ]
            ],
            onOpening: function(instance, toast) {
              console.info("callback abriu!");
            },
            onClosing: function(instance, toast, closedBy) {
              console.info("closedBy: " + closedBy);
            }
          },
          success: {
            position: "bottomRight"
          },
          error: {
            position: "topRight"
          },
        }
      }
    }
  },
  methods: {
      showMessage(message, type){
          this.$toast.show(message, notificationSystem.options.type);
          console.log('hello');
      }
  },
  created() {
      flashMessageVue.$on('showMessage', this.showMessage, message, type)
  },
};
</script> 