create schema if not exists calvilloja;
use calvilloja;
create table empleados
(
 id_empleado int not null auto_increment,
    nombre_empleado nvarchar(100) not null,
    turno_empleado nvarchar(100) not null,
    puesto_empleado nvarchar(100) not null,
    horario_empleado float not null default 0,
    constraint pk_empleados primary key(id_empleado)
);
insert into empleados(nombre_empleado, turno_empleado, puesto_empleado, horario_empleado) values('Pedro','Matutino', 'Gerente', 8);
insert into empleados(nombre_empleado, turno_empleado, puesto_empleado, horario_empleado) values('Juan','Matutino', 'Supervisor', 4);
insert into empleados(nombre_empleado, turno_empleado, puesto_empleado, horario_empleado) values('Eduardo','Matutino', 'Cajero', 8);