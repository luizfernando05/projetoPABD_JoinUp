<h1> 🎲 Criação do Banco de Dados </h1>

<h3> 1. Introdução </h3>

<p> Este documento apresenta o processo de concepção e criação de um banco de dados para o sistema fictício de compartilhamento de vagas de estágio denominado "JoinUp". O objetivo fundamental deste banco de dados é centralizar e disponibilizar informações atualizadas sobre diversas vagas de estágio disponíveis, facilitando a busca e aplicação por parte dos candidatos. </p>

<p> O sistema "JoinUp" visa conectar estudantes em busca de oportunidades de estágio com empresas e organizações que oferecem tais oportunidades. O banco de dados desempenha um papel crucial na eficiência e funcionalidade do sistema, permitindo o armazenamento e recuperação de informações sobre vagas, empresas, candidatos e interações entre eles. </p>

<h3> 2. Fase 1: Modelagem Entidade-Relacionamento (MER) </h3>

<h4> 2.1. Definição das entidades </h4>

<p> Na fase de modelagem ER, foram identificadas as principais entidades que comporão o banco de dados do sistema: </p>

<ul>
    <li> <b>Administrador:</b> perfil de usuário com privilégios e responsabilidades especiais relacionados à administração e gerenciamento do sistema. Neste, ele terá o papel de inserir as empresas e as oportunidades no sistema; </li>
    <li> <b>Empresa:</b> contém informações sobre as empresas que oferecem vagas de estágio, como nome, setor de atuação e localização; </li>
    <li> <b>Oportunidade:</b> representa informações específicas sobre cada vaga, incluindo título, descrição, requisitos, localização e datas de aplicação. </li>
</ul>

<h4> 2.2. Definição de relacionamentos </h4>

<p> A seguir, foram estabelecidos os relacionamentos entre as entidades: </p>

<ul>
    <li> Cada <b>administrador cadastra</b> várias <b>empresas</b> ou várias <b>oportunidades</b>; </li>
    <li> Uma ou várias <b>oportunidades são oferecidas</b> por uma ou várias <b>empresas</b>. </li>
</ul>

<h4> 2.3. Diagrama ER </h4>

<p> O diagrama Entidade-Relacionamento resultante do projeto é apresentado na imagem a seguir: </p>

<img src="./img/ProjetoBD - Modelo Entidade-Relacionamento.jpg">

<h3> 3. Fase 2: Modelagem Relacional (MR) </h3>

<p> Com a estrutura ER definida, foi procedida à tradução do modelo em um modelo relacional, em que cada entidade é mapeada para uma tabela, e os relacionamentos são representados por chaves estrangeiras. </p>

<h4> 3.1. Definição das tabelas: </h4>

<ul>
    <li> <b>administrador:</b> (usuarioAdm, nomeAdm, senhaAdm); </li>
    <li> <b>empresa:</b> (cnpjEmpresa, nomeEmpresa, setorEmpresa, emailEmpresa, telefoneEmpresa); </li>
    <li> <b>oportunidade:</b> (idOportunidade, nomeOportunidade, CEP, estado, cidade, dataInicio, dataFim, linkInscricao); </li>
    <li> <b>tipoOportunidade:</b> (tipo); </li>
    <li> <b>requisitoOportunidade:</b> (requisito); </li>
</ul>

<h4> 3.2. Chaves primárias e chaves estrangeiras: </h4>

<ol>
    <li> Chave primária: campos 'cnpjEmpresa', 'usuarioAdm' e 'idOportunidade' em negrito; </li>
    <li> Chave estrangeira: campos 'usuarioAdm', 'idOportunidade' e 'cnpjEmpresa' em itálico. </li>
</ol>

<ul>
    <li> administrador: (<b>(PK) usuarioAdm</b>, nomeAdm, senhaAdm); </li>
    <li> empresa: (<b>(PK) cnpjEmpresa</b>, nomeEmpresa, setorEmpresa, emailEmpresa, telefoneEmpresa <i>(FK) usuarioAdm</i>); </li>
    <li> oportunidade: (<b>(PK) idOportunidade</b>, nomeOportunidade, CEP, estado, cidade, dataInicio, dataFim, linkInscricao <i>(FK) usuarioAdm</i>); </li>
    <li> oporEmpre: (<i>(FK) usuarioAdm</i> <i>(FK) idOportunidade</i>); </li>
    <li> tipoOportunidade: (tipo <i>idOportunidade</i>); </li>
    <li> requisitoOportunidade: (requisito <i>(FK) idOportunidade</i>). </li>
