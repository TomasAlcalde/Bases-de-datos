<?php include('templates/header.html');   ?>

<body>
  <img class="card-img-top" src="img/concierto.jpg"">
  <div class="row">
      <div class="row bg-secondary text-white">
        <br>
        <h2 align="center"> Consultas </h2>
      </div>

      <br>

      <div class="container">

        <br>
        <br>

        <h3 align="center"> ¿Quieres ver el nombre y contacto de las productoras?</h3>
      
        <form align="center" action="consultas/consulta1.php" method="post">
          <br/>
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>
      
        <br>
        <br>
        <br>

        <h3 align="center"> ¿Quieres ver cuántos eventos hizo cada productora?</h3>
  
        <form align="center" action="consultas/consulta2.php" method="post">
          <br/>
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>
      
        <br>
        <br>
        <br>

        <h3 align="center"> ¿Quieres ver el último evento de una productora?</h3>
      
        <?php
          #Primero obtenemos todos los tipos de pokemones
          require("config/conexion.php");
          $result = $db -> prepare("SELECT * FROM Productoras ORDER BY Nombre;");
          $result -> execute();
          $dataCollected = $result -> fetchAll();
        ?>
  
        <form align="center" action="consultas/consulta3.php" method="post">
          
          <div align="center">
            <select class="form-select" name="Productora" style="width:400px">
              <option selected>Seleccione una productora</option>
              <?php
                #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
                foreach ($dataCollected as $d) {
                  echo "<option value=$d[1]>$d[1]</option>";
                }
              ?>
            </select>
          </div>

          <br>
          <br>
  
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>
      
        <br>
        <br>
        <br>
  
        <h3 align="center"> ¿Quieres ver los artistas que han trabajado con una productora?</h3>
    
        <form align="center" action="consultas/consulta4.php" method="post">
          
          <div align="center">
            <select class="form-select" name="Productora" style="width:400px" align="center">
              <option selected>Seleccione una productora</option>
              <?php
                #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
                foreach ($dataCollected as $d) {
                  echo "<option value=$d[1]>$d[1]</option>";
                }
              ?>
            </select>
          </div>
            
          <br>
          <br>
        
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>
    
        <br>
        <br>
        <br>
    
        <h3 align="center"> ¿Ver cuántos fueron los ingresos de un evento?</h3>
      
        <?php
          #Primero obtenemos todos los tipos de pokemones
          require("config/conexion.php");
          $result = $db -> prepare("SELECT * FROM Eventos ORDER BY Nombre;");
          $result -> execute();
          $dataCollected = $result -> fetchAll();
        ?>
        
        <form align="center" action="consultas/consulta5.php" method="post">
        
          <div align="center">
            <select class="form-select" name="Evento" style="width:400px" align="center">
              <option selected>Seleccione un evento</option>
              <?php
                #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
                foreach ($dataCollected as $d) {
                  echo "<option value=$d[1]>$d[1]</option>";
                }
              ?>
            </select>
          </div>

          <br>
          <br>
        
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>

    
        <br>
        <br>
        <br>
      
        <h3 align="center"> ¿Quieres ver cuántos artistas se presentarán en cada evento?</h3>
    
        <form align="center" action="consultas/consulta6.php" method="post">
          <br/>
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>
      
    
        <br>
        <br>
        <br>
      
        <h3 align="center"> ¿Quieres ver el evento con más entradas vendidas?</h3>
      
        <form align="center" action="consultas/consulta7.php" method="post">
          <br/>
          <input type="submit" class="btn btn-success" value="Buscar">
        </form>
      
        <br>
        <br>
        <br>

      </div>
  </div>
</body>