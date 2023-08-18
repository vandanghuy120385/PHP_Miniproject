<?php
class Movie
{
    var $movie_id;
    var $title;
    var $film_url;
    var $movie_type;
    var $imdb_rating;
    var $runtime;
    var $released_year;
    var $genre;
    var $poster;

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
