<?php 
    class Home {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
    }