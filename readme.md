<div align="center">
    <br>
    <h1 align="center">Dazim</h1>
    <p align="center">
        <a href="#sobre-o-desafio">Sobre</a> | 
	<a href="#ambiente-local">Ambiente</a>
    </p>
    <p align="center"> 
        <i><h5>Criação de um sistema de gestão para instituições de ensino.</a></h5></i>
    </p>
</div>
<br>

## Sobre o projeto
Foi desenvolvido um sistema de gestão com foco para instituições de ensino, com funcionalidades para administrar e organizar alunos e turmas, utilizando javascript, php e mysql. 


##### Tecnologias utilizadas:
- HTML/CSS
- PHP
- Javascript
- MySQL

##### Pré requisitos:
- <a href="https://www.apachefriends.org/pt_br/download.html">XAMPP</a>

## Ambiente local
Primeiramente, você deve clonar o projeto na sua máquina ou realizar o download. É ideal que esse projeto seja colocado em seu servidor, caso utilize o XAMPP, coloque na pasta htdocs.

```sh
git clone https://github.com/will1Zera/dazim.git
```

## Executando
Depois de clonar ou baixar o projeto, você deve configurar seu servidor, caso utilize o XAMPP, deve ativar o Apache e MySQL no Painel de Controle. Para testar se ocorreu tudo certo, poderá acessar a seguinte rota no navegador:

```sh
http://localhost/dazim/api
```
Em caso de sucesso, é retornado a seguinte mensagem: "Welcome to the Dazim!".

## Banco de dados
1. Acesse o arquivo Database.php e realize a conexão com seu banco de dados.
2. Para criar as tabelas listadas abaixo, acesse `api/src/Utils` e execute o seguinte comando:
   
```sh
php Migrations.php
```


## Importante
1. Para que ocorra tudo certo, siga a ordem correta de comandos listados.
2. Muita atenção aos pré-requisitos listados!


<br>
by <a href="https://github.com/will1Zera">William Bierhals</a> 😄 <br>
📥 <a href="https://www.linkedin.com/in/williambierhals/">Linkedin</a>