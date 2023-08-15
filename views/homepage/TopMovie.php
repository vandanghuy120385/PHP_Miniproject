<section class="bg-black-100 text-white-100">
    <div class="mx-auto p-4 max-w-screen-xl">
        <h1 class="text-blue-700 font-sans font-semibold tracking-wide leading-10 text-2xl">Top Movie</h1>
        <div class="flex flex-wrap items-center justify-between ">
            <?php
            foreach ($data as $row) {
            ?>
                <div class="flex flex-col max-w-[280px] mx-2 px-2 py-1 justify-center" id="<?php echo $row['movie_id'] ?>">
                    <a href="detai">
                        <img src="<?php echo $row['poster'] ?>" alt="<?php echo $row['title'] ?>" width="185px" height="274px">
                    </a>
                    <h2 class="flex flex-wrap"><?php echo $row['title'] ?></h2>
                    <p>Imdb: <?php echo $row['imdb_rating'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>