DROP DATABASE IF EXISTS VirtualMarket;

CREATE DATABASE VirtualMarket;

USE VirtualMarket;

CREATE TABLE TIPO_DOCUMENTOS(
    ID_TIP_DOC INT (4) auto_increment,
    NOMBRE_TIP_DOC VARCHAR (20) NOT NULL,
    PRIMARY KEY (ID_TIP_DOC)
);

CREATE TABLE DEPARTAMENTOS(
    ID_DEPARTAMENTO INT (4) auto_increment,
    NOMBRE_DEPARTAMENTO VARCHAR (30) NOT NULL,
    PRIMARY KEY (ID_DEPARTAMENTO)
);

CREATE TABLE CIUDADES(
    ID_CIUDAD INT (4) auto_increment,
    NOMBRE_CIUDAD VARCHAR (30) NOT NULL,
    ID_DEPARTAMENTO INT,
    PRIMARY KEY(ID_CIUDAD)
);

ALTER TABLE CIUDADES ADD FOREIGN KEY (ID_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(ID_DEPARTAMENTO);

CREATE TABLE ROLES(
    ID_ROL INT (2) auto_increment,
    NOMBRE_ROL VARCHAR (20) NOT NULL,
    PRIMARY KEY(ID_ROL)
);

CREATE TABLE ESTADOS_USUARIOS(
    ID_ESTADO INT (2) auto_increment,
    ESTADO_NOMBRE VARCHAR (20) NOT NULL,
    PRIMARY KEY(ID_ESTADO)
);


CREATE TABLE ESTADOS(
    ID_ESTADO INT (2) auto_increment,
    ESTADO_NOMBRE VARCHAR (20) NOT NULL,
    PRIMARY KEY(ID_ESTADO)
);

INSERT INTO ESTADOS (ESTADO_NOMBRE) VALUES ('Activo');
INSERT INTO ESTADOS (ESTADO_NOMBRE) VALUES ('Inactivo');

CREATE TABLE USUARIOS(
    ID_USUARIO INT auto_increment,
    NOMBRE_USUARIO VARCHAR(30) NOT NULL,
    APELLIDO_USUARIO VARCHAR(30) NOT NULL,
    ID_TIP_DOC INT,
    DOCUMENTO_USUARIO NUMERIC(20) NOT NULL,
    USUARIO VARCHAR(30) NOT NULL,
    CLAVE TEXT NOT NULL,
    DOMICILIO_USUARIO TEXT,
    TELEFONO_USUARIO NUMERIC(10),
    CELULAR_USUARIO NUMERIC(15),
    EMAIL_USUARIO VARCHAR(50) NOT NULL,
    FECHA_REGISTRO DATETIME NOT NULL,
    FECHA_NACIMIENTO DATE,
    ID_CIUDAD INT,
    ID_ROL INT,
    ID_ESTADO INT,
    ESTADO_CLAVE INT,
    FECHA_MODIFICACION DATETIME,
    PRIMARY KEY(ID_USUARIO)
);

ALTER TABLE USUARIOS ADD FOREIGN KEY (ID_TIP_DOC) REFERENCES TIPO_DOCUMENTOS (ID_TIP_DOC);
ALTER TABLE USUARIOS ADD FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDADES (ID_CIUDAD);
ALTER TABLE USUARIOS ADD FOREIGN KEY (ID_ROL) REFERENCES ROLES (ID_ROL);
ALTER TABLE USUARIOS ADD FOREIGN KEY (ID_ESTADO) REFERENCES ESTADOS_USUARIOS (ID_ESTADO);


CREATE TABLE CATEGORIAS(
    ID_CATEGORIA INT (2) auto_increment,
    NOMBRE_CATEGORIA VARCHAR (30) NOT NULL,
    PRIMARY KEY(ID_CATEGORIA)
);

INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Celulares y Tablets');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('TV, Audio y Foto');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Computación');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Consolas y Videojuegos');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Hogar');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Electrodomésticos');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Moda');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Relojes y Accesorios');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Libros y Música');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Belleza');
INSERT INTO CATEGORIAS (NOMBRE_CATEGORIA) VALUES ('Salud y Bienestar');

