<?php
    require_once('services/MovieService.php');
    class HomePageController{
        var $movieService;
        public function __construct() {
            $this->movieService = new MovieService();
        }
        public function getTopMovie(){
            $data = $this->movieService->getTopMovie();
            require_once('views/homepage/index.php');
        }
    }
?>