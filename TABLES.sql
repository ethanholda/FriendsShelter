CREATE TABLE `users` (
  `user_id` int(10) NOT NULL auto_increment,
  `email` varchar(60) NOT NULL default '',
  `password` varchar(8) NOT NULL default '',
  `first_name` varchar(50) default NULL,
  `last_name` varchar(50) default NULL,
  `street_address` varchar(60) default NULL,
  `city` varchar(30) default NULL,
  `state` char(2) default NULL,
  `zipcode` varchar(5) default NULL,
  `phone_home` varchar(20) default NULL,
  `phone_work` varchar(20) default NULL,
  `phone_mobile` varchar(20) default NULL,
  `is_active` tinyint(1) default '1',
  `is_emergency_contact` tinyint(1) default '1',
  `preferred_contact_method` enum('home','work','mobile','email') default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=482 DEFAULT CHARSET=utf8;

CREATE TABLE `volunteer_calendar` (
  `calendar_date` date NOT NULL default '0000-00-00',
  `user_id` int(10) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert into users (email,password) values ('setup', 'change!m');
