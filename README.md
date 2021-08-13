# Desafio WMC

Esse projeto conta com uma infraestrura em Docker. Uma vez tendo instalado e configurado o Docker na sua máquina siga os seguintes passos para rodar:

1) Clone o repositório
```
git clone https://github.com/fagnerlopes/desafio-wmc-crud.git
```

2) Acesse o diretório:
```
cd desafio-wmc-crud
```

3) Suba o container:
```
docker-compose up -d
```

4) Abra um terminal no serviço app:
```
docker-compose exec app bash
```

5) Instale as dependências PHP
```
composer install
```

6) Instale as depenências do npm e compile os assets
```
npm install && npm run dev
```

7) Execute as migrations e os seeders
```
php artisan migrate && php artisan db:seed
```


8) Acesse a URL:
(http://wmc.docker.localhost)

9) Logue na área restrita:
(http://wmc.docker.localhost/login)

Usuário: admin@dominio.com
Senha: 123456
