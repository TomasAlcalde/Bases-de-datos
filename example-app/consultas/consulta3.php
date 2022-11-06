<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["Productora"];
  $query = "SELECT E.nombre, E.recinto, E.Fecha_inicio, E.Fecha_termino
            FROM (SELECT E2.nombre, E2.recinto, E2.Fecha_inicio, E2.Fecha_termino
                  FROM Eventos as E2, Produce as pr, Productoras as P
                  WHERE E2.id_evento = pr.id_evento and P.id_productora = pr.id_productora and P.Nombre ilike '%$var%') as E
            WHERE E.Fecha_inicio >= ALL (
                  SELECT E3.Fecha_inicio
                  FROM Eventos as E3, Produce as pr, Productoras as P
                  WHERE E3.id_evento = pr.id_evento and P.id_productora = pr.id_productora and P.Nombre ilike '%$var%');";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
<style>
  table, th, td {border:1px solid black;}
  th, td{text-align: left;}
  tr:nth-child(even) {background-color: #D6EEEE;}
</style>

  <table>
    <tr>
      <th>  Nombre evento  </th>
      <th>  Recinto  </th>
      <th>  Fecha inicio  </th>
      <th>  Fecha término  </th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>