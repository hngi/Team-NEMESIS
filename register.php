<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nemesis Twitter Bot Landing Page</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="register.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet"> -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Fugaz+One|Lato:400,700|Montserrat:400,700&display=swap");
    </style>
</head>

<body>
    <div id="app">
        <v-app>
            <!-- style="background-color: rgba(29, 161, 242, 0.4);"  -->
            <v-toolbar extended>

            <!-- <v-toolbar-title>Title</v-toolbar-title> -->

                <v-container class="display-3 text-center">
                    <div style="font-family: Fugaz One;">Nemesis Tweetbot</div>
                </v-container>
                <v-container class="text-center">
                    <v-btn @click.prevent="gotoLogin" href="signin.php" outlined color="blue" style="background-color: white; border-radius: 20px;">log in</v-btn>
                    <v-btn @click.prevent="gotoRegister" href="signup.php" outlined color="blue" style="background-color: white;  border-radius: 20px;">Sign up</v-btn>
                    <v-btn @click.prevent="gotoAbout" href="about.php" outlined color="blue" style="background-color: white;  border-radius: 20px;">About Us</v-btn>
                </v-container>



            </v-toolbar>
            <v-row>
                <v-col cols="12" xl="6" md="6" xs="12" sm="12" lg="6" style="background-color: rgba(29, 161, 242, 0.4);">
                    <v-container>
                        <v-card color="transparent" flat class="mx-auto pa-3" max-width="500px" style="border-radius: 10px;">
                            <v-row class="">
                                <v-col class="d-flex flex-row justify-center">
                                    <img src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341483/Team%20Nemesis_twitterBot/twitter_icon_pzp2pk.svg" alt="">
                                </v-col>
                            </v-row>
                            <v-row class="d-flex flex-column justify-center align-center">
                                <!-- :class="{'ml-12': $vuetify.breakpoint.mdAndDown}" -->
                                <v-col>
                                    <div id="nemesis-header">Nemesis Tweetbot</div>
                                </v-col>
                            </v-row>
                            <v-row class="">
                                <v-col class="d-flex flex-row justify-center">
                                    <img src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341619/Team%20Nemesis_twitterBot/wifi_icon_mjyfgk.svg" alt="">
                                </v-col>
                            </v-row>
                            <v-row class="">
                                <v-col class="d-flex flex-row justify-center">
                                    <div>connect twitter account</div>
                                </v-col>
                            </v-row>

                            <v-row class="">
                                <v-col class="d-flex flex-row justify-center">
                                    <img src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341614/Team%20Nemesis_twitterBot/download_icon_njf4hm.svg" alt="">
                                </v-col>
                            </v-row>
                            <v-row class="">
                                <v-col class=" px-5 d-flex flex-row justify-center">
                                    <div>Save Tweet directly from twitter to external drive</div>
                                </v-col>
                            </v-row>

                            <v-row class="">
                                <v-col class="d-flex px-5 flex-row justify-center">
                                    <img src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341616/Team%20Nemesis_twitterBot/file_icon_a8sddq.svg" alt="">
                                </v-col>
                            </v-row>
                            <v-row class="">
                                <v-col class="d-flex flex-row justify-center">
                                    <div>Enjoy viewing favorite tweet on external drive at leisure</div>
                                </v-col>
                            </v-row>

                        </v-card>
                    </v-container>
                </v-col>

                <v-col xs="12" sm="12" md="6" lg="6" xl="6" cols="12" class="d-flex flex-column justify-center align-center">
                    <v-card class="d-flex flex-column justify-center align-center pa-8" min-width="400px">
                        <v-card-title class="text-center">Create an account</v-card-title>
                        <v-container>
                            <form id="register" method="post" action="register.php">
                                <v-form ref="register">
                                    <v-text-field name="name" v-model="username" :rules="usernameRules" outlined counter="10" label="Username" placeholder="enter your username" count="10" required></v-text-field>
                                    <v-text-field :rules="emailRules" v-model="email" name="email" type="email" outlined color="blue" label="Email" placeholder="enter your email address" count="10" required></v-text-field>
                                    <v-text-field :rules="passwordRules" v-model="password" name="password" type="password" outlined label="Password" placeholder="enter your Password" color="blue" count="10" required></v-text-field>
                                    <!-- <v-text-field ref="confirm" :rules="confirmPasswordRules" v-model="confirmPassword" type="password" outlined label="Confirm Password" placeholder="enter your Password again" color="blue" count="10" required></v-text-field> -->
                                    <p class="text-center" style="font-size:13px;color:#848d94;">{{msg}}</p>
                                    <v-row class="d-flex flex-row justify-center">
                                        <v-btn :loading="loading" @click="registerUser" name="submit" color="#39a2e4" dark min-width="300px">Create Account</v-btn>
                                    </v-row>
                                </v-form>
                            </form>
                            <v-row class="d-flex flex-row justify-center mt-3">
                                <v-btn @click="gotoSigninWithTwitter" min-width="300px" color="#39a2e4" dark>Sign in with twitter</v-btn>
                            </v-row>
                            <v-row class="d-flex flex-row justify-center mt-3">
                                <div class="ma-2 mt-4" style="font-size:13px;color:#848d94;">have an account?</div>
                                <v-btn @click="gotoSignin" class="ma-2" color="#39a2e4" dark>Sign in</v-btn>
                            </v-row>
                        </v-container>
                    </v-card>

                </v-col>
            </v-row>
        </v-app>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                msg: "",
                loading: false,
                username: "",
                email: "",
                password: "",
                usernameRules: [
                    v => v.length >= 5 || 'Minimum lenght is 5',
                    v => !(/[\s]+/.test(v)) || 'no whitespace allowed',
                ],
                emailRules: [
                    v => /^([\w\d\.]+)@([\w]{2,6})\.([\w]{2,5})(\.[\w]{2,4})?$/g.test(v) || 'must be a valid email address'
                ],
                passwordRules: [
                    v => /[a-z]+/.test(v) || "must contain lowercase alphabets",
                    v => /[A-Z]+/.test(v) || "must contain uppercase alphabets",
                    v => /[\d]+/.test(v) || "must contain numbers",
                ],
            },
            methods: {
                gotoSignin: function() {
                    window.location.href = "login.php";
                },
                gotoSigninWithTwitter: function() {
                    window.location.href = "api.php";
                },
                gotoAbout: function() {
                    window.location.href = "about.php";
                },
                registerUser: function() {
                    if (this.$refs.register.validate()) {
                        this.loading = true;
                        const form = document.getElementById('register');
                        $.ajax({
                            type: "post",
                            //url: "http://localhost/Team-Nemesis-Task5/Team-NEMESIS/signup.php",
                            url: "//nemesis-twitterbot.herokuapp.com/signup.php",
                            data: {
                                "name": this.username,
                                "email": this.email,
                                "password": this.password
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(app);
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
    </div>
</body>

</html>