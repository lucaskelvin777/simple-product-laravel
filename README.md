


# Simple product laravel
### Projeto criado com laravel, no qual consiste em um CRUD de produtos, podendo cadastrar produtos com foto, nome e descrição. Utilizando o banco de dados Mysql.

## Docker

Você deve ter o docker instalado no seu computador para poder executar esse projeto.
#### Instalando docker no ubuntu: https://www.hostinger.com.br/tutoriais/install-docker-ubuntu
#### Instalando docker no windows 10:  http://marceloti.pe.hu/trabalhando-com-docker-e-container-no-windows-10/
#### Instalando no macOS: https://docs.docker.com/desktop/mac/install/

## Instalando o projeto

#### No terminal, execute:

    git clone https://github.com/lucaskelvin777/simple-products-laravel.git
    
    cd simple-products-laravel
    
   #### Após isso, devemos utilizar o laradock
    
    git clone https://github.com/Laradock/laradock.git
    
    cd laradock
    
    Mac/Linux: cp .env.example .env
    Windows (Shell): copy .env.example .env
   
  ##### Devemos editar o .env do laradock, com o nosso editor de texto favorito,  atualizando-o de acordo com as necessidades. O único atributo obrigatório para alterarmos é o "MYSQL_DATABASE", alterando o valor para "simple_products_laravel"
   ![mysql configurações](https://live.staticflickr.com/65535/51785529996_9fc3aaace5_o.png) 
##### Também podemos mexer nas configurações do nginx, podemos editar o atributo "NGINX_HOST_HTTP_PORT", no qual é a porta que iremos utilizar para acessar em nosso navegador.
![nginx configurações](https://live.staticflickr.com/65535/51785781853_ec5dc416fd_o.png)

##### Após isso, devemos atualizar o .env do projeto,  editando as configurações do banco de dados, de acordo como você configurou no passo anterior. o atributo "DB_HOST",  deve conter o nome do container do mysql. Já o "DB_DATABASE",  devemos colocar o valor "simple_products_laravel", já nos atributos "DB_USERNAME" e "DB_PASSWORD" o valor "root".

    cd ..
    
    Mac/Linux: cp .env.example .env
    Windows (Shell): copy .env.example .env
    
   ##### E devemos editar o .env, com o nosso editor de textos favorito.
   ![.env configuração](https://live.staticflickr.com/65535/51786149734_4da7acd8b7_o.png)
   
   
   
    
    cd laradock
    
    docker-compose up -d nginx mysql
    
    docker-compose exec workspace bash
    
    composer install
    
    php artisan migrate
    
    php artisan key:generate
    
  Lembrando que a porta pode variar, de acordo com a configuração realizada no arquivo .env do laradock.
    
    E acesse no seu navegador: http://localhost:80
   

