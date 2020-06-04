<template>
  <div>
    <div class="card border-dark mb-3" style="min-width: 16rem; max-width: 16rem;">
      <div class="card-body">
        <h5 class="card-title">{{ book.title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Author: {{ book.author }}</h6>
        <button v-if="isBookable()" @click="bookABook()" href class="btn btn-success mt-2">Book</button>
        <button v-if="isBookedByMe()" @click="returnABook()" href class="btn btn-danger mt-2">Return</button>
        <p v-if="isMyBook()" class="text-info">This is your book</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["book", "loggeduser"],
  data: function() {
    return {
      // Copy props book data to bookData
      bookData: Vue.util.extend({}, this.book)
    };
  },
  mounted() {},
  methods: {
    isBookable: function() {
      // User can book the book if it's not his book
      // and if it's not booked by someone else
      return (
        this.bookData.user_booked_id === null &&
        this.loggeduser != this.bookData.user_id
      );
    },

    isBookedByMe: function() {
      // Returns true if this book is booked by logged user
      return this.bookData.user_booked_id == this.loggeduser;
    },

    isMyBook: function() {
      // Returns true if this is logged user's book
      return this.bookData.user_id == this.loggeduser;
    },

    bookABook: function() {
      // Logged user will book the this.book
      axios
        .get("/bookABook/" + this.book.id)
        .then(response => {
          // User booked the book successfully
          // Assign user to bookData
          this.bookData.user_booked_id = this.loggeduser;
        })
        .catch(error => {
          console.log(error);
        });
    },

    returnABook: function() {
      // User returns book that he have booked
      axios
        .get("/returnABook/" + this.book.id)
        .then(response => {
          // User returned the book successfully
          // Set booked user of the book to null
          this.bookData.user_booked_id = null;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
