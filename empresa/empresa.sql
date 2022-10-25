DROP TABLE IF EXISTS departamentos CASCADE;

CREATE TABLE departamentos (
    id           bigserial    PRIMARY KEY,
    codigo       numeric(2)   NOT NULL UNIQUE,
    denominacion varchar(255) NOT NULL
);

DROP TABLE IF EXISTS empleados CASCADE;

CREATE TABLE empleados (
    id  bigserial PRIMARY KEY,
    numero numeric(4) NOT NULL UNIQUE,
    nombre varchar(255) NOT NULL,
    salario numeric(7,2) NOT NULL,
    fecha_nac timestamp NOT NULL,
    departamento_id bigint NOT NULL REFERENCES departamentos(id),
);

-- Fixtures:

INSERT INTO departamentos (codigo, denominacion)
    VALUES (10, 'Informática'),
           (20, 'Administrativo'),
           (30, 'Prevención'),
           (40, 'Laboratorio'),
           (50, 'Automoción');
