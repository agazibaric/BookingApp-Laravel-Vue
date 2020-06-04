<template>
  <div class="row">
    <div class="card-deck justify-content-center mx-auto">
      <book-component v-for="book in books" :key="book.id" :loggeduser="loggeduser" :book="book"></book-component>
      <h3 v-if="books.length == 0">No results</h3>
    </div>
  </div>
</template>

<script>
export default {
  props: ["books", "loggeduser", "bookABook"],
  mounted() {}
};
</script>
