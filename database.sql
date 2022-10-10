CREATE DATABASE matoor;

use matoor;

CREATE TABLE users (
  id_user int AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  foto varchar(100),
  PRIMARY KEY (id)
);

CREATE TABLE posts (
  id_post int AUTO_INCREMENT,
  category varchar(100) NOT NULL,
  content text NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE comemnts (
  id_comment int AUTO_INCREMENT,
  id_post int NOT NULL,
  id_user int NOT NULL,
  content text NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_post) REFERENCES posts(id_post),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
),engine=InnoDB;