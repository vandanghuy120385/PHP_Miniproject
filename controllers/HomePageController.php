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
    }
?>