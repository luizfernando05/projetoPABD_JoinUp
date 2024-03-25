<h1> 🎲 Manipulação dos Dados </h1>

<h3> 1. Introdução </h3>

<p> Este documento serve como uma documentação das manipulações realizadas no banco de dados do sistema "JoinUp". Todas as ações, consultas e modificações feitas no banco de dados são registradas aqui para fins de acompanhamento e documentação. </p>

<h3> 2. Inserindo valores no banco de dados: </h3>

<h4> 2.1. Inserindo valores na tabela de administrador: </h4>

<p> Para adicionar administradores ao sistema, é necessário realizar uma inserção no banco de dados utilizando o PostgreSQL. Abaixo, é apresentado o script SQL para realizar essa operação: </p>

```
-- Inserção de Administradores no Sistema

-- Descrição:
-- Este script insere registros na tabela "administrador" do banco de dados "sistema",
-- adicionando novos administradores ao sistema "JoinUp".

-- SQL:
insert into sistema.administrador (usuarioAdm, nomeAdm, senhaAdm)
values
  ('usuario1', 'Administrador 1', 'senha1'),
  ('usuario2', 'Administrador 2', 'senha2'),
  ('usuario3', 'Administrador 3', 'senha3');
```

<p> Este script SQL é utilizado para inserir registros na tabela "administrador" do banco de dados "joinup". Cada inserção cria um novo administrador com um nome de usuário exclusivo, nome e senha associados. No exemplo acima, foram inseridos três administradores com diferentes credenciais. </p>

<p> Este procedimento é essencial para estabelecer contas de administrador no sistema, permitindo o acesso aos privilégios administrativos necessários para gerenciar e supervisionar as operações do sistema "JoinUp". </p>

<h4> 2.2. Inserindo valores na tabela de empresa: </h4>

Para inserir empresas no sistema, é necessário preencher o formulário disponível na página de [cadastro de empresa](../joinup/view/cadastroEmpresa.php), após isso esses dados passam para a página de [processamento](../joinup/controller/processaCadEmp.php) para que possam, assim, serem inserido na tabela "sistema.empresa". O script SQL da inserção dos dados está disponível abaixo:

```
-- Inserção de Empresas no Sistema

-- Descrição:
-- Este script insere registros na tabela "empresa" do banco de dados "sistema",
-- adicionando novas empresas ao sistema "JoinUp".

-- SQL:
insert into sistema.empresa (cnpjEmpresa, nomeEmpresa, setorEmpresa, emailEmpresa, telefoneEmpresa) 
values (:cnpj, :nome, :setor, :email, :telefone)
```
<p> Assim, o sistema reproduz o seguinte fluxo: </p>
<ol>
    <li> formulário de cadastro de empresa: para adicionar empresas ao sistema, é necessário acessar a página de cadastro de empresa e preencher os campos solicitados, como CNPJ, nome, setor de atuação, e informações de contato; </li>
    <li> processamento dos Dados: após o preenchimento do formulário, os dados são encaminhados para a página de processamento, onde ocorre o registro na tabela "empresa" do banco de dados "sistema". Os valores fornecidos nos campos do formulário são mapeados para os parâmetros :cnpj, :nome, :setor, :email e :telefone no script SQL; </li>
    <li> script SQL de Inserção: o script SQL de inserção é responsável por adicionar uma nova empresa ao sistema. Ele insere os dados fornecidos no formulário nas colunas correspondentes da tabela "empresa". Isso cria um novo registro na tabela, representando a empresa cadastrada no sistema. </li>
</ol>

<h4> 2.3. Inserindo valores nas tabelas de oportunidade, tipoOportunidade e requisitoOportunidade: </h4>

Para inserir oportunidades no sistema, é necessário preencher o formulário disponível na página de [cadastro de oportunidade](../joinup/view/cadastroOportunidade.php), após isso esses dados passam para a página de [processamento](../joinup/controller/processaCadOpo.php) para que possam, assim, serem inserido nas tabelas "sistema.empresa", "sistema.tipoOportunidade" e "sistema.requisitoOportunidade". O script SQL da inserção dos dados está disponível abaixo:

```
-- Inserção de Oportunidades no Sistema

-- Descrição:
-- Este script insere registros na tabela "oportunidade" do banco de dados "sistema",
-- adicionando novas oportunidades ao sistema "JoinUp".

-- SQL:

-- Inserção na tabela "sistema.oportunidade"
insert into sistema.oportunidade (nomeOportunidade, cep, estado, cidade, dataInicio, dataFim, linkIns, usuarioAdm)
values (:nomeOportunidade, :cep, :estado, :cidade, :dataInicio, :dataFim, :linkIns, :usuarioAdm);

-- Inserção na tabela "sistema.oporEmp" para associar oportunidade com empresa
insert into sistema.oporEmp (cnpjEmpresa, idOportunidade)
values (:cnpjEmpresa, :idOportunidade);

-- Inserção na tabela "sistema.tipoOportunidade" para definir o tipo da oportunidade
insert into sistema.tipoOportunidade (tipo, idOportunidade) 
values (:tipo, :idOportunidade);

-- Inserção na tabela "sistema.requisitoOportunidade" para adicionar requisitos da oportunidade
insert into sistema.requisitoOportunidade (requisito, idOportunidade) 
values (:requisito, :idOportunidade);
```

