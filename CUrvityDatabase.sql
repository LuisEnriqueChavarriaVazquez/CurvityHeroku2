
create database if not exists u253306330_curvity;
use u253306330_curvity;
create table if not exists Aspirante 
(IDAspirante varchar (30) primary key,Nombre varchar(30),Contra varchar(30),ApellidoPat varchar(30),
ApellidoMat varchar(30),SueldoDeseado varchar(30),Direccion varchar(30),Escuela varchar(30),NivelAcademico varchar(30),CorreoElec varchar(30),ResumenExpPrevLab text,
ResumenHab text, numeroIdiomas int, detallesIdiomas text,
FacebookAspirante varchar(30) default 'Ninguno' ,SkypeAspirante varchar(30) default 'Ninguno' ,TwitterAspirante varchar(30) default 'Ninguno',
FotoPerfil longblob);

create table if not exists Empresa
(IDEmpresa int AUTO_INCREMENT primary key , Nombre varchar (30),RazonSocial varchar(30), Contra varchar(30),
Direccion varchar(30),Tipo varchar(90), Telefono varchar(30),
DireccionWeb varchar (30),FacebookEmpresa varchar(30) default 'Ninguno' ,SkypeEmpresa varchar(30) default 'Ninguno' ,
TwitterEmpresa varchar(30) default 'Ninguno',FotoLogo longblob);

create table if not exists Sede
(IDSede int AUTO_INCREMENT ,IDEmpresa int ,Nombre varchar (30), Telefono varchar(30), Direccion varchar (30),
NombreReclutador varchar(30),CorreoElecReclutador varchar(30),ContraReclutador varchar(30),
FacebookSede varchar(30) default 'Ninguno' ,SkypeSede varchar(30) default 'Ninguno' ,
TwitterSede varchar(30) default 'Ninguno',foreign key (IDEmpresa) references Empresa(IDEmpresa) on update cascade on delete cascade,
primary key (IDSede,IDEmpresa));

create table if not exists Puesto
(IDPuesto int AUTO_INCREMENT,IDSede int,IDEmpresa int,Nombre varchar (30), 
PagoOfertado varchar(30),ModalidadPago varchar(30),ResumenRequisitos text,ResumenPrestaciones text,
foreign key (IDEmpresa) references Empresa(IDEmpresa) on update cascade on delete cascade,
foreign key (IDSede) references Sede(IDSede) on update cascade on delete cascade,
primary key (IDPuesto,IDSede,IDEmpresa)) ;

create table if not exists Matching
(IDAspirante varchar(30) ,IDPuesto int ,IDSede int ,IDEmpresa int,Situacion text,
foreign key (IDAspirante) references Aspirante(IDAspirante) on delete cascade on update cascade,
foreign key (IDPuesto) references Puesto(IDPuesto) on delete cascade on update cascade,
foreign key (IDSede) references Sede(IDSede) on delete cascade on update cascade,
foreign key (IDEmpresa) references Empresa(IDEmpresa) on delete cascade on update cascade,
primary key (IDAspirante,IDPuesto,IDSede,IDEmpresa));

insert into Aspirante
(IDAspirante,Nombre,Contra,ApellidoPat,ApellidoMat,SueldoDeseado,Direccion,Escuela,NivelAcademico,CorreoElec,
ResumenExpPrevLab,ResumenHab,numeroIdiomas,detallesIdiomas,FacebookAspirante,SkypeAspirante,TwitterAspirante)
 values 
 ("1","Rick","12345","Machorro","Vences","123.45","Norte 25","Amauta","Superior","rick@gmail.com","Conserge",
 "Amigable",1,"Ingles","Rick 1","Rick 2","Rick 3");
select * from Aspirante;
insert into Empresa 
(Nombre,RazonSocial,Contra,Direccion,Tipo,Telefono,DireccionWeb,
FacebookEmpresa,SkypeEmpresa,TwitterEmpresa)
 values
("Amazon","Comercio","12345","Norte 25","Comercial","134334","amazon@gmail","Facebook",
"Twitter","Linkedin");

insert into Sede
(IDEmpresa,Nombre,Telefono,Direccion,NombreReclutador,CorreoElecReclutador,ContraReclutador,
FacebookSede,SkypeSede,TwitterSede) values
(1,"Amazon del Norte","1235678","Norte 45","Reclutador1","reclutador@gmail.com","123456",
"Facebook","Twitter","LinkeDin");

insert into Puesto (IDSede,IDEmpresa,Nombre,PagoOfertado,ModalidadPago,ResumenRequisitos,ResumenPrestaciones)
values(1,1,"Gerente","123.56","Semanal","Serbueno","2 semanas de vacaciones al año");

insert into Matching (IDAspirante,IDPuesto,IDSede,IDEmpresa,Situacion) values("1",1,1,1,"Complicada");

select * from Aspirante;
select * from Empresa;
select * from Sede;
select * from Puesto;
select * from Matching;
INSERT INTO Sede(IDEmpresa, Nombre, Telefono, Direccion, NombreReclutador, CorreoElecReclutador,ContraReclutador,FacebookSede,SkypeSede,TwitterSede) VALUES (1,'$nombre_sede', '$tel_sede', '$direccion_sede','$nombre_reclutador','$email_reclutador','$password_reclutador', '$facebook_sede','$skype_sede','$twitter_sede');
