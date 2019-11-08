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

                  <a href="#" class="btn btn-primary">Add answer</a>
                </div>
              </div>
              <div class="card" v-for="(item, i) in answers" :key="i">
                <div class="card-header">Answer {{i+1}}</div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
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
                <button type="button" class="btn btn-secondary" @click="like()">Like</button>
                <button type="button" class="btn btn-secondary" @click="Dislike()">Dislike</button>
              </div>
              <h4>
                Votes
                <span class="label label-default">{{Qvalue}}</span>
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
      Qvalue: 0,
      dialog: false
    };
  },

  methods: {
    ans(item) {
      console.log(item);

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

    Dislike() {
      if (this.Qvalue <= 0) {
        this.Qvalue = 0;
      } else {
        this.Qvalue = this.Qvalue - 1;
      }
    }
  },
  mounted() {
    this.questionItems();
  }
};
</script>
  <style>
</style>