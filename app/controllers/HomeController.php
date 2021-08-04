<?php
    class HomeController extends Controller{
        public function __construct()
        {
            $this->newmodel = $this->model('Home');
        }

        public function index()
        {
            $data = [
                'title' => 'Hello World, Welcome to TedPHP. <br> TedPHP is PHP-MVC framework'
            ];

            return $this->view('welcome', $data);
        }
    }