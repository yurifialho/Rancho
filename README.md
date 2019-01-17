# Rancho On-line
Sistema básico para controle de rancho.

1. Aviso:
   - Este projeto tem como finalidade ajudar a comunidade no sentido de distribuir um sistema bem simples para controle de Rancho/Agendamento, entretanto o sistema é um protótipo que se encontra inacabado e em sua fase inicial, você que tem a necessidade por esse sistema é bem-vido para contribuir. Mas desencorajo que o sistema seja utilizado em produção da forma que se encontra.
2. Pré-requisitos:
   - Banco de Dado Mysql 5.x
   - Servidor Apache
   - Php 5
3. Recomendável:
   - Docker
4. Utilizando o Projeto
   - Com Docker:
     - Caso você já disponha do Docker e Docker Compose instalado, basta executar o comando na raiz do projeto: 
     ```
     docker-compose up
     ```
     - Após a iniciação deverá executar o arquivo *script_carga.sql*, neste arquivo há o script de criação das tabelas e do primeiro usuário: Administrador (login: *admin* e senha: *admin*);
     - Após execução do script do passo anterior basta colocar no browser o ip de sua máquina ou localhost, que será apresentada a tela de login.
   - Sem o Docker:
     - Se você não possui o Docker deverá possuir o Apache e Mysql em sua máquina;
     - Coloque o projeto na pasta: *htdoc* ou */var/www/html* do apache;
     - Vá no arquivo: *rancho/includes/database.config.php* e altere as variáveis com as configurações de seu banco de dados;
     - Executo o script *script_carga.sql* em seu banco de dados Mysql;
     - Acesse o sistema pelo seu browser;

##Obrigado
