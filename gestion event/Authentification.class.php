<?php
//require ("login_form.php");
class Authentification {
    
    private $nameUser = "login";
    private $namePassword = "password";
    
    private $sql = "SELECT * FROM users WHERE login=:login";
    
    private $handle;
    public $header;
    
    public $userid;
    public $log;
    public $test;
    public $var;
    public $username;
    public $role;
    public $passe;
    private $redirect;
    
    public function __construct($db,$redirect){
        $this->handle = $db->prepare($this->sql);
        $this->redirect = $redirect;
    }
    
    public function authentificate($request=null,$session=null,$server=null){
        if(is_null($request)) $request = $_POST;
        if(is_null($session)) $session = &$_SESSION;
        if(is_null($server)) $server = $_SERVER;
        
        if (isset($session["AUTH_TOKEN"])){
                $this->userid = $session['AUTH_USER_ID'];
                $this->username = $session['AUTH_USER_LOGIN'];
                $this->role= $session['AUTH_USER_ROLE'];
            return true;
        }
        
        if (!isset($request[$this->nameUser]) || !isset($request[$this->namePassword])){
            ($this->redirect)(true);
            return false;
        } else {
            $pass =($request[$this->namePassword]);
            $this->handle->execute(['login'=>$request[$this->nameUser]]);
            $res = $this->handle->fetch();
            if($res){
                if(password_verify($pass,$res['mdp']))
                    {  
                        $this->role = $res['role'];
                        $this->userid = $res['uid'];
                        $this->username = $res['login'];
                        $session["AUTH_TOKEN"] = sha1($request[$this->nameUser].time());
                        $_SESSION['AUTH_USER_ID'] = $this->userid;
                        $session['AUTH_USER_LOGIN'] = $this->username;
                        $session['AUTH_USER_ROLE'] = $this->role;
                        return true; 
                    }
            }else{
                ($this->redirect)(false);
                return false;
            } 
                
        }
    }
    
}
?>
