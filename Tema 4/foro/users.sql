DROP TABLE users;

CREATE TABLE users(
    id                  MEDIUMINT NOT NULL AUTO_INCREMENT,
    user                varchar(255) UNIQUE NOT NULL,
    mail                varchar(255) UNIQUE NOT NULL,
    password            varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

-- passwd: 1234
INSERT INTO users (user, mail, password) VALUES (
    'mario', 'mario@mail.es', '$2y$10$oUK2psl33/ISPfWU/RnnheZcN5So6SPFTpmdD6S6WMudkLvHY7eaa'
);