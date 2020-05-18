/**
 * Load all the javascript by using Vue.js and write all your JS code
 * in this file.
 */

require('./bootstrap');
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import 'vue-date-pick/dist/vueDatePick.css';
import datePicker from 'vue-bootstrap-datetimepicker';
import '../../public/js/tinymce/tinymce.min.js';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';
import SmoothScrollbar from 'vue-smooth-scrollbar';
import VueSweetalert2 from 'vue-sweetalert2';
import { VueStars } from "vue-stars";
import { Printd } from "printd";
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';
import Vuebar from 'vuebar';
import Event from './event.js';
import * as VueGoogleMaps from 'vue2-google-maps'
import Verte from 'verte';
import 'verte/dist/verte.css';
import { Collapse } from 'ant-design-vue';
import './mixins/helper.js'

Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};

Vue.filter('two_digits', function (value) {
    if (value.toString().length <= 1) {
        return "0" + value.toString();
    }
    return value.toString();
});

Vue.use(VueGoogleMaps, {
    load: {
        key: Map_key,
        libraries: 'places',
    },
})
Vue.use(VueIziToast);
Vue.use(SmoothScrollbar)
Vue.use(VueSweetalert2);
Vue.use(Vuebar);
Vue.use(Collapse);

window.Vue = require('vue');
window.flashVue = new Vue();
window.deleteVue = new Vue();
window.flashMessageVue = new Vue();
Vue.use(datePicker);
Vue.use(BootstrapVue);

Vue.component('verte', Verte);
Vue.component('upload-file', require('./components/UploadFileComponent.vue').default);
Vue.component('upload-image', require('./components/UploadImageComponent.vue').default);
Vue.component('flash_messages', require('./components/FlashMessages.vue').default);
Vue.component('switch_button', require('./components/SwitchButton.vue').default);
Vue.component('user_skills', require('./components/ProfileSkillComponent.vue').default);
Vue.component('freelancer_experience', require('./components/ProfileExperienceComponent.vue').default);
Vue.component('freelancer_education', require('./components/ProfileEducationComponent.vue').default);
Vue.component('freelancer_project', require('./components/ProfileProjectComponent.vue').default);
Vue.component('freelancer_award', require('./components/ProfileAwardComponent.vue').default);
Vue.component('job_attachments', require('./components/UploadJobAttachmentComponent.vue').default);
Vue.component('job_multiple-attachments', require('./components/JobMultipleAttachmentComponent.vue').default);
Vue.component('job_skills', require('./components/JobSkillComponent.vue').default);
Vue.component('private-message', require('./components/PrivateMessageComponent.vue').default);
Vue.component('rating', require('./components/RatingComponent.vue').default);
Vue.component('search-form', require('./components/SearchComponent.vue').default);
require('./components/FlashMessageComponent.vue').default
Vue.component("vue-stars", VueStars)
Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead)
Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('chat-users', require('./components/ChatUserComponent.vue').default);
Vue.component('chat-messages', require('./components/ChatMessageComponent.vue').default);
Vue.component('chat-area', require('./components/ChatAreaComponent.vue').default);
Vue.component('message-center', require('./components/ChatComponent.vue').default);
Vue.component('emoji-textarea', require('./components/emojiTexeareaComponent.vue').default);
Vue.component('delete', require('./components/DeleteRecordComponent.vue').default);
Vue.component('countdown', require('./components/CountdownComponent.vue').default);
Vue.component('experience', require('./components/FreelancerExperienceComponent.vue').default);
Vue.component('education', require('./components/FreelancerEducationComponent.vue').default);
Vue.component('crafted_project', require('./components/FreelancerCraftedProjetcsComponent.vue').default);
Vue.component('custom-map', require('./components/map.vue').default);
Vue.component('dashboard-icon', require('./components/DashboardIconUploadComponent.vue').default);
Vue.component('image-attachments', require('./components/UploadServiceAttachmentComponent.vue').default);
Vue.component('freelancer-reviews', require('./components/FreelancerReviewsComponent.vue').default);
Vue.component('job-expiry', require('./components/JobExperyComponent.vue').default);
Vue.component('create-page', require('./components/pageBuilder/create.vue').default);
Vue.component('edit-page', require('./components/pageBuilder/edit.vue').default);
Vue.component('show-page', require('./components/pageBuilder/show/index.vue').default);
Vue.component('second-slider', require('./components/pageBuilder/show/sliders/style2.vue').default);
Vue.component('third-slider', require('./components/pageBuilder/show/sliders/style3.vue').default);

jQuery(document).ready(function () {
    jQuery(document).on('click', '.wt-back', function (e) {
        e.preventDefault();
        jQuery('.wt-back').parents('.wt-messages-holder').removeClass('wt-openmsg');
    });

    jQuery(document).on('click', '.wt-respsonsive-search', function (e) {
        e.preventDefault();
        jQuery('.wt-headervtwo').addClass('wt-search-have show-sform');
    });

    jQuery(document).on('click', '.wt-search-remove', function (e) {
        e.preventDefault();
        jQuery('.wt-search-have').removeClass('show-sform');
    })

    jQuery(document).on('click', '.wt-ad', function (e) {
        e.preventDefault();
        jQuery('.wt-ad').parents('.wt-messages-holder').addClass('wt-openmsg');
    });
    jQuery('.wt-navigation ul li.menu-item-has-children, .wt-navdashboard ul li.menu-item-has-children').prepend('<span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>');
    jQuery('.wt-navigation ul li.menu-item-has-children span').on('click', function () {
        jQuery(this).parent('li').toggleClass('wt-open');
        jQuery(this).next().next().slideToggle(300);
    });

    jQuery('.wt-navigation ul li.menu-item-has-children > a, .wt-navigation ul li.page_item_has_children > a').on('click', function () {
        if (location.href.indexOf("#") != -1) {
            jQuery(this).parent('li').toggleClass('wt-open');
            jQuery(this).next().slideToggle(300);
        } else {
            //do nothing
        }
    });

    jQuery('.wt-navdashboard ul li.menu-item-has-children').on('click', function () {
        jQuery(this).toggleClass('wt-open');
        jQuery(this).find('.sub-menu').slideToggle(300);
    });


    function fixedNav() {
        $(window).scroll(function () {
            var $pscroll = $(window).scrollTop();
            if ($pscroll > 76) {
                $('.wt-sidebarwrapper').addClass('wt-fixednav');
                $('.wt-section-create').addClass('wt-fixednav');
            } else {
                $('.wt-sidebarwrapper').removeClass('wt-fixednav');
                $('.wt-section-create').removeClass('wt-fixednav');
            }
        });
    }
    fixedNav();

    jQuery('.filter-records').on('keyup', function () {
        var content = jQuery(this).val();
        console.log(content);
        jQuery(this).parents('fieldset').siblings('fieldset').find('.wt-checkbox:contains(' + content + ')').show();
        jQuery(this).parents('fieldset').siblings('fieldset').find('.wt-checkbox:not(:contains(' + content + '))').hide();
    });

    jQuery('#wt-btnclosechat, #wt-getsupport').on('click', function () {
        jQuery('.wt-chatbox').slideToggle();
    });

    if (jQuery('.wt-verticalscrollbar').length > 0) {
        var _wt_verticalscrollbar = jQuery('.wt-verticalscrollbar');
        _wt_verticalscrollbar.mCustomScrollbar({
            axis: "y",
        });
    }

    jQuery('#wt-loginbtn, .wt-loginheader a').on('click', function (event) {
        event.preventDefault();
        jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
    });

    if (jQuery('#wt-btnmenutoggle').length > 0) {
        jQuery("#wt-btnmenutoggle").on('click', function (event) {
            event.preventDefault();
            jQuery('#wt-wrapper').toggleClass('wt-openmenu');
            jQuery('body').toggleClass('wt-noscroll');
            jQuery('.wt-navdashboard ul.sub-menu').hide();
        });
    }

    if (jQuery('#wt-btnsectiontoggle').length > 0) {
        jQuery("#wt-btnsectiontoggle").on('click', function (event) {
            console.log('click')
            event.preventDefault();
            jQuery('#wt-wrapper').toggleClass('wt-section-openmenu');
            jQuery('body').toggleClass('wt-noscroll');
            // jQuery('.wt-section-area').hide();
        });
    }

    tinymce.init({
        selector: 'textarea.wt-tinymceeditor',
        height: 300,
        theme: 'modern',
        plugins: ['code advlist autolink lists link image charmap print preview hr anchor pagebreak'],
        menubar: false,
        statusbar: false,
        toolbar1: 'undo redo | insert | image | styleselect | bold italic | alignleft aligncenter alignright alignjustify code',
        image_advtab: true,
        inline_styles : true,
        remove_script_host: false,
        extended_valid_elements  : "span[style],i[class]",
        relative_urls: false
    });

    tinymce.init({
        selector: 'textarea.wt-tinymceemployereditor',
        height: 300,
        theme: 'modern',
        plugins: ['code advlist autolink lists link image charmap print preview hr anchor pagebreak'],
        menubar: false,
        statusbar: false,
        toolbar1: 'undo redo | insert | image | styleselect | bold italic | alignleft aligncenter alignright alignjustify code',
        image_advtab: true,
        inline_styles : true,
        remove_script_host: false,
        extended_valid_elements  : "span[style],i[class]",
        relative_urls: false
    });

    var height = jQuery('#wt-header').outerHeight();
    jQuery('.wt-section-create').css('margin-top', height)

});

if (document.getElementById("wt-header")) {
    const vmHeader = new Vue({
        el: '#wt-header',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
    });
}

if (document.getElementById("slider")) {
    const vmHeader = new Vue({
        el: '#slider',
        mounted: function () {
            
        },
    });
}

if (document.getElementById("orders")) {
    const vmHeader = new Vue({
        el: '#orders',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            loading:false, 
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
        },
        methods: { 
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            showOrderDetail: function (id) {
                var modal_ref = 'myModalRef-' + id;
                if (this.$refs[modal_ref]) {
                    this.$refs[modal_ref].show();
                } else {
                    this.showError(Vue.prototype.trans('lang.review_not_found'),);
                }
            },
            downloadAttachment: function (type, attachment, id) {
                window.location.replace(APP_URL+'/get/'+type+'/'+attachment+'/'+id);
            },
            changeStatus: function (id) {
                this.loading = true;
                var status = document.getElementById('order_status_tab'+id).value;
                var self = this;
                axios.post(APP_URL + '/admin/order/change-status', { 
                    status: status,
                    id: id,
                })
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            window.location.reload();
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
        }
        
    });
}

