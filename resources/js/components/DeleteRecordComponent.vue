<template>
     <a  href="#" v-on:click.prevent="deleteRecord($event,title,message,'deleted', url)"
        class="wt-deleteinfo" :id="id">
        <i class="lnr lnr-trash"></i>
    </a>
</template>
<script>
export default {
    props: ['title', 'message', 'id', 'url'],
    components: {

    },
    data: function () {
        return {
            error: {
                    position: "topRight",
                    timeout: 4000
                },
        }
    },
    methods: {
        showError(error){
                return this.$toast.error(' ', error, this.error);
        },
        deleteRecord: function (event, delete_title, delete_message, deleted, date_url) {
                var element = event.currentTarget;
                this.elementID = element.getAttribute('id');
                this.$swal({
                    title: delete_title,
                    type: "warning",
                    showCancelButton: true,
                    customContainerClass:'hire_popup',
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                  }).then((result) => {
                    var self = this;
                    if(result.value) {
                        var element_id = element.getAttribute('id');
                        axios.post(date_url, {
                            id: element_id
                        })
                        .then(function (response) {
                            if (response.data.type == 'success') {
                                jQuery('.del-' + element_id).remove();
                                self.$swal(deleted, delete_message, 'success')
                                location.reload();
                            } else {
                                self.showError(response.data.message);
                            }
                        })
                    } else {
                        this.$swal.close()
                    }
                  })
            },
    },
    mounted:function(){},
    created() {

    },
}
</script>
