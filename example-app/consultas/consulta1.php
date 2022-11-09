<?php include('../templates/header.html');   ?>

<body>
<br>
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
  <div class="container">
  <table class="table table-hover table-bordered">
    <thead class="table-success">
    <tr>
      <th style="width: 70%">Nombre</th>
      <th style="width:70%">Altura</th>
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
    </div>

<?php include('../templates/footer.html'); ?>
