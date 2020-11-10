- [Логин](#логин)
- [Профиль](#профиль)
- [Категории](#категории)
- [Статусы](#статусы)
- [Мои предметы](#мои-предметы)
- [Добавить предмет](#добавить-предмет)
- [Мои посты](#мои-посты)
- [Все посты](#все-посты)
- [Добавить пост](#добавить-пост)

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

# Добавить предмет

## URL
```
https://lostandfound-api.movily.app/api/v1/me/items
```

## Method
```
POST
```

## Headers
```
Content-Type: application/json
Bearer: {token}
```

## Parameters
```
{
    "name" : {name},
    "description" : {description},
    "image" : {image},
    "category" : {category_id},
}
```

# Мои посты

## URL
```
https://lostandfound-api.movily.app/api/v1/me/posts
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


# Все посты

## URL
```
https://lostandfound-api.movily.app/api/v1/posts
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


# Добавить пост

## URL
```
https://lostandfound-api.movily.app/api/v1/me/posts
```

## Method
```
POST
```

## Headers
```
Content-Type: application/json
Bearer: {token}
```

## Parameters
```
{
    "title" : {title},
    "description" : {description},
    "image" : "image",
    "category" : {category} 
}
```
