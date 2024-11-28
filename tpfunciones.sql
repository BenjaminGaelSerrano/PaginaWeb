create database tpfunciones;
create table empleados(
	dni int primary key,
    apellido varchar(45),
    nombre varchar(45),
    domicilio varchar(45),
    sector varchar(45),
    telefono int,
	hijos int,
	fecha_nacimiento date,
	fecha_ingreso date
);
create table administrador(
	dni_empleado int primary key,
    foreign key(dni_empleado) references empleados(dni) 
);
create table vendedor(
	dni_empleado int primary key,
    comision int,
    foreign key(dni_empleado) references empleados(dni) 
);
create table sueldo(
	sueldo_id int primary key,
	basico int,
    retenciones int,
    mes int,
    dni_empleado int,
    foreign key(dni_empleado) references empleados(dni)
);
create table productos(
	id int primary key,
	descripcion varchar(45),
	stock int,
	stock_minimo int,
	precio_costo int,
    precio_venta int,
	marca varchar(45),
	categoria varchar(45),
	demora_entrega int
);
create table control_horas(
	fecha date,
	hora_inicio time,
	hora_fin time,
    dni_empleado int primary key,
    foreign key(dni_empleado) references empleados(dni) 

); 
create table venta(
	id_venta int primary key,
    dni_empleado int,
    producto_id int,
    monto int,
    cantidad int,
    foreign key(dni_empleado) references empleados (dni),
    foreign key(producto_id) references productos (id)
);
-- 								inserts	
-- EMPLEADOS							
INSERT INTO empleados (dni, apellido, nombre, domicilio, sector, telefono, hijos, fecha_nacimiento, fecha_ingreso)
VALUES
(12345678, 'Pérez', 'Juan', 'Calle Ficticia 123', 'A', 11223344, 2, '1985-04-15', '2010-03-01'),
(23456789, 'González', 'Ana', 'Avenida Central 456', 'A', 22334455, 1, '1990-08-22', '2015-06-12'),
(34567890, 'Martínez', 'Luis', 'Calle Luna 789', 'B', 33445566, 3, '1982-11-30', '2012-07-19'),
(45678901, 'Rodríguez', 'Sofía', 'Calle Sol 321', 'F', 44556677, 0, '1995-02-10', '2018-01-25'),
(56789012, 'Gómez', 'Carlos', 'Avenida Norte 654', 'J', 55667788, 4, '1980-09-05', '2009-09-30');
-- ADMINISRADORES
INSERT INTO administrador (dni_empleado)
VALUES
(12345678),
(23456789),
(34567890);
-- VENDEDORES
INSERT INTO vendedor (dni_empleado, comision)
VALUES
(45678901, 8),
(56789012, 20);
-- SUELDO
INSERT INTO sueldo (sueldo_id, basico, retenciones, mes, dni_empleado)
VALUES
(1, 50000, 5000, 1, 12345678),
(2, 55000, 4500, 2, 23456789),
(3, 60000, 6000, 3, 34567890),
(4, 48000, 4000, 4, 45678901),
(5, 65000, 6500, 5, 56789012);
-- PRODUCTOS
INSERT INTO productos (id, descripcion, stock, stock_minimo, precio_costo, precio_venta, marca, categoria, demora_entrega)
VALUES
(1, 'Laptop HP', 10, 2, 30000, 45000, 'HP', 'Electrónica', 5),
(2, 'Smartphone Samsung', 25, 5, 15000, 25000, 'Samsung', 'Móviles', 3),
(3, 'Televisor LG', 15, 3, 25000, 40000, 'LG', 'Electrónica', 7),
(4, 'Tablet Lenovo', 30, 10, 12000, 18000, 'Lenovo', 'Electrónica', 4),
(6, 'fortnite', 30, 30, 1200, 18000, 'Lenovo', 'Electrónica', 4),
(5, 'Auriculares Sony', 50, 10, 5000, 9000, 'Sony', 'Accesorios', 2);


-- CONTROL HORAS
INSERT INTO control_horas (fecha, hora_inicio, hora_fin, dni_empleado)
VALUES
('2024-11-01', '09:00:00', '18:00:00', 12345678),
('2024-11-02', '10:00:00', '19:00:00', 23456789),
('2024-11-03', '08:30:00', '17:30:00', 34567890),
('2024-11-04', '09:15:00', '18:15:00', 45678901),
('2024-11-05', '08:45:00', '17:45:00', 56789012);
-- VENTAS

INSERT INTO venta (id_venta, dni_empleado, producto_id, monto, cantidad, fecha)
VALUES
(1, 45678901, 1, 45000, 1, '2024-10-12'),
(2, 45678901, 2, 25000, 2, '2024-11-16'),
(3, 56789012, 3, 40000, 1, '2024-07-06'),
(4, 45678901, 4, 18000, 3, '2024-04-01'),
(5, 56789012, 5, 9000, 5, '2024-02-19');
insert into venta value (6,45678901,3,3000,4,'2024-05-02');
-- 							HASTA ACA LOS INSERTS							--
--       					a partir de aca las consultas							   -- 

-- 3. Hacer un listado de los empleados que ingresaron en el año 2010.
select nombre, apellido from empleados where year(fecha_ingreso)= 2010;

