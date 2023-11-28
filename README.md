-si queremos poder visualizar todos los videojuegos:

    eje:http://localhost/api/videojuegos
    
-para poder traer un videojuego especifico utlizamos el siguiente endpoint:
      
    eje:  http://localhost/api/videojuegos/13

-si queremos eliminar un videojuego ponemos el siguiente endpoint:
    
    eje: http://localhost/api/videojuegos/13

-en el caso de querer modificar un videojuego ponemos el siguiente endpoint:

    eje: http://localhost/api/videojuegos/13

-si desea poder ordernar/filtrar utilizamos el siguiente endpoint:
    
   eje: http://localhost/api/videojuegos?orderby=id_empresa&order=asc&limit=23&offset=1

-para poder agregar un videojuego:
{
    "videojuego" : "",

    "genero": "",

    id_empresa: 
}

para seleccionar la empresa,puede elegir id: 6(epic), 15(riot games)
