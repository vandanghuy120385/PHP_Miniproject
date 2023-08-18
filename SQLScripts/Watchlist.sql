CREATE TABLE IF NOT exists watchlist(
    id int PRIMARY KEY AUTO_INCREMENT,
    movie_id varchar(50),
    user_id int,
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES User(id),
    CONSTRAINT FOREIGN KEY (movie_id) REFERENCES Movie(movie_id),
);