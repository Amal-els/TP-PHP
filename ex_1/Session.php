<?php
class Session{
    private int $SID;
    public static $timeout = 1800;
    private  $data = [];
    public function __construct() 
    {
        session_start();
        $this->data = $_SESSION;
    }

    public function set($key,$value) 
    {
        $_SESSION[$key] = $value;
    }

    public function get($key) 
    {
        return $_SESSION[$key] ?? null;
    }

    public function destroy ()
    {
        session_unset();
        session_destroy();
    }


}