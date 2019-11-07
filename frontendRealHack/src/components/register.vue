<template>
    <div class = "container">
         <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs20 sm12 md8>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Register form</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  <template v-slot:activator="{ on }">
                    <v-btn :href="source" icon large target="_blank" v-on="on">
                      <v-icon large>code</v-icon>
                    </v-btn>
                  </template>
                  <span>Source</span>
                </v-tooltip>
                <v-tooltip right>
                  <template v-slot:activator="{ on }">
                    <v-btn icon large href="https://codepen.io/johnjleider/pen/wyYVVj" target="_blank" v-on="on">
                      <v-icon large>mdi-codepen</v-icon>
                    </v-btn>
                  </template>
                  <span>Codepen</span>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" name="fname" label="First Name" type="text"></v-text-field>
                  <v-text-field prepend-icon="person" name="lname" label="Last Name" type="text"></v-text-field>
                   <v-text-field prepend-icon="email" name="email" label="Email" type="email"></v-text-field>
                  <v-text-field id="password" prepend-icon="lock" name="pass" label="Password" type="password"></v-text-field>
                  <v-text-field id="cpassword" prepend-icon="lock" name="cpass" label="Confirm Password" type="password"></v-text-field>

                </v-form>
                

              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn dark >Register</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

    </div>
</template>

<script>

</script>