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
<style>
  table, th, td {border:1px solid black;}
  th, td{text-align: left;}
  tr:nth-child(even) {background-color: #D6EEEE;}
</style>

  <table>
    <tr>
      <th>  Nombre  </th>
      <th>  Entradas vendidas  </th>
    </tr>
  
      <?php
        // echo $productoras;
        foreach ($productoras as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

