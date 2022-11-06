<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT e.Nombre, e.Recinto, e.Fecha_inicio, COUNT(id_artista) as Cantidad 
              FROM Eventos as e LEFT OUTER JOIN Canta_en as art 
              ON e.id_evento = art.id_evento 
              GROUP BY e.id_evento ORDER BY -COUNT(id_artista);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>  Nombre  </th>
      <th>  Recinto  </th>
      <th>  Fecha inicio  </th>
      <th>  Cantidad de artistas  </th>
    </tr>
  
      <?php
        // echo $productoras;
        foreach ($productoras as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

