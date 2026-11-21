<?php
/**
 * Description of class
 *
 * @author hash
 */
class Usuario {
    //
    private $user_id;
    private $username;
    private $password;
    
    //
    private static $usuarioStatico = "a";
    //
    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
    function getUser_id() {
        return $this->user_id;
    }
    

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    //
    function getUsuarioStatico() {
        return self::$usuarioStatico;
    }
    function setUsuarioStatico($usuarioStatico) {
        self::$usuarioStatico = $usuarioStatico;
    }
    //
   
    //
}
