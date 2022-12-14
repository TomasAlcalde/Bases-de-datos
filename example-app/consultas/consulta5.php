<?php include('../templates/header.html');   ?>

<body>
<br>
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["Evento"];
  $query = "SELECT I.Nombre_evento, I.Ingreso FROM (SELECT Ent.Nombre_evento, SUM(Ing.precio) as Ingreso
            FROM Entradas as Ent LEFT OUTER JOIN Precios as Ing
            ON Ent.Nombre_Evento = Ing.Nombre_Evento and Ent.categoria = Ing.categoria and Ent.tipo = Ing.tipo
            GROUP BY Ent.Nombre_Evento) as I WHERE I.Nombre_Evento ilike '$var%';";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<div class="container">
  <table class="table table-hover table-bordered">
    <thead class="table-success">
    <tr>
      <th>  Nombre evento  </th>
      <th>  Ingresos por venta de entradas  </th>
    </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
  }
  ?>
  </tbody>
  </table>

<?php include('../templates/footer.html'); ?>