<?php

/**
 * Description of db
 *
 * @author Carmanu
 */
class db {
    
    private $conexion;
    
    //Metodo para conectar a la DB
    public function conectar()
    {
        if(!isset($this->conexion))
        {
            $this->conexion = (mysql_connect("localhost", "root", "")) or die (mysql_error());
            mysql_select_db("qualityprojects", $this->conexion) or die (mysql_error());
        }
    }
    
    /*
     * Metodo para realizar sentencias SQL
     */
    
    public function consulta($sql)
    {
        $resultado = mysql_query($sql,  $this->conexion);
        if(!$resultado){
            echo 'MySQL ERROR: ' . mysql_error();
            exit;
        }
        
        return $resultado;
    }
    
    /*
     * Metodo para contar el nuemero de resultados.
     */
    
    function numero_de_filas($result){
        if(!is_resource($result))
            return false;
        return mysql_num_rows($result);
    }
    
    /*
     *Volver el resultado de la consulta en array 
     */
    function convertir_array($result){
        if(!is_resource($result))
            return false;
        return mysql_fetch_assoc($result);
    }
    
    /*
     * Cerrar conexion
     */
    
    public function desconectar(){
        mysql_close();
    }
}
