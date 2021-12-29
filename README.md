
# Simple product laravel
### Projeto criado com laravel, no qual consiste em um CRUD de produtos, podendo cadastrar produtos com foto, nome e descrição. Utilizando o banco de dados Mysql.

## Docker

Você deve ter o docker instalado no seu computador para poder executar esse projeto.
Instalando docker no ubuntu: https://www.hostinger.com.br/tutoriais/install-docker-ubuntu
Instalando docker no windows 10:  http://marceloti.pe.hu/trabalhando-com-docker-e-container-no-windows-10/
Instalando no macOS: https://docs.docker.com/desktop/mac/install/

## Instalando o projeto

### No terminal, execute:

    git pull https://github.com/lucaskelvin777/simple-products-laravel.git
    
    cd simple-products-laravel
    
    cd laradock
    
    docker-compose up -d nginx mysql phpmyadmin
    
    docker-compose exec workspace bash
    
    php artisan migrate
    
    E acesse no seu navegador: http://localhost:3550

