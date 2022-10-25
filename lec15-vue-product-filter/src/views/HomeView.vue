<template>
  <main>
<section class="hero">
  <h1>Welcome To Our App</h1>
  <img src="../assets/2.jpg" alt="">
</section>
  </main>
</template>
<script setup>
</script>

<style scoped>
.hero h1{
  color: #fff;
  font-size: 36px;
  position: absolute;
  z-index: 2;
left: 50%;
top: 50%;
margin: 0;
transform: translate(-50%,-50%);
}
.hero{
  position: relative;
}
.hero::before{
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, .5);
}
.hero img{
  height: 500px;
  width: 100%;
  object-fit: cover;
  display: block;
}

</style>