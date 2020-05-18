<template>
    <div>
        <style1 
        :app="app"
        :page_id="page_id"
        v-if="app.style == 'style1'">
        </style1>
        <style2 
        :app="app"
        :page_id="page_id"
        v-if="app.style == 'style2'">
        </style2>
    </div>
</template>
<script>
import style1 from './style1'
import style2 from './style2'
export default {
    components:{style1, style2},
    props:['parent_index', 'element_id', 'apps', 'page_id'],
    data() {
        return {
            url:APP_URL,
            app:{},
            imageURL:APP_URL+'/uploads/pages/'+this.page_id+'/'
        }
    },
    methods:{
    },
    created: function() {
        var index = this.getArrayIndex(this.apps, 'id', this.element_id)
        if (this.apps[index]) {
            this.app = this.apps[index]
            this.app.style = this.apps[index].style
        }
        this.app.parentIndex = this.parent_index
        
    },   
};
</script>
