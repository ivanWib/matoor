CREATE DATABASE matoor;

use matoor;

CREATE TABLE `users` (
  `id` int AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  foto varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);
