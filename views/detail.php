<?php
require_once "views/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movie Information</title>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .poster {
            width: 200px;
            margin-right: 20px;
        }

        .movie-info {
            font-size: 16px;
        }

        .movie-info h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="<?php echo $data['poster']?>" alt="Movie Poster" class="poster">
        <div class="movie-info">
            <h2 style="font-weight: bold; color: blue; font-size: 24px;">Title: <?php echo $data['title']?> </h2>
            <p>Year:  <?php echo $data['released_year'] ?> </p>
            <p>Genre:  <?php echo $data['genre'] ?> </p>
            <p>Rating:  <?php echo $data['imdb_rating'] ?> </p>
        </div>
    </div>
    <div class="comments">
    <h3>Bình luận</h3>
    <ul>
      <li>Người dùng A: Bình luận 1</li>
      <li>Người dùng B: Bình luận 2</li>
      <li>Người dùng C: Bình luận 3</li>
    </ul>
  </div>
</body>
</html>

<?php
require_once "views/footer.php";
?>