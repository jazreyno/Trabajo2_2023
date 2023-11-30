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
        
        "videojuego" : "eqwe",
        "genero": "eqwe",
        "id_empresa" : 4 

    }


## -Modificar un videojuego por PUT

    api/videojuegos/id
    videojuego, genero, id_empresa
    Ej: http://localhost/api/videojuegos/update

    {

        "videojuego": "lol",

        "genero": "rol",

        "id_empresa": "4"
        
    }




Para seleccionar la empresa,puede elegir id: 6(epic), 15(riot games)
