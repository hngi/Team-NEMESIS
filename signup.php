<?php
if (isset($_POST['submit'])) {
    $file_content = file_get_contents('users.json');
    $users_db = [];
    $users_db = json_decode($file_content);
    $new_user['name'] = strtolower($_POST['name']);
    $new_user['email'] = strtolower($_POST['email']);
    $new_user['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

    //validation
    $user_exists = false;
    foreach ($users_db as $user) {
        if ($user->name == $new_user['name']) $user_exists = true;
        if ($user->email == $new_user['email']) $user_exists = true;
    }

    if ($user_exists) {
        header('Location: signup.php?error=user already exists');
    } else {
        $users_db[] = $new_user;
        $users_db = json_encode($users_db);
        file_put_contents('users.json', $users_db);
        header('Location: signin.php?msg=user added successfully');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nemesis Twitter Bot Sign Up Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
        <div class="row">
            <div class="col-sm-6 first_column">
                <div class="content1">
                    <img src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341483/Team%20Nemesis_twitterBot/twitter_icon_pzp2pk.svg" alt="twitter logo" />
                    <p class="first-paragraph">Nemesis TweetBot</p>
                    <img class="grow" src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341619/Team%20Nemesis_twitterBot/wifi_icon_mjyfgk.svg" alt="wifi icon" />
                    <p>Connect twitter account</p>
                    <img class="grow" src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341614/Team%20Nemesis_twitterBot/download_icon_njf4hm.svg" alt="download icon" />
                    <p>Save Tweet directly from twitter to external drive</p>
                    <img class="grow" src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341616/Team%20Nemesis_twitterBot/file_icon_a8sddq.svg" alt="file icon" />
                    <p>Enjoy viewing favourite tweet on external drive at leisure</p>
                </div>
            </div>
            <div class="col-sm-6 second_column">
                <button class="loginrdr"> <a href="signin.php">Log in</a></button>
                <form method="post" action="signup.php">
                    <div class="form-group">
                        <h3>Create an account</h3>
                        <label for="exampleinputusername">Username</label>
                        <input name="name" type="text" class="form-control input-box" id="exampleinputusername" aria-describedby="textHelp" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleinputemail">Email</label>
                        <input name="email" type="email" class="form-control input-box" id="exampleinputemail" aria-describedby="textHelp"  required />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"  required />
                    </div>
                    <div class="form-group">
                        <label for="examplerepeatpassword">Repeat password</label>
                        <input type="password" class="form-control" id="examplerepeatpassword"  required />
                    </div>
                    <div class="form-group">
                        <div class="text-center" style="color:#39a2e4d3;">
                            <?php
                            echo (isset($_GET['error'])) ? '<p>' . $_GET['error'] . '</p>' : "";
                            ?>
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Sign up</button>
                    <button class="btn btn-primary"><a href="https://www.twitter.com">Sign up with your twitter account</a></button>
                </form>
            </div>
        </div>
</body>

</html>

