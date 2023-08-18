create table if not exists Comment(
    comment_id int,
    user_id INT,
    comment varchar(2000),
    movie_id varchar(50),
    comment_date datetime,
    CONSTRAINT PRIMARY KEY (comment_id),
    CONSTRAINT FOREIGN KEY (movie_id) REFERENCES Movie(movie_id),
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES User(id)
);