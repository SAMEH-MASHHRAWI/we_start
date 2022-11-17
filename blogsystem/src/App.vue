<script setup>
import { RouterLink, RouterView } from "vue-router";

</script>

<template>
  <header>
    <nav>
      <div class="logo">
        <routerLink to="/">logo</routerLink>
      </div>
      <div class="menu">
        <ul>
          <li><routerLink to="/">Home</routerLink></li>
          <li><routerLink to="/posts">Posts</routerLink></li>
        </ul>
      </div>
    </nav>
  </header>
  <div>
    <router-view></router-view>
  </div>
</template>
