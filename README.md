
# Magento JR para Popoyan

Esto es una breve explicación de la instalación de los complementos a un proyecto de Magento.




## Pre-requisitos

* Tener previamente instalado Magento 2.4.x.
* La versión utilizada en este proyecto es: 2.4.7-p1.
* Tener permisos de escritura en las carpetas seleccionadas.
* Si la versión de Magento es funcional revisar que no se tenga la última versión de Elasticsearch, se utilizó una versión estable (7.17).

# Pasos de importación:

## 1. Clone el repositorio dentro de su directorio o a una carpeta local.


* Cambie al repositorio actual de magento, clone el repositorio.
* O descargué el zip y extraiga el contenido de la carpeta.
* Combine los directorios y archivos con ya existentes.

## 2. Actualice configuración de magento

Ubiquese en la carpeta del directorio de su magento, corra el siguiente comando mediante su terminal de confianza:

```bash
  php bin/magento setup:upgrade
```

## 3. Agregue configuración de inyección de depencias en el archivo di.xml

```bash
  php bin/magento setup:di:compile
```

## 4. Limpie la caché de almacenamiento 

```bash
  php bin/magento cache:clean
```

## 5. Reinicie la caché de archivos estáticos

```bash
  php bin/magento setup:static-content:deploy -f
```

Al terminar estos pasos, ya deberia tener disponible:

* La página /featured-products
* La etiqueta de articulo nuevo para agregados recientemente.
* El nuevo tema Vendor Custom Theme.


## Feedback

Cualquier consulta por favor escribirme a wmauriciopro@gmail.com. Para el presente proyecto se han usado nombres estandar en el desarrollo de proyectos Magento.


## Documentation

[Documentación oficial de magento](https://developer.adobe.com/commerce/frontend-core/guide/)

