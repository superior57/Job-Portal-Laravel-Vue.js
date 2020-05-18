<template>
    <div class="wt-memessage wt-readmessage">
        <figure>
            <img :src="user_image" :alt="img" class="mCS_img_loaded">
            {{ message.user.first_name }}
            </figure>
        <div class="wt-description">
            <p>{{ message.body }}</p>
            <time datetime="2017-08-08">{{ message.created_at }}</time>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['message', 'user_image', 'img'],
        mounted: function () {
            console.log(this.message)
        }
    }
</script>