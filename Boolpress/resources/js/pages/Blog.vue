<template>
    
  <div>
        <h1>Blog</h1>
        <div v-if="!loaded" class="text-center mt-5">
            <Loading/>
        </div>
        
        
        <div v-else>

            <Card
                v-for="post in posts"
                :key="'key'+ post.id"
                :title="post.title"
                :date="post.date"
                :category="post.category"
                :content="post.content"
                :slug="post.slug"
                />

        </div>



    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <button 
                    class="page-link" 
                    @click="getPosts(pagination.current - 1)"
                     v-if="pagination.current > 1">
                        <span aria-hidden="true">&laquo;</span>
                    </button>
                </li>

                <li class="page-item"
                v-for="p in pagination.last"
                :key="'page'+ p.id"
                >
                    <button class="page-link" 
                    @click="getPosts(p)"
                    >{{p}}</button>
                </li>
              
                <li class="page-item">
                    <button class="page-link" 
                    @click="getPosts(pagination.current + 1)"
                    v-if="pagination.current < pagination.last ">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    
  </div>

    

</template>

<script>
import axios from 'axios';
import Loading from '../components/Loading.vue';
import Card from '../components/Card.vue';

export default {
    name: 'Blog',

    components:{
        Loading,
        Card,
    },

    data(){
        return{
            posts:[],
            pagination:{},
            loaded:false,

            
            
    
        }
    },

    methods:{
        getPosts(page = 1){

            this.loaded = false;

            axios.get('http://127.0.0.1:8000/api/posts',{
                params:{
                    page:page,
                }
            })
                .then(res => {
                    this.posts = res.data.data
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    }
                    this.loaded = true;
                })
                .catch(err => { 
                    console.log(err);
                })
        },

       
    },

    created(){
        this.getPosts();
    }
}
</script>

<style>

</style>