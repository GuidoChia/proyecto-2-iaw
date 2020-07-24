# Proyecto 2 IAW
Mi idea para el proyecto 2 consiste en un manejo de stock de reactivos de un laboratorio bioquímico.
En este, se compran diferentes reactivos una vez por mes. La idea es que se pueda saber de forma rápida que reactivos se tienen actualmente, así como su fecha de vencimiento. 
## Entidades
Las entidades principales de este sistema serían: 
- Los reactivos en sí, con un id, nombre comercial, y alguna descripción breve. Para cumplir con el requerimiento de tener una imagen o archivo en la BD, se podría agregar aquí alguna imagen de el código de barras de cada uno.
- El stock de los reactivos, donde se tendría la cantidad de unidades de cada uno, y su fecha de vencimiento.
## Usuarios
Los usuarios serían los siguientes:
- Dueño del laboratorio: podrá realizar consultas, altas, bajas y modificaciones.
- Secretario: podrá realizar consultas sobre los reactivos actuales, como también altas.
## API REST
La idea es dar una API REST que permita conocer el stock actual y el uso que se le dio a los reactivos a través de un plazo de tiempo de 6 meses. Con esta información, la aplicación del próximo proyecto podría calcular que reactivos serán necesarios en el próximo mes, así como avisar al usuario la pronta expiración de algun reactivo.

# Uso de la API
En la carpeta Postman se incluyen dos archivos, correspondientes a una collection de postman con todos los requerimientos que se pueden realizar a la API, como tambien el enviroment que se usa, que contiene la url, y un espacio para guardar las tokens, y no tener que copiarlas y pegarlas. Para que funcione la api en postman se deben importar ambos archivos.

# Links
- [Video actividad 2](https://www.youtube.com/watch?v=6bqaa_BMc5E&t=3s)
- [Deploy en Heroku](http://proyecto-2-iaw-guido.herokuapp.com/)
- [Video actividad 3](https://www.youtube.com/watch?v=UNOtCcqfUZk)
