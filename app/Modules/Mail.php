<?php

namespace App\Modules;

class Mail {


    public static function sendHTML($name, $email, $subject, $message,$to=MAIL_TO){

      $errors=array();

      $from = MAIL_FROM;
      $message = "<b>". $name. "</b><br><b>" . $email. "</b><br><br><em>" .$message. "</em><br>";
      $body = self::getBodyTemplate($message);
      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
      $headers .= 'Reply-To: '.$from."\r\n" .'X-Mailer: PHP/' . \phpversion();
      $success= null;
      $status= 0;
      // Sending email
      if(\mail($to, $subject, $body, $headers))
      {
          $success = "Your mail successfuly sent";
          $status= 201;
      } else{
          $errors[]= 'Unable to send email to '.$to.'. Please try again.';
          $status= 500;
      }

      return ['errors' => $errors, 'status' => $status, "success" => $success];      
    }

    public static function getBodyTemplate($message){
        $msg='
        <!doctype html>
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
        .email-background{
            background:#EEE;
            padding:10px;
            width:800px;
            margin:0 auto;
        }
        .email-container{
         max-width:700px;
         margin:0 auto;
         background:#6da8e2;
        }
        img{
            margin:0;
            max-width:100%;}
            
        p{
            text-align:center;
            background:#e6561e;
            color:#fff;
            padding:5px;
            margin:0;
        }
        .row{
            width:100%;
            margin:0 auto;
        }
        .card{
            width:100%;
            margin:0;
            padding:0;
            margin-bottom:30px;
            border-bottom:1px solid #3C9CF7;
        }
        .card-h2{
            width:100%;
            height:40px;
            line-height:40px;
            text-align:center;
            background:#004d9b;
            color:#FFFFFF;
            margin:0;
            padding:0;
        }
        .card-article{
            color:#fff;
            font-family:Helvetica, Arial, sans-serif;
            font-size:24px;
            margin:0;
            padding:5px;
        }
        b{
            color:#F1484B;	
        }
        
        .expo{
            padding:10px;
            background:#e6561e;
            margin:0;
        }
        .expo-h1{
            font-size:45px;
            color:#fff;
        }
        .expo-ul-li{
            font-size:30px;
        }
        </style>
        </head>
        
        <body>
            <div class="email-background" style="background:#EEE;padding:10px;width:800px;margin:0 auto;">
               <div class="email-container" style="max-width:700px;margin:0 auto;background:#6da8e2;">
                 <img src="http://cglgroup.ci/app/sendmail/images/pro-h.jpg" style="margin:0;max-width:100%;"/>
                  <p style="font-size:44px;text-align:center;background:#004d9b;color:#fff;padding:5px;margin:0;">Tout pour l&rsquo;entretien de vos véhicules</p>
                  <div class="row" style="margin:0 auto; width:100%; padding: 10px; background: #fff; font-size: 25px;">
                 
                  '.$message.'
                  </div>
                
                  <img src="http://cglgroup.ci/app/sendmail/images/pro-f.jpg"/>
               </div>
            </div>
          
        </body>
        </html>';
        return $msg;
    }
    
    
}