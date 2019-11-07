<template>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form>
        <input
          type="text"
          id="login"
          class="fadeIn second"
          name="login"
          placeholder="email"
          v-model="login.email"
        />
        <input
          type="password"
          id="password"
          class="fadeIn third"
          name="login"
          placeholder="password"
          v-model="login.password"
        />
      </form>
      <button @click="loginUser">Login</button>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
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