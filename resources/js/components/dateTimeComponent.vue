<template>
    <date-pick v-model="this.input_value"></date-pick>
</template>

<script>
import DatePick from 'vue-date-pick';
export default{
    components: {DatePick},
    props: ['input_value'],
        data(){
            return {
                
            }
        },
        methods: {
            
        },
        mounted: function () {
            console.log(this.input_value);
        },
        created: function() {
            
        } 
    }
</script>