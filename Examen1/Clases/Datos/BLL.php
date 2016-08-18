<?php
require_once ('DAL.php');

class BLL extends DAL{
    public function __construct() {
        parent::__construct();
    }
    
    //Función para seleccionar datos
    /*ENTRADAS:
     * comandoSql: sentencia Sql a ejecutar
     * nReg: Número de registros generados
     * tipoDatos: Tipos de datos de los parámetros
     * valores: Valor de los parámetros de la sentencia
     * 
     * SALIDA
     * nReg: Número de registros generados
     * arrDatos: Arreglo con los datos, null si no hay datos
     */
    
    public function seleccionaDatos($comandoSql, &$nReg, $tipoDatos=NULL, $valores=NULL){
        $nReg = 0;
        $arrDatos = NULL;
        try{
            $this->getConexion();
            if(isset($this->conexion)){
                if(!isset($tipoDatos)){
                    //Ejecucion de la consulta sin parámetros
                    $recordSet = $this->conexion->query
                            ($comandoSql);
                }
                else{
                    //Preparación de la sentencia con el comando Sql
                    $asignacion = $this->conexion->stmt_init();
                    $asignacion->prepare($comandoSql);
                    
                    //Generación de los tipos de datos y parámetros
                    $queryParams = array();
                    //Asigna tipos de datos
                    $queryParams[] = $tipoDatos;
                    //Asignación en el arreglo de cada elemento
                    foreach ($valores as $id => $term)
                        $queryParams[] = &$valores[$id];
                    
                    //Asigna a la propiedad bind_params los parámetros
                    call_user_func_array(
					array($asignacion,'bind_param'),$queryParams);
                    //Ejecución de la consulta
                    $asignacion->execute();
                    //Generación de los resultados
                    $recordSet = $asignacion->get_result();
                }
                if($recordSet){
                    $recordSet->data_seek(0);
                    $nReg = $recordSet->num_rows;
                    $arrDatos = $recordSet->fetch_all(MYSQLI_ASSOC);
                    /*while ($registro = $recordSet->fetch_assoc())
                            $arrDato[] = $registro; */
                    //$arrDatos = $recordSet->fetch_array(MYSQLI_ASSOC);
                    $recordSet->free();
                }
                else {
                    trigger_error("Error en la consulta $this->conexion->connect_error", 
                            E_USER_ERROR);
                    throw new Exception("Error en la consulta $this->conexion->connect_error");
                }
            }
        } catch (Exception $ex) {
            $arrDatos = NULL;
        }
        return $arrDatos;
    }
    
    //Función para seleccionar datos
    /*ENTRADAS:
     * comandoSql: Sentencia Sql a ejecutar
     * nReg: Número de registros generados
     * tipoDato: Tipos de datos de los parámetros
     * valores: Valor de los parámetros de la sentencia
     * 
     * SALIDA
     * nReg: Número de registros generados
     * arrDatos: Arreglo con los datos, null si no hay datos
     */
    
    public function seleccionaDatosPar($comandoSql,&$nReg,$tipoDato=NULL, $valores=NULL){
        $nReg = 0;
        $arrDatos = NULL;
        try{
            $this->getConexion();
            if (isset($this->conexion)){
                if(!isset($tipoDato)){
                    //Ejecución de la consulta sin parámetros
                    $recordSet = $this->conexion->query($comandoSql);
                }
                else
                {
                    //Preparación de la sentencia con el comando Sql
                    $asignacion = $this->conexion->stmt_init();
                    $asignacion->prepare($comandoSql);
                    
                    //Generación de los tipos de datos y parámetros
                    $queryParams = array();
                    //Asigna tipos de datos
                    $queryParams[] = $tipoDato;
                    //Asignación en el arreglo de cada elemento
                    foreach ($valores as $id => $term)
                        $queryParams[] = &$valores[$id];
                    
                    //Asigna a la propiedad bind_params los parámetros
                    call_user_func_array(
					array($asignacion,'bind_param'),$queryParams);
                    
                    //Ejecucion de la consulta
                    $asignacion->execute();
                    //Generación de los resultados
                    $recordSet = $asignacion->get_result();
                }
                if($recordSet){
                    $recordSet->data_seek(0);
                    $nReg = $recordSet->num_rows;
                    $arrDatos = $recordSet->fetch_all(MYSQLI_ASSOC);
                    /*while ($registro = $recordSet->fetch_assoc())
                            $arrDatos[] = $registro;*/
                    //$arrDatos = $recordSet->fetch_array(MYSQLI_ASSOC);
                    $recordSet->free();
                }
                else{
                    trigger_error("Error en la consulta 
						$this->conexion->connect_error",
						E_USER_ERROR);
                    throw  new Exception("Error en la consulta 
							$this->conexion->connect_error");
                }
            }
        } catch (Exception $ex) {
            $arrDatos = NULL;
        }
        return $arrDatos;
    }
    
    /*Ejecuta sentencias de Consultas Sql INSERT
     * Con o sin parámetros
     * ENTRADAS:
     * comandoSql: Sentencia INSERT Sql a ejecutar
     * nRef: Número de if generado
     * tipoDato: tipos de datos de los parámetros
     * valores: Valor de los parámetros de la sentencia
     * 
     * SALIDA
     * nReg: Número de id generado
     */
    
    public function insertaDatos($comandoSql, &$nReg, $tipoDato = NULL, $valores=NULL){
        $nReg=0;
        try{
            //Abrir la conexión
            $this->getConexion();
            if (isset($this->conexion)){
                if(!isset($tipoDato)){
                    //Generar la consulta sin uso de parametros
                    $executeProc = $this->conexion->query($comandoSql);
                    $nReg = $this->conexion->insert_id;
                }
                else{
                    //Prepara la consulta
                    $asignacion = $this->conexion->stmt_init();
                    $asignacion->prepare($comandoSql);
                    //Asignar los parámetros y tipos de datos
                    $queryParams = array();
                    $queryParams[] = $tipoDato;
                    foreach ($valores as $id => $term)
                        $queryParams[] = &$valores[$id];
                    //Asignar el parámetro en la propiedad bind_params
                    call_user_func_array(
					array($asignacion,'bind_param'),$queryParams);
                    //Ejecutar la sentencia
                    $asignacion->execute();
                    //Obtener el id generado
                    $nReg = $asignacion->insert_id;
                }
            }
        } catch (Exception $ex) {
            $nReg =-1;
        }
    }
    
    public function eliminaDatos($comandoSql, &$nReg, $tipoDato = NULL, $valores=NULL){
        $nReg=0;
        try{
            //Abrir la conexión
            $this->getConexion();
            if (isset($this->conexion)){
                if(!isset($tipoDato)){
                    //Generar la consulta sin uso de parametros
                    $executeProc = $this->conexion->query($comandoSql);
                    $nReg = $this->conexion->delete_id;
                }
                else{
                    //Prepara la consulta
                    $asignacion = $this->conexion->stmt_init();
                    $asignacion->prepare($comandoSql);
                    //Asignar los parámetros y tipos de datos
                    $queryParams = array();
                    $queryParams[] = $tipoDato;
                    foreach ($valores as $id => $term)
                        $queryParams[] = &$valores[$id];
                    //Asignar el parámetro en la propiedad bind_params
                    call_user_func_array(
					array($asignacion,'bind_param'),$queryParams);
                    //Ejecutar la sentencia
                    $asignacion->execute();
                    //Obtener el id generado
                    $nReg = $asignacion->delete_id;
                }
            }
        } catch (Exception $ex) {
            $nReg =-1;
        }
    }
}
?>

