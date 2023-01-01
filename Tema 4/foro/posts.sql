DROP TABLE posts;

CREATE TABLE posts(
    id_post MEDIUMINT NOT NULL AUTO_INCREMENT,
    id_user MEDIUMINT NOT NULL,
    title varchar(100) NOT NULL,
    subject MEDIUMTEXT NOT NULL,
    timestamp int NOT NULL,

    FOREIGN KEY (id_user) REFERENCES users(id),
    PRIMARY KEY (id_post)
);