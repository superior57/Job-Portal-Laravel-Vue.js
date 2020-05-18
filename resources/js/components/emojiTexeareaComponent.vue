<template>
    <textarea class="form-control" id="custom-emoji" name="reply" placeholder="Type message here"></textarea>
</template>
<script>
    export default{
      props: [''],
        data() {
            return {}
        },
       methods: { },
        mounted() {
            jQuery("#custom-emoji").emojioneArea();
        },
    }
</script>