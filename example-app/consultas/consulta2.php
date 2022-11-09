<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT P.Nombre, COUNT(id_evento) as Cantidad_eventos 
              FROM Productoras as P LEFT OUTER JOIN Produce as pe 
              ON P.id_productora = pe.id_productora 
              GROUP BY P.id_productora ORDER BY -COUNT(id_evento);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

<div class="container">
  <table class="table table-hover table-bordered">
    <thead class="table-success">
    <tr>
      <th style="width: 70%">Nombre</th>
      <th>Cantidad de eventos</th>
    </tr>
    </thead>
    <tbody>
      <?php
        // echo $productoras;
        foreach ($productoras as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
