<?
class SuccessMessage extends Message
{
    public function getMessage ($message){
        $message = strip_tags($message);
        return "<div class='alert alert-primary' role='alert'>$message</div>";
    }
    
}
?>