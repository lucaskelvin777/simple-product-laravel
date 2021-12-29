

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
   ![mysql configurações](https://lh3.googleusercontent.com/mGKwV0ZKXgWYJU7dT1rV1_bDHePhhGzicG9k9MAyNi00nmh6W9a6p0iRxnktD2nRzBdCkzSMMkCurCGjES7JzBDrkfX6gbYZep91h2lUpOZml2GSmoUsmwC3tnr-ZbVz6VzcEmgWiguvMEfh5avtmjJqQvGyNkc8o195JxCh6UKdsD6xfKXIsJxGrWCaD-uaLM2AS1PpiF9iCHACf1Lgd5PFRZths9RrtfQp6Cs-lBmgaC1oKdRC4ziah3HsQkMb6JvB6-mdEBS4_XyIlObgSnL-Ybaacd11bm1-rS9aMep_v3yVGDNk4ShTm_ZVot4KRv7q2jlSIcnv8ylDVZpfGS4XS-PQ6hrgBJNoxuuCu3rPu5UaQi1vS8-gLNcEB3EjQI04gmY5Uop7dd3Fu5T2IRh9fPt0f8inPN5MExx-XXuO17CHDdVQTZXcIPWlbCT8ucNrtjankfpmIRlZQWLMLU5mMAzYBasGoBOuSroOnGupC2XtJVSi8oop_PhVtlqPen2QKhsik40LB4FZB9bDe15mfyIq60Lm1ubwaaHN4rpf1-iUsO3z-7alGKAKhsN25cNul0QBMYfHgJ3ccSclJC6RRTBsC-GzZJxRDFnsr3O_2qxXLU9XkfmJnXJ-Z9NwqKj19zMURPIv4w-bFlnZUyOgxNLa3BrHRa2CMrOzBiiDVE-VNs8wweObStwgBdE5ANjEjgV8x9OkV91fe1wgpY8=w447-h136-no?authuser=4) 
##### Também podemos mexer nas configurações do nginx, podemos editar o atributo "NGINX_HOST_HTTP_PORT", no qual é a porta que iremos utilizar para acessar em nosso navegador.
![nginx configurações](https://lh3.googleusercontent.com/edB6tyS0Bn9MRysuJMDwSwEjQ7qd2fJ9F_o4xAzn3G116TlcWdX-JQeM2bbUE3Rie5QFA2amgX-EpidEDUy4rICWEljDwCd6Ece3kEApMuuicoGqwtTZYfbVcMLHWLbOGc4m7PtdMJUgltedZZ_crTxa99JCNh4KHj5shXrMIQdFlF-r3AVQ05QRtyrxDEAf_DHtWa_WPU_6VA7CUvBRX3_Mr4v_7vSE0kpFoxnokK5ihEabtclUXEplLA7m_d8sT-R86dtPjpcX0-jwbv2jS-06flr042TCXvFAHD23C52HIwVedq978hf8dO_EScuDSORyHZAABM86GnX8j_EbcEIIP8sn2B7V-IChDFXgbUBnrSAWYiBrPWMH0ftFr_xMP2ACfeWowkMQrW2Vc62H_leUhexeD-1sPKZLqPYvOq2vQCQyFJLr1MbGqSTen5yojsZ9jJbfDyGArM-ke0JQQTvA5h80Vj003Ppqzpgt6sSCVHmODn1YkOh61a9uTCQaaoZjSeRoC17PFFfaA1NUBLk8Vp2Icct8lNkCgkGZgLHj1bY_9BPWRgH5VTvk0p8y5C47wRm1bpAJ-J51zCtXNVOgzQwrBDrsYZudEM4nvvZ5FtYXVanAWcAllTDryXY2DsbaoNED5ixRNQMXUTTxya8nb1hZgU8iI0zr0n51qKJYSwEpKu4z4yLeVSruEl23ZGOpeVIKOhLYyAr1UUNcw1o=w469-h139-no?authuser=4)

##### Após isso, devemos atualizar o .env do projeto,  editando as configurações do banco de dados, de acordo como você configurou no passo anterior. o atributo "DB_HOST",  deve conter o nome do container do mysql. Já o "DB_DATABASE",  devemos colocar o valor "simple_products_laravel", já nos atributos "DB_USERNAME" e "DB_PASSWORD" o valor "root".

    cd ..
    
    Mac/Linux: cp .env.example .env
    Windows (Shell): copy .env.example .env
    
   ##### E devemos editar o .env, com o nosso editor de textos favorito.
   ![.env configuração](https://lh3.googleusercontent.com/61vfjvxlrPGGkMmAXEEtAExM49m9TJEVnCA4GJYDyqZNKIPs6F7i2RoZE0bGJZeiIa-_Mm-YCD70MKh2RCFJ14kjbFBgZIVYUquHl7Fcc6Odm0Vrmg60zUer_p7PSsfTUy2tIuXeSK5iKFNtO8EbmkscFdFp17LT9gPyyG3X7uq4xrLmEJuKL60B159qz1IDOzrAvd3qObzJPqMV1PV0Q_xDsseENw3asvcyKMyeXrN1cqLUKQnuT5Gvgw80oCi8KxQtDfiqlZl6An2f9zkHZK-N0WyE7wZOkkYcGUJ1ZwxfpJVSJy6RSWndM595JfMqEubrITRbsf-cGlPTGsCimQLB7odfBawVugBPRJ-JseSpDwvB3vvf0VP-ar1A2_Xaq0GS7znVRQpLYj8j29H9SeaQW2Wb9jhi-j2i6nTqr7ay7L3xa2aQqgeEbRXI77A7CZvSj-ilsLsUmCw25Zp-gMhhvvmfB8OjndMnv1ULuJlD7aw39sIdgsutji3UGBtIWbgVeiYSfvUQkjQmTHs7w7noc4TMLhbkp5AyOmdxBsh-8r-EUu027a9Z-AXoAL7Wt0nvAIpQplFa95q0EromGDPtXhSVwwCd7W8IrRQjWAkXXOuML74OATdYf9P7pDIKR8fXuul4A5F9ba47uHCDR0OitcqOXAppP0d_Z265mPBruL1hInUBq3Gmt_IoDciOzYpJ-adpqdkWTyNskOM0O4I=w273-h102-no?authuser=4)
   
   
   
    
    cd laradock
    
    docker-compose up -d nginx mysql
    
    docker-compose exec workspace bash
    
    composer install
    
    php artisan migrate
    
    php artisan key:generate
    
  Lembrando que a porta pode variar, de acordo com a configuração realizada no arquivo .env do laradock.
    
    E acesse no seu navegador: http://localhost:80
   

