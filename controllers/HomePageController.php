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
        public function getInfo(){
            $movie_id = isset($_GET['id'])?$_GET['id']:'123abc';
            //echo $movie_id;
            $data = $this->movieService->getInfo($movie_id);
            //print_r($data);
            require_once('views/detail.php');
        }
    }
?>