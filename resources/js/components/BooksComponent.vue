<template>
  <div class="row">
    <div class="card-deck justify-content-center">
      <book-component v-for="book in books" :key="book.id" :loggeduser="loggeduser" :book="book"></book-component>
    </div>
  </div>
</template>

<script>
export default {
  props: ["books", "loggeduser", "bookABook"],
  mounted() {}
};
</script>
