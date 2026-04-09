DROP DATABASE IF EXISTS triaje_app;
CREATE DATABASE triaje_app;
USE triaje_app;

-- TABLA USUARIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    clave VARCHAR(255) NOT NULL,
    nombre VARCHAR(100),
    rol ENUM('alumno','profesor') NOT NULL,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- TABLA PACIENTES
CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nhc VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    edad INT,
    telefono VARCHAR(20),
    alergias TEXT,
    motivo_consulta TEXT,
    fecha_llegada DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- TABLA TRIAJE
CREATE TABLE triajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    
    hora_triaje DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    tension_sistolica INT,
    tension_diastolica INT,
    frecuencia_cardiaca INT,
    frecuencia_respiratoria INT,
    temperatura DECIMAL(4,1),
    saturacion_oxigeno INT,
    
    glasgow INT,
    eva INT,
    glucemia INT,
    
    vomitos BOOLEAN,
    deposiciones BOOLEAN,
    diuresis BOOLEAN,
    
    peso DECIMAL(5,2),
    talla DECIMAL(5,2),

    usuario_id INT, -- Nos va a ayudar a saber quién hizo el triaje, para que la profesora pueda evaluar el trabajo de cada alumno
    
    categoria ENUM('Rojo','Naranja','Amarillo','Verde','Azul'),
    flujo ENUM('RCP','Nivel I','Nivel II','Traumatologia','Obstetrica','Pediatria','Psiquiatria'),
    
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id));


-- TABLA ATENCION
CREATE TABLE atenciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    
    anamnesis TEXT,
    diagnostico_principal TEXT,
    diagnosticos_secundarios TEXT,
    tratamiento TEXT,
    plan_seguimiento TEXT,
    
    fecha_atencion DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id));


-- TABLA EXAMENES
CREATE TABLE examenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    
    hemograma BOOLEAN,
    bioquimica BOOLEAN,
    gasometria BOOLEAN,
    radiografia BOOLEAN,
    analisis_orina BOOLEAN,
    coagulación BOOLEAN,
    pcr BOOLEAN,
    
    otros TEXT,
    
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id));