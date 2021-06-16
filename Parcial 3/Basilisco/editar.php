<?php
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}


		include 'crud/Conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM productos WHERE id = ?;");
		$sentencia->execute([$id]);
		$producto = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>
<body>
  <section class="sec">
      <div class="toggle" onclick="togle();"></div>
        <div class="box">
            <div class="contect">
              <h3>Editar</h3>
              <form method="POST" action="editarProceso.php">
                <table>
                  <tr>
                    <td>Codigo De Barras:</td>
                    <td><input type="text" name="txt2Codigo" value="<?php echo $producto->codigo; ?>"></td>
                  </tr>
                  <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="txt2Nombre" value="<?php echo $producto->nombre; ?>"></td>
                  </tr>
                  <tr>
                    <td>Stock:</td>
                    <td><input type="text" name="txt2Stock" value="<?php echo $producto->stock; ?>"></td>
                  </tr>
									<tr>
                    <td>Precio:</td>
                    <td><input type="text" name="txt2Precio" value="<?php echo $producto->precio; ?>"></td>
                  </tr>
                  <tr>
                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id2" value="<?php echo $producto->id; ?>">
                    <td colspan="2"><input type="submit" value="Cambiar productos" style="margin:18px auto; display:block;"></td>
                  </tr>
                </table>
              </form>
            </div>
        </div>
    </section>
    <script>
        let sec = document.querySelector('.sec');
        let toggle = document.querySelector('.toggle');
        function togle(){
        sec.classList.toggle('dark')
        }
    </script>
</body>
</html>
