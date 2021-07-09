<template>

    <div>
        <div class="card mb-4">
            <div class="card-body" >
                <h5 class="card-title">{{title}}</h5>
                <span>{{FormatDate.format(date)}}</span>
                <span class="badge bg-warning text-dark float-right">{{category}}</span>
                <div>
                    <router-link class="btn btn-primary" :to ="{name: 'postdet' ,params:{slug}}">Visualizza</router-link>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FormatDate from '../classes/FormatDate'


export default {
    name: 'Card',
    props: ['title','category','date','content','slug'],
    data(){
        return{
            FormatDate
        }
    },

    methods:{
        
    }
}
</script>

<style>

</style>