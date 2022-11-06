<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["Evento"];
  $query = "SELECT Ent.Nombre_evento, SUM(Ing.precio)
            FROM Entradas as Ent LEFT OUTER JOIN Precios as Ing
            ON Ent.Nombre_Evento = Ing.Nombre_Evento and Ent.categoria = Ing.categoria and Ent.tipo = Ing.tipo
            GROUP BY Ent.Nombre_Evento
            HAVING $var ilike Ent.Nombre_Evento;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Nombre evento</th>
      <th>Ingresos por venta de entradas</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>