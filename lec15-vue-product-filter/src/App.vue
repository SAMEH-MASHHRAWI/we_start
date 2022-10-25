<script setup>
import { RouterLink, RouterView } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";

</script>

<template>
  <div>
    <header>
      <RouterLink class="logo" to="/">Products Filter</RouterLink>
      <nav>
        <RouterLink  to="/">Home</RouterLink>
        <RouterLink  to="/products">Products</RouterLink>
      </nav>
    </header>
    <RouterView />
  </div>
</template>
