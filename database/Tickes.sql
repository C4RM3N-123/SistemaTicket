create database ticketSystem:

use ticketSystem;

create table admin (
  idAdmin varchar(36) not null,
  first_name varchar(100) not null,
  last_name varchar(100) not null,
  email varchar(100) unique not null,
  username varchar(100) unique not null,
  dni int(8) unique not null,
  gender bit not null,
  password varchar(50) not null,
  created_at datetime not null,
  updated_at datetime not null,

  primary key(idAdmin)
) engine = innodb;


create table employee (
  idEmployee varchar(36) not null,
  first_name varchar(100) not null,
  last_name varchar(100) not null,
  email varchar(100) unique not null,
  username varchar(100) unique not null,
  dni int(8) unique not null,
  phone int(9) not null,
  gender bit not null,
  occupation varchar(100) not null,
  password varchar(50) not null,
  created_at datetime not null,
  updated_at datetime not null,

  primary key(idEmployee)
) engine = innodb;


create table user (
  idUser varchar(36) not null,
  first_name varchar(100) not null,
  last_name varchar(100) not null,
  dni int(8) unique not null,
  gender bit not null,
  email varchar(100) unique not null,
  username varchar(100) unique not null,
  password varchar(50) not null,
  created_at datetime not null,

  primary key(idUser)
) engine = innodb;


create table ticket (
  idTicket varchar(13) not null,
  name varchar(100) not null,
  description varchar(max) not null,
  prioritie varchar(50) not null,
  type varchar(50) not null,
  created_at datetime not null,
  ending_at datetime not null,
  idEmployee varchar(36) not null,
  idUser varchar(36) not null,

  primary key (idTicket),
  foreign key (idEmployee) references employee(idEmployee),
  foreign key (idUser) references user(idUser)
) engine = innodb;


create table detailTicket (
  idDetail varchar(13) not null,
  state bit not null,
  idTicket varchar(13) not null,
  idAdmin varchar(36) not null,

  primary key (idDetail),
  foreign key (idTicket) references ticket(idTicket),
  foreign key (idAdmin) references admin(idAdmin)
) engine = innodb;


create table picture (
  idImage varchar(13) not null,
  imageBefore blob not null,
  imageAfter blob not null,
  idTicket varchar(13) not null,
  
  primary key (idImage, idTicket),
  foreign key (idTicket) references ticket(idTicket)
) engine = innodb;
