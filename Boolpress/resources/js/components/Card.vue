<template>

    <div>
        <div class="card mb-4">
            <div class="card-body" >
                <h5 class="card-title">{{title}}</h5>
                <span>{{formatDate(date)}}</span>
                <span class="badge bg-warning text-dark float-right">{{category}}</span>
                <div>
                    <a href="#" class="btn btn-primary">Go</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: ['title','category','date','content','slug'],

    methods:{
         formatDate(date){
            let d = new Date(date);
            let day = d.getDate();
            let m = d.getMonth() + 1;
            let y = d.getFullYear();

            if(day < 10) day = '0' + day;
            if(m < 10) m = '0' + m;

            return `${day}/${m}/${y}`;
        }
    }
}
</script>

<style>

</style>