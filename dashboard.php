<?php
require_once 'Utility.php';
require_once 'TwitterAPIExchange.php';
require_once 'config.php';
require_once 'Model.php';

session_start();
if (!isset($_SESSION['logged_in'])) {
  header('Location: signin.php');
}
if (isset($_GET['logout'])) {
  $_SESSION = [];
  session_destroy();
  header('Location: signin.php');
  exit();
}

$model = new Model();
$model->store_tweets();

console_log($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <link rel="stylesheet" href="dashboard.css" />
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-4 ">
        <p><?php echo $_SESSION['name']; ?></p>
        <!-- <button class="btn-block"><i class="fab fa-google"></i></button> -->
        <div class="img-responsive">
          <img class="img-thumbnail" src="<?php echo $_SESSION['dp']; ?>" alt="" srcset="">
        </div>
        <p><?php echo $_SESSION['username']; ?></p>
      </div>

      <div class="col-sm-8">

        <?php
        $size = 3;
        $filename = 'db/' . $_SESSION['username'] . '.json';
        $file_content = file_get_contents($filename);
        $tweet_db = json_decode($file_content);
        console_log("tweets_db", $tweet_db);
        $sliced_tweets = array_slice($tweet_db, 0, $size);
        console_log("sliced tweets", $sliced_tweets);
        foreach ($sliced_tweets as $tweet) {
          console_log($tweet);
          $html = '<div class="card text-center">
                  <div class="card-body">' .
            $tweet->text
            . '</div>
                  </div>';
          echo $html;
        }
        ?>

        <!-- <div class="card text-center">
          <div class="card-body">
            Saved TweetB
          </div>
        </div> -->

        <!-- <div class="card text-center">
          <div class="card-body">
            Saved TweetC
          </div>
        </div> -->

      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/2534cfc66b.js" crossorigin="anonymous"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>