DROP TABLE posts;

CREATE TABLE posts(
    id_post MEDIUMINT NOT NULL AUTO_INCREMENT,
    id_user MEDIUMINT NOT NULL,
    title       varchar(100) NOT NULL,
    subject       varchar(255) NOT NULL,
    timestamp int NOT NULL,
    PRIMARY KEY (id_post, id_user)
);