## -Visualizar todos los videojuegos:

    Ej:http://localhost/api/videojuegos
    
## -Obtener un videojuego especifico:
      
    Ej:  http://localhost/api/videojuegos/13

## -Eliminar un videojuego:
    
    Ej: http://localhost/api/videojuegos/13


## -Ordernar/filtrar:
    
   Ej: http://localhost/api/videojuegos?orderby=id_empresa&order=asc&limit=23&offset=1


## -Agregar un videojuego por POST:
    api/videojuegos/
    videojuego, genero, id_empresa
    Ej: http://localhost/Trabajo2_2023/api/videojuegos

{

    "videojuego" : "",

    "genero": "",

    id_empresa: 
}


<<<<<<< HEAD
-Modificar un videojuego por PUT

=======
## -Modificar un videojuego por PUT
>>>>>>> 88fc8ebbb30d859636d55ffe6b63a71eccd52683
    api/videojuegos/update
    id, videojuego, genero, id_empresa
    Ej: http://localhost/api/videojuegos/update

    {

        "id_videojuegos": "95",

        "videojuego": "123453",

        "genero": "rol",

        "id_empresa": "4"
        
    }


    {

        "id_videojuegos": "95",

        "videojuego": "123453",

        "genero": "rol",

        "id_empresa": "4"
        
    }


Para seleccionar la empresa,puede elegir id: 6(epic), 15(riot games)
