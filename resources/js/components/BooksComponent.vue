<template>
  <div>
    <book-component v-for="book in books" :key="book.id" :book="book"></book-component>
  </div>
</template>

<script>
export default {
  props: ["books"],
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
