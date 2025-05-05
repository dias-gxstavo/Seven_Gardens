<img  width=100% src="https://capsule-render.vercel.app/api?type=waving&color=6D8D3D&height=120&section=header"/>

## Seven Gardens 🌱

Este projeto utiliza PHP e MySQL para criar uma aplicação Ecommerce de Orquideas.

### Estrutura de Arquivos 📁

````
Seven_Gardens
│
├── .vscode
│   └── settings.json
│
├── Back-end
│   ├── cadastrar_produto.php
│   ├── CadastroColaborador.php
│   ├── editarProduto.php
│   ├── excluirProduto.php
│   ├── Logica_de_Botoes.php
│   ├── obterProduto.php
│   ├── processoCreateMaster.php
│   ├── processo_consulta_adm.php
│   ├── processoLogin.php
│   ├── processo2fa.php
│
├── Docs
│   ├── database.png
│   └── database.puml
│
├── Front-end
│   ├── css
│   ├── html
│   ├── img
│   ├── img-produtos
│   ├── js
│   └── PHP
│       ├── connect.php
│       └── helpers
│           └── path_helper.php
│
├── logs
│   └── historico_login.log
│
├── header.php
├── headerMaster.php
├── modal_carrinho.php
├── modal_Edit_produtos.php
├── index.php
├── README.md
└── sevengardens.sql
````
## Tecnologias 🔧

- 🌐 PHP
- 🐬 MySQL
- 🛠️ XAMPP

## Instalação 🛠

1. Clone o repositório:

   ```
   git clone https://github.com/souzalipe/Seven_Gardens/
   ```

2. Navegue até o diretório do projeto:

   ```
   cd Back-end
   ```

   ```
   cd Front-end
   ```
## Execução do Projeto

1. Inicie o Servidor Apache e MySQL:

Abra o painel de controle do XAMPP e inicie o servidor Apache e MySQL:

2. Copie os Arquivos para o Diretório do Servidor:

Mova a pasta do projeto seven-gardens para a pasta htdocs do XAMPP. Essa pasta normalmente está localizada em:

- C:\xampp\htdocs\

3. Acesse a Aplicação no Navegador:

Abra seu navegador e digite a URL:

- [http://localhost/seven-gardens/](http://localhost/Seven_Gardens/)

4. Configuração do Banco de Dados:

Acesse o phpMyAdmin através do painel do XAMPP ou diretamente pelo navegador usando a URL:

- http://localhost/phpmyadmin

Crie um novo banco de dados com o nome:

- seven_gardens_db

5. Importe o Script do Banco de Dados:

Navegue até o banco de dados seven_gardens_db que você criou.

Importe o arquivo SQL localizado na pasta scripts do projeto:

- scripts/database_script.sql

Execute o script para criar as tabelas e estruturas necessárias para o projeto.

## Contribuindo

Se desejar contribuir com o projeto, siga os passos abaixo:

1. Fork o projeto.
2. Crie uma nova branch com sua feature: `git checkout -b minha-feature`.
3. Commit suas alterações: `git commit -m 'Minha nova feature'`.
4. Push para a branch: `git push origin minha-feature`.
5. Abra um Pull Request.

## Licença

© *Seven Gardens* 🌸. 
<img  width=100% src="https://capsule-render.vercel.app/api?type=waving&color=6D8D3D&height=120&section=footer"/>
