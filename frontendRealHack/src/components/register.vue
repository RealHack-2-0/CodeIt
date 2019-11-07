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
          id="name"
          class="fadeIn second"
          name="name"
          placeholder="name"
          v-model="register.name"
        />
        <input
          type="text"
          id="login"
          class="fadeIn second"
          name="login"
          placeholder="email"
          v-model="register.email"
        />
        <input
          type="password"
          id="password"
          class="fadeIn third"
          name="login"
          placeholder="password"
          v-model="register.password"
        />
      </form>
      <button @click="registerUser">Register</button>

      <!-- Remind Passowrd -->
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
            path: "/loginPage"
          });
        })
        .catch(error => {
          console.log("ERROR");
        });
    }
  }
};
</script>