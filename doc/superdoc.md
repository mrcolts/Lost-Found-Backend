- [Логин](#логин)
- [Профиль](#профиль)
- [Категории](#категории)
- [Статусы](#статусы)
- [Мои предметы](#мои-предметы)


# Логин

## ULR
```
https://lostandfound-api.movily.app/api/v1/login
```

## Method
```
POST
```

## Parameters
```
{
    "email" : "user@mrcolt.com",
    "password" : "12345678"
}
```


# Профиль

## URL
```
https://lostandfound-api.movily.app/api/v1/me
```

## Method
```
GET
```

## Headers
```
Content-Type: application/json
Bearer: {token}
```

## Parameters
```
нет
```


# Категории

## URL
```
https://lostandfound-api.movily.app/api/v1/categories
```

## Method
```
GET
```

## Headers
```
Content-Type: application/json
Bearer: {token}
```

## Parameters
```
нет
```


# Статусы

## URL
```
https://lostandfound-api.movily.app/api/v1/statuses
```

## Method
```
GET
```

## Headers
```
Content-Type: application/json
Bearer: {token}
```

## Parameters
```
нет
```


# Мои предметы

## URL
```
https://lostandfound-api.movily.app/api/v1/me/items
```

## Method
```
GET
```

## Headers
```
Content-Type: application/json
Bearer: {token}
```

## Parameters
```
нет
```
