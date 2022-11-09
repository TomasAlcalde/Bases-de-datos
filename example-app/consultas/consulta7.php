<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT Ent.Nombre_evento, COUNT(Ent.id_entrada)
     FROM Entradas AS Ent
     GROUP BY Ent.Nombre_evento
     HAVING COUNT(Ent.id_entrada) >= ALL (SELECT Count(Ent2.id_entrada)
     FROM Entradas AS Ent2
     GROUP BY Ent2.Nombre_evento);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

<div class="container">
  <table class="table table-hover table-bordered">
    <thead class="table-success">
    <tr>
      <th>  Nombre  </th>
      <th>  Entradas vendidas  </th>
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

