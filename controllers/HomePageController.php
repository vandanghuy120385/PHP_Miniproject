<?php
    require_once('services/MovieService.php');
    class HomePageController{
        var $movieService;
        public function __construct() {
            $this->movieService = new MovieService();
        }
        public function getTopMovie(){
            $data = $this->movieService->getTopMovie();
            $dramaRomanceData = $this->movieService->getMovieByGenre("Drama, Romance");
            $actionData = $this -> movieService->getMovieByGenre("Action");
            $comedyData = $this -> movieService->getMovieByGenre("Comedy");
            $documentData = $this -> movieService -> getMovieByGenre("Documentary");
            $scifiData = $this -> movieService -> getMovieByGenre("Sci-fi");
            require_once('views/homepage/index.php');
        }
        public function getInfo(){
            $movie_id = isset($_GET['id'])?$_GET['id']:'123abc';
            //echo $movie_id;
            $dataArray = $this->movieService->getInfo($movie_id);
            $data = $dataArray[0];
            require_once('views/detail.php');
        }
        public function delete(){
            $movie_id = isset($_GET['id'])?$_GET['id']:'123abc';
            $status = $this->movieService->delete($movie_id);
            if ($status==true) {
				setcookie('msg','Xoá thành công',time()+1);
				header('location: index.php?mod=movie');
			} else {
				setcookie('msg','Xoá thất bại.',time()+1);
				header('location: index.php?mod=movie&act=list');
			}
       }
       public function edit(){
            $movie_id = isset($_GET['id'])?$_GET['id']:'123abc';
            $data = $this->movieService->getInfo($movie_id);
            require_once("views/edit.php");
       }
       public function update(){
            $data = $_POST;
            //print_r($data);
            $status = $this->movieService->edit($data);
            if ($status==true) {
				setcookie('msg','Sửa thành công',time()+1);
				header('location: index.php?mod=movie');
			} else {
				setcookie('msg','Sửa thất bại.',time()+1);
				header('location: index.php?mod=movie&act=list');
			}
       }
        public function add(){
            require_once('views/add.php');
        }
        public function store(){
            require_once('models/Movie.php');
            $movie_id = uniqid('tt');
            // echo $movie_id;
            $title = $_POST['title'];
            $film_url = $_POST['url'];
            $movie_type = $_POST['movie_type'];
            $imdbRating = $_POST['imdb_rating'];
            $runtime = $_POST['runtime'];
            $released_year  = $_POST['released_year'];
            $genre = $_POST['genre'];
            $poster = $_POST['poster'];
            $movie = new Movie($movie_id,$title,$film_url,$movie_type,$imdbRating,$runtime,$released_year,$genre,$poster);
            $isInsertSuccess = $this->movieService->insertMovie($movie);
            if ($isInsertSuccess == true){
                header('location: index.php?mod=movie');
            }
            else {
                header('location: index.php?mod=movie&act=add');
            }
        }
        public function search($name){
            $foundResult = $this->movieService->getMovieByName($name);
            require_once('views/search/SearchResult.php');
        }
    }
?>