<template>

    <div>
        
        <h1>Welcome</h1>
        <router-link :to="{ name: 'null' }">asadsads</router-link>
        <router-link :to="{ name: 'HelloWorld' }">/asdasdasd</router-link>
        <router-link :to="{name:'j'}">asdasd</router-link>
        
        <router-view></router-view>
        
    </div>
    
</template>