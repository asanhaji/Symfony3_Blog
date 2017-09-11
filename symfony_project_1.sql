SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `post` (`id`, `title`, `content`, `creation_date`, `modification_date`, `user_id`) VALUES
(241, 'Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices', 'ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', '2017-06-27 03:14:06', '2017-08-18 14:17:51', 73),
(242, 'et, commodo at, libero. Morbi', 'Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat', '2017-07-14 12:33:45', '2017-08-18 14:45:10', 72),
(243, 'nonummy ac, feugiat non, lobortis quis, pede. Suspendisse', 'libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae', '2017-07-12 10:28:34', '2017-08-17 09:14:11', 75),
(244, 'ante ipsum primis in', 'scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed', '2017-07-29 22:06:56', '2017-08-18 15:15:03', 65),
(245, 'amet metus.', 'arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue', '2017-07-28 20:08:51', '2017-08-18 10:48:40', 78),
(246, 'adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus.', 'id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula', '2017-08-17 20:21:59', '2017-08-18 11:47:37', NULL),
(247, 'felis. Nulla', 'justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede,', '2017-07-03 10:13:30', '2017-08-18 15:50:08', 74),
(248, 'magna. Duis dignissim tempor arcu. Vestibulum ut eros non', 'Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non', '2017-07-29 08:25:08', '2017-08-17 15:02:42', NULL),
(249, 'felis. Nulla tempor augue ac', 'nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim.', '2017-06-12 05:41:22', '2017-08-17 00:38:26', NULL),
(250, 'non, bibendum sed,', 'est, vitae sodales nisi magna sed dui. Fusce aliquam, enim', '2017-07-16 11:41:23', '2017-08-18 04:08:33', 79),
(261, 'Donec tincidunt. Donec vitae erat', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu', '2017-06-09 01:55:15', '2017-08-18 10:26:40', NULL),
(262, 'adipiscing fringilla, porttitor', 'lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh', '2017-07-21 11:23:36', '2017-08-18 05:42:01', 71),
(264, 'iaculis nec, eleifend non,', 'sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris', '2017-07-23 04:37:31', '2017-08-18 17:29:57', NULL),
(265, 'Morbi', 'dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem', '2017-07-28 20:17:02', '2017-08-17 06:21:11', 65),
(266, 'Morbi neque tellus, imperdiet non, vestibulum nec,', 'nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc', '2017-07-06 14:48:38', '2017-08-17 06:40:24', 72),
(267, 'at, velit. Pellentesque ultricies dignissim lacus.', 'a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc', '2017-06-19 12:21:56', '2017-08-18 15:23:57', 71),
(268, 'morbi tristique senectus et netus et', 'montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac', '2017-08-15 05:07:29', '2017-08-17 14:27:56', 78),
(269, 'lorem eu metus. In lorem. Donec elementum, lorem', 'nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida', '2017-07-16 10:46:38', '2017-08-18 10:44:15', 76),
(270, 'dui, semper et, lacinia vitae, sodales', 'facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla.', '2017-07-01 14:07:06', '2017-08-17 13:03:40', NULL),
(271, 'ornare lectus justo eu', 'Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam', '2017-07-16 07:52:24', '2017-08-17 01:29:25', 73),
(272, 'dolor sit amet, consectetuer adipiscing elit.', 'Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget', '2017-08-01 17:39:17', '2017-08-17 06:57:48', 66),
(273, 'dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et', 'fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo', '2017-08-03 02:39:45', '2017-08-17 16:18:21', 69),
(274, 'in molestie tortor nibh sit', 'hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi.', '2017-08-02 15:14:39', '2017-08-18 05:32:42', 73),
(275, 'risus varius orci, in consequat enim diam vel', 'risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam.', '2017-06-23 01:53:47', '2017-08-18 20:07:25', 72),
(276, 'orci, consectetuer', 'Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia.', '2017-08-07 14:58:31', '2017-08-17 18:06:25', 74),
(277, 'sapien. Nunc pulvinar arcu et pede.', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus', '2017-07-08 21:27:02', '2017-08-17 03:30:57', 72),
(278, 'Donec consectetuer mauris', 'adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus.', '2017-06-11 12:43:58', '2017-08-17 22:13:18', 72),
(279, 'magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus.', 'arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae', '2017-06-23 14:39:08', '2017-08-18 08:14:25', 79),
(280, 'ligula. Aenean euismod mauris eu', 'consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', '2017-07-25 22:44:55', '2017-08-18 11:36:25', 75),
(281, 'aliquet', 'augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut', '2017-07-24 17:47:55', '2017-08-18 10:55:34', 71),
(282, 'mattis semper, dui lectus rutrum urna, nec luctus felis', 'lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer', '2017-08-10 11:43:10', '2017-08-17 09:12:00', NULL),
(283, 'tincidunt dui augue eu', 'hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus', '2017-08-02 07:47:03', '2017-08-17 03:15:17', 68),
(284, 'ligula. Donec luctus aliquet odio.', 'pede et risus. Quisque libero lacus, varius et, euismod et,', '2017-06-25 11:16:04', '2017-08-18 18:37:14', 74),
(286, 'non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc', 'nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida', '2017-06-11 01:14:14', '2017-08-17 18:17:40', 73),
(287, 'tortor. Integer aliquam adipiscing', 'Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl', '2017-06-18 10:09:02', '2017-08-17 13:25:50', 69),
(288, 'Maecenas libero est, congue a, aliquet', 'tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget,', '2017-06-09 11:58:11', '2017-08-18 13:24:53', 73),
(289, 'lorem vitae', 'nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum', '2017-07-01 08:24:56', '2017-08-18 11:19:55', 78),
(290, 'eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus', 'et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio', '2017-08-05 18:14:19', '2017-08-18 13:41:29', NULL);


CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `user` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `roles`, `creation_date`) VALUES
(65, 'Gecko', '$2y$13$VqHDlo7fOHSFsiK2fYBK1OT1eBXB8INh3ufFA2YSH0CBzhDSX9lyi', 'gecko@coding.eu', 'Gecko', 'Paul', 'a:1:{i:0;s:10:"ROLE_ADMIN";}', '2017-08-20 21:45:47'),
(66, 'sangfroid', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'drmoule@yahoo.fr', 'Adel', 'toto', 'a:1:{i:0;s:10:"ROLE_ADMIN";}', '2017-08-20 21:46:51'),
(67, 'Kinney', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'lacinia.orci@Duisrisus.org', 'Kuame', 'Sweet', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-16 06:53:28'),
(68, 'Stark', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'vestibulum.lorem@mi.edu', 'Samson', 'Riddle', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-06 07:58:44'),
(69, 'Mcgee', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'Donec@nequeNullam.org', 'Ian', 'Lewis', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-07 06:36:21'),
(71, 'Mcleod', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'ipsum.dolor.sit@id.co.uk', 'Charlotte', 'Cline', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-15 04:59:50'),
(72, 'Vaughan', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'Duis.a.mi@nonlacinia.org', 'Scott', 'Patel', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-05 15:39:04'),
(73, 'Schmidt', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'at.velit@vitae.org', 'Luke', 'Irwin', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-16 22:19:01'),
(74, 'Sanders', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'Donec.feugiat@ridiculusmus.co.uk', 'Haley', 'Holden', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-14 08:28:03'),
(75, 'Andrews', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'eget.ipsum@eueleifendnec.edu', 'Jarrod', 'Flynn', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-10 17:25:25'),
(76, 'Nicholson', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'porttitor.scelerisque@amet.net', 'Bree', 'Porter', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-09 00:42:58'),
(78, 'Padilla', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'non.nisi.Aenean@nuncsedlibero.edu', 'Lars', 'Barnes', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-05 18:30:20'),
(79, 'Ingram', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'ornare.facilisis@metus.com', 'Xaviera', 'Washington', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-13 10:21:54'),
(80, 'Chandler', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'ipsum.porta.elit@nonquamPellentesque.org', 'Isabella', 'Morris', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-14 23:57:24'),
(81, 'Mcdaniel', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'Curae@tortor.ca', 'Dana', 'Baldwin', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-13 15:53:47'),
(82, 'Floyd', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'eu.tellus.Phasellus@aliquetodio.co.uk', 'Sasha', 'Mcfarland', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-10 05:20:05'),
(83, 'Flowers', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'Nam.ligula@Vivamusmolestie.ca', 'Keaton', 'Oneill', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-08 00:53:29'),
(84, 'Mathews', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'fermentum.convallis@fermentum.co.uk', 'Hillary', 'Dale', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-14 05:24:38'),
(85, 'Jenkins', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'sed.libero@Nullam.net', 'Leroy', 'Hoover', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-09 07:14:00'),
(86, 'Hays', '$2y$13$sFbu0K3rkAiBONXSEvmn3u/YZaKmYDnQ1DI7pDmQJsj0blJhIXMse', 'Nam.tempor.diam@Nuncullamcorpervelit.ca', 'Ivana', 'Cantrell', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-13 00:44:08'),
(87, 'sangfroid75', '$2y$13$GLyJyyVxDyt4oZ7noRijfOIoHA2v2ucCVaJEHYEMBAv/Y2jdtYNTe', 'adel.sanhaji@gmail.com', 'Adel', 'Sanhaji', 'a:1:{i:0;s:12:"ROLE_BLOGGER";}', '2017-08-27 22:12:32');

ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_5A8A6C8D2B36786B` (`title`), ADD KEY `IDX_5A8A6C8DA76ED395` (`user_id`);

ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`), ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=301;

ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;

ALTER TABLE `post`
ADD CONSTRAINT `FK_5A8A6C8DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;


