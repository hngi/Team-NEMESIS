//jshint esversion:6
require('dotenv').config();
const express = require('express');
const mongoose = require('mongoose');
const ejs = require('ejs');
const session = require('express-session');
const passport = require('passport');
const passportLocalMongoose = require('passport-local-mongoose');
const bodyParser = require('body-parser');
const GoogleStrategy = require('passport-google-oauth20').Strategy;
const findOrCreate = require('mongoose-findorcreate');



const app = express();

app.use(express.static("assets"));
app.set('view engine', 'ejs');

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
    password: String,
    googleId: String
  }) ;

userSchema.plugin(passportLocalMongoose);
userSchema.plugin(findOrCreate);

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

passport.use(new GoogleStrategy({
    clientID: "416966108961-47aquirbbei7vr5hnv47ub5aordtu6pm.apps.googleusercontent.com",
    clientSecret: "NcrEPdRRZPxV7bSANVwec2uW",
    callbackURL: "https://nemesis-net.herokuapp.com/auth/google/networth",
    userProfileURL: "https://www.googleapis.com/oauth2/v3/userinfo"
  },
  function(accessToken, refreshToken, profile, cb) {
    console.log(profile);
   User.findOne({googleId:profile.id, username:profile.displayName}, function(err,existingUser){
      console.log(profile);
      if(existingUser){
        return cb(err,existingUser);
      } else{
        const newUser = new User({
          googleId: profile.id,
          username:profile.displayName
        });
        newUser.save(function(err){
          return cb(err,newUser);
        });
      }
    });
  }
));

app.get("/", function(req, res){
  res.render("index");
});
app.get("/auth/google",passport.authenticate("google", {scope: ["profile"]}));
app.get("/auth/google/networth",
  passport.authenticate("google", { failureRedirect: '/signIn' }),
  function(req, res) {
    // Successful authentication, redirect home.
    res.redirect('/networth1');
  });
app.get("/signIn", function(req, res){
  res.render("signin");
});
app.get("/signUp", function(req, res){
  res.render("signup", {
    data: {},
    errors: {}
  });
});
app.get("/networth1", function(req,res){
  res.render("networth");
});
app.get("/networth", function(req,res){
  if(req.isAuthenticated()){
    res.render("networth");
  }
  else{
    res.redirect("signin");
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
    res.render("signup",{
      data: req.body,
      errors:{
        message:{
          msg: 'Message'
        }
      }
    });

  }
  else{
    passport.authenticate("local")(req, res, function(){
      res.render("networth");
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
      res.render("networth");
    });
  }
});

});

app.listen(process.env.PORT || 3000, function(){
  console.log("Server is running on port 3000");
});



//Sign-in authentication

function validate() {
  var username = document.getElementById("email").value;
  var password = document.getElementById("password").value;


  if (username == null || username == "") {
      alert("Please enter the username.");
      return false;
  }
  if (password == null || password == "") {
      alert("Please enter the password.");
      return false;
  }

  /*

  for(i = 0; i < user.length;i++)
  { if(username == user[i].username && password == user[i].password) {
      alert('Login successful : Welcome' + ' ' + username)
     return;
  }
  }

  for(n = 0; n < user.length;n++)
  {if (username !== user[n].username){
      alert("Username does not exist");
  return false;}

    else if (password !== user[n].password){
          alert("Incorrect password");
      return false;}
    }
  */
}
