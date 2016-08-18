<div class="container">
    <div class="col-xs-7">
    <h1>Consulta Siniestro</h1>
    <form class="form-horizontal" method="POST" action="ConsultaSiniestro">
        <div class="col-xs-7">
            <label>Número de Poliza</label>
            <input type="text" name="txtIdPoliza" value='' class="form-horizontal"
                   placeholder="Número de la poliza"/><br><br>
            <input type="submit" class="btn btn-primary" value="Buscar Siniestro" 
                   name="btnBuscarSiniestro" /><br><br>
        </div>
    </form>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Id Siniestro</th>
                <th>Poliza</th>
                <th>Ajustador</th>
                <th>Responsable</th>
                <th>Costo Aproximado</th>
                <th>Estatus</th>
                <th>Fecha Accidente</th>
                <th>Observaciones</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($siniestros as $siniestro) {
                echo '<tr><form action="EditarEstatusSiniestro" method="POST">
<td>' . $siniestro->idSiniestro . '</td>
<td>' . $siniestro->poliza . '</td>
<td>' . $siniestro->ajustador . '</td>
<td>' . $siniestro->responsable . '</td>
<td>' . $siniestro->costoAprox . '</td>
<td><select name="dpnEstatus" class="form-control">
                <option>' . $siniestro->estatus . '</option>
                <option>Revisando</option>
                <option>En proceso</option>
                <option>Finalizado</option>
            </select></td>
<td>' . $siniestro->fechaAccidente . '</td>
    <td>' . $siniestro->observaciones . '</td>
    <input type="hidden" name="txtIdSiniestro" width="30" value="' . $siniestro->idSiniestro . '" />
    <td><input class="btn btn-default btn-lg btn-block" type="submit" 
    value="Editar Estatus" name="btnEditarEstatus" /></td></form>
    </tr>';
            }

            echo'</tbody></table>';
            ?>
</div>
            </div>