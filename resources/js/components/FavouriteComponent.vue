<template>
    <div>
        <button v-if="show" @click.prevent="unsave()" class="btn btn-secondary" style="width:100%;">Unsave job</button>

        <button v-else @click.prevent="save()" class="btn btn-primary" style="width:100%;">Save job</button>
    </div>
</template>

<script>
    export default {
        props:['jobid', 'favourited'],
        data(){
            return{
                'show':true
            }
        },
        mounted(){
            this.show = this.jobFavourited?true:false;
        },
        computed:{
            jobFavourited(){
                return this.favourited
            }
        },
        methods:{
            save(){
                axios.post('/save/'+this.jobid).then(response=>this.show=true).catch(error=>alert('Job was not saved successfully'))
            },
            unsave(){
                axios.post('/unsave/'+this.jobid).then(response=>this.show=false).catch(error=>alert('Job was not saved successfully'))
            }
        }
    }
</script>
