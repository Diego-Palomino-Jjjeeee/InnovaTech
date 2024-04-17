CREATE DATABASE InnovaTech2;
USE InnovaTech2;
-- drop database InnovaTech2;
-- Diego
CREATE TABLE tb_empleado (
    DNI INT NOT NULL PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Direccion VARCHAR(100) NOT NULL,
    Telefono VARCHAR(15) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Sueldo FLOAT NOT NULL,
    Estado_civil VARCHAR(100) NOT NULL
);
-- Johan
CREATE TABLE tb_especialidad (
    Id_especialidad INT NOT NULL PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Area VARCHAR(50) NOT NULL
);
-- Luis
create table tb_cliente (
	codigo_cliente char(5) not null primary key,
	nombre varchar(20) not null,
	ap_paterno varchar(20) not null,
	ap_materno varchar(20) not null,
	fecha_nacimiento date,
	direccion varchar(50),
	correo_electronico varchar(50)
    );
-- Timoty
CREATE TABLE tb_recurso(
    Id_recursos INT PRIMARY KEY NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Categoria VARCHAR(50) NOT NULL,
    Estado VARCHAR(50) NOT NULL,
    Fecha_Adquisicion DATE NOT NULL,
    Costo DOUBLE NOT NULL
);
-- Marrufo
CREATE TABLE tb_servicio(
    Id_servicios INT PRIMARY KEY NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Precio DOUBLE NOT NULL,
    Duracion VARCHAR(50) NOT NULL,
    Categoria VARCHAR(50) NOT NULL,
    Estado VARCHAR(50) NOT NULL
);
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- Inserts
INSERT INTO tb_recurso VALUES 
(1, 'Computadora portátil', 'Tecnología', 'Disponible', '2024-04-15', 1200.00),
(2, 'Proyector', 'Tecnología', 'En reparación', '2023-11-20', 800.00),
(3, 'Silla de oficina', 'Mobiliario', 'Disponible', '2022-09-10', 150.00);
select * from tb_recurso;

INSERT INTO tb_servicio VALUES 
('1','Mantenimiento de computadoras', 80.00, '1 hora', 'Tecnología', 'Disponible'),
('2','Limpieza de oficinas', 50.00, '2 horas', 'Limpieza', 'Disponible'),
('3','Diseño gráfico', 100.00, 'Variable', 'Creatividad', 'En espera');
select * from tb_servicio;

insert into tb_cliente values
('C0001', 'Carlos', 'Ramos', 'Vera', '1999-04-12', 'Av. Sauces 253', 'carlos.r@gmail.com'),
('C0002', 'Rosa', 'Collantes', 'Flores', '2000-05-31', 'Jr. Álamos 354', null),
('C0003', 'Felipe', 'Montes', 'Salas', '2001-09-22', 'Av. Flores 2541', 'fmontes.salas@gmail.com'),
('C0004', 'Viviana', 'Gonzáles', 'Roca', '2000-07-17', 'Calle Lomas 251', 'viviana.gr20@gmail.com'),
('C0005', 'Jojan', 'Martínez', 'Salvatierra', '2003-04-24', 'Calle Los naranjos', 'johanm@gmail.com');

select * from tb_cliente;

INSERT INTO tb_especialidad  VALUES 
('1','Ingeniería de Software', 'Desarrollo y Mantenimiento de Software'),
('2','Administración de Bases de Datos', 'Gestión y Seguridad de la Información'),
('3','Desarrollo Web', 'Diseño y Desarrollo de Sitios Web');
SELECT * from tb_especialidad;

insert into tb_empleado values
('12345678', 'Diego','Av.Peru','123456789','aea@gmail.com','1200','Casado'),
('11112222', 'Teresa','Campo de Marte','111222333','zzz@hotmail.com','1100','Divorciada'),
('88888888', 'Johan','Av.Larco','999999999','uwu@outlook.com','1000','Soltero'); 				  
SELECT * from tb_empleado;
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////
-- /////////////////////////////////////////////////////////////////////////////////////////////

