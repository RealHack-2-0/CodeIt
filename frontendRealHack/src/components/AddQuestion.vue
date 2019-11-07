<template>
  <div>
    <form>
      <div class="form-group">
        <h3>
          <label for="exampleInputEmail1">Add your Question Here</label>
        </h3>
        <textarea class="form-control" id="exampleFormControlTextarea1" v-model="text" rows="3"></textarea>
      </div>
    </form>
    <button class="btn btn-primary" @click="addQuestion">Add</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "app",
  data() {
    return {
      text: "",
      add: {
        question: "",
        UID: ""
      },
      question: []
    };
  },

  methods: {
    addQuestion() {
      //  console.log(this.add);
      //  let $user=localStorage.getItem("user");
      //  console.log( $user);
      this.add.UID = 3;
      this.add.question = this.text;
      console.log("****************");
      console.log(this.add.question);
      axios
        .post(this.$baseUrl + "/ask", this.add, {})
        .then(response => {
          this.$router.push("/");
          return;
        })
        .catch(error => {
          console.log(error.response);
          console.log("ERROR");
        });
    },

    remove() {
      var Filter = require("bad-words"),
        filter = new Filter();

      this.text = filter.clean(this.text);
      console.log(this.add.question);
    }
  },

  watch: {
    // whenever keywords changes, this function will run
    text: function() {
      this.remove();
    }
  }
};
</script>