if (document.getElementById("message_center")) {
    const vmpassReset = new Vue({
        el: '#message_center',
        mounted: function () { },
        data: {},
        methods: {}
    });
}

if (document.getElementById("dashboard")) {
    const VueDashboard = new Vue({
        el: '#dashboard',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {},
        methods: {}
    });
}

if (document.getElementById("home")) {
    const vmstripePass = new Vue({
        el: '#home',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            show: false,
        },
        methods: {}
    });
}

if (document.getElementById("registration")) {
    const registration = new Vue({
        el: '#registration',
        mounted: function () {

        },
        data: {
            notificationSystem: {
                options: {
                    error: {
                        position: "topRight",
                        timeout: 4000
                    }
                }
            },
            step: 1,
            user_email: '',
            first_name: '',
            last_name: '',
            form_step1: {
                email_error: '',
                is_email_error: false,
                first_name_error: '',
                is_first_name_error: false,
                last_name_error: '',
                is_last_name_error: false,
            },
            form_step2: {
                locations_error: '',
                is_locations_error: false,
                password_error: '',
                is_password_error: false,
                password_confirm_error: '',
                is_password_confirm_error: false,
                termsconditions_error: '',
                is_termsconditions_error: false,
            },
            loading: false,
            user_role: 'employer',
            is_show: true,
            error_message: ''
        },
        methods: {
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            prev: function () {
                this.step--;
            },
            next: function () {
                this.step++;
            },
            selectedRole: function (role) {
                if (role == 'employer') {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
                console.log(role);
            },
            checkStep1: function (e) {
                this.form_step1.first_name_error = '';
                this.form_step1.is_first_name_error = false;
                this.form_step1.last_name_error = '';
                this.form_step1.is_last_name_error = false;
                this.form_step1.email_error = '';
                this.form_step1.is_email_error = false;
                var self = this;
                let register_Form = document.getElementById('register_form');
                let form_data = new FormData(register_Form);
                axios.post(APP_URL + '/register/form-step1-custom-errors', form_data)
                    .then(function (response) {
                        self.next();
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.form_step1.first_name_error = error.response.data.errors.first_name[0];
                            self.form_step1.is_first_name_error = true;
                        }
                        if (error.response.data.errors.last_name) {
                            self.form_step1.last_name_error = error.response.data.errors.last_name[0];
                            self.form_step1.is_last_name_error = true;
                        }
                        if (error.response.data.errors.email) {
                            self.form_step1.email_error = error.response.data.errors.email[0];
                            self.form_step1.is_email_error = true;
                        }
                    });
            },
            checkStep2: function (error_message) {
                this.error_message = error_message;
                let register_Form = document.getElementById('register_form');
                let form_data = new FormData(register_Form);
                this.form_step2.password_error = '';
                this.form_step2.is_password_error = false;
                this.form_step2.password_confirm_error = '';
                this.form_step2.is_password_confirm_error = false;
                this.form_step2.termsconditions_error = '';
                this.form_step2.is_termsconditions_error = false;
                var self = this;
                axios.post(APP_URL + '/register/form-step2-custom-errors', form_data).
                    then(function (response) {
                        self.submitUser();
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.password) {
                            self.form_step2.password_error = error.response.data.errors.password[0];
                            self.form_step2.is_password_error = true;
                        }
                        if (error.response.data.errors.password_confirmation) {
                            self.form_step2.password_confirm_error = error.response.data.errors.password_confirmation[0];
                            self.form_step2.is_password_confirm_error = true;
                        }
                        if (error.response.data.errors.termsconditions) {
                            self.form_step2.termsconditions_error = error.response.data.errors.termsconditions[0];
                            self.form_step2.is_termsconditions_error = true;
                        }
                    });
            },
            submitUser: function () {
                this.loading = true;
                let register_Form = document.getElementById('register_form');
                let form_data = new FormData(register_Form);
                form_data.append('email', this.user_email);
                form_data.append('first_name', this.first_name);
                form_data.append('last_name', this.last_name);
                var self = this;
                axios.post(APP_URL + '/register', form_data)
                    .then(function (response) {
                        console.log(response.data.type);
                        self.loading = false;
                        if (response.data.type == 'success') {
                            if (response.data.email == 'not_configured') {
                                window.location.replace(response.data.url);
                            } else {
                                self.next();
                            }
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.custom_error = true;
                            if (response.data.email_error) self.form_errors.push(response.data.email_error);
                            if (response.data.password_error) self.form_errors.push(response.data.password_error);
                        }
                        else if (response.data.type == 'server_error') {
                            self.loading = false;
                            self.custom_error = true;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.status == 500) {
                            self.showError(self.error_message);
                        }
                    });
            },
            verifyCode: function () {
                this.loading = true;
                let register_Form = document.getElementById('verification_form');
                let form_data = new FormData(register_Form);
                var self = this;
                axios.post(APP_URL + '/register/verify-user-code', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.next();
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loginRegisterUser: function () {
                var self = this;
                axios.post(APP_URL + '/register/login-register-user')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            window.location.href = APP_URL + '/' + response.data.role + '/dashboard';
                        } else if (response.data.type == 'error') {
                            self.error_message = response.data.message;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            scrollTop: function () {
                var _scrollUp = jQuery('html, body');
                _scrollUp.animate({ scrollTop: 0 }, 'slow');
                jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
            },
        }
    });
}

if (document.getElementById("skill-list")) {
    const vmskillList = new Vue({
        el: '#skill-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            skillID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-skills").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-skills', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/skills');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("pass-reset")) {
    const vmpassReset = new Vue({
        el: '#pass-reset',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {},
        methods: {}
    });
}

if (document.getElementById("dpt-list")) {
    const vmdptList = new Vue({
        el: '#dpt-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            dptID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-dpts").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-dpts', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/departments');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("pages-list")) {
    const vmpageList = new Vue({
        el: '#pages-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            // this.getPageOption();
        },
        data: {
            show_page_banner: true,
            show_page: false,
            page_banner: false,
            pageID: "",
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
        },
        methods: {
            removeImage: function (id) {
                this.page_banner = true;
                document.getElementById(id).value = '';
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            // submitPage: function (msg) {
            //     let page_Form = document.getElementById('pages');
            //     let form_data = new FormData(page_Form);
            //     var description = tinyMCE.get('wt-tinymceeditor').getContent();
            //     form_data.append('content', description);
            //     var self = this;
            //     axios.post(APP_URL + '/admin/store-page', form_data)
            //         .then(function (response) {
            //             if (response.data.type == 'success') {
            //                 self.showMessage(msg);
            //                 setTimeout(function () {
            //                     window.location.replace(APP_URL + '/admin/pages');
            //                 }, 4000)
            //             } else {
            //                 self.showError(response.data.message);
            //             }
            //         })
            //         .catch(function (error) {
            //             if (error.response.data.errors.title) {
            //                 self.showError(error.response.data.errors.title[0]);
            //             }
            //             if (error.response.data.errors.content) {
            //                 self.showError(error.response.data.errors.content[0]);
            //             }
            //         });
            // },
            // getPageOption: function () {
            //     var segment_str = window.location.pathname;
            //     var segment_array = segment_str.split('/');
            //     var id = segment_array[segment_array.length - 1];
            //     if (segment_str == '/admin/pages/edit-page/' + id) {
            //         let self = this;
            //         axios.post(APP_URL + '/admin/get-page-option', {
            //             page_id: id
            //         })
            //             .then(function (response) {
            //                 if (response.data.type == 'success') {
            //                     if (response.data.show_page == 'true') {
            //                         self.show_page = true;
            //                     } else {
            //                         self.show_page = false;
            //                     }
            //                     if (response.data.show_banner == 'true') {
            //                         self.show_page_banner = true;
            //                     } else {
            //                         self.show_page_banner = false;
            //                     }
            //                 }
            //             });
            //     }
            // },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-pages").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-pages', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/pages');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("reviews")) {
    const vmdptList = new Vue({
        el: '#reviews',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            optionID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-rev-options").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-rev-options', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/review-options');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("delivery-time")) {
    const vmdeliverytime = new Vue({
        el: '#delivery-time',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            optionID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-delivery-time").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-delivery-time', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/delivery-time');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("response-time")) {
    const responsetime = new Vue({
        el: '#response-time',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            optionID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-response-time").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-response-time', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/response-time');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("cat-list")) {
    const vmcatList = new Vue({
        el: '#cat-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            uploaded_image: false,
            color: '',
            rgb: '',
            wheel: '',
            is_show: false
        },
        components: { Verte },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-cats").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-cats', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/categories');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("badge-list")) {
    const vmbadge = new Vue({
        el: '#badge-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getBadgeColor();
        },
        components: { Verte },
        data: {
            uploaded_image: false,
            color: '',
            is_show: false
        },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            getBadgeColor: function () {
                var self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var id = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/badge/get-color', {
                    id: id,
                })
                .then(function (response) {
                    if (response.data.type = 'success') {
                        self.color = response.data.color;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-badges").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-badges', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/badges');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("lang-list")) {
    const vmdptList = new Vue({
        el: '#lang-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            langID: "",
            is_show: false
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-langs").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-langs', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/languages');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("location")) {
    var location = new Vue({
        el: '#location',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            locationID: "",
            message: '',
            alert_message: '',
            custom_error: false,
            uploaded_image: false,
            is_show: false,
        },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-locs").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-locs', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/locations');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    })
}
if (document.getElementById("user_profile")) {
    const freelancerProfile = new Vue({
        el: '#user_profile',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
            // delete gallery video
            var countvideosLength = jQuery('.social-icons-content').find('.wrap-social-icons').length
            if (countvideosLength) {
                this.video.count = countvideosLength -1;
            } else {
                this.video.count = 0;
            }
            jQuery(document).on('click', '.delete-video', function (e) {
                e.preventDefault()
                var _this = jQuery(this)
                _this.parents('.wrap-social-icons').remove()
            })
        },
        created: function () {
            Event.$on('award-component-render', (data) => {
                this.server_error = data.error;
            })
            Event.$on('experience-component-render', (data) => {
                this.experience_server_error = data.error;
            })
        },
        data: {
            videos: [],
            video:{
                url:'',
                count:0,
            },
            loading: false,
            server_error: '',
            experience_server_error: '',
            disable_btn: '',
            saved_class: 'far fa-heart',
            job_saved_class: 'far fa-heart',
            click_to_save: '',
            text: Vue.prototype.trans('lang.click_to_save'),
            follow_text: Vue.prototype.trans('lang.click_to_follow'),
            disable_job_save: '',
            disable_follow: '',
            job_click_to_save: '',
            avater_id: 'profile_image',
            banner_id: 'profile_banner',
            avater_ref: 'profile_image_ref',
            banner_ref: 'profile_banner_ref',
            uploaded_image: false,
            uploaded_banner: false,
            report: {
                reason: '',
                description: '',
                id: '',
                model: 'App\\User',
                report_type: '',
            },
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        class: 'complete_notification'
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        class: 'info_notification',
                        onClosing: function (instance, toast, closedBy) {
                            freelancerProfile.showCompleted(Vue.prototype.trans('lang.profile_update_success'));
                        }
                    }
                }
            },
            is_popup: false,
        },
        ready: function () {

        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            addVideo: function () {
                console.log(this.video.count);
                this.videos.push(Vue.util.extend({}, this.video, this.video.count++))
                console.log(this.video.count);
            },
            removeVideo: function (index) {
                Vue.delete(this.videos, index)
            },
            submitProfileSettings: function () {
                this.loading = true;
                var self = this;
                var profile_form = document.getElementById('profile_form');
                let form_data = new FormData(profile_form);
                axios.post(APP_URL + '/freelancer/profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.next();
                        } else if (response.data.type == 'error') {
                            self.custom_error = true;
                            if (response.data.email_error) self.form_errors.push(response.data.email_error);
                            if (response.data.password_error) self.form_errors.push(response.data.password_error);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            removeImage: function (event) {
                this.uploaded_image = true;
                document.getElementById("hidden_avater").value = '';
            },
            removeBanner: function (event) {
                this.uploaded_banner = true;
                document.getElementById("hidden_banner").value = '';
            },
            submitFreelancerProfile: function () {
                var self = this;
                var profile_data = document.getElementById('freelancer_profile');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/freelancer/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(Vue.prototype.trans('lang.saving_profile'));
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.gender) {
                            self.showError(error.response.data.errors.gender[0]);
                        }
                        if (error.response.data.errors.latitude) {
                            self.showError(error.response.data.errors.latitude[0]);
                        }
                        if (error.response.data.errors.longitude) {
                            self.showError(error.response.data.errors.longitude[0]);
                        }
                    });
            },
            submitExperienceEduction: function () {
                var self = this;
                var exp_edu_data = document.getElementById('experience_form');
                let form_data = new FormData(exp_edu_data);
                axios.post(APP_URL + '/freelancer/store-experience-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            self.showError(self.experience_server_error);
                        }
                    });
            },
            submitPaymentSettings: function () {
                var self = this;
                var payment = document.getElementById('payment_settings');
                let form_data = new FormData(payment);
                axios.post(APP_URL + '/freelancer/store-payment-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.processing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/freelancer/dashboard');
                            }, 4000);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.payout_id) {
                            self.showError(error.response.data.errors.payout_id[0]);
                        }
                    });
            },
            submitAwardsProjects: function () {
                var self = this;
                var awards_projects = document.getElementById('awards_projects');
                let form_data = new FormData(awards_projects);
                axios.post(APP_URL + '/freelancer/store-project-award-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            self.showError(self.server_error);
                        }
                    });
            },
            submitEmployerProfile: function () {
                var self = this;
                var profile_data = document.getElementById('employer_data');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/employer/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.process);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/employer/dashboard');
                            }, 4000);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.latitude) {
                            self.showError(error.response.data.errors.latitude[0]);
                        }
                        if (error.response.data.errors.longitude) {
                            self.showError(error.response.data.errors.longitude[0]);
                        }
                    });
            },
            submitAdminProfile: function () {
                var self = this;
                var profile_data = document.getElementById('admin_data');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/admin/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.process);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/profile');
                            }, 4000);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                    });
            },
            sendOffer: function (auth_user) {
                if (auth_user == 1) {
                    this.$refs.myModalRef.show();
                } else {
                    jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
                }
            },
            submitProjectOffer: function (id) {
                this.loading = true;
                let offer_form = document.getElementById('send-offer-form');
                let form_data = new FormData(offer_form);
                form_data.append('freelancer_id', id);
                var self = this;
                axios.post(APP_URL + '/store/project-offer', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.$refs.myModalRef.hide();
                            self.showInfo(response.data.progressing);
                            self.success_message = response.data.message;
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.projects) {
                            self.showError(error.response.data.errors.projects[0]);
                        }
                        if (error.response.data.errors.desc) {
                            self.showError(error.response.data.errors.desc[0]);
                        }
                    });
            },
            openChatBox: function () {
                if (this.is_popup == false) {
                    this.is_popup = true;
                } else {
                    this.is_popup = false;
                }
            },
            submitReport: function (id, report_type) {
                this.report.report_type = report_type;
                this.report.id = id;
                var self = this;
                axios.post(APP_URL + '/submit-report', self.report)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }

                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            if (error.response.data.errors.description) {
                                self.showError(error.response.data.errors.description[0]);
                            }
                            if (error.response.data.errors.reason) {
                                self.showError(error.response.data.errors.reason[0]);
                            }
                        }
                    });
            },
            add_wishlist: function (element_id, id, column, saved_text) {
                var self = this;
                axios.post(APP_URL + '/user/add-wishlist', {
                    id: id,
                    column: column,
                })
                    .then(function (response) {
                        if (response.data.authentication == true) {
                            if (response.data.type == 'success') {
                                if (column == 'saved_freelancer') {
                                    jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                    jQuery('#' + element_id).addClass('wt-clicksave');
                                    jQuery('#' + element_id).find('.save_text').text(saved_text);
                                    self.disable_btn = 'wt-btndisbaled';
                                    self.text = Vue.prototype.trans('lang.btn_save');
                                    self.saved_class = 'fa fa-heart';
                                    self.click_to_save = 'wt-clicksave'
                                }
                                else if (column == 'saved_employers') {
                                    jQuery('#' + element_id).addClass('wt-btndisbaled wt-clicksave');
                                    jQuery('#' + element_id).text(saved_text);
                                    jQuery('#' + element_id).parents('.wt-clicksavearea').find('i').addClass('fa fa-heart');
                                    self.disable_follow = 'wt-btndisbaled';
                                    self.follow_text = saved_text;
                                }
                                else if (column == 'saved_jobs') {
                                    jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                    jQuery('#' + element_id).addClass('wt-clicksave');
                                    jQuery('#' + element_id).find('.save_text').text(saved_text);
                                }
                                self.showMessage(response.data.message);
                            } else {
                                self.showError(response.data.message);
                            }
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getWishlist: function () {
                var self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/profile/get-wishlist', {
                    slug: slug
                })
                    .then(function (response) {
                        if (response.data.user_type == 'freelancer') {
                            if (response.data.current_freelancer == 'true') {
                                self.disable_btn = 'wt-btndisbaled';
                                self.text = Vue.prototype.trans('lang.saved');
                                self.saved_class = 'fa fa-heart';
                            }
                        } else if (response.data.user_type == 'employer') {
                            if (response.data.employer_jobs == 'true') {
                                self.disable_btn = 'wt-btndisbaled';
                                self.text = Vue.prototype.trans('lang.saved');
                                self.saved_class = 'fa fa-heart';
                            }
                            if (response.data.current_employer == 'true') {
                                self.disable_follow = 'wt-btndisbaled';
                                self.follow_text = Vue.prototype.trans('lang.following');
                            }
                        }
                    });
            },
        }
    });
}

