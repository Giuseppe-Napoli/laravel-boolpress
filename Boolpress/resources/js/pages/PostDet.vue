<template>
    <div>
        <div class="card mb-4">
            <div class="card-body" >
                <h5 class="card-title">{{post.title}}</h5>
                <span>{{FormatDate.format(post.created_at)}}</span>
                <span v-if="post.category" class="badge bg-warning text-dark float-right">{{post.category.name}}</span>
                <p class="card-text">{{post.content}}</p>
                <div>
                    <i
                    v-for="tag in post.tags"
                    :key="'tg'+tag.id"
                    class="mr-3"
                    >{{tag.name}}</i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

import FormatDate from '../classes/FormatDate'
export default {

    name: 'PostDet',
    data(){
        return{
            post:{},
            FormatDate
        }
    },
    mounted(){
        console.log(this.$route.params.slug);
        axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
            .then(res => {
                console.log(res.data);
                if(res.data.success){
                    this.post = res.data.data
                }else{
                    // reindirizzo verso la pagina 404
                    this.$router.push({name : 'error'})
                }
            })
            .catch(err =>{
                console.log(err);
            })
    }

}

</script>

<style>

</style>