<?php
    require_once('services/CommentService.php');
    class CommentController{
        var $commentService;
        public function __construct() {
            $this->commentService = new CommentService();
        }

    }
?>