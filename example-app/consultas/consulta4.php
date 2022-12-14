<?php include('../templates/header.html');   ?>

<body>
<br>
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

<div class="container">
  <table class="table table-hover table-bordered">
    <thead class="table-success">
    <tr>
      <th>  Nombre artista  </th>
      <th>  Telefono  </th>
    </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
  }
  ?>
  </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
