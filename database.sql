CREATE DATABASE matoor;

use matoor;

CREATE TABLE users (
  id_user       INT AUTO_INCREMENT,
  username      VARCHAR(50) NOT NULL UNIQUE,
  nama_lengkap  VARCHAR(50),
  email         VARCHAR(100) NOT NULL UNIQUE,
  password      VARCHAR(100) NOT NULL,
  foto          VARCHAR(100),
  PRIMARY KEY (id_user)
);

CREATE TABLE posts (
  id_post   INT AUTO_INCREMENT,
  id_user   INT NOT NULL,
  category  VARCHAR(100) NOT NULL,
  content   TEXT NOT NULL,
  PRIMARY   KEY (id_post),
  FOREIGN   KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;

CREATE TABLE comments (
  id_comment  INT AUTO_INCREMENT,
  id_post     INT NOT NULL,
  id_user     INT NOT NULL,
  content     TEXT NOT NULL,
  PRIMARY     KEY (id_comment),
  FOREIGN     KEY (id_post) REFERENCES posts(id_post),
  FOREIGN     KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;

CREATE TABLE likes_post (
  id_post   INT NOT NULL,
  id_user   INT NOT NULL,
  FOREIGN KEY (id_post) REFERENCES posts(id_post),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;

CREATE TABLE likes_comment (
  id_comment   INT NOT NULL,
  id_user   INT NOT NULL,
  FOREIGN KEY (id_comment) REFERENCES comments(id_comment),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
)engine=InnoDB;


-- DROP DATABASE matoor;