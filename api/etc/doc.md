# `POST /user/auth`

## Request

```
{
    "username": "robinj1995",
    "password": "password",
    "device": {
    	"title": "Phone running Android 6.0",
        "identifier": "abcde",
        "attributes": ["android"]
    }
}
```

* Either `username` or `email`.
* `device.title` is optional.

## Response

```
{
  "user": {
    "id": 6,
    "username": "robinj1995",
    "email": "robin@gleasnasc.ie",
    "roles": [],
    "subscriptions": []
  },
  "device": {
    "id": 12,
    "title": null,
    "identifier": "abcde",
    "device_attributes": [
      {
        "name": "android",
        "parent_id": null
      }
    ]
  },
  "token": "TOKEN"
}
```

# `POST /user`

## Request

```
{
    "username": "robinj1995",
    "password": "password",
    "device": {
        "identifier": "abcde",
        "attributes": ["android"]
    }
}
```

## Response

```
{
  "username": "robinj1995",
  "email": "robin@gleasnasc.ie",
  "id": 7
}
```

# `GET /user`

## Response

```
{
  "id": 6,
  "username": "robinj1995",
  "email": "robin@gleasnasc.ie",
  "roles": [],
  "subscriptions": [],
  "devices": [
    {
      "id": 10,
      "title": null,
      "identifier": "abc"
    },
    {
      "id": 11,
      "title": null,
      "identifier": "abcd"
    },
    {
      "id": 12,
      "title": null,
      "identifier": "abcde"
    }
  ]
}
```

