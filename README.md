# teste-tecnico-dev-php
Teste técnico de dev php

# Teste Técnico PHP: Consumo de API e Armazenamento em Banco de Dados

Este é um projeto de teste técnico em PHP que consiste em criar uma aplicação capaz de consumir dados da API pública [https://randomuser.me/](https://randomuser.me/) e armazená-los em um banco de dados MariaDB. Além disso, uma página web é construída para exibir os dados dos clientes de forma organizada. A aplicação é executada em um ambiente Docker para facilitar a configuração e execução.
![Screenshot from 2023-08-20 22-24-53](https://github.com/eclelucien/teste-tecnico-dev-php/assets/56320433/f7831d2b-0101-4d22-a91c-4d2ce7bfc2e8)

## Funcionalidades

- Consumo da API pública [https://randomuser.me/](https://randomuser.me/) para obtenção de dados de usuário.
- Armazenamento e tratamento dos dados obtidos em tabelas do banco de dados MariaDB.
- Página web responsiva para visualização dos dados dos clientes.
- Botão de sincronização para atualização da tabela "cliente" com novos registros da API.
- Estruturação eficiente do banco de dados com relacionamento entre as tabelas.

## Tecnologias Utilizadas

- PHP
- MariaDB
- Docker

## Instalação

1. Certifique-se de ter o Docker instalado em sua máquina.
2. Clone este repositório para o seu ambiente local.
3. Abra um terminal na pasta do projeto e execute o seguinte comando para iniciar os containers e fazer o build do projeto:

   ```
    sudo docker-compose up --build
   ```

Para verificar os containers em execução, digite:

   ```
    sudo docker ps
   ```


Para acessar o seu container, utilize o seguinte comando:

   ```
    sudo docker exec -it app-testepratica bash
   ```

Dentro do bash, para criar as tabelas do banco de dados, execute:

   ```
    php src/install.php
   ```

Finalmente, acesse o projeto em seu navegador:

http://localhost:8008/


Consumo da API e Armazenamento em Banco de Dados
A aplicação PHP consome a API https://randomuser.me/ para obter dados de usuário. Os dados obtidos são tratados e armazenados em tabelas relacionadas do banco de dados MariaDB. Isso permite consultas eficientes e relacionais entre as tabelas.

O código para o consumo da API, tratamento de dados e armazenamento no banco de dados está disponível nos seguintes arquivos:

src/helpers/Helper.php: Classe responsável por realizar a chamada à API e tratar os dados.

src/services/UserManagement.php: Classe que gerencia a conexão com o banco de dados usando PDO.

src/models/Cliente.php: Classe para interagir com a tabela "cliente"s no banco de dados.

src/models/Location.php: Classe para interagir com a tabela "locations" no banco de dados.


Página Web de Visualização e Sincronização
A página web construída exibe os dados dos clientes de forma clara e organizada. Ela também inclui um botão de sincronização que permite obter novos dados da API e atualizar a tabela "cliente" no banco de dados.

O código HTML, CSS e php para a página web está disponível nos seguintes arquivos:

index.html: Página principal que exibe os dados dos clientes e o botão de sincronização.
public/styles.css: Arquivo CSS para estilização da página.

Documentação Adicional
Para mais detalhes sobre o funcionamento interno da aplicação, o processo de consumo da API, o tratamento dos dados e a estruturação do banco de dados, você pode conferir o código-fonte e os comentários nos arquivos mencionados acima. 
