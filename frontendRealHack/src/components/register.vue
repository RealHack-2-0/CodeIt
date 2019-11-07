<template>
 <div class="col-sm-12">
    <div class="card text-center  " style="width: 28rem;">
<form>
  <h5 class="card-header info-color white-text text-center py-4">
        <strong>Register</strong>
    </h5>
  <div class="form-colum">
  <div class="form-group mx-sm-3 mb-2 ">
      <label for="inputEmail4"></br>Email</label>
      <input  
          
          name="login"
         
          v-model="register.email" type="email" class="form-control" id="inputEmail4" placeholder="Enter email">
          <small
            id="emailHelp"
            class="form-text text-muted"
          >We'll never share your email with anyone else.</small>
    </div>
    </br>
     <div class="form-group mx-sm-3 mb-2 ">
    <label for="FullName">User name</label>
    <input 
     type="text"
         
          
          name="name"
          placeholder="Enter a user name"
          v-model="register.name"
     class="form-control" id="inputAddress" >
  </div>
    </br>
    <div class="form-group mx-sm-3 mb-2">
      <label for="inputPassword4">Password</label>
      <input
       
         
          name="login"
          
          v-model="register.password"
       type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
 </br></br>
 
  <button type="submit" class="btn btn-primary" @click="registerUser">Register</button>
</form>

    </div>
    <div class="alert alert-info" role="alert">
      Already have an account? <a href="login" class="alert-link">Sign in</a>.
    </div>
 </div>
  
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      register: {
        name: "",
        email: "",
        password: ""
      }
    };
  },

  methods: {
    registerUser() {
      axios
        .post(this.$baseUrl + "/register", this.register, {})
        .then(response => {
          this.$router.push({
            path: "/login"
          });
        })
        .catch(error => {
          console.log("ERROR");
        });
    }
  }
};
</script>
<style>
  .selector-for-some-widget {
  box-sizing: content-box;
}
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 20px; /* Added */
}
form {
    padding: 11px;
}
  </style>