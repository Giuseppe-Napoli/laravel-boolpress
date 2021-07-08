<template>
  <div>
      <h1>Blog</h1>
      
      <div class="card mb-4"
      v-for="post in posts"
      :key="'k'+ post.id"
      >
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <span>{{formatDate(post.date)}}</span>
            <span class="badge bg-warning text-dark float-right">{{post.category}}</span>
            <p class="card-text">{{post.content}}</p>
            <a href="#" class="btn btn-primary">Go</a>
        </div>
    </div>
    
  </div>

    

</template>

<script>
import axios from 'axios';
export default {
    name: 'Blog',
    data(){
        return{
            posts:[]
    
        }
    },

    methods:{
        getPosts(){
            axios.get('http://127.0.0.1:8000/api/posts')
                .then(res => {
                    this.posts = res.data.data
                })
                .catch(err => { 
                    console.log(err);
                })
        },

        formatDate(date){
            let d = new Date(date);
            let day = d.getDate();
            let m = d.getMonth() + 1;
            let y = d.getFullYear();

            if(day < 10) day = '0' + day;
            if(m < 10) m = '0' + m;

            return `${day}/${m}/${y}`;
        }
    },

    created(){
        this.getPosts();
    }
}
</script>

<style>

</style>