CREATE TABLE PRODUCTOS(
    ID_PRODUCTO INT (3) auto_increment,
    NOMBRE_PRODUCTO VARCHAR (100) NOT NULL,
    DESCRIPCION_PRODUCTO TEXT,
    ID_CATEGORIA INT,
    ID_ESTADO INT,
    PRIMARY KEY(ID_PRODUCTO)
);

ALTER TABLE PRODUCTOS ADD FOREIGN KEY (ID_CATEGORIA) REFERENCES CATEGORIAS (ID_CATEGORIA);
ALTER TABLE PRODUCTOS ADD FOREIGN KEY (ID_ESTADO) REFERENCES ESTADOS (ID_ESTADO);

CREATE TABLE FORMAS_PAGOS(
    ID_FORMA_PAGO INT(2) auto_increment,
    NOMBRE_FORMA_PAGO VARCHAR(20) NOT NULL,
    PRIMARY KEY (ID_FORMA_PAGO)
);

CREATE TABLE EMPRESA_PAGINA(
    ID_EMPRESA INT(5) auto_increment,
    NIT_EMPRESA NUMERIC(20) NOT NULL,
    RAZON_SOCIAL_EMPRESA VARCHAR(50) NOT NULL,
    DIRECCION_EMPRESA VARCHAR(30) NOT NULL,
    TELEFONO_EMPRESA NUMERIC(10) NOT NULL,
    PRIMARY KEY (ID_EMPRESA)
);

CREATE TABLE EMPRESA_TRANSPORTADORA(
    ID_TRANSPORTADORA INT(3) auto_increment,
    NIT_TRANSPORTADORA NUMERIC(20) NOT NULL,
    RAZON_SOCIAL_TRANSPORTADORA VARCHAR(50) NOT NULL,
    PRIMARY KEY(ID_TRANSPORTADORA)
);

CREATE TABLE DETALLE_PRODUCTO(
    ID_DETALLE_PRODUCTO INT(3) auto_increment,
    FECHA_VENCIMIENTO DATE,
    TALLA_PRODUCTO VARCHAR(5),
    PESO_PRODUCTO NUMERIC (5),
    MARCA_PRODUCTO VARCHAR(30),
    COLOR_PRODUCTO VARCHAR(20),
    VALOR_PRODUCTO NUMERIC NOT NULL,
    STOCK_PRODUCTO INT(4) NOT NULL,
    RUTA_IMAGEN TEXT NOT NULL,
    ID_PRODUCTO INT,
    PRIMARY KEY (ID_DETALLE_PRODUCTO)
);

ALTER TABLE DETALLE_PRODUCTO ADD FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTOS (ID_PRODUCTO);

CREATE TABLE CARRITO_COMPRAS(
    ID_CAR_COMPRA INT auto_increment,
    ID_DETALLE_PRODUCTO INT,
    CANTIDAD_CAR_COMPRAR INT NOT NULL,
    ID_USUARIO INT,
    FECHA_INGRESO DATETIME NOT NULL,
    PRIMARY KEY(ID_CAR_COMPRA)
);

ALTER TABLE CARRITO_COMPRAS ADD FOREIGN KEY (ID_DETALLE_PRODUCTO) REFERENCES DETALLE_PRODUCTO (ID_DETALLE_PRODUCTO);
ALTER TABLE CARRITO_COMPRAS ADD FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS (ID_USUARIO);

CREATE TABLE FACTURAS(
    NUMERO_FACTURA NUMERIC(20) NOT NULL,
    FECHA_FACTURA DATETIME NOT NULL,
    ID_USUARIO INT,
    VALOR_TOTAL_FACTURA NUMERIC NOT NULL,
    ID_FORMA_PAGO INT,
    ID_ESTADO INT,
    ID_TRANSPORTADORA INT,
    ID_EMPRESA INT,
    NUMERO_GUIA_FACTURA NUMERIC (10) NOT NULL,
    PRIMARY KEY (NUMERO_FACTURA)
);

