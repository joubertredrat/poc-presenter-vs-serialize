## Random APP ##

Random POC to test Presenter vs Serialize.

Run
------ 

```$ docker-compose up```

Routes
------ 

##### Routes using presenter

```
GET http://0.0.0.0:14000/api/v1/invoices
GET http://0.0.0.0:14000/api/v1/invoices/{id}
```

##### Routes using serializer

```
GET http://0.0.0.0:14000/api/v2/invoices
GET http://0.0.0.0:14000/api/v2/invoices/{id}
```

 
