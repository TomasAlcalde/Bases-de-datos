<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["Productora"];
  $query = "SELECT Art.nombre, Art.telefono
            FROM Artistas as Art, Canta_en as C, (
                SELECT Pr.id_evento
                FROM Produce as Pr, Productoras as P
                WHERE Pr.id_productora = P.id_productora and P.nombre ilike '%$var%') as E
                WHERE Art.id_artista = C.id_artista and E.id_evento = C.id_evento;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
<style>
  table, th, td {border:1px solid black;}
  th{text-align: center;}
  td{text-align: left;}
  tr:nth-child(even) {background-color: #D6EEEE;}
</style>

  <table>
    <tr>
      <th>  Nombre artista  </th>
      <th>  Telefono  </th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
