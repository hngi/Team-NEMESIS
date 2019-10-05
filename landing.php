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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <style>
      @import url("https://fonts.googleapis.com/css?family=Fugaz+One|Lato:400,700|Montserrat:400,700&display=swap");
  </style>
</head>

<body>
        <div id="app" >
            <v-app style="background-color: rgba(29, 161, 242, 0.4);">
                <v-container class="display-3 text-center">
                    <div style="font-family: Fugaz One;">Nemesis Tweetbot</div>
                </v-container>
                <v-container class="text-center">
                    <v-btn href="signin.php" outlined color="blue" style="background-color: white; border-radius: 20px;">log in</v-btn>
                    <v-btn href="signup.php" outlined color="blue"  style="background-color: white;  border-radius: 20px;">Sign up</v-btn>
                </v-container>

                <v-container>
                    <v-card class="mx-auto pa-3" max-width="500px" style="border-radius: 10px;">
                        <v-row class="d-flex flex-column justify-center align-center">
                            <h2>Enjoy your newsfeed</h2>
                            <h2>In 3 simple steps</h2>    
                        </v-row>
                        <v-row class="">
                            <v-col class="d-flex flex-row justify-center">
                                <img  src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341619/Team%20Nemesis_twitterBot/wifi_icon_mjyfgk.svg" alt="">
                            </v-col>
                           </v-row>
                           <v-row class="">
                            <v-col class="d-flex flex-row justify-center">
                                <div>connect twitter account</div>
                            </v-col>
                           </v-row>

                           <v-row class="">
                            <v-col class="d-flex flex-row justify-center">
                                <img  src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341614/Team%20Nemesis_twitterBot/download_icon_njf4hm.svg" alt="">
                            </v-col>
                           </v-row>
                           <v-row class="">
                            <v-col class="d-flex flex-row justify-center">
                                <div>Save Tweet directly from twitter to external drive</div>
                            </v-col>
                           </v-row>

                           <v-row class="">
                            <v-col class="d-flex flex-row justify-center">
                                <img  src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341616/Team%20Nemesis_twitterBot/file_icon_a8sddq.svg" alt="">
                            </v-col>
                           </v-row>
                           <v-row class="">
                            <v-col class="d-flex flex-row justify-center">
                                <div>Enjoy viewing favorite tweet on external drive at leisure</div>
                            </v-col>
                           </v-row>
                            
                    </v-card>
                    <!-- <v-row>
                        <v-col cols="12">
                            <v-card max-width="500px" class="mx-auto text-center">
                                    <div class="display-1">Enjoy your newsfeed</div>
                                    <div class="display-1">In 3 simple steps</div>
                            </v-card>
                        </v-col>  
                                                <v-col cols="12" >
                            <v-card max-width="300px" class="mx-auto">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </v-card>
                        </v-col>  
                                                <v-col cols="12">
                            <v-card max-width="300px" class="mx-auto">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </v-card>
                        </v-col>  
                    </v-row> -->
                </v-container>
            </v-app>
        </div>




  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script>
            var app = new Vue({
                el:'#app',
                vuetify: new Vuetify(),
                data: {
                    msg : "hello",
                },
                methods: {

                },
                computed:{

                },
            });
        </script>
    </div>
</body>

</html>