<template>

    <main class="container">
    <Header />
        <!-- tag che riceve i componetti iniettati dal router -->
        <router-view></router-view>
    </main>
    
</template>

<script>
import Header from './components/Header.vue'

export default {
    name: 'App',
    components:{
        Header
    }
}
</script>

<style lang="scss">

    @import '../sass/frontoffice/global';

</style>