CREATE TABLE Usuario(
    id int(7),
    usuario VARCHAR(50),
    password VARCHAR(50),
    nombre varchar(20),
    apellido varchar(100),
    idrol varchar(2)
);

CREATE TABLE Rol(
    idrol VARCHAR(2),
    descripcion VARCHAR(20)
);

CREATE TABLE Documentos(
    id int(7),
    ci int(10),
    cnacimiento int(1),
    fechanacimeinto date,
    Pago varchar(3)
);
CREATE TABLE Materias(
    id int(7),
    materia VARCHAR(50)
);

-- datos rol
INSERT INTO Rol VALUES('O','Oficina');
INSERT INTO Rol VALUES('U','Usuario');