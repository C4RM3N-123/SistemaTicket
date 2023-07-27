CREATE TABLE `tuser` (
  `idUser` varchar(13) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) UNIQUE NOT NULL,
  `username` varchar(100) UNIQUE NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` bit NOT NULL,
  `phone` int NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,

  primary key(idUser)
) engine = innodb;

CREATE TABLE `tticket` (
  `idTicket` varchar(13) NOT NULL,
  `name` varchar(50) NULL,
  `description` text NOT NULL,
  `responsible` varchar(100) NULL,
  `type` varchar(50) NOT NULL,
  `state` varchar(255),
  `idUser` varchar(13) NOT NULL,

  primary key(idTicket),
  foreign key (idUser) references tuser(idUser)
) engine = innodb;

CREATE TABLE `treport` (
  `idReport` varchar(13) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creator_role` varchar(255) NOT NULL,
  `creator_data` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `idTicket` varchar(13) NOT NULL,

  primary key(idReport),
  UNIQUE (`idTicket`),
  foreign key (idTicket) references tticket(idTicket)
) engine = innodb;

CREATE TABLE `tpicture` (
  `idImage` varchar(13) NOT NULL,
  `imageBefore` blob NULL,
  `imageAfter` blob NULL,
  `idTicket` varchar(13) NOT NULL,

  primary key(idImage),
  foreign key (idTicket) references tticket(idTicket)
) engine = innodb;

CREATE TABLE `tdate` (
  `idDate` varchar(13) NOT NULL,
  `created_at` datetime NOT NULL,
  `consulted_at` datetime NULL,
  `ending_at` datetime NULL,
  `idTicket` varchar(13) NOT NULL,

  primary key(idDate),
  UNIQUE (`idTicket`),
  foreign key (idTicket) references tticket(idTicket)
) engine = innodb;