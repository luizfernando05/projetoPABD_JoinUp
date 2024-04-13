<h1>
    <img align="center" width="40px" src="./joinup/view/images/logoIncon.svg">
    <span>JoinUp - Projeto PABD - UFERSA/2023.2</span>
</h1>

<h3>Informações iniciais:</h3>

<p>O repositório remoto a seguir corresponde ao projeto da disciplina "Projeto e Administração de Banco de Dados" do curso de Bacharelado em Sistemas de Informação, situado na Universidade Federal Rural do Semi-Árido (UFERSA), campus Angicos. Este projeto foi desenvolvido pelos estudantes: Luiz Fernando da Cunha Silva, Letícia Maria Bandeira de Lucena e Andersson Lucas Mendonça Fernandes, sob a orientação da Professora Dra. Samara Martins Nascimento Gonçalves.</p>

<p>O foco deste projeto foi a construção de um sistema de integração com um banco de dados MongoDB. A partir dessa premissa, surgiu o "JoinUp," um site dedicado à divulgação de oportunidades de estágio. Para o desenvolvimento desse sistema, foram utilizadas as linguagens HTML e CSS para criar a interface de usuário, enquanto o PHP desempenhou um papel fundamental na integração e manipulação dos dados no banco de dados.</p>

<h3> Índice: </h3>

