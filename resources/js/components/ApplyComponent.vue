<template>
    <div>
        <form @submit="formSubmit">
            <button v-if="show" type="submit" class="btn btn-success" style="width:100%;">Apply</button>

            <button v-else type="submit" class="btn btn-dark" disabled style="width:100%;">Applied for job</button>
        </form>
    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        },
        methods:{
            formSubmit(e){
                e.preventDefault();
                axios.post('/applications/'+ this.jobid,{

                }).then((response) => {
                    this.show=false
                });
            }
        }
    }
</script>
