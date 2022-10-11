CREATE DATABASE matoor;

use matoor;

CREATE TABLE users (
  id_user int AUTO_INCREMENT,
  username varchar(50) NOT NULL UNIQUE,
  nama_lengkap varchar(50),
  email varchar(100) NOT NULL UNIQUE,
  password varchar(100) NOT NULL,
  foto varchar(100),
  PRIMARY KEY (id_user)
);

CREATE TABLE posts (
  id_post int AUTO_INCREMENT,
  id_user int NOT NULL,
  category varchar(100) NOT NULL,
  content text NOT NULL,
  foto varchar(100),
  PRIMARY KEY (id_post),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;

CREATE TABLE comments (
  id_comment int AUTO_INCREMENT,
  id_post int NOT NULL,
  id_user int NOT NULL,
  content text NOT NULL,
  PRIMARY KEY (id_comment),
  FOREIGN KEY (id_post) REFERENCES posts(id_post),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;

CREATE TABLE likes (
  id_post int NOT NULL,
  id_user int NOT NULL,
  FOREIGN KEY (id_post) REFERENCES posts(id_post),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;


-- DROP DATABASE matoor;