1. [Pré-instalação](#pre-instalacao)
2. [Instalação](#instalacao)
3. [Licença](./LICENSE.md)
4. [Organização do Repositório](#organizacao)
5. [Introdução ao Projeto](#introducao)

<div id='pre-instalacao'>

<h3> ⚙️ Pré-instalação </h3>

Antes de realizar a execução desse sistema em sua máquina local, você precisará atender a vários pré-requisitos, incluindo linguagem de programação, servidor web, banco de dados, extensões PHP e configurações específicas. Aqui estão os principais pré-requisitos:

1. <b>Servidor Web (Apache, Nginx, etc.):</b> é necessário um servidor web instalado na sua máquina local, ou alguma extensão em sua IDE que atenda esse requisito. O Apache e o Nginx são escolhas populares. Isso permite que você execute o código PHP e sirva páginas da web.
2. <b>Banco de Dados MongoDB:</b> o código da aplicação está configurado para funcionar com um banco de dados MongoDB. Portanto, é importante ter o MongoDB instalado e configurado na sua máquina local.
3. <b>PHP:</b> Certifique-se de ter o PHP instalado na sua máquina. Você pode verificar a versão do PHP digitando php -v no terminal.
4. <b>Driver PHP do MongoDB:</b> para se conectar ao banco de dados PostgreSQL, você precisa ter a extensão do driver do MongoDB habilitada no PHP. Verifique se essa extensão está habilitada no seu arquivo de configuração php.ini.
5. <b>Ambiente de Desenvolvimento:</b> Um ambiente de desenvolvimento integrado (IDE) ou editor de texto para escrever e editar seu código, como Visual Studio Code, PHPStorm ou qualquer editor de sua escolha.

</div>

<div id='instalacao'>  

<h3> 🔧 Instalação </h3>

Para visualizar esta aplicação na sua máquina local, siga os seguintes passos:

1. <b>Clone o Repositório:</b> Clone este repositório em sua máquina local usando o seguinte comando no terminal:

```
   git clone https://github.com/luizfernando05/projetoPABD_JoinUp
```

2. <b>Adicione adminitradores no banco de dados:</b> Acesse seu sistema MongoDB e insira um script para adicionar administradores no sistemao. Você pode fazer isso copiando e colando o conteúdo do arquivo [joinup.sql](./db/joinup.sql) fornecido neste repositório.

3. <b>Configure o Arquivo config.php:</b> Abra o arquivo [config.php](./joinup/model/config.php) e insira suas informações de conexão ao banco de dados, incluindo host, porta, nome do banco de dados, nome de usuário e senha.

4. <b>Execute o Arquivo loginAdm.php:</b> Execute o arquivo [loginAdm.php](./joinup/view/loginAdm.php) utilizando um servidor PHP. Se você estiver usando o Visual Studio Code, pode experimentar a [extensão](https://marketplace.visualstudio.com/items?itemName=brapifra.phpserver) de servidor PHP disponível.

5. <b>Faça o Login como Administrador:</b> Use as informações de login que você cadastrou anteriormente no banco de dados para acessar a página de administração da aplicação.

6. <b>Cadastre Dados Genéricos:</b> Complete o cadastro de informações genéricas, começando pelo cadastro de empresas e, em seguida, pelas oportunidades disponíveis, seguindo essa ordem (é possível cadastrar pelo PostgreSQL, ou pelas páginas de cadastro do site).

7. <b>Visualize o Site:</b> Por fim, vá até o arquivo [index.php](./joinup/view/index.php) e você poderá visualizar o funcionamento do site.

Com essas etapas, você estará pronto para explorar a aplicação localmente em sua máquina.

</div>  

<div id='organizacao'>

<h3> 🗂️ Organização do Repositório </h3>

O seguinte repositório utiliza o padrão de arquitetura MVC (Model-View-Controller), sendo essa uma abordagem comum para organizar o código em aplicações de software. Ele ajuda a separar a lógica de negócios, a apresentação e a manipulação de dados, facilitando a manutenção e escalabilidade do código. Os códigos seguem a seguinte lógica de organização:
1. Model: representa a lógica de negócios da aplicação, lidando com a manipulação de dados, regras de negócios e interações com o banco de dados, se aplicável. Nele, são organizadas as classes e módulos relacionados à lógica de negócios.
2. View: representa a camada de visualização e lida com a apresentação de dados aos usuários. Ela não deve conter lógica de negócios, apenas a exibição dos dados, sendo assim, organiza as classes e módulos relacionados à interface do usuário.
3. Controller: atuam como intermediários entre a camada de modelo e a camada de visualização. Eles recebem as solicitações do usuário, interagem com o modelo para obter ou modificar dados e, em seguida, passam os dados processados para a camada de visualização. Nessa camada, são organizadas as classes e módulos relacionados ao controle de fluxo e interações entre modelo e visualização.

<h4>Sumário simplificado desse repositório: </h4>

- joinup/
    - controller/
        - [atoLoginAdm.php](./joinup/controller/atoLoginAdm.php)
        - [processaCadOpo.php](./joinup/controller/processaCadOpo.php)
        - [processaEdiOpo.php](./joinup/controller/processaEdiOpo.php)
        - [processaExcOpo.php](./joinup/controller/processaExcOpo.php)
    - model/
        - [config.php](./joinup/model/config.php)
    - view/
        - [css/](./joinup/view/css)
        - [cadastroOportunidade.php](./joinup/view/cadastroOportunidade.php)
        - [cadastroSucesso.php](./joinup/view/cadastroSucesso.php)
        - [edicaoOportunidade.php](./joinup/view/edicaoOportunidade.php)
        - [exclusaoOportunidade.php](./joinup/view/exclusaoOportunidade.php)
        - [index.php](./joinup/view/index.php)
        - [indexAdm.php](./joinup/view/indexAdm.php)
        - [loginAdm.php](./joinup/view/loginAdm.php)
- db/
    - [joinup.sql](./db/joinup.sql)

</div>

<div id='introducao'>  

<h3> 🎯 Introdução ao Projeto </h3>

<p> A crescente demanda por uma educação prática e voltada para o mercado de trabalho tem levado as instituições de ensino e os alunos a buscarem oportunidades de estágio como parte integrante do processo de formação acadêmica. Em paralelo, as empresas reconhecem a importância de recrutar talentos em fase de formação, visando o desenvolvimento de profissionais alinhados com suas necessidades e cultura organizacional. Nesse contexto, a criação de um sistema de divulgação de vagas de estágio se apresenta como uma proposta relevante. </p>

<p> Atualmente, muitos estudantes enfrentam desafios na busca por oportunidades de estágio, como a falta de informações sobre vagas disponíveis e a dificuldade em encontrar empresas que ofereçam programas de estágio alinhados com seus interesses e competências. Dessa forma, o sistema proposto visa simplificar esse processo, proporcionando um único local para acessar informações atualizadas sobre vagas de estágio. </p>

<p> Ademais, vê-se que empresas muitas vezes enfrentam dificuldades em divulgar suas vagas de estágio de forma eficaz para o público-alvo. Assim, um sistema centralizado ajudaria a reduzir assimetrias de informação, permitindo que as empresas alcancem um público mais amplo de estudantes e, ao mesmo tempo, proporcionando aos alunos uma visão mais clara das oportunidades disponíveis. </p>

<p> Em resumo, a concepção e implementação de um Sistema de Compartilhamento de Vagas de Estágio são justificadas pela necessidade de melhorar o acesso dos estudantes a oportunidades de estágio, além de reduzir assimetrias de informação. Dessa maneira, esse projeto está alinhado com os princípios e conceitos fundamentais de banco de dados e oferece uma oportunidade única de aplicação prática do conhecimento adquirido na disciplina de Fundamentos de Banco de Dados. </p>

</div>  

<div id='rodape'>

------
<h4> Projeto da Disciplina Projeto e Administração de Banco de Dados </h4>
<p> Universidade Federal Rural do Semi-Árido (UFERSA), Angicos-RN - Bacharelado em Sistemas de Informação</p>
<p> © Luiz Fernando, Letícia Bandeira e Andersson Lucas, 2024 </p>

</div>  





















































































































