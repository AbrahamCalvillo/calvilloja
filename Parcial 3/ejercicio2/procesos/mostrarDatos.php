<?php

  require_once "../crud/crud.php";
  $objt = new Crud();
  $datos = $objt->MostrarDatos();

  $tabla = '<table class="table table-dark">
    <thead>
      <tr class="font-weight-bold">
        <td>Nombre</td>
        <td>Puesto</td>
        <td>Turno</td>
        <td>Editar</td>
        <td>Eliminar</td>
      </tr>
    </thead>
    </table>';

    $datosTabla = "";

    foreach ($datos as $key => $value) {
      $datosTabla = $datosTabla.'<tr>
      <td>'.$value['nombre'].'</td>
      <td>'.$value['puesto']'</td>
      <td>'.$value['turno']'</td>
      <td>
      <span class="btn btn-warning btn-sm" onclick="obtenerDatos('..$value['id'].')" data-toggle="modal" data-target="#actualizarModal">
      <i class="fas fa-edit"></i>
      </span>
      </td>
      <td>
      <span class="btn btn-danger" onclick="eliminarDatos('..$value['id'].')">
      <li class="fas fa-trash-alt"></li>
      </span>
      </td>
      </tr>';
    }

    echo $tabla.$datosTabla.'</tbody></table>';

?>
