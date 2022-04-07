<?php 
require 'vendor/autoload.php';

class SendEmail{

    public static function SendMail($to,$subject,$content){
        $key = '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';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("wilga11@hotmail.fr","William Gamba");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);

        $sendgrid = new \SendGrid($key);
        try{
            $response = $sendgrid->send($email);
        }catch(Exception $e){
            echo 'Email exception caught : '. $e->getMessage() ."\n";
            return false;
        }
        
    }
}


?>