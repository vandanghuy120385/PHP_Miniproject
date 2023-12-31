<?php

use function PHPSTORM_META\type;

if (!session_start()){
    session_start();
}
?>
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
            $data = $this->movieService->getInfo($movie_id);
            //print_r($data);
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
        if (intval($data['released_year']) != $data['released_year'] || $data['released_year'] <= 0 ) {
            setcookie('msg', 'Released Year must be a integer value greater than 0.', time()+1);
            header('location: index.php?mod=movie&act=edit&id=' . $data['movie_id']);
        } elseif (!is_numeric($data['runtime']) || $data['runtime']<= 0) {
            setcookie('msg','Runtime must be a numeric value greater than 0.',time()+1);
            header('location: index.php?mod=movie&act=edit&id=' . $data['movie_id']);
        } elseif(!is_numeric($data['imdb_rating']) || ($data['imdb_rating']) <= 0 || ($data['imdb_rating']) >= 10){

            setcookie('msg','The IMDB rating value must be an integer in the range from 0 to 10.',time()+1);
            header('location: index.php?mod=movie&act=edit&id=' . $data['movie_id']);
        } else{
            $status = $this->movieService->edit($data);
            if ($status==true) {
                setcookie('msg','Sửa thành công',time()+1);
                header('location: index.php?mod=movie');
            } else {
                setcookie('msg','Sửa thất bại.',time()+1);
                header('location: index.php?mod=movie&act=list');
            }
        }

       }
        public function add(){
            require_once('views/add.php');
        }
        public function store(){
            require_once('models/Movie.php');
            $errors = [
                "title" => "Title is required",
                "film_url"=>"Film URL is required",
                "movie_type"=>"Movie type is required",
                "poster" => "Poster is required",
                "genre"=> "Genre is required",
                "released_year" => "Released year must be number",
                "imdb_rating" => "IMDB Rating must be number",
                "runtime" => "Runtime must be number"
            ];
            $movie_id = uniqid('tt');
            // echo $movie_id;
            $title = $_POST['title'];
            $title = $this->validateInput($title);

            $film_url = $_POST['url'];
            $film_url = $this->validateInput($film_url);

            $movie_type = $_POST['movie_type'];
            $movie_type = $this->validateInput($movie_type);

            $imdbRating = $_POST['imdb_rating'];
            $imdbRating = $this->validateInput($imdbRating);

            $runtime = $_POST['runtime'];
            $runtime = $this->validateInput($runtime);

            $released_year  = $_POST['released_year'];
            $released_year = $this->validateInput($released_year);

            $genre = $_POST['genre'];
            $genre = $this->validateInput($genre);

            $poster = $_POST['poster'];
            $poster = $this->validateInput($poster);
            if ($movie_type === "default"){
                $_SESSION['MOVIE_TYPE_ERROR'] = $errors['movie_type'];
                $_SESSION['data'] = $_POST;
                header('location: index.php?mod=movie&act=add');
            }
            if (is_string($imdbRating) || floatval($imdbRating) < 0) {
                $_SESSION['imdbError'] = $errors['imdb_rating'];
                $_SESSION['data'] = $_POST;
                header('location: index.php?mod=movie&act=add');
            }

            if (is_string($runtime) || intval($runtime) < 0) {
                $_SESSION['runtimeError'] = $errors['runtime'];
                $_SESSION['data'] = $_POST;
                header('location: index.php?mod=movie&act=add');
            }
            if (is_string($released_year) || intval($released_year) < 0) {
                $_SESSION['releasedYearError'] = $errors['released_year'];
                $_SESSION['data'] = $_POST;
                header('location: index.php?mod=movie&act=add');
            }    
            $movie = new Movie($movie_id,$title,$film_url,$movie_type,$imdbRating,$runtime,$released_year,$genre,$poster);
            $isInsertSuccess = $this->movieService->insertMovie($movie);
            if ($isInsertSuccess == true){
                $_SESSION['data'] = null;
                $_SESSION['imdbError'] = '';
                $_SESSION['runtimeError'] = '';
                $_SESSION['releasedYearError'] ='';
                setcookie('msg','thêm thành công',time()+1);
                header('location: index.php?mod=movie');
            }
            else {
                header('location: index.php?mod=movie&act=add');
            }
        }
        public function validateInput($data){
            $cleanData = trim($data);
            $cleanData = stripslashes($cleanData);
            $cleanData = htmlspecialchars($cleanData);
            return $cleanData;
        }
        public function search($name){
            $name = $this->validateInput($name);
            $foundResult = $this->movieService->getMovieByName($name);
            require_once('views/search/SearchResult.php');
        }
        
    }
