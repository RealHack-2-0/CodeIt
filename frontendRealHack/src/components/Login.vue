<template>
  <div class="col-sm-12">
    <div class="alert alert-info" role="alert">
        <h4>Please Sign in to continue</h4>
    </div>
    <div class="card text-center " style="width: 28rem;">
      <form>
        <h5 class="card-header info-color white-text text-center py-4">
          <strong>Sign up</strong>
        </h5>
        <div class="form-group mx-sm-3 mb-2">
          <label for="exampleInputEmail1"></br>Email address</label>
          <input
            name="login"
            v-model="login.email"
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter email"
          />
          <small
            id="emailHelp"
            class="form-text text-muted"
          >We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="exampleInputPassword1"></br>Password</label>
          <input
            type="password"
            name="login"
            placeholder="Enter password"
            v-model="login.password"
            class="form-control"
            id="exampleInputPassword1"
          />
        </div>
        </br>

      
        <br />
        <div></div>
      </form>
        <button type="submit" class="btn btn-primary" @click="loginUser">Log in</button>
    </div>
    <div class="alert alert-info" role="alert">
      Don't have an account yet? <a href="register" class="alert-link">Register here</a>.
    </div>
  </div>
</template>
<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
</style>

<script>
import axios from "axios";

export default {
  name: "app",
  data() {
    return {
      login: {
        email: "",
        password: ""
      }
    };
  },

  methods: {
    loginUser() {
      axios
        .post(this.$baseUrl + "/login", this.login, {})
        .then(response => {
          let $token = response.data.token;
          console.log($token);

          if ($token) {
            //console.log(response.data.user);
                  
            
            console.log(response.data.user);
            localStorage.setItem("token", $token);
            localStorage.setItem("UID", response.data.user.UID);
          //  console.log(localStorage.getItem("UID"));


         let $user=localStorage.getItem("user");
            console.log( $user);

            this.$router.push("/");
          }
        })
        .catch(error => {
          console.log(error.response);
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