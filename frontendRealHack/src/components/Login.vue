<template>
  <div class="col-sm-6">
    <div class="card text-center " style="width: 28rem;">
      <form>
       <h5 class="card-header info-color white-text text-center py-4">
        <strong>Sign up</strong>
    </h5>
        <div class="form-group mx-sm-3 mb-2">
          <label for="exampleInputEmail1">Email address</label>
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
          <label for="exampleInputPassword1">Password</label>
          <input
            type="password"
            name="login"
            placeholder="password"
            v-model="login.password"
            class="form-control"
            id="exampleInputPassword1"
          />
        </div>

      
        <br />
        <div></div>
      </form>
        <button type="submit" class="btn btn-primary" @click="loginUser">Log in</button>
    </div>
  </div>
</template>

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
            console.log($token);
            localStorage.setItem("token", $token);
            localStorage.setItem("user", response.data.user);

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