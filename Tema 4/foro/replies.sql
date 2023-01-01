DROP TABLE replies;

CREATE TABLE replies(
    id_reply            MEDIUMINT NOT NULL AUTO_INCREMENT,
    id_user             MEDIUMINT NOT NULL,
    id_post             MEDIUMINT NOT NULL,
    subject             MEDIUMTEXT NOT NULL,
    timestamp           int NOT NULL,

    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_post) REFERENCES posts(id_post),
    PRIMARY KEY (id_reply)
);