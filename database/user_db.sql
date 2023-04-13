CREATE TABLE users (
  username VARCHAR PRIMARY KEY,
  password VARCHAR,
  email VARCHAR
);


-- All passwords are 1234 in SHA-1 format
INSERT INTO users VALUES ("jomi", "Gatosecaes123.", "jomi@gmail.com");
