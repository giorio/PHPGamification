SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `gm_user_alerts` (
  `id_user` int(10) unsigned NOT NULL,
  `id_badge` int(10) unsigned DEFAULT NULL,
  `id_level` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gm_user_badges` (
  `id_user` int(10) unsigned NOT NULL,
  `id_badge` int(10) unsigned NOT NULL,
  `badgescounter` int(10) unsigned NOT NULL,
  `grantdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gm_user_events` (
  `id_user` int(10) unsigned NOT NULL,
  `id_event` int(10) unsigned NOT NULL,
  `eventcounter` int(10) unsigned NOT NULL,
  `pointscounter` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gm_user_logs` (
  `id_user` int(10) unsigned NOT NULL,
  `id_event` int(10) unsigned DEFAULT NULL,
  `eventdate` datetime NOT NULL,
  `points` int(10) unsigned DEFAULT NULL,
  `id_badge` int(10) unsigned DEFAULT NULL,
  `id_level` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gm_user_scores` (
  `id_user` int(10) unsigned NOT NULL,
  `points` int(10) unsigned NOT NULL,
  `id_level` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `gm_user_alerts`
 ADD KEY `id_user` (`id_user`);

ALTER TABLE `gm_user_badges`
 ADD PRIMARY KEY (`id_user`,`id_badge`);

ALTER TABLE `gm_user_events`
 ADD PRIMARY KEY (`id_user`,`id_event`);

ALTER TABLE `gm_user_logs`
 ADD KEY `id_user` (`id_user`);

ALTER TABLE `gm_user_scores`
 ADD PRIMARY KEY (`id_user`);