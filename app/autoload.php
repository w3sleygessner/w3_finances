<?php

spl_autoload_register(function ($class_name) {
  $archive_path = BASE_DIR . "/" . $class_name . ".php";

  return (file_exists($archive_path)) ? include $archive_path : throw new Exception("Arquivo não encontrado!". $archive_path);
});
