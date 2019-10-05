<?php
// if (!session_id()) {
//     session_start();
// }
// if (isset($_SESSION['logged_in'])) {
//     header('Location: dashboard.php');
// }
// header('Location: signin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nemesis Twitter Bot Landing Page</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Fugaz+One|Lato:400,700|Montserrat:400,700&display=swap");
    </style>
</head>

<body>
    <div id="app">
        <v-app>
            <!-- style="background-color: rgba(29, 161, 242, 0.4);"  -->
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
                                <div :class="{'ml-12': $vuetify.breakpoint.mdAndDown}" style="font-family: Fugaz One; font-size: 45px;">Nemesis Tweetbot</div>
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
                                <v-col class="d-flex flex-row justify-center">
                                    <div>Save Tweet directly from twitter to external drive</div>
                                </v-col>
                            </v-row>

                            <v-row class="">
                                <v-col class="d-flex flex-row justify-center">
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
                    <v-card class="d-flex pa-8 flex-column justify-center align-center pa-3" min-width="400px">
                        <v-card-title class="text-center">Welcome</v-card-title>
                        <v-container>
                            <v-form ref="login">
                                <v-text-field name="username" v-model="username" :rules="usernameRules" outlined color="blue" label="Username" placeholder="enter your username" count="10"></v-text-field>
                                <v-text-field :rules="passwordRules" type="password" v-model="password" outlined label="Password" placeholder="enter your Password" color="blue" count="10"></v-text-field>
                                <v-row class="d-flex flex-row justify-center">
                                    <v-btn @click="submit" color="#39a2e4" dark min-width="300px">Log in</v-btn>
                                </v-row>
                            </v-form>
                            <v-row class="d-flex flex-row justify-center mt-3">
                                <v-btn @click="gotoSignupWithTwitter" min-width="300px" color="#39a2e4" dark>Sign in with twitter</v-btn>
                            </v-row> 
                            <v-row class="d-flex flex-row justify-center mt-3" style="cursor:pointer">
                                <div  @click="gotoForgot" class="ma-2 mt-4" style="font-size:13px;color:#848d94;">forgot your password?</div>
                            </v-row>
                            <v-row class="d-flex flex-row justify-center mt-3">
                                <div class="ma-2 mt-4" style="font-size:13px;color:#848d94;">don't have an account?</div>
                                <br/>
                                
                                <v-btn @click="gotoRegister" class="ma-2" color="#39a2e4" dark>Sign up</v-btn>
                            </v-row>
                        </v-container>
                    </v-card>
                </v-col>
            </v-row>
        </v-app>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                msg: "hello",
                username: "",
                email: "",
                password: "",
                usernameRules: [
                    v => v.length >= 5 || 'Minimum lenght is 5',
                    v => !(/[\s]+/.test(v)) || 'no whitespace allowed',
                ],
                // emailRules: [
                //     v => /^([\w\d\.]+)@([\w]{2,6})\.([\w]{2,5})(\.[\w]{2,4})?$/g.test(v) || 'must be a valid email address'
                // ],
                passwordRules: [
                    v => /[a-z]+/.test(v) || "must contain lowercase alphabets",
                    v => /[A-Z]+/.test(v) || "must contain uppercase alphabets",
                    v => /[\d]+/.test(v) || "must contain numbers",
                ],
            },
            methods: {
                gotoRegister: function() {
                    window.location.href = "register.php";
                },
                gotoForgot: function() {
                    window.location.href = "forgot-password.php";
                },
                gotoSignupWithTwitter: function() {
                    window.location.href = "api.php";
                },
                submit: function() {
                    if (this.$refs.login.validate()) {
                        this.gotoSignupWithTwitter();
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