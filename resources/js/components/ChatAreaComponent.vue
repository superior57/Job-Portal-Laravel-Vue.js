<template>
    <div :trans_no_msg="this.no_msg">
        <div class="wt-chatarea" v-if="chat_start">
            <chat-messages :message="messages" :typing="typing" :message_id='message_id'></chat-messages>
            <div class="wt-replaybox">
                <div class="form-group">
                    <emoji-textarea></emoji-textarea>
                </div>
                <div class="wt-iconbox">
                    <a href="javascript:void(0);" @click="sendMessage" class="wt-btnsendmsg">{{ trans('lang.btn_send') }}</a>
                </div>    
            </div>
        </div>
        <div class="wt-chatarea wt-chatarea-empty" v-else>
            <figure class="wt-chatemptyimg">
                <img :src="no_record_img" :alt="img_desc">
                <figcaption><h3>{{ trans('lang.no_message_select') }}</h3></figcaption>
            </figure>
        </div>
    </div>
</template>
<script>
import io from 'socket.io-client';
import Event from '../event.js';
    export default{
      props: ['receiver_id', 'trans_no_msg', 'no_msg', 'img_desc', 'empty_error', 'chat_host', 'chat_port'],
        data() {
            return {
                user: Laravel.user.name,
                image:Laravel.user.image,
                newmessage: '',
                messages: [],
                receiver: '',
                socket : io(this.chat_host+':'+this.chat_port),
                chat_start: false,
                no_record_img: APP_URL+'/images/message-img.png',
                typing: false,
                message_id: 0,
                notificationSystem: {
                    error: {
                        position: "topRight",
                        timeout: 4000
                    }
                },
            }
        },
       methods: {
            showError(error){
                return this.$toast.error(' ', error, this.notificationSystem.error);
            },
           isTyping() {
                this.socket.emit('typing', this.user)
            },
            sendMessage(e) {
                var now = Math.trunc((new Date()).getTime() / 1000);
                this.newmessage = jQuery("#custom-emoji").val();
                if (this.newmessage) {
                    e.preventDefault();
                    var self = this;
                    this.socket.emit('chat-message',{ message: this.newmessage, user_id: this.receiver, user: this.name, image: this.image });
                    this.messages.push({ message: this.newmessage, image: this.image, is_sender: 'yes', id:now});
                    axios.post(APP_URL + '/message/send-private-message',{
                        author_id : Laravel.user.id,
                        receiver_id: self.receiver,
                        message: self.newmessage,
                        status: 0
                    })
                    .then(function (response) { 
                        jQuery("#custom-emoji")[0].emojioneArea.setText('');
                        self.newmessage = '';
                    })
                    .catch(function (error) {});
                    this.newmessage = null
                } else {
                     this.showError(this.empty_error);
                }
            }
        },
        mounted() {
            let self = this;
            Event.$on('chat-start', (data) => {
                this.chat_start = data.chat;
                this.receiver = data.user_id;
                this.messages = data.messages;
            })
            this.socket.on('chat-message',(data) => {
                var now = Math.trunc((new Date()).getTime() / 1000);
                this.messages.push({ message: data.message, is_sender: 'no', image: data.image, user_id: this.receiver, id: now })
            });
                this.socket.on('connected-users', function (data) {
            });
        },
        updated () {
            this.socket.on('typing', (data) => {
                this.typing = data
            })
            this.socket.on('stoptyping', () => {
                this.typing = false
            })

            jQuery('.wt-chatarea').linkify({target: "_blank"});
        },
        created(){
            this.socket.emit("add-user", {"userId": Laravel.user.id}); 
        }
    }
</script>