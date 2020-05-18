<template>
    <div v-if="notify">
        <div v-for="(user, index) in users" :key="index" @click="startChat(user.id)" class="wt-ad" :class="[active_id===user.id ? 'wt-active' : '' , user.status_class]">
            <figure v-if="user.image"><img :src="image_path+user.image" :alt="user.image_name"></figure>
            <div class="wt-adcontent">
                <h3 v-if="user.name">{{user.name}}</h3>
                <span v-if="user.tagline">{{user.tagline}}</span>
            </div>
        </div>
    </div>
    <div v-else>
        <div v-for="(user, index) in users" :key="index" @click="startChat(user.id)" class="wt-ad" :class="[active_id===user.id ? 'wt-active' : '']">
            <figure v-if="user.image"><img :src="image_path+user.image" :alt="user.image_name"></figure>
            <div class="wt-adcontent">
                <h3 v-if="user.name">{{user.name}}</h3>
                <span v-if="user.tagline">{{user.tagline}}</span>
            </div>
        </div>
    </div>
</template>
<script>
import Event from '../event.js';
    export default{
        data() {
            return {
                users: [],
                active:false,
                messages:[],
                active_id:'',
                notify:true,
                image_path:APP_URL,
            }
        },
        methods: {
            startChat(id){
                this.notify = false;
                this.active_id = id;
                let self = this;
                axios.post(APP_URL + '/message-center/get-messages',{
                    sender_id : id
                })
                .then(function (response) {
                   self.messages = response.data.messages;
                   Event.$emit('chat-start', { user_id: id, chat:true, messages:self.messages });
                   Event.$emit('active-user', { user: response.data.selected, id:id});
                });
                self.messages = [];
            },
            
        },
        mounted: function () {
            Event.$on('chat-users', (data) => {
                this.users = data.users;
            })
        },
        created() {
            
        }
    }
</script>

<style>
    .users {
        background-color: #fff;
        border-radius: 3px;
    }
</style>