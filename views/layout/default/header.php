
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Framework Basico</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_css"]; ?>bootstrap.min.css">
    <script src="<?php echo $_layoutParams["ruta_js"]; ?>jquery-3.3.1.min.js"></script>
    <script src="<?php echo $_layoutParams["ruta_js"]; ?>bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php  echo APP_URL.'tareas';?>">Gestion de tareas</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php  echo APP_URL.'tareas';?>">Tareas</a></li>
      <li><a href="<?php  echo APP_URL.'categorias';?>">Categorias</a></li>
    </ul>
  </div>
</nav>