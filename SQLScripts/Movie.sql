CREATE TABLE  if not exists Movie(
	movie_id varchar(50) NOT NULL,
	title varchar(100) NOT NULL,
	film_url varchar(200) NOT NULL,
	movie_type varchar(50) NOT NULL,
	imdb_rating float ,
	runtime int ,
	released_year int NOT NULL,
	genre varchar(100) NOT NULL,
	poster varchar(200),
	CONSTRAINT PRIMARY KEY (movie_id)
);

