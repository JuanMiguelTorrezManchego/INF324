CREATE TABLE FlujoProceso(
    FlujoP varchar(3),
    Proceso varchar(3),
    ProcesoSiguiente varchar(3),
    Tipo varchar(3),
    Pantalla varchar(100),
    Rol varchar(3)
);

CREATE TABLE FlujoProcesoCondicional(
    FlujoP varchar(3),
    Proceso varchar(3),
    ProcesoSi varchar(3),
    ProcesoNo varchar(3)
);

CREATE TABLE FlujoProcesoSeguimiento(
    FlujoP varchar(3),
    Proceso varchar(3),
    NroTramite int(100),
    idUsuario int(7),
    rol varchar(3),
    FechaInicio date,
    FechaFin date
);

INSERT INTO FlujoProceso VALUES('F1','P1','P2','I','inicio','O');
INSERT INTO FlujoProceso VALUES('F1','P2','P3','P','fechaInscripcion','O');
INSERT INTO FlujoProceso VALUES('F1','P3','P4','P','inscripcion','O');
INSERT INTO FlujoProceso VALUES('F1','P4','P5','P','inscripcionUsuario','U');
INSERT INTO FlujoProceso VALUES('F1','P5','P6','P','documentos','U');
INSERT INTO FlujoProceso VALUES('F1','P6',null,'C','docAldia','O');
INSERT INTO FlujoProceso VALUES('F1','P7',null,'N','negacionDoc','O');
INSERT INTO FlujoProceso VALUES('F1','P8','P9','P','habilitar','O');
INSERT INTO FlujoProceso VALUES('F1','P9','P10','P','materiaSeleccion','U');
INSERT INTO FlujoProceso VALUES('F1','P10','P11','P','inscripcionExitosa','O');
INSERT INTO FlujoProceso VALUES('F1','P11',null,'F','bienvenidaClases','U');

INSERT INTO FlujoProcesoCondicional VALUES('F1','P6','P8','P7');
