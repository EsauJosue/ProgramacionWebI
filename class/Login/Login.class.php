<?php
class Login
{
    private $con;
    public $email;
    public $password; 

    //Inyeccion de Dependencias
    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }
    public function setEmail(string $email){
        //evitando inyeccion de código SQL 
        $this->email = $this->con->real_escape_string($email);
    }
    public function setPassword(string $password){
        $this->password = $password;
    }
    public function signIn(){
        $query = "SELECT * FROM `usuario` WHERE email_dev = '$this->email'";
        echo $query;
        $res = $this->con->query($query);
        
        if($this->con->affected_rows > 0 )
        {
            $row = $res->fetch_array(MYSQLI_ASSOC);
            if(password_verify($this->password, $row['password_dev'])){
                 return $row;
            }
        }else{
            return false;
        }

    }
}
?>