//Settings
if (document.getElementById("settings")) {
    const VueSettings = new Vue({
        el: "#settings",
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
            //Delete Social
            var count_social_length = jQuery('.social-icons-content').find('.wrap-social-icons').length;
            count_social_length = count_social_length - 1;
            this.social.count = count_social_length;
            jQuery(document).on('click', '.delete-social', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.wrap-social-icons').remove();
            });
            //Delete Search
            var count_social_length = jQuery('.search-content').find('.wrap-search').length;
            count_social_length = count_social_length - 1;
            this.social.count = count_social_length;
            jQuery(document).on('click', '.delete-search', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.wrap-search').remove();
            });
        },
        components: { Verte },
        data: {
            enable_sandbox:false,
            show_reg_form_banner:false,
            enable_breadcrumbs: false,
            enable_completed_projects: false,
            show_emplyr_inn_sec: false,
            show_f_banner: false,
            employer_package: true,
            enable_packages: false,
            payment_mode: false,
            show_emp_banner: false,
            show_job_banner: false,
            show_service_banner: false,
            show_article_banner: false,
            primary_color: '#ff5851',
            enable_theme_color: false,
            enable_color_text: '',
            cat_section_display: false,
            home_section_display: false,
            show_services_section: true,
            chat_display: false,
            app_section_display: false,
            uploaded_logo: false,
            uploaded_banner: false,
            uploaded_avatar: false,
            uploaded_banner_bg: false,
            uploaded_banner_image: false,
            uploaded_section_bg: false,
            uploaded_download_app_img: false,
            footer_logo: false,
            logo: false,
            register_image: false,
            f_inner_banner: false,
            e_inner_banner: false,
            job_inner_banner: false,
            service_inner_banner: false,
            article_inner_banner: false,
            clear_cache: false,
            clear_views: false,
            clear_routes: false,
            favicon: false,
            reg_form_banner: false,
            success_message: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            VueSettings.showCompleted(VueSettings.success_message);
                        }
                    }
                }
            },
            social: {
                social_name: Vue.prototype.trans('lang.select_socials'),
                social_url: '',
                count: 0,
                success_message: '',
                loading: false
            },
            search: {
                search_name: Vue.prototype.trans('lang.add_title'),
                search_url: '',
                count: 0,
                success_message: '',
                loading: false
            },
            socials: [],
            first_social_name: '',
            first_social_url: '',
            searches: [],
            first_search_title: '',
            first_search_url: '',
            loading: false,
        },
        created: function () {
            this.getHomeSectionDisplaySetting();
            this.getChatDisplaySetting();
            this.getPrimaryColorDisplaySetting();
            this.getInnerPageSettings();
            this.getRegistrationSettings();
            this.getSitePaymentOptions();
            this.getBreadcrumbsSettings();
            this.getProjectSettings();
        },
        ready: function () { },
        methods: {
            getHomeSectionDisplaySetting: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get-section-display-setting')
                    .then(function (response) {
                        if ((response.data.home_section_display == 'true')) {
                            self.home_section_display = true;
                        } else {
                            self.home_section_display = false;
                        }
                        if ((response.data.app_section_display == 'true')) {
                            self.app_section_display = true;
                        } else {
                            self.app_section_display = false;
                        }
                        if ((response.data.show_services_section == 'true')) {
                            self.show_services_section = true;
                        } else {
                            self.show_services_section = false;
                        }
                    });
            },
            getPrimaryColorDisplaySetting: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get-theme-color-display-setting')
                    .then(function (response) {
                        if ((response.data.enable_theme_color == 'true')) {
                            self.enable_theme_color = true;
                            self.enable_color_text = Vue.prototype.trans('lang.primary_color');
                            if (response.data.color) {
                                self.primary_color = response.data.color;
                            }
                        } else {
                            self.enable_theme_color = false;
                        }
                    });
            },
            getChatDisplaySetting: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get-chat-display-setting')
                    .then(function (response) {
                        if ((response.data.chat_display == 'true')) {
                            self.chat_display = true;
                        } else {
                            self.chat_display = false;
                        }
                    });
            },
            addSocial: function () {
                this.socials.push(Vue.util.extend({}, this.social, this.social.count++))
            },
            removeSocial: function (index) {
                Vue.delete(this.socials, index);
            },
            addSearchItem: function () {
                this.searches.push(Vue.util.extend({}, this.search, this.search.count++))
            },
            removeSearchItem: function (index) {
                Vue.delete(this.searches, index);
            },
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(Vue.prototype.trans('lang.success'), message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitGeneralSettings: function () {
                let settings_form = document.getElementById('general-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitGeneralHomeSettings: function () {
                let settings_form = document.getElementById('general-home-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/general-home-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitChatSettings: function () {
                let chatForm = document.getElementById('submit-chat-form');
                let form_data = new FormData(chatForm);
                var self = this;
                axios.post(APP_URL + '/admin/store/chat-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            uploadDashboardIcons: function () {
                let upload_icon_form = document.getElementById('upload_dashboard_icon');
                let form_data = new FormData(upload_icon_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/upload-icons', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitThemeStylingSettings: function () {
                let settings_form = document.getElementById('styling-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/theme-styling-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitFooterSettings: function () {
                let footersettings = document.getElementById('footer-setting-form');
                let data = new FormData(footersettings);
                var self = this;
                axios.post(APP_URL + '/admin/store/footer-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitAccessType: function () {
                let footersettings = document.getElementById('acces_types_form');
                let data = new FormData(footersettings);
                var self = this;
                axios.post(APP_URL + '/admin/store/access-type-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitSocialSettings: function () {
                let socialsettings = document.getElementById('social-management');
                let data = new FormData(socialsettings);
                var self = this;
                axios.post(APP_URL + '/admin/store/social-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitSearchMenu: function () {
                let searchMenu = document.getElementById('search-menu');
                let data = new FormData(searchMenu);
                var self = this;
                axios.post(APP_URL + '/admin/store/search-menu', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.menu_title) {
                            self.showError(error.response.data.errors.menu_title[0]);
                        }
                    });
            },
            submitCommisionSettings: function () {
                let commision_settings = document.getElementById('comission-form');
                let data = new FormData(commision_settings);
                var self = this;
                axios.post(APP_URL + '/admin/store/commision-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }

                    })
                    .catch(function (error) { });
            },
            submitPaypalSettings: function () {
                let payment_settings = document.getElementById('payment-form');
                let data = new FormData(payment_settings);
                var self = this;
                axios.post(APP_URL + '/admin/store/payment-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.client_id) {
                            self.showError(error.response.data.errors.client_id[0]);
                        }
                        if (error.response.data.errors.paypal_password) {
                            self.showError(error.response.data.errors.paypal_password[0]);
                        }
                        if (error.response.data.errors.paypal_secret) {
                            self.showError(error.response.data.errors.paypal_secret[0]);
                        }
                    });
            },
            submitStripeSettings: function () {
                let payment_settings = document.getElementById('stripe-form');
                let data = new FormData(payment_settings);
                var self = this;
                axios.post(APP_URL + '/admin/store/stripe-payment-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.stripe_key) {
                            self.showError(error.response.data.errors.stripe_key[0]);
                        }
                        if (error.response.data.errors.stripe_secret) {
                            self.showError(error.response.data.errors.stripe_secret[0]);
                        }
                    });
            },
            emailContent: function (reference) {
                this.$refs[reference].show();
            },
            submitEmailSettings: function () {
                let settings_form = document.getElementById('email-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/email-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitHomeSettings: function () {
                let settings_form = document.getElementById('home-settings-form');
                let form_data = new FormData(settings_form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('app_desc', description);
                var self = this;
                axios.post(APP_URL + '/admin/store/home-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitSectionSettings: function () {
                let settings_form = document.getElementById('section-settings-form');
                let form_data = new FormData(settings_form);
                var description = tinyMCE.get('app_desc_wt_tinymceeditor').getContent();
                console.log(description);
                // return false;
                form_data.append('app_desc', description);
                var self = this;
                axios.post(APP_URL + '/admin/store/section-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitServicesSectionSettings: function () {
                let settings_form = document.getElementById('services-sec-settings');
                let form_data = new FormData(settings_form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/admin/store/service-section-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            removeImage: function (id) {
                if (id == 'hidden_site_logo') {
                    this.logo = true;
                }
                if (id == 'hidden_logo') {
                    this.uploaded_logo = true;
                }
                if (id == 'hidden_banner') {
                    this.uploaded_banner = true;
                }
                if (id == 'hidden_avatar') {
                    this.uploaded_avatar = true;
                }
                if (id == 'hidden_home_banner') {
                    this.uploaded_banner_bg = true;
                }
                if (id == 'hidden_banner_image') {
                    this.uploaded_banner_image = true;
                }
                if (id == 'hidden_section_bg') {
                    this.uploaded_section_bg = true;
                }
                if (id == 'hidden_download_app_img') {
                    this.uploaded_download_app_img = true;
                }
                if (id == 'hidden_site_footer_logo') {
                    this.footer_logo = true;
                }
                if (id == 'hidden_site_register_image') {
                    this.register_image = true;
                }
                if (id == 'hidden_f_inner_banner') {
                    this.f_inner_banner = true;
                }
                if (id == 'hidden_e_inner_banner') {
                    this.e_inner_banner = true;
                }
                if (id == 'hidden_job_inner_banner') {
                    this.job_inner_banner = true;
                }
                if (id == 'hidden_service_inner_banner') {
                    this.service_inner_banner = true;
                }
                if (id == 'hidden_article_inner_banner') {
                    this.article_inner_banner = true;
                }
                if (id == 'hidden_site_favicon') {
                    this.favicon = true;
                }
                if (id == 'hidden_reg_form_banner') {
                    this.reg_form_banner = true;
                }
                document.getElementById(id).value = '';
            },
            importDemo: function (text) {
                var self = this;
                this.$swal({
                    title: text,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        self.loading = true;
                        window.location.replace(APP_URL + '/admin/import-demo');
                    } else {
                        this.$swal.close()
                    }
                })
            },
            removeDemoContent: function (text) {
                var self = this;
                this.$swal({
                    title: text,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        self.loading = true;
                        window.location.replace(APP_URL + '/admin/remove-demo');
                    } else {
                        this.$swal.close()
                    }
                })
            },
            clearCache: function () {
                var self = this;
                var clear_cache_form = document.getElementById('form-cache-clear');
                let form_data = new FormData(clear_cache_form);
                this.$swal({
                    title: Vue.prototype.trans('lang.clear_selected_cache'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        self.loading = true;
                        axios.post(APP_URL + '/admin/clear-cache', form_data)
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    self.loading = false;
                                    self.$swal(Vue.prototype.trans(lang.deleted), Vue.prototype.trans(lang.cache_cleared), Vue.prototype.trans(lang.success))
                                } else {
                                    self.loading = false;
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
            clearAllCache: function () {
                var self = this;
                this.$swal({
                    title: Vue.prototype.trans('lang.clr_all_cache'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    self.loading = true;
                    if (result.value) {
                        axios.get(APP_URL + '/admin/clear-allcache')
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    self.loading = false;
                                    self.$swal(Vue.prototype.trans(lang.cleared), Vue.prototype.trans(lang.cache_cleared), Vue.prototype.trans(lang.success))
                                } else {
                                    self.loading = false;
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
            importUpdate: function (success_title, success_text) {
                this.$swal({
                    title: Vue.prototype.trans('lang.imprt_tables'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        self.loading = true;
                        axios.get(APP_URL + '/admin/import-updates')
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    self.loading = false;
                                    self.$swal(success_title, success_text, 'success')
                                    window.location.replace(APP_URL + '/admin/settings');
                                } else {
                                    self.loading = false;
                                }
                            })
                    } else {
                        self.$swal.close()
                    }
                }) 
            },
            submitTemplateFilter: function () {
                document.getElementById("template_filter_form").submit();
            },
            submitInnerPage: function () {
                let settings_form = document.getElementById('inner-page-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/innerpage-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitOrderSettings: function () {
                let settings_form = document.getElementById('order_settings_form');
                let form_data = new FormData(settings_form);
                var adminEmailContent = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('admin_order[email_content]', adminEmailContent);
                var EmployerEmailContent = tinyMCE.get('wt-tinymceemployereditor').getContent();
                form_data.append('employer_hire[email_content]', EmployerEmailContent);
                var self = this;
                axios.post(APP_URL + '/admin/store/order-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            getInnerPageSettings: function () {
                let self = this;
                axios.post(APP_URL + '/admin/get/innerpage-settings')
                    .then(function (response) {
                        if ((response.data.show_f_banner == 'true')) {
                            self.show_f_banner = true;
                        } else {
                            self.show_f_banner = false;
                        }
                        if ((response.data.show_emp_banner == 'true')) {
                            self.show_emp_banner = true;
                        } else {
                            self.show_emp_banner = false;
                        }
                        if ((response.data.show_job_banner == 'true')) {
                            self.show_job_banner = true;
                        } else {
                            self.show_job_banner = false;
                        }
                        if ((response.data.show_service_banner == 'true')) {
                            self.show_service_banner = true;
                        } else {
                            self.show_service_banner = false;
                        }
                        if ((response.data.show_article_banner == 'true')) {
                            self.show_article_banner = true;
                        } else {
                            self.show_article_banner = false;
                        }
                    });
            },
            getRegistrationSettings: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get/registration-settings')
                    .then(function (response) {
                        if (response.data.show_emplyr_inn_sec == 'true') {
                            self.show_emplyr_inn_sec = true;
                        } else {
                            self.show_emplyr_inn_sec = false;
                        }
                        if (response.data.show_reg_form_banner == 'true') {
                            self.show_reg_form_banner = true;
                        } else {
                            self.show_reg_form_banner = false;
                        }
                    });
            },
            getSitePaymentOptions: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get/site-payment-option')
                    .then(function (response) {
                        if (response.data.enable_packages == 'true') {
                            self.enable_packages = true;
                        } else {
                            self.enable_packages = false;
                        }
                        if (response.data.employer_package == 'true') {
                            self.employer_package = true;
                        } else {
                            self.employer_package = false;
                        }
                        if (response.data.enable_sandbox == 'true') {
                            self.enable_sandbox = true;
                        } else {
                            self.enable_sandbox = false;
                        }
                        if (response.data.payment_mode == 'true') {
                            self.payment_mode = true;
                        } else {
                            self.payment_mode = false;
                        }
                    });
            },
            submitBreadcrumbs: function () {
                let settings_form = document.getElementById('breadcrumb-option');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/breadcrumbs-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            getBreadcrumbsSettings: function () {
                let self = this;
                axios.post(APP_URL + '/admin/get/breadcrumbs-settings')
                    .then(function (response) {
                        if ((response.data.breadcrumbs_settings == 'true')) {
                            self.enable_breadcrumbs = true;
                        } else {
                            self.enable_breadcrumbs = false;
                        }
                    });
            },
            submitProjectSettings: function () {
                let settings_form = document.getElementById('project_settings_form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/project-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            getProjectSettings: function () {
                let self = this;
                axios.post(APP_URL + '/admin/get/project-settings')
                    .then(function (response) {
                        if ((response.data.project_settings == 'true')) {
                            self.enable_completed_projects = true;
                        } else {
                            self.enable_completed_projects = false;
                        }
                    });
            },
            submitBankDetail: function () {
                let settings_form = document.getElementById('back-detail-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/bank-detail', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
        }
    });
}
//Profile Settings
if (document.getElementById("profile_settings")) {
    const switchButton = new Vue({
        el: "#profile_settings",
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: function () {
            return {
                profile_blocked: true,
                profile_searchable: true,
                weekly_alerts: true,
                message_alerts: false,
                success_message: '',
                notificationSystem: {
                    options: {
                        success: {
                            position: "topRight",
                            timeout: 4000
                        },
                        error: {
                            position: "topRight",
                            timeout: 7000
                        },
                        completed: {
                            position: 'center',
                            timeout: 1000,
                            progressBar: false
                        },
                        info: {
                            overlay: true,
                            zindex: 999,
                            position: 'center',
                            timeout: 3000,
                            onClosing: function (instance, toast, closedBy) {
                                VueSettings.showCompleted(VueSettings.success_message);
                            }
                        }
                    }
                }

            };
        },
        created: function () {
            this.getUserEmailNotification();
            this.getSearchableSettings();
        },
        ready: function () {
            this.deleteAccount();
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success('Success', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            deleteAccount: function (event) {
                var self = this;
                var delete_acc_form = document.getElementById('delete_acc_form');
                let form_data = new FormData(delete_acc_form);
                this.$swal({
                    title: Vue.prototype.trans('lang.delete_account'),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/profile/settings/delete-user', form_data)
                            .then(function (response) {
                                if (response.data.type === 'warning') {
                                    self.showError(response.data.msg);
                                } else {
                                    setTimeout(function () {
                                        swal({
                                            type: "success"
                                        })
                                    },
                                        self.showInfo(response.data.acc_del), 1000);
                                    window.location.href = APP_URL + '/';
                                }
                            })
                            .catch(function (error) {
                                if (error.response.data.errors.old_password) {
                                    self.showError(error.response.data.errors.old_password[0]);
                                }
                                if (error.response.data.errors.retype_password) {
                                    self.showError(error.response.data.errors.retype_password[0]);
                                }
                            });
                    } else {
                        this.$swal.close()
                    }
                })
            },
            deleteUser: function (id) {
                var self = this;
                this.$swal({
                    title: Vue.prototype.trans('lang.delete_user'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-user', {
                            user_id: id
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: Vue.prototype.trans('lang.ph_user_delete_message'),
                                            type: "success"
                                        })
                                    }, 100);
                                    setTimeout(function () {
                                        jQuery('.del-user-' + id).remove();
                                        window.location.replace(APP_URL + '/users');
                                    }, 500);
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
            getUserEmailNotification: function () {
                let self = this;
                axios.get(APP_URL + '/profile/settings/get-user-notification-settings')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.weekly_alerts == 'true')) {
                                self.weekly_alerts = true;
                            } else {
                                self.weekly_alerts = false;
                            }
                            if ((response.data.message_alerts == 'true')) {
                                self.message_alerts = true;
                            } else {
                                self.message_alerts = false;
                            }
                        }
                    });
            },
            getSearchableSettings: function () {
                let self = this;
                axios.get(APP_URL + '/profile/settings/get-user-searchable-settings')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.profile_blocked == 'true')) {
                                self.profile_blocked = true;
                            } else {
                                self.profile_blocked = false;
                            }
                        }
                    });
            },
        }

    });
}

if (document.getElementById("post_job")) {
    const vmpostJob = new Vue({
        el: '#post_job',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            title: '',
            project_level: '',
            job_duration: '',
            freelancer_level: '',
            english_level: '',
            message: '',
            form_errors: [],
            custom_error: false,
            is_show: false,
            loading: false,
            show_attachments: false,
            is_featured: false,
            is_progress: false,
            is_completed: false,
            errors: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    }
                }
            }
        },
        created: function () {
            this.getSettings();
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(Vue.prototype.trans('lang.success'), message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitJob: function () {
                this.loading = true;
                let register_Form = document.getElementById('post_job_form');
                let form_data = new FormData(register_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/job/post-job', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showInfo(Vue.prototype.trans('lang.job_submitting'));
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                            }, 4000);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.job_duration) {
                            self.showError(error.response.data.errors.job_duration[0]);
                        }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.project_levels) {
                            self.showError(error.response.data.errors.project_levels[0]);
                        }
                        if (error.response.data.errors.freelancer_type) {
                            self.showError(error.response.data.errors.freelancer_type[0]);
                        }
                        if (error.response.data.errors.project_cost) {
                            self.showError(error.response.data.errors.project_cost[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                        if (error.response.data.errors.latitude) {
                            self.showError(error.response.data.errors.latitude[0]);
                        }
                        if (error.response.data.errors.longitude) {
                            self.showError(error.response.data.errors.longitude[0]);
                        }
                        if (error.response.data.errors.expiry_date) {
                            self.showError(error.response.data.errors.expiry_date[0]);
                        }
                    });
            },
            updateJob: function (id) {
                this.loading = true;
                let register_Form = document.getElementById('job_edit_form');
                let form_data = new FormData(register_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                form_data.append('id', id);
                var self = this;
                axios.post(APP_URL + '/job/update-job', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.showInfo(Vue.prototype.trans('lang.job_updating'));
                            setTimeout(function () {
                                if (response.data.role == 'employer') {
                                    window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                                } else if (response.data.role == 'admin') {
                                    window.location.replace(APP_URL + '/admin/jobs');
                                }
                            }, 4000);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.job_duration) {
                            self.showError(error.response.data.errors.job_duration[0]);
                        }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.project_levels) {
                            self.showError(error.response.data.errors.project_levels[0]);
                        }
                        if (error.response.data.errors.project_cost) {
                            self.showError(error.response.data.errors.project_cost[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                        if (error.response.data.errors.latitude) {
                            self.showError(error.response.data.errors.latitude[0]);
                        }
                        if (error.response.data.errors.longitude) {
                            self.showError(error.response.data.errors.longitude[0]);
                        }
                        if (error.response.data.errors.expiry_date) {
                            self.showError(error.response.data.errors.expiry_date[0]);
                        }
                    });
            },
            getSettings: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/job/get-job-settings', {
                    slug: slug
                })
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.is_featured == 'true')) {
                                self.is_featured = true;
                            } else {
                                self.is_featured = false;
                            }
                            if ((response.data.show_attachments == 'true')) {
                                self.show_attachments = true;
                            } else {
                                self.show_attachments = false;
                            }
                        }
                    });
            },
            deleteAttachment: function (id) {
                jQuery('#' + id).remove();
            }
        }
    });
}

