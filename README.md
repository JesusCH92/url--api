# URL SHORTER

Stack tecnologico: PHP8.3(Symfony7), Nginx, OpenApi(Documentación)

## Entorno Dockerizado

**Debes tener instalado Docker y Docker Compose en tu equipo.**

- [ ] Instalar la network de los contenedores en caso de no tenerla instalada antes:

```shell
docker network create app-network
```

- [ ] Levantar los contenedores:

```shell
docker-compose -p url up -d
```

- [ ] Acceder al contenedor de PHP:

```shell
docker exec -it php-fpm bash 
```

- [ ] Después de entrar al contenedor de php-fpm, ejecutar:

```shell
make deploy
```

## Acceso al sistema

Después de desplegar el proyecto correctamente, debe acceder al siguiente enlace para probar la API

[`documentación de las API's`](http://localhost:8080/api/doc)

- [ ] Para ejecutar los text:

```shell
make testing
```

- [ ] Si desea ejecutar la API via curl:

```curl
curl --location 'http://localhost:8080/api/v1/shorts-urls' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer []{}' \
--data '{
  "url": "https://symfony.com/"
}'
```