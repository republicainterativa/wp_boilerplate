# Introdução

Este projeto foi desenvolvido com a utilização do Grunt, a fim de aumentar a produtividade e automatizar algumas tarefas no desenvolvimento deste projeto.


## Utilizando o Grunt

> O Grunt é uma ferramenta para automação de tarefas em projetos javascript, que roda no terminal atraves de comandos de linha. Com ele, é possível concatenar e minificar arquivos, validar scripts (linting), otimizar imagens, realizar deploy (rsync ou ftp) e mais uma infinidade de opções.

<br>

Documentação: [http://gruntjs.com/](http://gruntjs.com/)

### Como Instalar

*Para utilizar o Grunt, é necessário ter o Node.js na sua máquina.*


#### Instalando o Node.js

É bastante simples, instalar o Node.js

1. Clique neste [link](http://nodejs.org/).
2. Clique no botão INSTALL.
3. Faça a instalação do pacote Node
4. Caso precise de mais informações, [confira este link](https://github.com/joyent/node/wiki/Installing-Node.js-via-package-manager)


#### Inciando com o Grunt

Execute este comando no seu terminal, para instalar o Grunt.

`$ npm install -g grunt-cli`


Com o Grunt instalado, realize os seguintes passos:

* Mude para o diretório `./src` do projeto.
* Inicie a instalacão das dependências com o comando `npm install`.
* Inicie o grunt com o comando `grunt`.

> Se precisar de ajuda, execute `grunt --help`.

### Tarefas Disponíveis

***Importante: todas estas tarefas deverão ser executadas no diretório `./src`***

##### TAREFA WATCH

>**Execute com:** grunt w

>**O que esta tarefa faz?**

>- Observa as mudanças de todos os seus arquivos
>- Compila todos os arquivos *.scss
>- Concatena e minifica seus arquivos `*.js` e `*.css`
>- Executa a validação dos seus scripts


##### TAREFA DE OTIMIZAÇÃO

>**Execute com:** grunt o

>**O que esta tarefa faz?**

>- Fará uma otimização das suas imagens