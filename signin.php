<?php
require_once 'Utility.php';
session_start();
console_log($_SESSION);

if (isset($_SESSION['logged_in'])) {
    header('Location: dashboard.php');
}


if (isset($_POST['submit'])) {
    $file_content = file_get_contents('users.json');
    $users_db = [];
    $users_db = json_decode($file_content);
    $new_user['name'] = strtolower($_POST['name']);
    $new_user['password'] = $_POST['password'];
    //validation
    $validated = false;
    $matches = 0;
    foreach ($users_db as $user) {
        if ($user->name === $new_user['name'] || $user->email === $new_user['name']) {
            //verified
            if (password_verify($new_user['password'], $user->password)) {
                $validated = true;
                session_start();
                $_SESSION['logged_in'] = true;
                header('Location: dashboard.php');
            }
        }
    }
    if (!$validated) {
        header('Location: signin.php?msg=incorrect details');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <title>Nemesis Twitter Bot Login Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container-fluid">
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
                <form method="post" method="signin.php">
                    <div class="form-group">
                        <h3>Welcome</h3>
                        <label for="exampleInputEmail1">Username</label>
                        <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input required name="password" type="password" class="form-control" id="exampleInputPassword1" />
                    </div>
                    <div class="form-group">
                        <div class="text-center" style="color:#39a2e4d3;">
                            <?php
                            echo (isset($_GET['msg'])) ? '<p>' . $_GET['msg'] . '</p>' : "";
                            ?>
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-block">
                        <a href="dashboard.html">Login</a>
                    </button>
                    <button class="btn btn-primary btn-block">
                        <a href="api.php">Twitter sign in</a>
                    </button>

                    <span>
                        <p>Don't have an account yet?</p>
                        <button id="button" class="btn btn-primary btn-block">
                            <a href="signup.php">Signup</a>
                        </button>
                    </span>
            </div>
            </form>
        </div>
    </div>
</body>

</html>