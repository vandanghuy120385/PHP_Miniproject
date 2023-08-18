<?php require_once "views/header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            align-items: center;
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            margin-left: 30px;
        }

        input[type="text"].form-control {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-left: 30px;
        }

        button.btn.btn-primary {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            border: none;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<body>
    <div class="container">
    <h1 align="center" style="font-size:xx-large;">UPDATE INFORMATION</h1>
    <?php 
        if (isset($_COOKIE['msg'])) {
    ?>
    <div class="alert alert-danger">
  <strong align="center" style="color:red; font-size:large">Danger!</strong> <?php echo $_COOKIE['msg']; ?>
</div>
    <?php        
        }
     ?>
    <hr>
        <form action="?mod=movie&act=update" method="POST" role="form">
            <div class="form-group">
                <label for="">Movie ID</label>
                <input type="text" class="form-control" id="" placeholder="Movie's id" name="movie_id" value="<?php echo $data['movie_id']?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="Movie's title" name="title" value="<?php echo $data['title']?>">
            </div>
            <div class="form-group">
                <label for="">Film Url</label>
                <input type="text" class="form-control" id="" placeholder="Movie's url" name="film_url" value="<?= $data['film_url']?>">
            </div>
            <div class="form-group">
                <label for="">Movie Type</label>
                <input type="text" class="form-control" id="" placeholder="Movie's type" name=" movie_type" value="<?= $data[' movie_type']?>">
            </div>
            <div class="form-group">
                <label for="">IMDB Rating</label>
                <input type="text" class="form-control" id="" placeholder="imdb rating" name="imdb_rating" value="<?= $data['imdb_rating']?>">
            </div>
            <div class="form-group">
                <label for="">Poster link</label>
                <input type="text" class="form-control" id="" placeholder="Poster link" name="poster" value="<?= $data['poster']?>">
            </div>
            <div class="form-group">
                <label for="">Released Year</label>
                <input type="text" class="form-control" id="" placeholder="Released Year" name="released_year" value="<?= $data['released_year']?>">
            </div>
            <div class="form-group">
                <label for="">Genre</label>
                <input type="text" class="form-control" id="" placeholder="Movie's genre" name="genre" value="<?= $data['genre']?>">
            </div>
            <div class="form-group">
                <label for="">Runtime</label>
                <input type="text" class="form-control" id="" placeholder="Movie's length" name="runtime" value="<?= $data['runtime']?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>

<?php require_once "views/footer.php" ?>