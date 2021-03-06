drop database MoviePass;
create database MoviePass;
use MoviePass;


/**********************Tabla de usuarios************************/
create table users ( id int auto_increment primary key, level int not null, name varchar(50) not null, 
		             lastname varchar(50) not null, username varchar(50) not null, 
					 password varchar(60) not null, email varchar(80) not null UNIQUE);


create table genre ( id_genre int auto_increment primary key, name varchar(50) not null );


/************************Tabla de Peliculas*****************************/
create table movies ( id_movie int auto_increment primary key, title varchar(80) not null, id_genre int not null,
				      foreign key (id_genre) references genre(id_genre) ,
					  age varchar(10) not null, img varchar(80) not null);



/***********************************Tabla Cines**********************************/

CREATE TABLE theathers ( id_theather int auto_increment primary key, name varchar(30) not null, adress varchar(30) not null, room int not null);



/***********************Tabla de salas*************************************************/
create table rooms (id_room int auto_increment primary key, id_theather int not null, name varchar(20) not null, totalSeats int default(50), 
					id_session int default(0), ticketPrice int not null, foreign key (id_theather) references theathers(id_theather)ON DELETE CASCADE);

	

/***************************Sala_X_pelicula******************************************/


create table room_x_movie (id_rm int auto_increment primary key, id_room int default (0), id_movie int default (0), date date not null , availableSeats int default(0),
					       time time not null, timeEnd time not null, id_theather int not null, 
                           foreign key (id_theather) references theathers(id_theather) ON DELETE CASCADE,
						   foreign key (id_room) references rooms(id_room) ON DELETE CASCADE,
                           foreign key (id_movie)references movies(id_movie) ON DELETE CASCADE);



/***********************************Tabla ticket**********************************/

create table ticket (id_ticket int auto_increment primary key, id_rm int not null, id_user int default(0), id_movie int not null, id_room int default (0),
					 date date not null, time time not null, timeEnd time not null, price float not null, code varchar(100) not null default(0), id_theather int not null,
					 foreign key (id_rm) references room_x_movie(id_rm) ON DELETE CASCADE);

/**********************Tabla de ventas****************************************/

create table purchases (id_purchase int auto_increment primary key, id_user int not null ,price float not null, totalSeats int not null, id_rm int not null,
						date date default (curdate()), time time default(curtime()));




/**** VOLCADOS ****/


/****Volcado de usuarios***/

insert into users (level,name, lastname, username, password, email) values (0, "nombre", "apellido", "admin", "admin", "admin@gmail.com");
insert into users (level,name, lastname, username, password, email) values (1, "nombre2", "apellido2", "admin2", "admin2", "admin2@gmail.com");

/*** GENERO ***/

insert into genre (name) values ("Accion");
insert into genre (name) values ("Comedia");
insert into genre (name) values ("Terror");


/*Volcado de peliculas*/

insert into movies (title, age, id_genre, img) values ("Joker", "18", 1,"Views/layout/img/joker.jpg");
insert into movies (title, age, id_genre, img) values ("Geminis", "16", 1,"Views/layout/img/geminis.jpg");
insert into movies (title, age, id_genre, img) values ("Mujer Maravilla", "APT", 1,'Views/layout/img/MujerMaravilla.jpg');
insert into movies (title, age, id_genre, img) values ("Toy Story 4", "APT", 3,'Views/layout/img/ToyStory4.jpg');
insert into movies (title, age, id_genre, img) values ("Avengers EndGame", "13", 2,'Views/layout/img/avengersEndGame.jpg');


/*Volcado a de cines*/

insert into theathers( name, adress, room)  values ('Ambassador', 'avenida 1', 0);  
insert into theathers( name, adress, room) values ('Cines Paseo Aldrey', 'paseo 2', 0);
insert into theathers( name, adress, room) values ('Cine del Paseo', 'paseo 3', 0);
insert into theathers( name, adress, room) values ('Cine del Paseo NARNIO', 'avenida 7', 0);
insert into theathers( name, adress, room) values ('Los Gallegos Shopping', 'calle 12', 0); 

/* Volcado de tickets */


/**Volcado tabla de salas**/

insert into rooms(id_theather, name , totalSeats, ticketPrice, id_session) values (1,'Sala 1',50, 300, 1); 
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (1,'Sala 2',50, 250);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (1,'Sala 3',50, 280);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (1,'Sala 4',50, 350);	

insert into rooms(id_theather, name , totalSeats, ticketPrice) values (2,'Sala 1',50, 350);  
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (2,'Sala 2',50, 300);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (2,'Sala 3',50, 250);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (2,'Sala 4',50, 280);	