-- 4. Hacer un listado de los empleados que cumplen años en la primera mitad del año.
select * from empleados where dayofyear(fecha_nacimiento)<183;

-- 5. Hacer un listado de los empleados que cumplen años la primera quincena de enero.
select * from empleados where dayofyear(fecha_nacimiento)<=15;

-- 6. Hacer un listado de la antigüedad de los empleados, expresada en años. Hay más de
-- una función que pueden utilizar en este caso planteen las alternativas que
-- encuentren y elijan la mejor
select nombre, apellido, (year(current_date())- year(fecha_ingreso))  from empleados;
-- la segunda opcion es la mejor
select nombre, apellido, timestampdiff(year, fecha_ingreso, current_date()) from empleados;

-- 7. Para los productos cuyo stock sea igual o menor a su stock mínimo hacer un listado
-- de las fechas en las que se recibirá el producto si el pedido se hiciera hoy, teniendo
-- en cuenta la demora en la entrega.
select id, date_add(current_date(), interval demora_entrega day) from productos where stock<=stock_minimo;

-- 8. Listar la descripción del producto y cantidad de productos vendidos por mes durante
-- el 2024.
select descripcion, count(producto_id), month(venta.fecha) from productos join venta on productos.id=producto_id where year(venta.fecha)=2024 group by producto_id,month(venta.fecha); 


-- 9. ¿Qué función utilizarían para convertir un string en un campo con formato de fecha válido? (date). Mostrar un ejemplo de su uso.
-- Utilizaria STR_TO_DATE
-- Ejemplo
select date_format(fecha_ingreso,"%M %a %d") from empleados where empleados.dni=12345678; 
SELECT STR_TO_DATE('jul 7, 2010', '%b %d, %Y');

-- 10. Listar una columna llamada nombre_empleado con el siguiente formato: “Apellido, nombre”. Utilicen la función apropiada y un alias.
select concat(apellido, ', ', nombre) as nombre_empleado from empleados;

-- 11. Actualizar la descripción de la tabla de productos, siempre que en la descripción de un producto se encuentre la palabra televisor reemplazarla por la cadena “TV”.
update productos set descripcion = replace(descripcion, 'Televisor', 'tv');

-- 12. ¿Qué función utilizarían para quitar espacios delante y atrás de una cadena de caracteres? Escriban un ejemplo utilizando la sentencia insert.
-- utilizo trim
insert into empleados value(122445,trim("  ramirez "),"pedro","oslo 1234",'A',321212,2,"1985-06-02","2007-09-07"); 

-- 13. Haga un listado del nombre y apellido del empleado y la cantidad de hijos que -- tiene.Como el campo hijos puede contener null, el listado tiene que mostrar la cantidad de hijos o la frase “NO TIENE”.
SELECT nombre, apellido,
       IF(hijos>0, empleados.hijos, 'NO TIENE') AS tiene_o_no_hijos
FROM empleados;

-- 14. Actualizar la descripción de los productos, se debe agregar la marca al comienzo de la descripción. Quedaría de esta forma: “Marca. Descripción producto”.
update productos set descripcion = concat_ws('. ', marca, descripcion);
select * from productos;
-- o esta otra opcion
update productos set descripcion = concat(marca, '. ', descripcion);


-- 15. Hacer un listado que muestre la descripción del producto y una leyenda que diga MUY CARO, CARO, BARATO dependiendo del precio del producto según los siguientes rangos: menos de 3000 barato, entre 3000 y 6000 caro, más de 6000 muy caro.

select descripcion,
	case 
		when precio_venta<3000 then 'BARATO'
        when precio_venta>6000 then 'CARO'
        when precio_venta>3000 and precio_venta<6000 then 'CARO'
        else 'precio no esta dentro de estos rangos '
	end as categoria_precio
	from productos;
    -- 16. Hacer un listado que contenga nombre y apellido del empleado, sueldo neto y una leyenda que diga SUELDO ALTO, SUELDO MEDIO, SUELDO BAJO según el siguiente criterio: menos de 15000 BAJO, entre 15000 Y 50000 medio y más de 50000 ALTO.Utilizar case.
select nombre,apellido,basico,
	case 
		when basico <15000 then 'SUELDO BAJO'
        when basico between 15000 and 50000 then 'SUELDO MEDIO'
        when basico >50000 then 'SUELDO ALTO'
	end as sueldo_cuanto
    from empleados join sueldo on dni=dni_empleado;
    
-- 17. Hacer un listado de las fechas de ingreso de los empleados mostrando Nombre y Apellido, la fecha de ingreso con el siguiente formato Thursday 4th July 2013 y una cuarta columna con el día de la semana en que se produjo dicho ingreso.
select date_format(fecha_ingreso,'%W %d %M %Y'), nombre, apellido,dayofweek(fecha_ingreso) from empleados;
-- 18. Hacer un listado de la cantidad de horas que trabajó cada empleado por día. Solo mostrar el listado para los días de este mes
select nombre, apellido, timediff(hora_fin, hora_inicio), fecha from empleados join control_horas on dni=dni_empleado where month(fecha)= month(current_date()) group by dni;
