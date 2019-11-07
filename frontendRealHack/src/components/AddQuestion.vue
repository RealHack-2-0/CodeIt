<template>
<div>
  <form>
  <div class="form-group">
    <h3><label for="exampleInputEmail1">Add your Question Here</label></h3>
    <textarea class="form-control" id="exampleFormControlTextarea1"
     v-model="add.question"
rows="3"></textarea>
  </div>

  
</form>
 <button  class="btn btn-primary"  @click="addQuestion">Add</button>
</div>
</template>

<script>
import axios from "axios";

export default {
  name: "app",
  data() {
    return {
      add: {
        question: "",
          UID: "",
        
      },
       question: [],
    };
  },

  methods: {
    addQuestion() {
        //  console.log(this.add);
        //  let $user=localStorage.getItem("user");
        //  console.log( $user);
         this.add.UID= 4;
          console.log( "****************");
           console.log( this.add.UID);
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
    
  }
 

};
</script>