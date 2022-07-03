<?php

namespace Src\Router;

use UserModel;
use Database\Database;

class Route {

    // how to turn it private?
    public $db;
    public $path;
    public $callable;
    public $folder;
    public $middleware;
    public $id;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct($path, $callable, $id = null){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Database/Database.php');
        $this->db = Database::connect();

        // $this->path = trim($path);
        $this->path = $path;
        $this->id = $id;

        $array = explode("@", $callable);
        $this->callable = $array;

        $this->folder = substr($this->callable[0], 0, -10);
    }

//      ┌──────────────┐
//      │  MIDDLEWARE  │
//      └──────────────┘
public function middleware(object $route){
    $is_admin = $this->is_admin();
    
    switch ($route->middleware) {
        case 'admin':
            
            if ($is_admin == true){
                return true;
            }
            return false;     
            break;

        case 'auth':
            if (! empty($_SESSION['auth'])){
                if ($_SESSION['auth']['id'] == $route->id){
                    return true;
                }

                $is_admin = $this->is_admin();
                if ($is_admin == true){
                    return true;
                }
            }
            return false;     
            break;

        case 'blocked':
            return false;
            break;
        
        default:
            return true;
            break;
    }
}

//      ┌────────────┐
//      │  REDIRECT  │
//      └────────────┘
    public function redirect($controller, $id = null){

        $file = $controller[0];
        $method = $controller[1];
        $model = $this->folder.'Model';

        require_once ($_SERVER['DOCUMENT_ROOT'].'/app/Controller/'.$this->folder.'/'.$file.'.php');
        require_once ($_SERVER['DOCUMENT_ROOT'].'/app/Model/'.$this->folder.'/'.$model.'.php');
        
        $name = $file.'::'.$method;
        $name = new $file();

        if ( $id != null ){
            $name->$method($id);
        }
        else{
            $name->$method();
        }
    }

    public function is_admin(){
        if ( ! empty($_GET['token'])) {
            $token = $_GET['token'];
            $access = $this->db->select(
                'SELECT access FROM user WHERE reset_token = ?', [$token]
            );
            if ( ! empty($access)) {
                if ($access[0]['access'] == 'admin') {
                    return true;
                }                
            }
        }
        if (! empty($_SESSION['auth'])) {
            $access = $this->db->select(
                'SELECT access FROM user WHERE id = ?', [$_SESSION['auth']['id']]
            );
            if ($access[0]['access'] == 'admin'){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}