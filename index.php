<?php

$servername = "localhost";
$database = "prueba";
$username = "root";
$password = "";
$charset = "utf8";
$isupdate = 0;


try {
$conexion=mysqli_connect("localhost","root","","prueba");
$db = mysqli_select_db( $conexion, $database );
$dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Connection Okay";

}

catch (PDOException $e)

{
echo "Connection failed:". $e->getMessage();
}


function editar($id) {
     $isupdate = 1; 
 }
 

if(!$isupdate) { ?>   

     <form method="POST" action="index.php">  

     <p>Nombre: <input type="text" name="nombre"></p>  
     <p>Nick <input type="text" name="nickname"></p>  
     <p>Puntuación <input type="text" name="puntuacion"></p>    
     <p><input type="submit" value="Guardar datos"></p>  
        
     </form>
  <?php  } else { ?>
     <form method="POST" action="index.php">  

    <p>Nombre: <input type="text" name="nombre"></p>  
    <p>Nick <input type="text" name="nickname"></p>  
    <p>Puntuación <input type="text" name="puntuacion"></p>    
    <p><input type="submit" value="Actualizar"></p>  
       
</form>  
<?php   }  ?>


<?php
function crear() {
     if(!empty($_POST)){
          $nombre = $_POST['nombre'];
          $nickname = $_POST['nickname'];
          $puntuacion = $_POST['puntuacion'];

          $sql = "INSERT INTO usuarios (nombre, nickname, puntuacion) VALUES ('$nombre', '$nickname', '$puntuacion')";
          try {
               $pdo->exec($sql);
                         
          } catch (PDOException $e) {
               echo "Error: " . $e;
          }
     }
} 


$sql = "SELECT * FROM usuarios ORDER BY puntuacion desc" ;
try{
     $query = $pdo->query($sql);
     
?>
   
    <table>
     <?php while ($fila = $query->fetch()) { ?> 
       <tr>
          <td> <?php echo $fila[0] ?></td>
          <td> <?php echo $fila[1] ?></td>
          <td> <?php echo $fila[2] ?></td>
          <td> <?php echo $fila[3] ?></td>
          
          <td> 
              <a href="<?php editar($fila[0]) ?>"> Editar </a>  
          </td>
       </tr>
     <?php } ?>      

  </table>

<?php
} catch (PDDException $e){
     echo "Error consultando BD" . $e;
}

?>