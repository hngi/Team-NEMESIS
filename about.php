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
    <title>Nemesis Twitter Bot About Us Page</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" href="register.css">

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

                <v-col xs="12" sm="12" md="6" lg="6" xl="6" cols="12" class="d-flex flex-column justify-top align-center">
                    
                    <div class="about-us">
                        <h1> About Us </h1>
                        <hr/>
                        <h4> Nemesis Tweetbot is an application that saves tweet directly from twitter account to an external drive.</h4>
                        <p>It's built by Team Nemesis of HNG-Internship-6. It's completely open source.</p>
                        <hr />
                        <h2>Features of the Application</h2>
                        <li>
                            <ul>A twitter bot that saves tweets in external drive</ul>
                            <ul>User sign up (on external drive)</ul>
                            <ul>User link external drive with their twitter account</ul>
                            <ul>User send conversations to external drive from twitter</ul>
                            <ul>User logins to external drive to see tweets</ul>
                        </li>

                        <hr />
                        <p>Here is a link to the project on <a href="https://github.com/LuminousIT/Team-NEMESIS">Github.</a> </p>
                        
                    </div>
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