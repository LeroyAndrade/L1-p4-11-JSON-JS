CREATE DATABASE IF NOT EXISTS `fotofeed`;

USE `fotofeed`;

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `gebruiker_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `fotos` (`id`, `titel`, `filename`, `datum`, `gebruiker_id`)
VALUES
	(1,'Covid 19','covid19.jpg','2020-04-12 11:12:00',1),
	(2,'Ibizaaaa','ibiza.jpg','2020-02-05 09:45:00',2),
	(3,'Ik moet nodig','toilet-paper.jpg','2019-11-23 11:34:00',3),
	(4,'Fishy fishy','jellyfish.jpg','2016-04-22 11:57:00',2),
	(5,'Summer time','summer-holiday.jpg','2019-08-01 15:29:00',1);


DROP TABLE IF EXISTS `gebruikers`;

CREATE TABLE `gebruikers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `gebruikers` (`id`, `voornaam`, `achternaam`, `username`, `wachtwoord`)
VALUES
	(1,'Karel','Klaproos','kareltje111','$2y$10$NSSsEML.vZNnBWhgQvEpm.1.g4cYayeQa5IQvVFuPV5nI/oDOAzl2'),
	(2,'Roos','Willemse','r00s','$2y$10$NSSsEML.vZNnBWhgQvEpm.1.g4cYayeQa5IQvVFuPV5nI/oDOAzl2'),
	(3,'Vladimir','Poetin','CommandR','$2y$10$NSSsEML.vZNnBWhgQvEpm.1.g4cYayeQa5IQvVFuPV5nI/oDOAzl2');