if (document.getElementById("jobs")) {
    const jobVue = new Vue({
        el: '#jobs',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
        },
        data: {
            refundable_user: '',
            refundable_payment_method: '',
            proposal: {
                amount: Vue.prototype.trans('lang.enter_proposal_amount'),
                deduction: '00.00',
                total: '00.00',
                completion_time: '',
                description: '',
            },
            report: {
                reason: '',
                description: '',
                id: '',
                model: 'App\\Job',
                report_type: '',
            },
            form_errors: [],
            custom_error: false,
            loading: false,
            message: '',
            disable_btn: '',
            saved_class: '',
            heart_class: 'far fa-heart',
            text: Vue.prototype.trans('lang.click_to_save'),
            follow_text: Vue.prototype.trans('lang.click_to_follow'),
            disable_follow: '',
            notificationSystem: {
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
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    },
                    message: {
                        position: 'center',
                        timeout: 900,
                        progressBar: false
                    }
                }
            },
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.message);
            },
            add_wishlist: function (element_id, id, column, saved_text) {
                var self = this;
                axios.post(APP_URL + '/user/add-wishlist', {
                    id: id,
                    column: column,
                })
                    .then(function (response) {
                        if (response.data.authentication == true) {
                            if (column == 'saved_jobs') {
                                jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                jQuery('#' + element_id).addClass('wt-clicksave');
                                jQuery('#' + element_id).find('.save_text').text(saved_text);
                                self.disable_btn = 'wt-btndisbaled wt-clicksave';
                                self.text = saved_text;
                                self.heart_class = 'fa fa-heart';
                            }
                            if (column == 'saved_employers') {
                                self.disable_follow = 'wt-btndisbaled';
                                self.follow_text = saved_text;
                            }
                            self.showMessage(response.data.message);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            check_auth: function (url) {
                var self = this;
                axios.get(APP_URL + '/check-proposal-auth-user')
                    .then(function (response) {
                        if (response.data.auth == 1) {
                            window.location.replace(url);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {

                    });
            },
            calculate_amount: function (commission) {
                console.log(commission);
                this.proposal.deduction = (this.proposal.amount / 100) * commission;
                this.proposal.total = this.proposal.amount - this.proposal.deduction;
            },
            submitJobProposal: function (id, user_id) {
                this.loading = true;
                this.custom_error = false;
                let propsal_form = document.getElementById('send-propsal');
                let form_data = new FormData(propsal_form);
                form_data.append('id', id);
                form_data.append('user_id', user_id);
                var self = this;
                axios.post(APP_URL + '/proposal/submit-proposal', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showCompleted(response.data.message);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/freelancer/proposals');
                            }, 1050);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.amount) {
                            self.showError(error.response.data.errors.amount[0]);
                        }
                        if (error.response.data.errors.completion_time) {
                            self.showError(error.response.data.errors.completion_time[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                    });
            },
            submitReport: function (id, report_type) {
                this.report.report_type = report_type;
                this.report.id = id;
                var self = this;
                axios.post(APP_URL + '/submit-report', self.report)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            if (error.response.data.errors.description) {
                                self.showError(error.response.data.errors.description[0]);
                            }
                            if (error.response.data.errors.reason) {
                                self.showError(error.response.data.errors.reason[0]);
                            }
                        }
                    });
            },
            hireFreelancer: function (id, mode) {
                this.$swal({
                    title: Vue.prototype.trans('lang.want_to_hire'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        if (mode == 'false') {
                            axios.post(APP_URL + '/user/generate-order/bacs/'+id+'/job')
                            .then(function (response) {
                                if (response.data.type == 'success') {
                                    window.location.replace(APP_URL+'/user/order/bacs/'+id+'/'+response.data.order_id+'/project');
                                } 
                            })
                            .catch(function (error) {
                                console.log(error);
                            });    
                        } else {
                            window.location.replace(APP_URL + '/payment-process/' + id);
                        }
                    } else {
                        this.$swal.close()
                    }
                })
            },
            showCoverLetter: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            showRefoundForm: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            submitRefund: function (job_id) {
                this.loading = true;
                var self = this;
                var job_id = $('#refundable-job-id-'+job_id).val();
                var selected_user = $("#refundable_user_id-"+job_id).val();
                var refundable_amount = $('#refundable-amount-'+job_id).val();
                var order_id = $('#refundable-order-id-'+job_id).val();
                let form = document.getElementById('submit_refund_' + job_id);
                let form_data = new FormData(form);
                form_data.append('refundable_user_id', selected_user);
                form_data.append('amount', refundable_amount);
                form_data.append('order_id', order_id);
                form_data.append('job_id', job_id);
                form_data.append('type', 'job');
                axios.post(APP_URL + '/admin/submit-user-refund', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            window.location.replace(APP_URL + '/admin/jobs');
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            self.loading = false;
                            if (error.response.data.errors.payment_method) {
                                self.showError(error.response.data.errors.payment_method[0]);
                            }
                        }
                    });
            },
            downloadAttachments: function (form_id) {
                document.getElementById(form_id).submit();
            },
            jobStatus: function (id, proposal_id, cancel_text, confirm_button, validation_error, popup_title) {
                var job_status = document.getElementById("job_status");
                var status = job_status.options[job_status.selectedIndex].value;
                if (status == "cancelled") {
                    this.$swal({
                        title: popup_title,
                        text: cancel_text,
                        type: 'info',
                        input: 'textarea',
                        confirmButtonText: confirm_button,
                        showCancelButton: true,
                        showLoaderOnConfirm: true,
                        inputValidator: (textarea) => {
                            return new Promise((resolve) => {
                                if (textarea != '') {
                                    resolve()
                                } else {
                                    resolve(validation_error)
                                }
                            })
                        },
                        preConfirm: (textarea) => {
                            var self = this;
                            return axios.post(APP_URL + '/submit-report', {
                                reason: 'proposal cancel',
                                report_type: 'proposal_cancel',
                                description: textarea,
                                id: id,
                                model: 'App\\Job',
                                proposal_id: proposal_id
                            })
                                .then(function (response) {
                                    if (response.data.type == 'success') {
                                        self.showCompleted(response.data.message);
                                        setTimeout(function () {
                                            window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                                        }, 1500);
                                    } else if (response.data.type == 'error') {
                                        self.showError(response.data.message);
                                    }
                                })
                                .catch(error => {
                                    if (error.response.status == 422) {
                                        if (error.response.data.errors.description) {
                                            self.$swal.showValidationMessage(
                                                error.response.data.errors.description[0]
                                            )
                                        }
                                    }
                                })
                        },
                        allowOutsideClick: () => !this.$swal.isLoading()
                    }).then((result) => { })
                }
                if (status == "completed") {
                    this.$refs.myModalRef.show()
                }
            },
            viewReason: function (description) {
                this.$swal({
                    width: 600,
                    padding: '3em',
                    text: description
                })
            },
            submitFeedback: function (id, job_id) {
                this.loading = true;
                let review_form = document.getElementById('submit-review-form');
                let form_data = new FormData(review_form);
                form_data.append('freelancer_id', id);
                form_data.append('job_id', job_id);
                var self = this;
                axios.post(APP_URL + '/user/submit-review', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            var message = response.data.message;
                            self.showMessage(message);
                            setTimeout(function () {
                                self.$refs.myModalRef.hide()
                                window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                            }, 1000);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            submitDispute: function (id) {
                this.loading = true;
                let dispute_form = document.getElementById('dispute-form');
                let form_data = new FormData(dispute_form);
                form_data.append('proposal_id', id);
                var self = this;
                axios.post(APP_URL + '/freelancer/store-dispute', form_data)
                    .then(function (response) {
                        console.log(response.data);
                        if (response.data.type == 'success') {
                            self.loading = false;
                            var message = response.data.message;
                            self.showMessage(message);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/freelancer/dashboard');
                            }, 2000);
                        } if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            deleteJob: function (id) {
                var self = this;
                this.$swal({
                    title: Vue.prototype.trans('lang.del_job'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/job/delete-job', {
                            job_id: id
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: Vue.prototype.trans('lang.job_deleted'),
                                            type: "success"
                                        })
                                        jQuery('.del-job-' + id).remove();
                                    }, 500);
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
        }
    });
}
if (document.getElementById("proposals")) {
    const vproposals = new Vue({
        el: '#proposals',
        mounted: function () { },
        data: {},
        methods: {}
    });
}
if (document.getElementById("packages")) {
    const packages = new Vue({
        el: '#packages',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getOptions();
        },
        data: {
            user_role: '',
            selected_role: '',
            employer_options: false,
            freelancer_options: false,
            banner_option: false,
            private_chat: false,
            packageID: '',
            loading: false,
            package: {
                conneects: '',
                skills: '',
                jobs: '',
                featured_jobs: '',
                services: '',
                featured_services: '',
            },
            form_errors: [],
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000
                    },
                }
            },
        },
        methods: {
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            selectedRole: function (role) {
                this.selected_role = role;
                if (role == 2) {
                    this.employer_options = true;
                    this.freelancer_options = false;
                } else if (role == 3) {
                    this.employer_options = false;
                    this.freelancer_options = true;
                }
            },
            generateOrder: function(id) {
                if (id) {
                    var self = this;
                    axios.post(APP_URL + '/user/generate-order/bacs/'+id+'/package')
                        .then(function (response) {
                            if (response.data.type == 'success') {
                                window.location.replace(APP_URL+'/user/order/bacs/'+id+'/'+response.data.order_id+'/package');
                            } 
                        })
                        .catch(function (error) {
                            console.log(error);
                        });    
                }
            },
            submitTransection: function(id) {
                if (!(document.getElementById('transection_detail').value)) return this.showError(Vue.prototype.trans('lang.transection_detail_req'))
                this.loading = true;
                let bankForm = document.getElementById('trans_form');
                let data = new FormData(bankForm);
                var self = this;
                axios.post(APP_URL + '/user/submit/transection', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            window.location.replace(response.data.return_url);
                            self.loading = false;
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        console.log(error);
                    });
            },
            submitPackage: function () {
                if (this.selected_role == 3) {
                    if (this.package.conneects, this.package.skills) {
                        this.form_errors = [];
                        jQuery("#package_form").submit();
                    } else {
                        if (!this.package.conneects) this.form_errors.push(Vue.prototype.trans('lang.connects_required'));
                        if (!this.package.skills) this.form_errors.push(trans('lang.skills_required'));
                        this.form_errors.forEach(element => {
                            this.showError(element);
                        });
                    }
                }
                else if (this.selected_role == 2) {
                    if (this.package.jobs, this.package.featured_jobs) {
                        this.form_errors = [];
                        jQuery("#package_form").submit();
                    } else {
                        if (!this.package.jobs) this.form_errors.push(Vue.prototype.trans('lang.no_jobs_required'));
                        if (!this.package.featured_jobs) this.form_errors.push(Vue.prototype.trans('lang.no_featurejobs_required'));
                        this.form_errors.forEach(element => {
                            this.showError(element);
                        });
                    }
                }
            },
            getOptions: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                if (window.location.pathname == '/admin/packages/edit/' + slug) {
                    axios.post(APP_URL + '/package/get-package-options', {
                        slug: slug
                    })
                        .then(function (response) {
                            console.log(response.data);
                            if (response.data.type == 'success') {
                                if ((response.data.banner_option == 'true')) {
                                    self.banner_option = true;
                                } else {
                                    self.banner_option = false;
                                }
                                if ((response.data.private_chat == 'true')) {
                                    self.private_chat = true;
                                } else {
                                    self.private_chat = false;
                                }
                            }
                        }).catch(function (error) {
                            console.log(error);
                        });
                }
            },
            getPurchasePackage: function (id) {
                var self = this;
                axios.get(APP_URL + '/package/get-purchase-package')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            window.location.replace(APP_URL + '/user/package/checkout/' + id);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        } else if (response.data.type == 'server_error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) { });
            },
            getStriprForm: function () {
                this.$refs.myModalRef.show()
            },
            submitStripeFrom: function () {
                this.loading = true;
                let stripe_payment = document.getElementById('stripe-payment-form');
                let data = new FormData(stripe_payment);
                var self = this;
                axios.post(APP_URL + '/addmoney/stripe', data)
                    .then(function (response) {
                        console.log(response.data);
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            setTimeout(function () {
                                window.location.replace(response.data.url);
                            }, 3000);
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        console.log(error);
                    });
            },
        }
    });
}

