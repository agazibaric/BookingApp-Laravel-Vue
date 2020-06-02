<template>
  <div>
    <p>{{ book.title }} by {{ book.author }}</p>
  </div>
</template>

<script>
export default {
  props: ["book"],
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
