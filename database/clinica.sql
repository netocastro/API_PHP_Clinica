DROP DATABASE IF EXISTS clinica;
CREATE DATABASE clinica;

DROP table IF EXISTS pacientes;
CREATE TABLE `pacientes`(
      `id` INTEGER AUTO_INCREMENT ,
      `nome` VARCHAR(50) NOT NULL,
      `cpf` CHARACTER(11) UNIQUE NOT NULL,
      `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

      primary key(id)
)ENGINE=InnoDB default charset=utf8;

 insert into `pacientes` (nome, cpf)VALUES
 ("Amanda de Barros", "00000000001"),("Alvaro de Goes Monteiro","00000000002"),
 ("Luiza Amaral", "00000000003"),("Paulo Henrique Santos","00000000004");

DROP table IF EXISTS medicos;
CREATE TABLE `medicos`(
      `id` INTEGER AUTO_INCREMENT,
      `nome` VARCHAR(50) NOT NULL,
      `crm` CHARACTER(50) UNIQUE NOT NULL,
      `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

      primary key(id)
)ENGINE=InnoDB default charset=utf8;

insert into `medicos` (nome , crm)VALUES
 ("Joao da Silva", "2568AL21"),("Maria Santana das Neves","2587BR78"),
 ("Maria de Lurdes", "1258AL11"),("Francisnei dos Santos","9856RN25"),
 ('Jeyce Lima', '6125PE25');

DROP table IF EXISTS categorias;
CREATE TABLE `categorias`(
      `id` INTEGER AUTO_INCREMENT,
      `nome` VARCHAR(100) NOT NULL,

      primary key(id)
)ENGINE=InnoDB default charset=utf8;

 insert into `categorias` (nome)VALUES
 ("clinico geral"),("Cardiologista"),
 ( "dermatologista"),("Otorrinolaringologista");


DROP table IF EXISTS especialidades;
CREATE TABLE `especialidades`(
      `id` INTEGER AUTO_INCREMENT,
      `categoria_id` INTEGER NOT NULL,
      `medico_id` INTEGER NOT NULL,
      `nome` VARCHAR(50),

      primary key(id)
)ENGINE=InnoDB default charset=utf8;

ALTER TABLE especialidades ADD FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE especialidades ADD FOREIGN KEY (medico_id) REFERENCES medicos(id) ON DELETE CASCADE ON UPDATE CASCADE;

 insert into `especialidades` (nome, categoria_id , medico_id)VALUES
 ("Joao da Silva", 1, 1),("Maria Santana das Neves",2,2),
 ("Maria de Lurdes", 3,3),("Francisnei dos Santos",4,4);

DROP table IF EXISTS procedimentos;
CREATE TABLE `procedimentos`(
      `id` INTEGER AUTO_INCREMENT,
      `categoria_id` INTEGER NOT NULL,
      `nome` VARCHAR(50),
      `valor` DECIMAL(8,2) NOT NULL,
      `porcentagemMedico` integer NOT NULL,

      primary key(id)
)ENGINE=InnoDB default charset=utf8;

ALTER TABLE procedimentos ADD FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE ON UPDATE CASCADE;

insert into  `procedimentos` (categoria_id, nome, valor, PorcentagemMedico) values
('1','massagem','20.00','20'),
('1','Ventosa','30.00','25'),
('2','Angioplastia','200.00','30'),
('2','Valvoplastia','180.00','20'),
('3','Actinoterapia','120.00','20'),
('3','Depilação a laser','310.00','25'),
('4','Traqueostomia','310.00','20'),
('4','Adenoidectomia','280.00','20');


DROP table IF EXISTS agenda;
CREATE TABLE `agenda`( 
      `id` INTEGER AUTO_INCREMENT ,
      `paciente_id` integer NULL,
      `procedimento_id` integer UNIQUE NOT NULL,
      `valor` DECIMAL(8,2) NOT NULL,
      
      primary key(id)
)ENGINE=InnoDB default charset=utf8;

ALTER TABLE `agenda` ADD FOREIGN KEY (procedimento_id) REFERENCES procedimentos(id);
