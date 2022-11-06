<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT Prod.Nombre, Info.Telefono FROM Info_Productoras as Info LEFT OUTER JOIN Productoras as Prod ON Info.id_productora = Prod.id_productora;";

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
      <th style="width: 70%">Nombre</th>
      <th>Altura</th>
    </tr>
  
      <?php
        // echo $productoras;
        foreach ($productoras as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
