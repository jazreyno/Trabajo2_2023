Seleccionamos como enfoque para el diseño de nuestra base de datos los videojuegos y sus relaciones con las empresas de desarrollo. 
La tabla de videojuegos consta de una clave primaria llamada  "id_videojuegos", nombre del juego (como varchar) y genero (en formato de texto). 
Además, establecemos una relación a través de la clave foránea id_empresa que se conecta con la tabla de compañías. 
Esta última tabla, por su parte, emplea "id_empresa" como clave primaria y almacena datos como el nombre de la empresa (utilizando el tipo de dato varchar), 
su cotización (representada como un número entero) y la fecha de creación de la compañía.
