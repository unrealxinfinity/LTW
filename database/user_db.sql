PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL

BEGIN TRANSACTION;

DROP TABLE IF EXISTS departments;

CREATE TABLE departments (
  departmentName VARCHAR PRIMARY KEY
);
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  username VARCHAR PRIMARY KEY,
  name VARCHAR,
  password VARCHAR,
  email VARCHAR,
  UNIQUE(email)
  
);
DROP TABLE IF EXISTS agents;

CREATE TABLE agents (
  agentName VARCHAR REFERENCES users (username) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(
    agentName
  )
);

DROP TABLE IF EXISTS admins;

CREATE TABLE admins(
  adminName VARCHAR REFERENCES agents (agentName) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(
    adminName
  )
);

DROP TABLE IF EXISTS tickets;

CREATE TABLE tickets(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  date VARCHAR,
  client VARCHAR REFERENCES users (username) ON DELETE CASCADE ON UPDATE CASCADE,
  assignedAgent VARCHAR REFERENCES agents (agentName) ON DELETE CASCADE ON UPDATE CASCADE,
  departmentName VARCHAR REFERENCES departments (departmentName) ON DELETE CASCADE ON UPDATE CASCADE,
  message VARCHAR,
  status VARCHAR,
  priority VARCHAR
);
COMMIT TRANSACTION;


INSERT INTO departments (departmentName) VALUES ('No department');
INSERT INTO departments (departmentName) VALUES ('Accounting');
INSERT INTO departments (departmentName) VALUES ('Sales');

INSERT INTO users (username, name, password, email) VALUES ('Manu', 'Manuel Seraphim', 'Gatosecaes123.', 'manuelseraphim@gmail.com');

INSERT INTO users (username, name, password, email) VALUES ('Moderator', 'Tomás Alexandre', 'guarda-sol azul', 'ticketagent@gmail.com');
INSERT INTO agents (agentName) VALUES ('Moderator');

INSERT INTO users (username, name, password, email) VALUES ('', '', '', '');
INSERT INTO agents (agentName) VALUES ('');

