-si queremos poder visualizar todos los videojuegos:

    eje:http://localhost/api/videojuegos
    
-Traer un videojuego especifico utlizamos el siguiente endpoint:
      
    eje:  http://localhost/api/videojuegos/13

-si queremos eliminar un videojuego ponemos el siguiente endpoint:
    
    eje: http://localhost/api/videojuegos/13


-si desea poder ordernar/filtrar utilizamos el siguiente endpoint:
    
   eje: http://localhost/api/videojuegos?orderby=id_empresa&order=asc&limit=23&offset=1


-Agregar un videojuego por POST:
    api/videojuegos/
    videojuego, genero, id_empresa
    Ej: http://localhost/Trabajo2_2023/api/videojuegos

{

    "videojuego" : "",

    "genero": "",

    id_empresa: 
}


-Modificar un videojuego por PUT
    api/videojuegos/update
    id, videojuego, genero, id_empresa
    Ej: http://localhost/api/videojuegos/update

    {

        "id_videojuegos": "95",

        "videojuego": "123453",

        "genero": "rol",

        "id_empresa": "4"
        
    }


Para seleccionar la empresa,puede elegir id: 6(epic), 15(riot games)
