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
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .poster {
            width: 300px;
            margin-right: 20px;
        }

        .movie-info {
            font-size: 25px;
        }

        .movie-info h2 {
            margin-top: 0;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
            gap: 20px;
        }

        .edit-button,
        .delete-button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container"> 
        <img src="<?php echo $data['poster'] ?>" alt="Movie Poster" class="poster">
        <div class="movie-info">
            <h2 style="font-weight: bold; color: blue; font-size: 24px;">Title: <?php echo $data['title'] ?> </h2>
            <p class="my-2"><strong class="mx-2">Year:</strong> <?php echo $data['released_year'] ?> </p>
            <p class="my-2"><strong class="mx-2">Type: </strong> <?php echo $data['movie_type'] ?> </p>
            <p class="my-2"><strong class="mx-2">Genre: </strong> <?php echo $data['genre'] ?> </p>
            <p class="my-2"><strong class="mx-2">Genre: </strong> <?php echo $data['imdb_rating'] ?> </p>
            <p class="my-2"><strong class="mx-2">Runtime:</strong> <?php echo $data['runtime'] . "min" ?> </p>
            <div class="button-container">
                <a href="?mod=movie&act=edit&id=<?php echo $data['movie_id'] ?>">
                    <button class="edit-button">Edit</button>
                </a>
                <a href="?mod=movie&act=delete&id=<?php echo $data['movie_id'] ?>">
                    <button class="delete-button">Delete</button>
                </a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      var deleteButton = document.querySelector('.delete-button');
      deleteButton.addEventListener('click', function() {
        var confirmation = confirm('Are you sure you want to delete?');
        if (confirmation) {
          alert('Deleted successfully!');
        }
      });
    });
  </script>   

</body>

</html>

<?php
require_once "views/footer.php";
?>