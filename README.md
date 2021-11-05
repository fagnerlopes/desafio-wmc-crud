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

3) Copie o arquivo .env-example para .env

4) Suba o container:
```
docker-compose up -d
```

5) Abra um terminal no serviço app:
```
docker-compose exec app bash
```

6) Instale as dependências PHP
```
composer install
```

7) Instale as dependências do npm e compile os assets
```
npm install && npm run dev
```

8) Execute as migrations e os seeders
```
php artisan migrate && php artisan db:seed
```


9) Acesse a URL:
(http://wmc.docker.localhost)

10) Logue na área restrita:
(http://wmc.docker.localhost/login)

**Usuário:** admin@dominio.com<br>
**Senha:** 123456

### TODO
[ ] Modal antes de excluir o registro<br>
[x] Máscara do Salário e converter para gravação no banco<br>
[x] Exibição correta da data ao buscar do banco<br>
[ ] Modal para logout<br>
[ ] Páginação dos resultados<br>
[ ] Pesquisa com livewire<br>
