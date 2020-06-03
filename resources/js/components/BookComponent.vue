<template>
  <div>
    <div class="card border-dark mb-3" style="min-width: 16rem; max-width: 16rem;">
      <div class="card-body">
        <h5 class="card-title">{{ book.title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Author: {{ book.author }}</h6>
        <button v-if="isBookable()" @click="bookABook()" href class="btn btn-success mt-2">Book</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["book", "loggeduser"],
  mounted() {
    console.log(this.loggeduser);
  },
  methods: {
    isBookable: function() {
      // User can book the book if it's not his book
      // and if it's not booked by someone else
      return (
        this.book.user_booked_id === null &&
        this.loggeduser != this.book.user_id
      );
    },
    bookABook: function() {
      // Logged user will book a this.book
      axios
        .get("/bookABook/" + this.book.id)
        .then(function(response) {
          console.log("Successfull");
          // Redirect to all booked books
          window.location.href = "/bookedBooks";
        })
        .catch(function(error) {
          console.log("error");
        });
    }
  }
};
</script>
