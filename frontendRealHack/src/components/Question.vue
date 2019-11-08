<template>
  <div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div>
              <div class="card text-center">
                <div class="card-header">
                  <h4>Question</h4>
                </div>
                <div class="card-body">
                  <h4 class="card-title">HAVE a SOLUTION?</h4>

                 <button
                type="button"
                class="btn btn-primary btn-lg"
                data-toggle="modal"
                data-target="#mydisplayInfo"
               data-dismiss="modal"
              >Add answer</button>

                
                </div>
              </div>
              <div class="card" v-for="(item, i) in answers" :key="i">
                <div class="card-header">Answer {{i+1}}</div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="materialUnchecked" v-model="check" @click="correct(item.QID)">
    <label class="form-check-label" for="materialUnchecked"> <small
            id="emailHelp"
            class="form-text text-muted"
          >correct</small></label>
</div>
                    <p>{{item.answer}}</p>
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--------------------------->
     <div id="mydisplayInfo" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div>
               <form>
      <div class="form-group">
        <h3>
          <label for="exampleInputEmail1">Add your Question Here</label>
        </h3>
        <textarea class="form-control" id="exampleFormControlTextarea1" v-model="ans" rows="3"></textarea>
      </div>
    </form>
    <button class="btn btn-primary" @click="addAwnser">Add Answer </button>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-secondary">
      <a href="addQuestion" style="color:#a6a6a6; align:center;">ADD Question</a>
    </button>

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
                <button type="button" class="btn btn-secondary" @click="like(item.QID)">Like</button>
                <button type="button" class="btn btn-secondary" @click="Dislike(item.QID)">Dislike</button>
              </div>
              <h4>
                Votes
                <span class="label label-default">  {{item.vote}}</span>
              </h4>
            </div>
            <div class="col-sm-8">
              <p class="card-text">{{item.question}}</p>
            </div>
            <div class="col-sm-2">
              <button
                type="button"
                class="btn btn-info btn-lg"
                data-toggle="modal"
                data-target="#myModal"
                @click="ans(item)"
              >Answers</button>
            </div>
          </div>
        </div>
      </div>
      <br />
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
      answers: [],
      Qid:"",
      Qvalue: 0,
       add: {
        question: "",
        
        QID:""
      },
      
      dialog: false,
       displayInfo: false,
    };
  },

  methods: {
    ans(item) {
      console.log(item);
this.Qid=item.QID;
this.text="";
this.ans="";
      axios
        .post(this.$baseUrl + "/getAnswers", item)
        .then(response => {
          this.answers = response.data.answers;
          console.log("******************");
          //console.log(response.data);
        })
        .catch(error => {
          console.log(error.question);
          console.log("ERROR");
        });
    },
    questionItems() {
      console.log("&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&");
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
    like(QID) {
      this.Qvalue = this.Qvalue + 1;
      console.log(QID);
      axios
        .post(
          this.$baseUrl + "/upVote",
          {
            QID: QID
          },
          {}
        )
        .then(response => {
          console.log("********$$$$$$$$$$$$$$$4**********");
          this.questionItems();
          return;
        })
        .catch(error => {
          console.log(error.response);
          console.log("ERROR");
        });
    },
    addAwnser() {
      //  console.log(this.add);
      //  let $user=localStorage.getItem("user");
      //  console.log( $user);
    
      this.add.answer = this.ans;
      this.add.QID=this.Qid;
      console.log("****************");
      console.log(this.add.answer);
      axios
        .post(this.$baseUrl + "/answer", this.add, {})
        .then(response => {
          this.$router.push("/");
          return;
        })
        .catch(error => {
          console.log(error.response);
          console.log("ERROR");
        });
    },

    answer(){
this.dialog = false;

    },

    Dislike(QID) {
      this.Qvalue = this.Qvalue - 1;
      console.log(QID);
      axios
        .post(
          this.$baseUrl + "/downVote",
          {
            QID: QID
          },
          {}
        )
        .then(response => {
          console.log("********$$$$$$$$$$$$$$$4**********");
          this.questionItems();
          return;
        })
        .catch(error => {
          console.log(error.response);
          console.log("ERROR");
        });
    },

    correct(QID){
 console.log("****************");
  console.log(this.check);

    }

   
  },
  mounted() {
    this.questionItems();
  }
};
</script>
  <style>
</style>