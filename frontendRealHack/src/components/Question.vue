<template>
<div>
<button type="button" class="btn btn-secondary"  > <a
                               href="addQuestion"
                               
                                style="color:#a6a6a6; align:center;"
                              >ADD Question</a></button>

                              
  <div>
  <div class="card" v-for="(item, i) in question" :key="i">
  <div class="card-header">
    <h5>Question {{i+1}}</h5>
  </div>
  <div class="card-body">
  <div class="row">
  <div class="col-sm-2">
  <div class="btn-group" role="group" aria-label="Button group with
nested dropdown">
  <button type="button" class="btn btn-secondary" @click="like(item.QID)" >Like</button>
  <button type="button" class="btn btn-secondary" @click="Dislike(item.QID)">Dislike</button>


</div>
<h4>Votes<span class="label label-default" >  {{item.vote}}</span></h4>
</div>
  <div class="col-sm-8">
    <p class="card-text">{{item.question}}</p>
  </div>
  <div class="col-sm-2">
    <a href="#" class="btn btn-primary">Answers</a>
  </div>
  </div>
  </div>
</div>
</br>
  
</div>
</div>
</template>
<script>
import axios from "axios";

export default {
  name: "app",
  data() {
    return {
       question: [],
       Qvalue:0,
       revo: {
        question: "",
          UID: "",
        
      },
    };
  },

methods: {
   questionItems() {

     console.log('&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&');
      axios
       
        .post(this.$baseUrl + "/getQuestions")
        .then(response => {
          this.question = response.data.question;
console.log("******************");
          console.log(this.question);
        })
        .catch(error => {
          console.log(error.question);
          console.log("ERROR");
        });
    },
    like(QID){
      
       this.Qvalue = this.Qvalue +1;
 console.log(QID);
        axios
        .post(this.$baseUrl + "/upVote", {
          'QID':QID
        }, {})
        .then(response => {
           console.log("********$$$$$$$$$$$$$$$4**********");
           this. questionItems();
          return;
        })
        .catch(error => {
          console.log(error.response);
          console.log("ERROR");
        });

    },
    
    Dislike(QID){
     this.Qvalue = this.Qvalue -1;
      console.log(QID);
        axios
        .post(this.$baseUrl + "/downVote", {
          'QID':QID
        }, {})
        .then(response => {
           console.log("********$$$$$$$$$$$$$$$4**********");
            this. questionItems();
          return;
        })
        .catch(error => {
          console.log(error.response);
          console.log("ERROR");
        });
       
    },
    
     
 

 
} ,
 mounted() {
    this.questionItems();
  },

}
</script>
  <style>
  
  </style>