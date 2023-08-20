<?php require_once "views/header.php" ?>
<div class="mx-auto p-4 max-w-screen-xl pt-10 h-[65vh]">
    <form action="?mod=movie&act=store" method="post" role="form">
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= isset($_SESSION['data']['title'])  ? $_SESSION['data']['title'] : "" ?>" placeholder=" " required />
            <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Movie Title</label>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="url" id="url" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= isset($_SESSION['data']['url']) ? $_SESSION['data']['url'] : "" ?>" placeholder=" " required />
            <label for="url" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Movie URL</label>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="poster" id="poster" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= isset($_SESSION['data']['poster']) ? $_SESSION['data']['poster'] : "" ?>" placeholder=" " required />
            <label for="poster" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Poster URL</label>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <!-- <input type="text" name="movie_type" id="movie_type" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> -->
            <label for="movie_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie Type</label>
            <select name="movie_type" id="movie_type" class="py-2.5 px-2 mt-4 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="tv_series" <?php $tvSeries = isset($_SESSION['data']['movie_type']) ? $_SESSION['data']['movie_type'] : "";
                                            echo $tvSeries === "TV Series" ? "selected" : '' ?>>TV Series</option>
                <option value="movie" <?php $movie = isset($_SESSION['data']['movie_type']) ? $_SESSION['data']['movie_type'] : "";
                                        echo $movie === "Movie" ? "selected" : '' ?>>Movie</option>
                <option <?php echo $movie = isset($_SESSION['data']['movie_type'])  ? "" : "selected"  ?>>Choose a type</option>
                <option value="tvMiniSeries" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'tvMiniSeries') echo 'selected'; ?>> tvMiniSeries</option>
                <option value="tvSpecial" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'tvSpecial') echo 'selected'; ?>> tvSpecial</option>
                <option value="tvMovie" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'tvMovie') echo 'selected'; ?>> tvMovie</option>
                <option value="video" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'video') echo 'selected'; ?>> video</option>
                <option value="tvEpisode" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'tvEpisode') echo 'selected'; ?>> tvEpisode</option>
                <option value="videoGame" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'videoGame') echo 'selected'; ?>> videoGame</option>
                <option value="short" <?php if (isset($_SESSION['data']['movie_type']) && $_SESSION['data']['movie_type'] === 'short') echo 'selected'; ?>> short</option>
            </select>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="released_year" id="released_year" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?= isset($_SESSION['data']['released_year']) ? $_SESSION['data']['released_year'] : "" ?>" />
                <label for="released_year" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Released Year</label>
                <small class="text-red-500 text-xs italic"><?= isset($_SESSION['releasedYearError']) ? $_SESSION['releasedYearError'] : '' ?></small>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?= isset($_SESSION['data']['genre']) ? $_SESSION['data']['genre'] : "" ?>" />
                <label for="genre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="imdb_rating" id="imdb_rating" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?= isset($_SESSION['data']['imdb_rating']) ? $_SESSION['data']['imdb_rating'] : "" ?>" />
                <label for="imdb_rating" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">IMDB Rating</label>
                <small class="text-red-500 text-xs italic"><?= isset($_SESSION['imdbError']) ? $_SESSION['imdbError'] : '' ?></small>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="runtime" id="runtime" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?= isset($_SESSION['data']['runtime']) ? $_SESSION['data']['runtime'] : "" ?>" />
                <label for="runtime" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Run time</label>
                <small class="text-red-500 text-xs italic"><?= isset($_SESSION['runtimeError']) ? $_SESSION['runtimeError'] : '' ?></small>
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
<?php require_once "views/footer.php" ?>