DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    admin INTEGER DEFAULT 0
);

INSERT INTO users VALUES (1, 'vulnerable', '25890deab1075e916c06b9e1efc2e25f', 1);
INSERT INTO users VALUES (2, 'mitigated', '$2y$12$LIqlGBmRo3fE1iZZCcWrROyAb7gPqJPiOopk9frLtL0li7.WfuD72', 1);
