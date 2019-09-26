//jshint esversion:6
require('dotenv').config();
const express = require('express');
const mongoose = require('mongoose');
const session = require('express-session');
const passport = require('passport');
const passportLocalMongoose = require('passport-local-mongoose');
const bodyParser = require('body-parser');

const app = express();

app.use(express.static("assets"));
app.use(bodyParser.urlencoded({extended:true}));
app.use(session({
  secret: 'edffdfdfdfdf',
  resave: false,
  saveUninitialized: true,
  cookie: { secure: true }
}));

app.use(passport.initialize());
app.use(passport.session());

mongoose.connect("mongodb+srv://admin-gabrielle:Test123@cluster0-od0qv.mongodb.net/NetworthDB", {useNewurlParser:true});
mongoose.set("useCreateIndex", true);
// Creating User Schema
const userSchema = new mongoose.Schema(
  {
    name: String,
    email: String,
    password: String
  }) ;

userSchema.plugin(passportLocalMongoose);
// userSchema.plugin(findOrCreate);

// Using userSchema to create a mongoose model with collection named User
const User = new mongoose.model("User", userSchema);

passport.use(User.createStrategy());

passport.serializeUser(function(user, done) {
  done(null, user.id);
});

passport.deserializeUser(function(id, done) {
  User.findById(id, function(err, user) {
    done(err, user);
  });
});

app.get("/", function(req, res){
  res.sendFile(__dirname + "/index.html");
});
app.get("/signIn", function(req, res){
  res.sendFile(__dirname + "/signin.html");
});
app.get("/signUp", function(req, res){
  res.sendFile(__dirname + "/signup.html");
});
app.get("/welcome", function(req,res){
  if(req.isAuthenticated()){
    res.sendFile(__dirname + "/app.html");
  }
  else{
    res.redirect("/login");
  }
});

app.get("/logout", function(req,res){
  req.logout();
  res.redirect("/");
});

app.post("/signUp", function(req, res){
User.register({username: req.body.username}, req.body.password, function(error, user){
  if(error){
    console.log(error);

    res.redirect("/");
  }
  else{
    passport.authenticate("local")(req, res, function(){
      res.sendFile(__dirname + "/networth.html");
    });
  }
} );


});

app.post("/signIn", passport.authenticate("local"), function(req,res){
const user = new User({
  username: req.body.username,
  password: req.body.password
});

req.login(user, function(error){
  if(error){
    console.log(error);
  }
  else{
    passport.authenticate("local")(req,res,function(){
      res.sendFile(__dirname + "/networth.html");
    });
  }
});

});

app.listen(process.env.PORT || 3000, function(){
  console.log("Server is running on port 3000");
});
