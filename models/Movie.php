<?php
class Movie
{
    private $movie_id;
    private $title;
    private $film_url;
    private $movie_type;
    private $imdb_rating;
    private $runtime;
    private $released_year;
    private $genre;
    private $poster;
    public function __construct($movie_id,$title, $film_url, $movie_type, $imdb_rating, $runtime, $released_year, $genre, $poster)
    {
        $this->movie_id = $movie_id;
        $this->title = $title;
        $this->film_url = $film_url;
        $this->movie_type = $movie_type;
        $this->imdb_rating = $imdb_rating;
        $this->runtime = $runtime;
        $this->released_year = $released_year;
        $this->genre = $genre;
        $this->poster = $poster;
    }

    public function __toString(): string
    {
        return "'" . $this->movie_id . "'".
            ',' .
            "'" . $this->title . "'".
            ',' .
            "'" . $this->film_url . "'" .
            ',' .
            "'" . $this->movie_type . "'" .
            ',' .
            $this->imdb_rating .
            ',' .
            $this->runtime .
            ',' .
            $this->released_year .
            ',' .
            "'" . $this->genre . "'" .
            ',' .
            "'" . $this->poster . "'";
    }
}
