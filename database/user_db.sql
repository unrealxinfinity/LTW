PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL

BEGIN TRANSACTION;

DROP TABLE IF EXISTS departments;

CREATE TABLE departments (
  departmentName VARCHAR PRIMARY KEY
);

DROP TABLE IF EXISTS statuses;

CREATE TABLE statuses (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  statusName VARCHAR
);

DROP TABLE IF EXISTS priorities;

CREATE TABLE priorities (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  priorityName VARCHAR
);

DROP TABLE IF EXISTS hashtags;

CREATE TABLE hashtags (
  hashtagName VARCHAR PRIMARY KEY
);



DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR,
  name VARCHAR,
  password VARCHAR,
  email VARCHAR,
  UNIQUE(email)
  
);
DROP TABLE IF EXISTS agents;

CREATE TABLE agents (
  agentID INTEGER PRIMARY KEY REFERENCES users (id)
);

DROP TABLE IF EXISTS admins;

CREATE TABLE admins(
  adminID INTEGER PRIMARY KEY REFERENCES agents (agentID)
);

DROP TABLE IF EXISTS agentDepartments;

CREATE TABLE agentDepartments(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  agentID VARCHAR REFERENCES agents (agentID),
  departmentName VARCHAR REFERENCES departments(departmentName)
);





DROP TABLE IF EXISTS tickets;

CREATE TABLE tickets(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  date VARCHAR,
  clientID VARCHAR REFERENCES users (id),
  assignedAgentID VARCHAR REFERENCES agents (agentID),
  title VARCHAR,
  departmentName VARCHAR REFERENCES departments (departmentName),
  status VARCHAR,
  priority VARCHAR,
  notification VARCHAR
);

DROP TABLE IF EXISTS ticketHistory;

CREATE TABLE ticketHistory(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  ticketID REFERENCES tickets (ID),
  message VARCHAR 
);

DROP TABLE IF EXISTS ticketHashtags;


CREATE TABLE ticketHashtags(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  ticketID VARCHAR REFERENCES tickets (ID),
  hashtagName VARCHAR REFERENCES hashtags (hashtagName)
);

DROP TABLE IF EXISTS messages;

CREATE TABLE messages(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  text VARCHAR,
  ticketID INTEGER REFERENCES tickets (ID),
  receiverID INTEGER REFERENCES users (id),
  senderID INTEGER REFERENCES users(id)
);

DROP TABLE IF EXISTS faqs;

CREATE TABLE faqs(
  question VARCHAR PRIMARY KEY,
  answer VARCHAR
);

COMMIT TRANSACTION;


INSERT INTO departments (departmentName) VALUES ('');
INSERT INTO departments (departmentName) VALUES ('Accounting');
INSERT INTO departments (departmentName) VALUES ('Sales');


INSERT INTO users (username, name, password, email) VALUES ('', '', '', '');

INSERT INTO agents (agentID) VALUES (1);

INSERT INTO admins (adminID) VALUES (1);




INSERT INTO statuses (statusName) VALUES ('open');
INSERT INTO statuses (statusName) VALUES ('assigned');
INSERT INTO statuses (statusName) VALUES ('closed');

INSERT INTO priorities (priorityName) VALUES ('lowest');
INSERT INTO priorities (priorityName) VALUES ('low');
INSERT INTO priorities (priorityName) VALUES ('medium');
INSERT INTO priorities (priorityName) VALUES ('high');
INSERT INTO priorities (priorityName) VALUES ('highest');

INSERT INTO faqs (question,answer) VALUES ('How do I change my password?','Use the edit profile section');





