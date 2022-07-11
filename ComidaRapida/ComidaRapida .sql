CREATE DATABASE ComidaRapida;


USE ComidaRapida;


CREATE TABLE Roles(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  role VARCHAR(20) NOT NULL
);



CREATE TABLE Usuario(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  usuario VARCHAR(20) NOT NULL,
  pwd VARCHAR(20) NOT NULL,
  fechaAlta DATETIME NOT NULL,
  roleId INT NOT NULL,
  CONSTRAINT fk_usuario_role FOREIGN KEY (roleId) REFERENCES Roles(id)
);


CREATE TABLE Pedido(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombrePlatillo VARCHAR(50) NOT NULL,
  costo FLOAT NOT NULL,
  cantidad INT NOT NULL,
  estatus VARCHAR(20) NOT NULL DEFAULT 'Recibido',
  cliente VARCHAR(255),
  direccion VARCHAR(255),
  tipoPago VARCHAR(50),
  vendedor INTEGER NOT NULL,
  repartidor INTEGER,
  fechaAlta DATETIME NOT NULL,
  fechaFinalizado DATETIME,
  CONSTRAINT fk_vendedor_usuario FOREIGN KEY (vendedor) REFERENCES Usuario(id),
  CONSTRAINT fk_repartidor_usuario FOREIGN KEY (repartidor) REFERENCES Usuario(id)
);

INSERT INTO Roles (role) VALUES ('Administrador');
INSERT INTO Roles (role) VALUES ('Vendedor');
INSERT INTO Roles (role) VALUES ('Repartidor');


INSERT INTO Usuario  VALUES (0,'Juan Jose Mendez', 'admin','12345',now(), 1);
INSERT INTO Usuario  VALUES (0,'Marko Antonio', 'vendedor','12345',now(), 2);
INSERT INTO Usuario  VALUES (0,'Luis Angel', 'repartidor','12345',now(), 3);

