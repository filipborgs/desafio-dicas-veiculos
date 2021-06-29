# Tips challenge

### Made with:

PHP / Laravel / Postgres / VueJS

## INSTALATION

This API required only docker and docker-compose 

// Download and up
 - git clone https://github.com/filipborgs/desafio-dicas-veiculos.git
 - cd desafio-dicas-veiculos
 - docker-compose up -d

// ENV
 - cp .env.example .env

// Install dependencies
 - sudo chmod 777 -R public bootstrap storage
 - docker exec desafio-php-fb composer install

// Laravel comands
 - docker exec desafio-php-fb php arisan key:generate
 - docker exec desafio-php-fb php artisan migrate && php artisan db:seed

The project will start in the port **8089**
