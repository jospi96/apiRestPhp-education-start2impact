# Angular2

This is my first porject in Php and SQL language. It is part of my stauding path in start2impact university.This project consisted in creating api rest that would allow you to create, modify, delete and view courses and related subjects.
## Development 
this project consists of an index that redirects the various users to the requests made, accepts only 2 ulr course and subject. 
at the address course it is possible to set parameters to filter the query.
### To filter by number of seats
type=places_available&&text=34 
### To filter by name
type=name&&text=rt
### To filter by subject
type=materia&&text=dd

## json format accepted
### Course create
[{"id":144, "name":"corso di lingue","places_available":3,"subjects":[4,5]}]
### Course update
[{"id":144, "name":"corso di lingue","places_available":3,"subjects":[4,5]}]
### Course delete
[{"id":144}]
### Subject create
[{"name":"italiano"}]
### Subject modify
[{"id":1, "name":"italiano"}]
### Subject delete
[{"id":1, }]

## Technologies
Project created with:
* Php
* Mysql

## Collaboration
* No collaboration

## Know_Bugs
* No know bugs