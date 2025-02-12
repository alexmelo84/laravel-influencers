# Introdução

API feita em Laravel para gerenciamento de campanhas publicitárias para influenciadores.

Roda em um container Docker com a [imagem](https://hub.docker.com/r/shinsenter/laravel).

## Autenticação

É utilizada a biblioteca *tymon/jwt-auth* para o gerenciamento do JWT:

```
composer require tymon/jwt-auth
```

Após instalar o pacote precisa publicar o arquivo de configuração:

```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

É necessário o secret do JWT:

```
php artisan jwt:secret
```

Também precisa adicionar a interface do JWT ao model de usuário:

```
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
...
public function getJWTIdentifier()
{
    return $this->getKey();
}

public function getJWTCustomClaims()
{
    return [];
}
```

Foi criado um *middleware* para proteger as rotas que necessitam de autenticação.

```
php artisan make:middleware JwtMiddleware
```

## Utilização

Na raíz do projeto há o arquivo *collection.json* que é a coleção do Postman com todas as rotas disponíveis.

Primeiramente precisa criar um usuário pois todas as rotas só podem ser acessadas com autenticação. Na coleção acesse *User -> Criar* para criar um usuário. Na aba *Body* pode-se alterar os dados de cadastro.

Após criar um usuário, precisa autenticá-lo usando a rota "User -> Login* da coleção. Na aba *Body" deve-se usar o email e senha do usuário criado anteriormente.

Se tudo foi feito corretamente a resposta será o token, por exemplo:

```
{
    "token": "tokenQualquer"
}
```

Utilize esse token nas demais rotas usando na aba *Authorization* e o auth type *Bearer Token*.