<p> Assim, o sistema reproduz o seguinte fluxo: </p>
<ol>
    <li> formulário de cadastro de oportunidade: para adicionar oportunidades ao sistema, é necessário acessar a página de cadastro de oportunidade e preencher os campos solicitados, como nome da oportunidade, localização, datas e requisitos; </li>
    <li> processamento dos dados: Após o preenchimento do formulário, os dados são encaminhados para a página de processamento, onde ocorre o registro nas tabelas relevantes do banco de dados "sistema". Isso inclui a tabela "oportunidade" para a oportunidade em si, a tabela "oporEmp" para associar a oportunidade a uma empresa, a tabela "tipoOportunidade" para definir o tipo da oportunidade e a tabela "requisitoOportunidade" para adicionar requisitos específicos; </li>
    <li> script SQL de Inserção: O script SQL de inserção é responsável por adicionar uma nova oportunidade ao sistema, bem como realizar as associações e registros necessários nas tabelas relacionadas. Os valores fornecidos nos campos do formulário são mapeados para os parâmetros correspondentes no script SQL.</li>
</ol>

<h4> 2.4. Consulta dos dados para a exibição desses: </h4>

A consulta SQL a seguir exibe os dados que serão exibidos na página [index](../joinup/view/index.php) do sistema "JoinUp". Esta consulta recupera informações sobre oportunidades de estágio, incluindo o nome da oportunidade, nome da empresa, tipo de oportunidade, cidade, estado, datas, setor da empresa, informações de contato, link de inscrição e requisitos (agrupados em uma única string).

```
select o.nomeoportunidade, e.nomeempresa, t.tipo, o.cidade, o.estado, o.datainicio, o.datafim, e.setorempresa, e.emailempresa, e.telefoneempresa, o.linkins, string_agg(r.requisito, ', ') AS requisitos
            from sistema.oporemp AS oe
            inner join sistema.oportunidade AS o ON oe.idoportunidade = o.idoportunidade
            inner join sistema.empresa AS e ON oe.cnpjempresa = e.cnpjempresa
            inner join sistema.tipooportunidade AS t ON o.idoportunidade = t.idoportunidade
            left join sistema.requisitooportunidade AS r ON o.idoportunidade = r.idoportunidade
            group by o.nomeoportunidade, e.nomeempresa, t.tipo, o.cidade, o.estado, o.datainicio, o.datafim, e.setorempresa, e.emailempresa, e.telefoneempresa, o.linkins;
```

<p> Esta consulta SQL realiza a seguinte operação: </p>
<ol>
    <li> seleção de colunas: A consulta seleciona as seguintes colunas para exibição na página index:
        <ol type="a">
            <li>o.nomeoportunidade: Nome da oportunidade de estágio.</li>
            <li>e.nomeempresa: Nome da empresa.</li>
            <li>t.tipo: Tipo da oportunidade.</li>
            <li>o.cidade e o.estado: Cidade e estado da oportunidade.</li>
            <li>o.datainicio e o.datafim: Data de início e data de término da oportunidade.</li>
            <li>e.setorempresa: Setor de atuação da empresa.</li>
            <li>e.emailempresa e e.telefoneempresa: Informações de contato da empresa.</li>
            <li>o.linkins: Link de inscrição na oportunidade.</li>
            <li>STRING_AGG(r.requisito, ', ') AS requisitos: Requisitos da oportunidade agrupados em uma única string, separados por vírgulas.</li>
        </ol>
    </li> </br>
    <li> tabelas e junções: A consulta faz uso de várias junções (INNER JOIN e LEFT JOIN) para unir as tabelas relevantes do banco de dados:
        <ol type="a">
            <li>sistema.oporemp é unida com sistema.oportunidade usando a chave idoportunidade.</li>
            <li>sistema.oportunidade é unida com sistema.empresa usando a chave cnpjempresa.</li>
            <li>sistema.oportunidade é unida com sistema.tipooportunidade usando a chave idoportunidade.</li>
            <li>sistema.oportunidade é unida com sistema.requisitooportunidade (LEFT JOIN) usando a chave idoportunidade para recuperar os requisitos da oportunidade. A junção é feita com LEFT JOIN para incluir oportunidades que podem não ter requisitos. </li>
        </ol>
    </li> </br>
    <li> agrupamento de resultados: Os resultados são agrupados com base nas colunas selecionadas, garantindo que cada linha represente uma oportunidade única. Isso evita a duplicação de oportunidades no resultado.</li>
</ol>

<div id='rodape'>

------
<h4> Projeto da Disciplina Fundamentos de Banco de Dados </h4>
<p> Universidade Federal Rural do Semi-Árido (UFERSA), Angicos-RN - Bacharelado em Sistemas de Informação</p>
<p> © Luiz Fernando, 2023 </p>
<img src="../joinup/view/images/logoLuizFernandov2.svg">

</div>  