<?php require_once "views/header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>

    </style>
</head>
<body>
<body>
    <div class="container">
    <h3 align="center">UPDATE INFORMATION</h3>
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
                <input type="text" class="form-control" id="" placeholder="Movie's id" name="movie_id" value="<?= $data['movie_id']?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="Movie's title" name="title" value="<?= $data['title']?>">
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