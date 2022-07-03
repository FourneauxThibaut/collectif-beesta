<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Controller.php');

class HomeController extends Controller
{
    public $model;
    public $controller = 'Home';

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {        
        $this->model = new HomeModel($this->controller);
    }

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index()
    {
        $data = [];
        $head = [ 'title' => 'Beesta | Accueil' ];

        return $this->view('home.index', $head, $data);
    }

//      ┌────────┐
//      │  WORK  │
//      └────────┘
    public function work()
    {
        $data = [];
        $head = [ 'title' => 'Beesta | projects' ];

        return $this->view('home.project', $head, $data);
    }
    
//      ┌─────────┐
//      │  ABOUT  │
//      └─────────┘
    public function about()
    {
        $data = [];
        $head = [ 'title' => 'Beesta | projects' ];

        return $this->view('home.about', $head, $data);
    }

//      ┌───────────┐
//      │  CONTACT  │
//      └───────────┘
    public function contact()
    {
        $data = [];
        $head = [ 'title' => 'Beesta | projects' ];

        return $this->view('home.contact', $head, $data);
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function not_found($id = "null")
    {

        if ( $id == 404 ){
            $head = [ 'title' => '404 | Not Found' ];

            return $this->view('error.not_found', $head);
        }
        else{
            require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Error/404.php');
        }
    }
}