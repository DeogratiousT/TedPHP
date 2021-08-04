<?php
    /**
     * App Core Class
     * Creates URL and Loads Core Controller
     * URL Format = /controller/method/params
     */
    class Core
    {
        protected $currentController = 'HomeController';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->getUrl();

            // check for controller with first index
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                // Set as Current Controller
                $this->currentController = ucwords($url[0]);

                // Unset 0 index
                unset($url[0]);

                // Require Controller
                require_once '../app/controllers/'. $this->currentController . '.php';

                // Instantiate Controller
                $this->currentController = new $this->currentController;

                // check second index of url array
                if (isset($url[1])) {
                    // Check for method in controller
                    if (method_exists($this->currentController,$url[1])) {
                        // Set as Current Method
                        $this->currentMethod = $url[1];
                        // unset index
                        unset($url[1]);
                    }
                }

                // Get Params
                $this->params = $url ? array_values($url) : [];

                // Call a callback with array of methods
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            }
        }

        /**
         * Gets the current URL,
         * trims any forwad slashes '/' after the last parameter
         * removes any characters not supposed to be part of a url, and
         * creates an array for all parameters separated by a forward slash '/'
         * 
         * if url is not set, it returns the default Home Index Method
         */
        public function getUrl()
        {
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }else{
                return $url = [$this->currentController, $this->currentMethod];
            }
        }
    }