</ul>

<h4> 3.3. Diagrama Relacional </h4>

<p> O diagrama Relacional resultante do projeto é apresentado na imagem a seguir: </p>

<img src="./img/ProjetoBD - Modelo Relacional.jpg">

<h3> 3. Fase 3: Implementação do Banco de Dados </h3>

<p>Com o modelo relacional definido, agora é possível implementar o banco de dados usando o PostgreSQL. Abaixo, um exemplo simplificado dos script SQL das criações das tabelas:</p>

```
-- Esta instrução cria um novo banco de dados chamado "joinup".
create database joinup;

-- Essa instrução cria um schema chamado "sistema" dentro do banco de dados "joinup".
create schema sistema;

-- Aqui, é criada a tabela "administrador" com colunas para o nome de usuário, nome e senha do administrador. A coluna "usuarioAdm" é definida como chave primária.
create table sistema.administrador (
	usuarioAdm varchar(50) primary key,
	nomeAdm varchar(300),
	senhaAdm varchar(20)
);

-- Aqui, é criada a tabela "empresa" com informações sobre empresas, incluindo CNPJ, nome, setor, e-mail, telefone e o usuário administrador responsável. A coluna "cnpjEmpresa" é definida como chave primária, e há uma chave estrangeira referenciando a tabela "administrador".
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


-- Essa tabela "oportunidade" contém informações sobre as oportunidades de estágio, como nome, localização, datas e links para inscrição. A coluna "idOportunidade" é uma chave primária, e há uma chave estrangeira referenciando a tabela "administrador".
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

-- A tabela "oporEmp" é usada para relacionar empresas a oportunidades de estágio. Ela possui chaves estrangeiras que fazem referência às tabelas "empresa" e "oportunidade".
create table sistema.oporEmp (
	cnpjEmpresa varchar(20),
	idOportunidade serial,
	foreign key(cnpjEmpresa) references sistema.empresa(cnpjEmpresa),
	foreign key(idOportunidade) references sistema.oportunidade(idOportunidade)
);

-- Essa tabela "tipoOportunidade" é usada para definir tipos específicos de oportunidades relacionados a uma oportunidade principal. Ela possui uma chave estrangeira que faz referência à tabela "oportunidade".
create table sistema.tipoOportunidade (
	tipo varchar(100),
	idOportunidade serial,
	foreign key(idOportunidade) references sistema.oportunidade(idOportunidade)
);

-- A tabela "requisitoOportunidade" é usada para listar os requisitos específicos associados a uma oportunidade. Ela possui uma chave estrangeira que faz referência à tabela "oportunidade".
create table sistema.requisitoOportunidade (
	requisito varchar(100),
	idOportunidade serial,
	foreign key(idOportunidade) references sistema.oportunidade(idOportunidade)
);

-- Essa instrução adiciona uma coluna booleana chamada 'admin' à tabela "administrador" com um valor padrão de TRUE.
alter table sistema.administrador
add column admin boolean default true;

-- Esta instrução adiciona uma nova coluna chamada 'telefoneEmpresaNovo' à tabela "empresa" com um tipo de dados VARCHAR(20).
alter table sistema.empresa
add COLUMN telefoneEmpresaNovo varchar(20);

-- Essa instrução copia os dados da coluna 'telefoneEmpresa' para a nova coluna 'telefoneEmpresaNovo', convertendo o tipo de dados para VARCHAR(20).
update sistema.empresa
set telefoneEmpresaNovo = CAST(telefoneEmpresa AS varchar(20));

-- Esta instrução remove a coluna 'telefoneEmpresa' da tabela "empresa".
alter table sistema.empresa
drop COLUMN telefoneEmpresa;

-- Esta instrução renomeia a coluna 'telefoneEmpresaNovo' para 'telefoneEmpresa' na tabela "empresa".
alter table sistema.empresa
RENAME COLUMN telefoneEmpresaNovo TO telefoneEmpresa;
```

<div id='rodape'>

------
<h4> Projeto da Disciplina Fundamentos de Banco de Dados </h4>
<p> Universidade Federal Rural do Semi-Árido (UFERSA), Angicos-RN - Bacharelado em Sistemas de Informação</p>
<p> © Luiz Fernando, 2023 </p>
<img src="../joinup/view/images/logoLuizFernandov2.svg">

</div>  