ALTER TABLE FACTURAS ADD FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS (ID_USUARIO);
ALTER TABLE FACTURAS ADD FOREIGN KEY (ID_FORMA_PAGO) REFERENCES FORMAS_PAGOS (ID_FORMA_PAGO);
ALTER TABLE FACTURAS ADD FOREIGN KEY (ID_ESTADO) REFERENCES ESTADOS (ID_ESTADO);
ALTER TABLE FACTURAS ADD FOREIGN KEY (ID_TRANSPORTADORA) REFERENCES EMPRESA_TRANSPORTADORA (ID_TRANSPORTADORA);
ALTER TABLE FACTURAS ADD FOREIGN KEY (ID_EMPRESA) REFERENCES EMPRESA_PAGINA (ID_EMPRESA);

CREATE TABLE DETALLE_FACTURA(
    ID_DETALLE_FACTURA INT auto_increment,
    NUMERO_FACTURA NUMERIC,
    ID_DETALLE_PRODUCTO INT,
    CANTIDAD INT,
    PRIMARY KEY (ID_DETALLE_FACTURA)
);

ALTER TABLE DETALLE_FACTURA ADD FOREIGN KEY (NUMERO_FACTURA) REFERENCES FACTURAS (NUMERO_FACTURA);
ALTER TABLE DETALLE_FACTURA ADD FOREIGN KEY (ID_DETALLE_PRODUCTO) REFERENCES DETALLE_PRODUCTO (ID_DETALLE_PRODUCTO);

-------------------------------------
	
INSERT INTO DEPARTAMENTOS(NOMBRE_DEPARTAMENTO) VALUES ('Santander');
INSERT INTO DEPARTAMENTOS(NOMBRE_DEPARTAMENTO) VALUES ('Meta');
INSERT INTO DEPARTAMENTOS(NOMBRE_DEPARTAMENTO) VALUES ('Antioquia');
INSERT INTO DEPARTAMENTOS(NOMBRE_DEPARTAMENTO) VALUES ('Choco');
INSERT INTO DEPARTAMENTOS(NOMBRE_DEPARTAMENTO) VALUES ('Boyaca');


---------------------------------

INSERT INTO CIUDADES(NOMBRE_CIUDAD,ID_DEPARTAMENTO) VALUES ('Bogota D.C',1);
INSERT INTO CIUDADES(NOMBRE_CIUDAD,ID_DEPARTAMENTO) VALUES ('Colón',2);
INSERT INTO CIUDADES(NOMBRE_CIUDAD,ID_DEPARTAMENTO) VALUES ('Medellin',3);
INSERT INTO CIUDADES(NOMBRE_CIUDAD,ID_DEPARTAMENTO) VALUES ('Cali',4);
INSERT INTO CIUDADES(NOMBRE_CIUDAD,ID_DEPARTAMENTO) VALUES ('Saboya',5);


-----------------------------------------------
INSERT INTO ROLES(NOMBRE_ROL) VALUES ('Administador');
INSERT INTO ROLES(NOMBRE_ROL) VALUES ('Cliente');

----------------------------------------

INSERT INTO ESTADOS_USUARIOS(ESTADO_NOMBRE) VALUES ('Activo');
INSERT INTO ESTADOS_USUARIOS(ESTADO_NOMBRE) VALUES ('Inactivo');


----------------------------------------------

INSERT INTO TIPO_DOCUMENTOS(NOMBRE_TIP_DOC) VALUES ('Cedula Ciudadania');
INSERT INTO TIPO_DOCUMENTOS(NOMBRE_TIP_DOC) VALUES ('Cedula Extranjera');
INSERT INTO TIPO_DOCUMENTOS(NOMBRE_TIP_DOC) VALUES ('Tarjeta Identidad');

--------------------------------------------------

insert into USUARIOS(NOMBRE_USUARIO,APELLIDO_USUARIO,ID_TIP_DOC,DOCUMENTO_USUARIO,USUARIO,CLAVE,DOMICILIO_USUARIO,TELEFONO_USUARIO,CELULAR_USUARIO,EMAIL_USUARIO,FECHA_REGISTRO,FECHA_NACIMIENTO,ID_CIUDAD,ID_ROL,ID_ESTADO,FECHA_MODIFICACION)values('Daniel','Alzate',1,123456789,'dalzate','40bd001563085fc35165329ea1ff5c5ecbdbbeef','calle 8sur no 24g-68',3229803,3229802455,'daniel@gmail.com','2020-09-22','2020-09-22',1,1,1,null);
