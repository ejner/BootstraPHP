# Bootstrap Wrapper PHP (BWP)
Un fork personal _(y muy experimental)_ de [BootstraPHP](https://github.com/tuxnull/BootstraPHP). Este proyecto **no es ni pretende** ser compatible con BootstraPHP (aunque se pueden hacer ajustes)

## Objetivos del fork
- Documentar el código
- Refactorizarlo
- Implementarlo en uno que otro proyecto

## Lista de cambios
0.3
- Añadido tipo de valor para todos los argumentos de todas las funciones. Los argumentos llamados ```$args``` se definieron como tipo ```array```, todos los demás como ```string```.
- Añadida información del paquete y autor.
- Eliminado (por ahora) ```composer.json```
- Eliminado el contenido de ```.gitignore```

0.2
- Añadido archivo ```example.php``` (por ahora es relativamente inútil, _relativamente_)
- Creditos al pie de página eliminados _(NOTA: mantiene licencia MIT y copia de licencia como archivo)_
- ```init_meta()``` bifurcada en ```set_charset( $charset )``` y ```viewport( $content )```
- ```init_stylesheet()``` es un alias de ```init_cdn_stylesheet()```
- ```init_cdn_stylesheet( $ver )``` CDN cambiado a [jsDelivr ](https://www.jsdelivr.com/); ahora se puede definir la versión de Bootstrap.
- Añadidos espacios en todos los lugares donde me gusta colocar espacios
- Eliminadas las funciones descontinuadas en el proyecto original o sin sentido: ```navbar_finish()``` (descontinuada), ```no_args()``` (inutil), ```text()``` (vacia)