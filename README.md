Debug
=====

Comando var_dump() personalizado.


INSTALACIÓN
===========

PREREQUISITOS: Instalar o tener preinstaldo composer en el proyecto

LINUX
    curl -sS https://getcomposer.org/installer | php
WINDOWS
    C:\> php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer '));"

Configurar el archivo composer.json de la siguiente manera

{
  "repositories": [
      {
          "type": "git",
          "url": "https://github.com/marcelogaguero/Debug.git"
      }
  ],

  "require": {
     "mga/dump": "master"
  },

  "minimum-stability": "dev"
}

COMO USARLO?
===========

Ejemplo de uso

<?php

require_once("vendor/autoload.php");

$obj = new stdClass();

$obj->a = 1;
$obj->b = 2;
$obj->c = function(){

};

Dump::debug($obj);

?>