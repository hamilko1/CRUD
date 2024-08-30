# Projeto CRUD de Contatos

Este projeto é uma aplicação web para gerenciamento de contatos, desenvolvida utilizando PHP e MySQL. A aplicação permite criar, ler, atualizar e excluir contatos em um banco de dados MySQL. A interface é simples e clara, com um layout moderno e responsivo.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada para a lógica do servidor e manipulação dos dados.
- **MySQL**: Sistema de gerenciamento de banco de dados utilizado para armazenar as informações dos contatos.
- **HTML5/CSS3**: Tecnologias utilizadas para estruturar e estilizar a interface do usuário.
- **XAMPP**: Ambiente de desenvolvimento local utilizado para PHP e MySQL.

## Estrutura do Projeto

- **config/database.php**: Arquivo de configuração para conexão com o banco de dados.
- **model/Contato.php**: Modelo PHP que representa a tabela de contatos no banco de dados e fornece métodos para criar, ler, atualizar e excluir contatos.
- **controller/ContatoController.php**: Controlador PHP que lida com as solicitações do usuário e interage com o modelo `Contato`.
- **view/contatos/index.php**: Página principal que exibe a lista de contatos e um formulário para adicionar novos contatos.
- **view/contatos/edit.php**: Página para editar um contato existente.
- **view/contatos/delete.php**: Página para excluir um contato.