if (document.getElementById("invoice_list")) {
    new Vue({
        el: '#invoice_list',
        created() {
            this.getUserPayoutSettings();
        },
        data: {
            show_paypal_fields:false,
            show_bank_fields:false,
            loading:false,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000
                    },
                }
            },
        },
        methods: {
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            changePayoutStatus: function (id, projects_ids) {
                this.loading = true;
                var status = document.getElementById(id+'-payout_status').value;
                var self = this;
                axios.post(APP_URL + '/admin/update-payout-status', {
                    status: status,
                    id: id,
                    projects_ids: projects_ids,
                })
                .then(function (response) {
                    if (response.data.type == 'success') {
                        self.showMessage(response.data.message);
                        self.loading = false;
                    } else {
                        self.loading = false;
                        self.showError(response.data.message);
                    }
                })
                .catch(function (error) {
                    self.loading = false;
                });
            },
            print: function () {
                const cssText = `
                .wt-transactionhold{
                    float: left;
                    width: 100%;
                }
                .wt-borderheadingvtwo a{font-size: 18px;}
                .wt-transactiondetails{
                    float: left;
                    width: 100%;
                    list-style:none;
                    margin-bottom:20px;
                    line-height: 28px;
                }
                .wt-transactiondetails li{
                    float: left;
                    width: 100%;
                    margin-bottom: 10px;
                    line-height: inherit;
                    list-style-type:none;
                }
                .wt-transactiondetails li:last-child{margin: 0;}
                .wt-transactiondetails li span{
                    font-size: 16px;
                    line-height: inherit;
                }
                .wt-transactiondetails li span.wt-grossamount {float: right;}
                .wt-transactiondetails li span em{
                    font-weight:500;
                    font-style:normal;
                    line-height: inherit;
                }
                .wt-transactionid{
                    margin-left:80px;
                    padding-left:10px;
                    border-left:2px solid #ddd;
                }
                .wt-grossamountusd{font-size: 24px !important;}
                .wt-paymentstatus{
                    color: #21ce93;
                    padding:3px 10px;
                    margin-left:10px;
                    font-size: 14px !important;
                    text-transform: uppercase;
                    border:1px solid #21ce93;
                }
                .wt-createtransactionhold{
                    float: left;
                    width: 100%;
                }
                .wt-createtransactionholdvtwo{
                    padding:0 20px;
                }
                .wt-createtransactionheading{
                    float: left;
                    width: 100%;
                    padding-bottom:15px;
                    border-bottom:1px solid #ddd;
                }
                .wt-createtransactionheading span{
                    display: block;
                    color: #1070c4;
                    font-size: 16px;
                    line-height: 20px;
                }
                .wt-createtransactioncontent{
                    float: left;
                    width: 100%;
                    padding:27px 0;
                    border-bottom: 1px solid #ddd;
                }
                .wt-createtransactioncontent a{
                    padding:0 10px;
                    color: #1070c4;
                    font-size: 14px;
                    line-height: 16px;
                    display: inline-block;
                    vertical-align: middle;
                    border-left:1px solid #ddd;
                }
                .wt-createtransactioncontent a:first-child{
                    border-left:0;
                    padding-left:0;
                }
                .wt-addresshold{
                    float: left;
                    width: 100%;
                    padding:18px 0;
                }
                .wt-addresshold h4{
                    margin: 0;
                    display: block;
                    font-size: 16px;
                    font-weight: 500;
                }
                table.wt-carttable{ margin-bottom:0;}
                table.wt-carttable thead{
                    border:0;
                    font-size:14px;
                    line-height:18px;
                    background: #f5f7fa;
                }
                table.wt-carttable thead tr th{
                    border:0;
                    text-align:left;
                    font-weight: 500;
                    font-weight:normal;
                    padding:20px 4px 20px 160px;
                    font:500 16px/18px 'Montserrat', Arial, Helvetica, sans-serif;
                }
                table.wt-carttable thead tr th + th{
                    text-align:center;
                    padding:20px 4px;
                }
                table.wt-carttable tbody td{
                    width:50%;
                    border:0;
                    font-size:16px;
                    text-align:left;
                    line-height: 20px;
                    display:table-cell;
                    vertical-align:middle;
                    padding:10px 4px 10px 0;
                }
                table.wt-carttable tbody td span,
                table.wt-carttable tbody td img{
                    display:inline-block;
                    vertical-align:middle;
                }
                table.wt-carttable tbody td em{
                    margin: 0;
                    font-size: 16px;
                    line-height: 16px;
                    font-style: normal;
                    vertical-align: middle;
                    display: inline-block;
                }
                table.wt-carttable > thead > tr > th{
                    padding: 6px 20px;
                    width: 25%;
                }
                table.wt-carttable > thead:first-child > tr:first-child > th{
                    border:0;
                    width: 25%;
                    padding: 6px 20px;
                }
                table.wt-carttable tbody td > em{
                    display: block;
                    text-align: center;
                }
                table.wt-carttable tbody td img{
                    width: 116px;
                    height: 116px;
                    margin-right:20px;
                    border-radius:10px;
                }
                table.wt-carttable tbody td + td{
                    width:15%;
                    text-align:center;
                }
                table.wt-carttable tbody td:last-child{
                    width:10%;
                    text-align:right;
                    padding:20px 20px 20px 4px;
                }
                table.wt-carttable tbody td .btn-delete-item{
                    float:right;
                    font-size:24px;
                }
                table.wt-carttable tbody td .btn-delete-item a{color: #fe6767}
                table.wt-carttable tbody td .quantity-sapn{
                    padding:0;
                    width:80px;
                    position:relative;
                    border-radius: 10px;
                    border: 1px solid #e7e7e7;
                }
                table.wt-carttable tbody td .quantity-sapn input[type="text"]{
                    width: 100%;
                    height: 42px;
                    padding: 0 15px;
                    border-radius: 0;
                    box-shadow: none;
                    background: none;
                    line-height: 42px;
                }
                table.wt-carttable tbody td .quantity-sapn input{border:0;}
                table.wt-carttable tbody td .quantity-sapn em{
                    width:10px;
                    display:block;
                    position:absolute;
                    right:10px;
                    cursor:pointer;
                }
                table.wt-carttable tbody td .quantity-sapn em.fa-caret-up{top:8px;}
                table.wt-carttable tbody td .quantity-sapn em.fa-caret-down{ bottom:8px;}
                table.wt-carttable tfoot tr td{ width:50%;}
                table.wt-carttable tbody tr{border-bottom: 1px solid #ddd;}
                table.wt-carttable tbody tr:last-child{border-bottom:0; }
                table.wt-carttablevtwo tbody td > em{
                    color: #636c77;
                    font-weight:500;
                    text-align: left;
                    display: inline-block;
                }
                table.wt-carttablevtwo tbody td > span{
                    float: right;
                }
                table.wt-carttablevtwo tbody td{padding:20px;}

                .wt-refundscontent{
                    float: left;
                    width: 100%;
                }
                .wt-refundsdetails{
                    float: left;
                    width: 100%;
                    list-style:none;
                }
                .wt-refundsdetails li{
                    float: left;
                    width: 100%;
                    padding:15px 0;
                    list-style-type:none;
                }
                .wt-refundsdetails li + li{border-top: 1px solid #ddd;}
                .wt-refundsdetails li strong{
                    width: 300px;
                    float:left;
                }
                .wt-refundsdetails li .wt-rightarea{float: left;}
                .wt-refundsdetails li .wt-rightarea span{
                    display: block;
                }
                .wt-refundsdetails li .wt-rightarea em{
                    font-weight:500;
                    font-style: normal;
                }
                .wt-refundsdetails li:nth-child(3){
                    border:0;
                    padding-top:0;
                }
                .wt-refundsinfo{
                        width:100%;
                        clear:both;
                    display: block;
                }
                table.wt-carttable tbody tr:nth-child(6){border:0;}
                table.wt-carttablevtwo tbody tr:nth-child(6) td{padding: 20px 20px 0px;}
              `
                const d = new Printd()
                d.print(document.getElementById('printable_area'), cssText)
            },
            changePayout(payment_method) {
                if (payment_method == 'paypal') {
                    this.show_paypal_fields = true;
                    this.show_bank_fields = false;
                } else if (payment_method == 'bacs') {
                    this.show_paypal_fields = false;
                    this.show_bank_fields = true;
                } else {
                    this.show_paypal_fields = false;
                    this.show_bank_fields = false;
                }
            },
            submitPayoutsDetail: function (id) {
                this.loading = true;
                var self = this;
                let Form = document.getElementById('profile_payout_detail');
                let form_data = new FormData(Form);
                form_data.append('id', id);
                axios.post(APP_URL + '/user/update-payout-detail', form_data)
                .then(function (response) {
                    if (response.data.type == 'success') {
                        self.loading = false;
                        self.showMessage(response.data.message);
                    } else {
                        self.loading = false;
                        self.showError(response.data.message);
                    }
                })
                .catch(function (error) {
                    self.loading = false;
                });
            },
            getUserPayoutSettings: function() {
                var self = this;
                axios.get(APP_URL + '/user/get-payout-detail')
                .then(function (response) {
                    if (response.data.type == 'success') {
                        if(response.data.payouts.type == 'paypal') {
                            self.show_paypal_fields = true;
                        } else if (response.data.payouts.type == 'bacs') {
                            self.show_bank_fields = true;
                        }
                    } else {

                    }
                })
                .catch(function (error) {

                });
            },
            getPayouts: function () {
                var year = document.getElementById('payout_year').value;
                var month = document.getElementById('payout_month').value;
                if (year && month) {
                    document.getElementById('payout_year_filter').submit();
                }

            },
            generatePdfPayout: function(year, month) {
                var obj = document.getElementById('payout-table')
                var ids = [];
                for(var c=0;c<obj.childNodes.length;c++){
                    if(obj.childNodes[c].nodeType==1) {
                        ids.push(obj.childNodes[c].id);
                    }
                }
                window.location.replace(APP_URL+'/admin/payouts/download/'+year+'/'+month+'/'+ids);
            }
        }
    });
}
if (document.getElementById("services")) {
    const vservices = new Vue({
        el: '#services',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getSettings();
        },
        data: {
            report: {
                reason: '',
                description: '',
                id: '',
                model: 'App\\Service',
                report_type: '',
            },
            title: '',
            delivery_time: '',
            price: '',
            response_time: '',
            english_level: '',
            message: '',
            form_errors: [],
            custom_error: false,
            is_show: false,
            loading: false,
            show_attachments: false,
            is_featured: false,
            is_progress: false,
            is_completed: false,
            redirect_url: '',
            errors: '',
            disable_btn: '',
            saved_class: '',
            heart_class: 'fa fa-heart',
            text: Vue.prototype.trans('lang.click_to_save'),
            follow_text: Vue.prototype.trans('lang.click_to_follow'),
            disable_follow: '',
            refundable_user: '',
            refundable_payment_method: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "center",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        progressBar: false,
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        class: 'iziToast-info',
                        id: 'info_notify',
                    }
                }
            }
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitService: function () {
                this.loading = true;
                let Form = document.getElementById('post_service_form');
                let form_data = new FormData(Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/services/post-service', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showInfo(response.data.progress);
                            document.addEventListener('iziToast-closing', function (data) {
                                if (data.detail.id == 'info_notify') {
                                    self.showCompleted(response.data.message);
                                    window.location.replace(APP_URL + '/freelancer/services/posted');
                                }
                            });
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.delivery_time) {
                            self.showError(error.response.data.errors.delivery_time[0]);
                        }
                        if (error.response.data.errors.service_price) {
                            self.showError(error.response.data.errors.service_price[0]);
                        }
                        if (error.response.data.errors.response_time) {
                            self.showError(error.response.data.errors.response_time[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.latitude) {
                            self.showError(error.response.data.errors.latitude[0]);
                        }
                        if (error.response.data.errors.longitude) {
                            self.showError(error.response.data.errors.longitude[0]);
                        }
                    });
            },
            changeStatus: function (id) {
                this.loading = true;
                var status = document.getElementById(id + '-service_status').value;
                var self = this;
                axios.post(APP_URL + '/services/change-status', {
                    status: status,
                    id: id,
                })
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            getSettings: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var id = segment_array[segment_array.length - 1];
                if (segment_str == '/freelancer/dashboard/edit-service/' + id) {
                    axios.post(APP_URL + '/service/get-service-settings', {
                        id: id
                    })
                        .then(function (response) {
                            if (response.data.type == 'success') {
                                if ((response.data.is_featured == 'true')) {
                                    self.is_featured = true;
                                } else {
                                    self.is_featured = false;
                                }
                                if ((response.data.show_attachments == 'true')) {
                                    self.show_attachments = true;
                                } else {
                                    self.show_attachments = false;
                                }
                            }
                        });
                }
            },
            updateService: function (id) {
                this.loading = true;
                let register_Form = document.getElementById('update_service_form');
                let form_data = new FormData(register_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                form_data.append('id', id);
                var self = this;
                axios.post(APP_URL + '/service/update-service', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.progress);
                            document.addEventListener('iziToast-closing', function (data) {
                                if (data.detail.id == 'info_notify') {
                                    self.showCompleted(response.data.message);
                                    if (response.data.role == 'freelancer') {
                                        window.location.replace(APP_URL + '/freelancer/services/posted');
                                    } else if (response.data.role == 'admin') {
                                        //window.location.replace(APP_URL+'/admin/jobs');
                                    }
                                }
                            });
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.delivery_time) {
                            self.showError(error.response.data.errors.delivery_time[0]);
                        }
                        if (error.response.data.errors.service_price) {
                            self.showError(error.response.data.errors.service_price[0]);
                        }
                        if (error.response.data.errors.response_time) {
                            self.showError(error.response.data.errors.response_time[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.latitude) {
                            self.showError(error.response.data.errors.latitude[0]);
                        }
                        if (error.response.data.errors.longitude) {
                            self.showError(error.response.data.errors.longitude[0]);
                        }
                    });
            },
            deleteAttachment: function (id) {
                jQuery('#' + id).remove();
            },
            submitReport: function (id, report_type) {
                this.report.report_type = report_type;
                this.report.id = id;
                var self = this;
                axios.post(APP_URL + '/submit-report', self.report)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            if (error.response.data.errors.description) {
                                self.showError(error.response.data.errors.description[0]);
                            }
                            if (error.response.data.errors.reason) {
                                self.showError(error.response.data.errors.reason[0]);
                            }
                        }
                    });
            },
            add_wishlist: function (element_id, id, column, seller_id, saved_text) {
                var self = this;
                axios.post(APP_URL + '/user/add-wishlist', {
                    id: id,
                    column: column,
                    seller_id: seller_id,
                })
                    .then(function (response) {
                        if (response.data.authentication == true) {
                            if (response.data.type == 'success') {
                                if (column == 'saved_freelancer') {
                                    jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                    jQuery('#' + element_id).addClass('wt-clicksave');
                                    jQuery('#' + element_id).find('.save_text').text(saved_text);
                                    self.disable_btn = 'wt-btndisbaled';
                                    self.text = 'Save';
                                    self.saved_class = 'fa fa-heart';
                                    self.click_to_save = 'wt-clicksave'
                                }
                                else if (column == 'saved_employers') {
                                    jQuery('#' + element_id).addClass('wt-btndisbaled wt-clicksave');
                                    jQuery('#' + element_id).text(saved_text);
                                    jQuery('#' + element_id).parents('.wt-clicksavearea').find('i').addClass('fa fa-heart');
                                    self.disable_follow = 'wt-btndisbaled';
                                    self.follow_text = saved_text;
                                }
                                else if (column == 'saved_services') {
                                    jQuery('#' + element_id).addClass('wt-btndisbaled wt-clicksave');
                                    // self.saved_class = 'wt-clicksave';
                                    self.text = saved_text;
                                }
                                self.showMessage(response.data.message);
                            } else {
                                self.showError(response.data.message);
                            }
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            hireFreelancer: function (id, title, text, mode) {
                this.$swal({
                    title: title,
                    text: text,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        if (mode == 'false') {
                            axios.post(APP_URL + '/user/generate-order/bacs/'+id+'/service')
                            .then(function (response) {
                                if (response.data.type == 'success') {
                                    window.location.replace(APP_URL+'/user/order/bacs/'+response.data.service_order+'/'+response.data.order_id+'/project/service');
                                } 
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        } else {
                            window.location.replace(APP_URL + '/service/payment-process/' + id);
                        }
                    } else {
                        this.$swal.close()
                    }
                })
            },
            serviceStatus: function (id, pivot_id, employer_id, cancel_text, confirm_button, validation_error, popup_title) {
                var job_status = document.getElementById("employer_service_status");
                var status = job_status.options[job_status.selectedIndex].value;
                if (status == "cancelled") {
                    this.$swal({
                        title: popup_title,
                        text: cancel_text,
                        type: 'info',
                        input: 'textarea',
                        confirmButtonText: confirm_button,
                        showCancelButton: true,
                        showLoaderOnConfirm: true,
                        inputValidator: (textarea) => {
                            return new Promise((resolve) => {
                                if (textarea != '') {
                                    resolve()
                                } else {
                                    resolve(validation_error)
                                }
                            })
                        },
                        preConfirm: (textarea) => {
                            var self = this;
                            return axios.post(APP_URL + '/submit-report', {
                                reason: 'service cancel',
                                report_type: 'service_cancel',
                                description: textarea,
                                id: id,
                                pivot_id: pivot_id,
                                model: 'App\\Service',
                                employer_id: employer_id
                            })
                                .then(function (response) {
                                    if (response.data.type == 'success') {
                                        self.loading = false;
                                        self.showInfo(response.data.progress);
                                        document.addEventListener('iziToast-closing', function (data) {
                                            if (data.detail.id == 'info_notify') {
                                                self.showCompleted(response.data.message);
                                                window.location.replace(APP_URL + '/employer/services/cancelled');
                                            }
                                        });
                                    } else if (response.data.type == 'error') {
                                        self.showError(response.data.message);
                                    }
                                })
                                .catch(error => {
                                    if (error.response.status == 422) {
                                        if (error.response.data.errors.description) {
                                            self.$swal.showValidationMessage(
                                                error.response.data.errors.description[0]
                                            )
                                        }
                                    }
                                })
                        },
                        allowOutsideClick: () => !this.$swal.isLoading()
                    }).then((result) => { })
                } else if (status == "completed") {
                    this.$refs.myModalRef.show()
                }
            },
            submitFeedback: function (id, job_id) {
                this.loading = true;
                let review_form = document.getElementById('submit-review-form');
                let form_data = new FormData(review_form);
                form_data.append('freelancer_id', id);
                form_data.append('job_id', job_id);
                form_data.append('type', 'service');
                var self = this;
                axios.post(APP_URL + '/user/submit-review', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            var message = response.data.message;
                            self.showMessage(message);
                            setTimeout(function () {
                                self.$refs.myModalRef.hide()
                                window.location.replace(APP_URL + '/employer/services/completed');
                            }, 1000);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            check_auth: function (url) {
                var self = this;
                axios.get(APP_URL + '/check-service-auth-user')
                    .then(function (response) {
                        if (response.data.auth == 1) {
                            window.location.replace(url);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {

                    });
            },
            showReview: function (id) {
                var modal_ref = 'myModalRef-' + id;
                if (this.$refs[modal_ref]) {
                    this.$refs[modal_ref].show();
                } else {
                    this.showError(Vue.prototype.trans('lang.review_not_found'),);
                }
            },
            showReason: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            showRefoundForm: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            submitRefund: function (order_id) {
                this.loading = true;
                var self = this;
                var refundable_amount = $('#refundable-amount-'+order_id).val();
                var selected_user = $("#refundable_user_id-"+order_id).val();
                let form = document.getElementById('submit_refund_' + order_id);
                let form_data = new FormData(form);
                form_data.append('amount', refundable_amount);
                form_data.append('refundable_user_id', selected_user);
                form_data.append('order_id', order_id);
                form_data.append('type', 'service');
                axios.post(APP_URL + '/admin/submit-user-refund', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            window.location.replace(APP_URL + '/admin/service-orders');
                        } else if (response.data.type == 'error') {
                            var modal_ref = 'myModalRef-' + order_id;
                            self.$refs[modal_ref].hide();
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            self.loading = false;
                            var modal_ref = 'myModalRef-' + order_id;
                            self.$refs[modal_ref].hide();
                            if (error.response.data.errors.refundable_user_id) {
                                self.showError(error.response.data.errors.refundable_user_id[0]);
                            }
                        }
                    });
            },
        }
    });
}
if (document.getElementById("article-cat")) {
    const vmcatList = new Vue({
        el: '#article-cat',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            uploaded_image: false,
            color: '',
            rgb: '',
            wheel: '',
            is_show: false
        },
        components: { Verte },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-cats").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/article/delete-checked-cats', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/article/categories');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}
if (document.getElementById("articles")) {
    const vmcatList = new Vue({
        el: '#articles',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            uploaded_image: false,
            color: '',
            rgb: '',
            wheel: '',
            is_show: false
        },
        components: { Verte },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-cats").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/article/delete-checked-article', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/articles');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}