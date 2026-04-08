DROP DATABASE IF EXISTS triaje_app;
CREATE DATABASE triaje_app;
USE triaje_app;

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
    
    categoria ENUM('Rojo','Naranja','Amarillo','Verde','Azul'),
    flujo ENUM('RCP','Nivel I','Nivel II','Traumatologia','Obstetrica','Pediatria','Psiquiatria'),
    
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id));


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