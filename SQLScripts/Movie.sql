CREATE TABLE Movie(
	movie_id varchar(50) NOT NULL,
	title varchar(100) NOT NULL,
	film_url varchar(50) NOT NULL,
	type varchar(50) NOT NULL,
	imdb_rating float NULL,
	runtime smallint NULL,
	released_year] smallint NOT NULL,
	genre varchar(100) NOT NULL,
	poster varchar(200) NULL,
	CONSTRAINT PRIMARY KEY (movie_id)
)