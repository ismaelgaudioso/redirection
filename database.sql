SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `apikeys`;
CREATE TABLE IF NOT EXISTS `apikeys` (
`api_id` int(11) NOT NULL,
  `api_key` text,
  `api_name` text,
  `api_date` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
`config_id` int(11) NOT NULL,
  `config_type` varchar(25) DEFAULT NULL,
  `config_name` varchar(25) DEFAULT NULL,
  `config_value` text,
  `config_description` text,
  `last_date` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `login` text NOT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `salt` text,
  `email` text NOT NULL,
  `activation_code` text,
  `forgotten_password_code` text,
  `forgotten_password_time` int(11) DEFAULT NULL,
  `remember_code` text,
  `created_on` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `first_name` text,
  `last_name` text,
  `company` text,
  `phone` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


ALTER TABLE `apikeys`
 ADD PRIMARY KEY (`api_id`);

ALTER TABLE `config`
 ADD PRIMARY KEY (`config_id`);

ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `group_id` (`group_id`);


ALTER TABLE `apikeys`
MODIFY `api_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `config`
MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `login_attempts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `users_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `users_groups`
ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
     (1,'admin','Administrator'),
     (2,'members','General User');
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
     ('1','127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','ADMIN','0');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
     (1,1,1),
     (2,1,2);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
