<div class="container">
    <div class="col-xs-7">
    <h1>Consulta Polizas</h1>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Id Poliza</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Aseguradora</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Año</th>
                <th>Placas</th>
                <th></th></tr>
        </thead>
        <tbody>
            <?php
            foreach ($polizas as $poliza) {
                echo '<form action="EditarPoliza" method="POST"><tr>
<td><input type="text" name="txtIdPoliza" width="30" value="' . $poliza->idPoliza . '" /></td>
<td>' . $poliza->nombre . '</td>
<td>' . $poliza->correo . '</td>
<td>' . $poliza->telefono . '</td>
<td>' . $poliza->direccion . '</td>
<td>' . $poliza->aseguradora . '</td>
<td>' . $poliza->marca . '</td>
    <td>' . $poliza->modelo . '</td>
        <td>' . $poliza->color . '</td>
            <td>' . $poliza->anio . '</td>
                <td>' . $poliza->placas . '</td>
    <td><input class="btn btn-default btn-lg btn-block" type="submit" 
    value="Editar" name="btnEditar" /></td>
</tr></form>';
            }

            echo'</tbody></table>';
            ?>
            </div>
            </div>