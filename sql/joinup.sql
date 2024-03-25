-- Scripts para criação do banco de dados e do schema:

create database joinup;

create schema sistema;

-- Script para a criação das tabelas do banco de dados:

create table sistema.administrador (
	usuarioAdm varchar(50) primary key,
	nomeAdm varchar(300),
	senhaAdm varchar(20)
);

create table sistema.empresa (
	cnpjEmpresa varchar(20),
	nomeEmpresa varchar(50),
	setorEmpresa varchar(30),
	emailEmpresa varchar(200),
	telefoneEmpresa int,
	usuarioAdm varchar(50),
	primary key(cnpjEmpresa),
	foreign key(usuarioAdm) references sistema.administrador(usuarioAdm)
);

create table sistema.oportunidade (
	idOportunidade serial,
	nomeOportunidade varchar(500),
	cep varchar(10),
	estado varchar(100),
	cidade varchar(100),
	dataInicio date,
	dataFim date,
	linkIns varchar(1000),
	usuarioAdm varchar(50),
	primary key(idOportunidade),
	foreign key(usuarioAdm) references sistema.administrador(usuarioAdm)
);

create table sistema.oporEmp (
	cnpjEmpresa varchar(20),
	idOportunidade serial,
	foreign key(cnpjEmpresa) references sistema.empresa(cnpjEmpresa),
	foreign key(idOportunidade) references sistema.oportunidade(idOportunidade)
);

create table sistema.tipoOportunidade (
	tipo varchar(100),
	idOportunidade serial,
	foreign key(idOportunidade) references sistema.oportunidade(idOportunidade)
);

create table sistema.requisitoOportunidade (
	requisito varchar(100),
	idOportunidade serial,
	foreign key(idOportunidade) references sistema.oportunidade(idOportunidade)
);

-- script com as alterções que formas necessárias nas tabelas ao longo do projeto:

alter table sistema.administrador
add column admin boolean default true;

alter table sistema.empresa
add COLUMN telefoneEmpresaNovo varchar(20);

update sistema.empresa
set telefoneEmpresaNovo = CAST(telefoneEmpresa AS varchar(20));

alter table sistema.empresa
drop COLUMN telefoneEmpresa;

alter table sistema.empresa
RENAME COLUMN telefoneEmpresaNovo TO telefoneEmpresa;

-- script com as cunsultas sql para visualizar os dados das tabelas que estão presentes no banco de dados

select * from sistema.empresa;

select * from sistema.oportunidade;

select * from sistema.administrador;

select * from sistema.requisitoOportunidade;

select * from sistema.tipoOportunidade;

select * from sistema.oporEmp

-- script com os comandos para deletar os dados presentes nas tabelas do banco de dados 

delete from sistema.oporEmp;

delete from sistema.tipoOportunidade;

delete from sistema.requisitoOportunidade;

delete from sistema.oportunidade;

delete from sistema.empresa;

delete from sistema.administrador;

-- script com o insert para inserir dados na tabela de administrador, após essa inserção logar na página de loginAdm.php com alguma dessas credenciais

insert into sistema.administrador (usuarioAdm, nomeAdm, senhaAdm)
values
  ('usuario1', 'Administrador 1', 'senha1'),
  ('usuario2', 'Administrador 2', 'senha2'),
  ('usuario3', 'Administrador 3', 'senha3');
