<?php
//error_reporting(0);
require_once 'Utility.php'; 
require_once "PHPMailer/PHPMailerAutoload.php";
 

if (isset($_POST)) {
    $file_content = file_get_contents('users.json');
    $users_db = [];
    $users_db = json_decode($file_content);
    $forgot_user['email'] = strtolower($_POST['email']); 

    $validated = false;
    $matches = 0;
    foreach ($users_db as $user) {
        if ($user->email === $forgot_user['email'] ) {
            
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
            $expDate = date("Y-m-d H:i:s",$expFormat); 
            $email = $user->email;
            $validated  = true;
            $key = md5(2418*2+$email);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;

            $forgot_user['key'] = $key;
            $forgot_user['expDate'] = $expDate;
        
            $file_content = file_get_contents('password_reset_temp.json'); 
            $forgot_db = json_decode($file_content);  
              
            $forgot_db[] = $forgot_user;
            $forgot_db = json_encode($forgot_db);
            file_put_contents('password_reset_temp.json', $forgot_db);



                        
            $output='<p>Dear user,</p>';
            $output.='<p>Please click on the following link to reset your password.</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p><a href="http://nemesis-twitterbot.herokuapp.com/reset-password-page.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://nemesis-twitterbot.herokuapp.com/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p>Please be sure to copy the entire link into your browser.
            The link will expire after 1 day for security reason.</p>';
            $output.='<p>If you did not request this forgotten password email, no action 
            is needed, your password will not be reset. However, you may want to log into 
            your account and change your security password as someone may have guessed it.</p>';   	
            $output.='<p>Thanks,</p>';
            $output.='<p>Nemesis Team</p>';
            $body = $output; 
            $subject = "Password Recovery";

            //mail server settings
            $email_to = $email;
            $fromserver = "tanatouch1@gmail.com"; 
           
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "tanatouch1@gmail.com"; // Enter your email here
            $mail->Password = "Dlegend1."; //Enter your passwrod here
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->IsHTML(true);
            $mail->From = "twitterbot@teamnemesis.com.ng";
            $mail->FromName = "TWITTERBOT";
            $mail->Sender = $fromserver; // indicates ReturnPath header
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($email_to);
            if(!$mail->Send()){ 
                $data['msg'] = "Mailer Error: " . $mail->ErrorInfo;
                echo json_encode($data);
            }else{
                $data['msg'] = "An email has been sent to you with instructions on how to reset your password."; 
                echo json_encode($data);
                }

 
            
        }
    }
   
    if(!$validated ){
        $data['msg'] = "User does not exist";
        echo json_encode($data);
    }
}
?>

 