--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `visitor_comment` TEXT    NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip`      varchar(256)    NOT NULL,
  `visitor_city`    varchar(64)     NOT NULL,
  `visitor_state`   varchar(64)     NOT NULL,
  `visitor_country` varchar(64)     NOT NULL,
  `visitor_browser` varchar(64)     NOT NULL,
  `visitor_OS`      varchar(64)     NOT NULL,
  `visitor_date`    varchar(256)    NOT NULL,
  `visitor_day`     tinyint(2)      NOT NULL,
  `visitor_month`   tinyint(2)      NOT NULL,
  `visitor_year`    int             NOT NULL,
  `visitor_hour`    tinyint(2)      NOT NULL DEFAULT '00',
  `visitor_minute`  tinyint(2)      NOT NULL DEFAULT '00',
  `visitor_seconds` tinyint(2)      NOT NULL DEFAULT '00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
