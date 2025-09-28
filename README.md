## 🚀 PASOS PARA INICIAR EL PROYECTO

1. **Clonar el repositorio** dentro de la carpeta `laragon/www` si se iniciara en Laragon, si se iniciara en XAMPP seria dentro de la carpeta `xampp/htdocs`, luego hacemos click derecho y seleccionamos git bash here donde ingresaremos el siguiente comando:  
   ```
   git clone <url del repositorio>
   ```
2. **Instalar dependencias con Composer**

- Ubicarse dentro del proyecto con el comando:

```
cd <nombre_del_proyecto>
```
- Instalar dependencias:

```
composer install
```
3. **Instalar la libreria de Html2pdf**
- Luego de instalar el composer, instalar la libreria html2pdf con el siguiente comando
```
composer require spipu/html2pdf
```

4. Configurar el archivo **.env** + **Database**
- En este archivo se deben colocar todos los datos necesarios para la conexión a la base de datos:
```
CI_ENVIRONMENT = development

database.default.hostname =
database.default.database =
database.default.username =
database.default.password =
database.default.DBDriver =
database.default.port =

```
- Para hacer que corra correctamente el proyecto se debe crear la  base de datos, tablas y registros los cuales se estaran dejando en la carpeta de **Database**.
5. Vista del Proyecto
- Al haber realizado todos los pasos anteriores, procedemos a darle al boton de **Iniciar Todo** de laragon, en caso de XAMPP le damos click a Start de Apache y MySQL.
- Por ultimo, ingresamos la ruta de nuestro proyecto:
 - 'http://superhero.test/tarea06/pdf' primer ejercicio.
 - 'http://superhero.test/tarea06/grafico1' segundo ejercicio.
 - 'http://superhero.test/tarea06/grafico2' tercer ejercicio.