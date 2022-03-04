## Prices app

```shell
    composer install
```

```shell
    php artisan migrate
```

Seeding of 10k products with 100 prices each will take a while

```shell
    php artisan db:seed
```

```shell
    php artisan serve
```

### Routes

Paginate all prices

```
    GET /api/prices?page=1&per_page=15
```

Get all products prices

```
    GET /api/products/{uuid}/prices
```

Sync product prices

```
    PUT /api/prices/{uuid}
    {
    "prices": [
        {
            "id": "ff930800-c47b-492a-913e-51ee32843200",
            "price": 12.34
        },
        {
            "id": "70847a88-8c99-459f-a811-f5aa3dc542bb",
            "price": 62.22,
        },
        ...
    ]
}
```
