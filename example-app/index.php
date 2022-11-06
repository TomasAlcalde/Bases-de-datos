<?php include('templates/header.html');   ?>

<body>
  <h1 align="center"> Eventos 22 </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre los eventos disponibles.</p>

  <br>

  <h3 align="center"> ¿Quieres ver el nombre y contacto de las productoras?</h3>

  <form align="center" action="consultas/consulta1.php" method="post">
    <br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>
  

  <h3 align="center"> ¿Quieres ver cuántos eventos hizo cada productora?</h3>
  
  <form align="center" action="consultas/consulta2.php" method="post">
    <br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Ver cuántos fueron los ingresos de un evento?</h3>

  <form align="center" action="consultas/consulta5.php" method="post">
    Nombre_Evento:
    <input type="text" name="Evento">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver cuántos artistas se presentarán en cada evento?</h3>
  
  <form align="center" action="consultas/consulta6.php" method="post">
    <br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>
  
  <h3 align="center"> ¿Quieres ver el evento con más entradas vendidas?</h3>

  <form align="center" action="consultas/consulta7.php" method="post">
    <br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>





  
  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT * FROM eventos;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>
</html>
