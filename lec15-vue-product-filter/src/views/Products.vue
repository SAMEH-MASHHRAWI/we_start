<template>
  <div class="container">
    <section class="main-wrapper">
      <div class="side">
        side
        <h3>Categories</h3>
        <label><input type="checkbox" name="" />sport</label>
        <label><input type="checkbox" name="" />sport</label>
        <label><input type="checkbox" name="" />sport</label>
        <label><input type="checkbox" name="" />sport</label>
        <hr />
        <h3>Colors</h3>
        <label><input type="checkbox" name="" />red</label>
        <label><input type="checkbox" name="" />blue</label>
        <label><input type="checkbox" name="" />green</label>
        <label><input type="checkbox" name="" />sport</label>
        <hr />
        <h3>price</h3>
        Min: <br />
        <input type="range" />
        <br />
        Mix: <br />
        <input type="range" />
      </div>
      <div class="content">
        <product-item v-for="product in products" :key="product.id" />
         <ProductItem />
       
      </div>
    </section>
  </div>
</template>
<style scoped>
.main-wrapper {
  display: flex;
  margin: 60px 0;
}

.main-wrapper .side {
  width: 30%;
  padding: 0 24px;
}
.main-wrapper .content {
  width: 70%;
  padding: 0 24px;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
}
.side label {
  display: block;
}
</style>

<script>
import ProductItem from "../components/ProductItem.vue";
import products from '../data/products.json' 
export default {
  components: { ProductItem },
  data() {
    return {
      products
    };
  },
};
</script>
