 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="forgot-password.css" />
  </head>
  <body>
    <div class="container" id="app">
      <div class="card card1">
        <div class="card-body">
          <div id="title">
            <img
              src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341483/Team%20Nemesis_twitterBot/twitter_icon_pzp2pk.svg"
              alt="twitter logo"
            />
            <h3>Nemesis Tweetbot</h3>
          </div>
          <h2>Forgot your password?</h2>
          <p>
            Please input the email address associated with your account and a
            password reset link would be sent to the email address.
          </p>
          <p class="text-center" style="font-size:13px;color:#848d94;">{{msg}}</p>
                 
          
          
          <form id="processforgot" method="post" action="processforgot.php" >
          <v-form ref="processforgot">
          <div class="form-control-lg">
            <!-- <label for="name" class="control-label">Enter Email</label> -->
            <!-- <input
              type="email"
              name="email"
              v-model="email" 
              class="form-control"
              aria-label="email"
              aria-describedby="addon-wrapping"
            /> -->
            <v-text-field name="email" v-model="email"
             :rules="emailRules" outlined  label="Email"
              placeholder="Enter your email"  required></v-text-field>
          </div>
          <div class="form-group my-5">

          <v-btn @click="processForgot" class="ma-2" color="#39a2e4" dark>Reset Password</v-btn>
            <!-- <input
              
              name="submit_email"
              class="btn btn-lg"
              value="Reset Password"
              type="button"
              data-toggle="modal"
              @click="processForgot" 
              data-target="#exampleModalCenter"
            /> -->
          </div>
          </v-form>
          </form>


        </div>
      </div>
      <div class="card card2">
        <div class="card-body">
        <div class="card-body">
          <img src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1570186050/Team%20Nemesis_twitterBot/forgot-password_pcporg.svg" alt="forgot password" />
        </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="text-align: center;" class="modal-content">
          <!-- <div style="font-size: 23px; margin: 1em;" class="modal-body">
            <!-- Email sent successfully. Please check your inbox. -->
          <!--</div> -->
        </div>
      </div>
    </div>

    <script
      src="https://kit.fontawesome.com/2534cfc66b.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
     


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                msg: new URLSearchParams(window.location.search).get("msg"),
                loading: false, 
                email: "", 
                emailRules: [
                    v => /^([\w\d\.]+)@([\w]{2,6})\.([\w]{2,5})(\.[\w]{2,4})?$/g.test(v) || 'must be a valid email address'
                ] 
            },
            methods: {
                
                processForgot: function() {
                  console.log("getting here 1");
                    if (this.$refs.processforgot.validate()) {
                      console.log("getting here 2");
                        this.loading = true;
                        const form = document.getElementById('processforgot');
                        $.ajax({
                            type: "post",
                           // url: "http://localhost/Team-Nemesis-Task5/Team-NEMESIS/processforgot.php",
                            url: "//nemesis-twitterbot.herokuapp.com/processforgot.php",
                            data: { 
                                "email": this.email
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(app);
                                this.email = "";
                                app.msg = response.msg;
                            },
                            error: function(xhr, err) {
                                console.log(xhr);
                            },
                        });
                        this.loading = false;

                    }
                },
            },
            computed: {

            },
        });
    </script>


  </body>
</html>
<!-- name="recover-submit"  -->