<div class="container">
    <form class="form-horizontal" method="POST" action="Taller">
        <div class="col-xs-7">
            <h1>Taller</h1>
            <h2>Buscar por: </h2>
            <label>Número de Poliza</label>
            <input type="text" name="txtIdPoliza" value='' class="form-control"
                   placeholder="Escribe el número de la poliza"/><br>
            <label>Id Siniestro</label>
            <input type="text" name="txtIdSiniestro" class="form-control" 
                   placeholder="Escribe el id del siniestro"/><br>
            <input type="submit" class="btn btn-primary" value="Buscar Parte Dañada" 
                   name="btnBuscarParteDaniada" /><br>
        </div>
    </form>
    <div class="col-xs-7">
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>Id Parte Dañada</th>
                    <th>Parte</th>
                    <th>Siniestro</th>
                    <th>Poliza</th>
                    <th>Tipo de Daño</th>
                    <th>Nivel de Daño</th>
                    <th>Estatus</th>
                    <th>Costo</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($partesDanios as $parteDanio) {
                    echo "
                <form method='POST' action='EditarParte'><tr>
                    <td>$parteDanio->idPartesDaniadas</td>
                    <td>$parteDanio->parte</td>
                    <td>$parteDanio->siniestro</td>
                    <td>$parteDanio->poliza</td>
                    <td>$parteDanio->tipoDanio</td>
                    <td>$parteDanio->nivel</td>
                    <td><select name='estatus'>
                    <option>$parteDanio->estatus</option>
                    <option>Revisando</option>
                    <option>En Proceso</option>
                    <option>Finalizando</option>
                    </select></td>
                    <td><input type='text' name='txtCosto' value='$parteDanio->costo' /></td>
                    <td>$parteDanio->observaciones</td>
                    <td><input type='hidden' name='txtIdDaniadas' value='$parteDanio->idPartesDaniadas' />
                    <input type='submit' class='btn btn-primary' 
                    value='Editar Parte' name='btnEditarParte' /></td>
                </tr></form>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>