insert into rooms(id_theather, name , totalSeats, ticketPrice) values (3,'Sala 1',50, 350);  
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (3,'Sala 2',50, 280);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (3,'Sala 3',50, 300);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (3,'Sala 4',50, 250);	

insert into rooms(id_theather, name , totalSeats, ticketPrice) values (4,'Sala 1',50, 250);  
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (4,'Sala 2',50, 350);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (4,'Sala 3',50, 280);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (4,'Sala 4',50, 300);	

insert into rooms(id_theather, name , totalSeats, ticketPrice) values (5,'Sala 1',50, 280);  
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (5,'Sala 2',50, 250);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (5,'Sala 3',50, 350);	
insert into rooms(id_theather, name , totalSeats, ticketPrice) values (5,'Sala 4',50, 300);

/**Volcado en Sala_X_pelicula**/
/*['id_theather'], $p['id_room'], $p['id_movie'], $p['id_rm'], $p['date'], $p['time'], $p['timeEnd']*/

/*

insert into room_x_movie(id_room,id_movie,date,time)values(5,1,'2019-12-10',' 18:30');
insert into room_x_movie(id_room,id_movie,date,time)values(6,2,'2019-12-10',' 20:00');
insert into room_x_movie(id_room,id_movie,date,time)values(7,3,'2019-12-10',' 18:00');
insert into room_x_movie(id_room,id_movie,date,time)values(8,3,'2019-12-10',' 18:00');

insert into room_x_movie(id_room,id_movie,date,time)values(9,4,'2019-12-15',' 18:30');
insert into room_x_movie(id_room,id_movie,date,time)values(10,1,'2019-12-20',' 20:00');
insert into room_x_movie(id_room,id_movie,date,time)values(11,5,'2019-12-01',' 18:00');
insert into room_x_movie(id_room,id_movie,date,time)values(12,3,'2019-12-30',' 18:00');

insert into room_x_movie(id_room,id_movie,date,time)values(13,4,'2019-12-03',' 18:00');
insert into room_x_movie(id_room,id_movie,date,time)values(14,5,'2019-12-03',' 18:00');
insert into room_x_movie(id_room,id_movie,date,time)values(15,2,'2019-12-13',' 18:00');
insert into room_x_movie(id_room,id_movie,date,time)values(16,1,'2019-12-13',' 18:00');

insert into room_x_movie(id_room,id_movie,date,time)values(17,3,'2019-12-13',' 18:00');
insert into room_x_movie(id_room,id_movie,date,time)values(18,3,'2019-12-04',' 15:00');
insert into room_x_movie(id_room,id_movie,date,time)values(19,3,'2019-12-04',' 19:00');
insert into room_x_movie(id_room,id_movie,date,time)values(20,3,'2019-12-06',' 22:00');*/

insert into room_x_movie (id_theather,id_room,id_movie,date,time,timeEnd) values (1,1,1, '2019-12-10' ,'18:00','20:15');
insert into room_x_movie (id_theather,id_room,id_movie,date,time,timeEnd) values (1,3,2, '2019-12-10',' 18:00','21:30');
insert into room_x_movie (id_theather,id_room,id_movie,date,time,timeEnd) values (2,6,1, '2019-12-10',' 18:00','19:30');
insert into room_x_movie (id_theather,id_room,id_movie,date,time,timeEnd) values (3,9,3, '2019-12-12',' 20:15','22:15');
/**id_rm, id_user, idmovie, date time , time ENd price, idtheather*/
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (1, 0, 1, '2019-12-10','18:00','20:15', 200, 1);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (1, 2, 1, '2019-12-10','18:00','20:15', 200, 1);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (1, 0, 1, '2019-12-10','18:00','20:15', 200, 1);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (1, 0, 1, '2019-12-10','18:00','20:15', 200, 1);

insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (2, 0, 2, '2019-12-10',' 18:00','21:30', 300, 1);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (3, 0, 1, '2019-12-10',' 18:00','19:30', 250, 2);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (4, 0, 3, '2019-12-12',' 20:15','22:15', 380, 3);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (4, 0, 3, '2019-12-12',' 20:15','22:15', 380, 3);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (4, 0, 3, '2019-12-12',' 20:15','22:15', 380, 3);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (4, 0, 3, '2019-12-12',' 20:15','22:15', 380, 3);
insert into ticket(id_rm, id_user, id_movie, date, time, timeEnd, price, id_theather) values (4, 0, 3, '2019-12-12',' 20:15','22:15', 380, 3);

select *from room_x_movie;
select *from ticket;


