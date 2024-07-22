<?php
//https://getbootstrap.com/docs/5.0/components/modal/
include_once('conex.php');
header('Content-Type: text/html; charset='.$charset);
header('Cache-Control: no-cache, must-revalidate');
session_name($session_name);
session_start();
$conn=Conectarse();
switch ($_REQUEST['action']) 
{
    case 'crgrDepto':
        $jTableResult = array();                
        $jTableResult['listDepto']="";
        $jTableResult['listDepto']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT cod_dpto, nombre_dpto FROM departamentos";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listDepto'].="<option value='".$registro['cod_dpto']."'>".$registro['nombre_dpto']."</option>";
        }       
        print json_encode($jTableResult);
    break;
    case 'crgrTiposDoc':
        $jTableResult = array();                
        $jTableResult['lisTiposD']="";
        $jTableResult['lisTiposD']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_doc, nombre FROM tipodocumento";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposD'].="<option value='".$registro['id_doc']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'CrgrTipoGenero':
        $jTableResult = array();                
        $jTableResult['lisTiposG']="";
        $jTableResult['lisTiposG']="<option value='0' selected >seleccione:.</option>";
        $query = "SELECT id_genero, nombre FROM genero ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado)) {
            // Agregar los radio buttons al resultado
            $jTableResult['lisTiposG'] .= "<option value='".$registro['id_genero']."'>".$registro['nombre']."</option>";
        }
        // Devolver el resultado como JSON
        print json_encode($jTableResult);
        break;
    case 'crgrMuni':
        $jTableResult = array();                
        $jTableResult['listMuni']="";
        $jTableResult['listMuni']="<option value='0' selected >seleccione.</option>";
        $query="SELECT cod_municipio, nombre_municipio FROM municipios WHERE cod_dpto='".$_POST['cod_dpto']."'";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listMuni'].="<option value='".$registro['cod_municipio']."'>".$registro['nombre_municipio']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrPoblados':
        $jTableResult = array();                
        $jTableResult['listPoblado']="";
        $jTableResult['listPoblado']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT cod_poblado, nombre_poblado FROM poblados WHERE cod_municipio='".$_POST['cod_municipio']."'";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listPoblado'].="<option value='".$registro['cod_poblado']."'>".$registro['nombre_poblado']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'CrgrEmpresa':
        $jTableResult = array();                
        $jTableResult['listEmpresa']="";
        $jTableResult['listEmpresa']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_empresa, nombre FROM empresa ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listEmpresa'].="<option value='".$registro['id_empresa']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break; 
    case 'CrgrArea':
        $jTableResult = array();                
        $jTableResult['listArea']="";
        $jTableResult['listArea']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_area, nombre FROM area ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listArea'].="<option value='".$registro['id_area']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break; 
    case 'CrgrCompetencia':
        $jTableResult = array();                
        $jTableResult['listCmpt']="";
        $jTableResult['listCmpt']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_competencia, nombre FROM competencia ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listCmpt'].="<option value='".$registro['id_competencia']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break; 
    case 'CrgrRA':
        $jTableResult = array();                
        $jTableResult['listRa']="";
        $jTableResult['listRa']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_resultado_aprendizaje, nombre FROM resultadosaprendizaje WHERE id_competencia= '".$_POST['id_competencia']."' ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listRa'].="<option value='".$registro['id_resultado_aprendizaje']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break; 
    case 'CrgrTipoEmpresa':
        $jTableResult = array();                
        $jTableResult['listEmpresa']="";
        $jTableResult['listEmpresa']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT nombre, id_tipoempresa FROM tipoempresa ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listEmpresa'].="<option value='".$registro['id_tipoempresa']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrSolicitante':
        $jTableResult = array();                
        $jTableResult['listSolicitante']="";
        $jTableResult['listSolicitante']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_userprofile, nombre, nombre_dos, apellido FROM userprofile WHERE id_empresa='".$_POST['id_empresa']."'";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listSolicitante'].="<option value='".$registro['id_userprofile']."'>".$registro['nombre']."".$registro['nombre_dos']."".$registro['apellido']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrResponsable':
        $jTableResult = array();                
        $jTableResult['listResponsable']="";
        $jTableResult['listResponsable']="<option value='0' selected >seleccione:.</option>";
        $id_solicitud = $_POST['id_solicitud'];
        $query="SELECT  userprofile.id_userprofile, userprofile.nombre, userprofile.nombre_dos, userprofile.apellido 
        FROM userprofile 
        WHERE userprofile.id_rol = '2'; ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listResponsable'].="<option value='".$registro['id_userprofile']."'>".$registro['nombre']."".$registro['nombre_dos']."".$registro['apellido']."</option>";
        }
        print json_encode($jTableResult);
    break; 
    case 'crgrEstado':
        $jTableResult = array();                
        $jTableResult['listEstado']="";

        $query="SELECT id_estado, nombre FROM estado";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['listEstado'].="<option value='".$registro['id_estado']."'>".$registro['nombre']."</option>";
        }       
        print json_encode($jTableResult);
    break;
    case 'crgrTiposJornada':
        $jTableResult = array();                
        $jTableResult['lisTiposJ']="";
        $jTableResult['lisTiposJ']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_jornada, nombre FROM jornada";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposJ'].="<option value='".$registro['id_jornada']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrTiposModalidad':
        $jTableResult = array();                
        $jTableResult['lisTiposM']="";
        $jTableResult['lisTiposM']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_modalidad, nombre FROM modalidad";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposM'].="<option value='".$registro['id_modalidad']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrTiposNivelFormacion':
        $jTableResult = array();                
        $jTableResult['lisTiposNF']="";
        $jTableResult['lisTiposNF']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_nivel_formacion, nombre FROM nivelformacion";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposNF'].="<option value='".$registro['id_nivel_formacion']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrTiposprogramaFormacion':
        $jTableResult = array();                
        $jTableResult['lisTiposPF']="";
        $jTableResult['lisTiposPF']="<option value='0' selected >seleccione:.</option>";
        $query="SELECT id_programaformacion, nombre FROM programaformacion";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposPF'].="<option value='".$registro['id_programaformacion']."'>".$registro['nombre']."</option>";
        }
        print json_encode($jTableResult);
    break;
    case 'crgrTipoCategoria':
        $jTableResult = array();                
        $jTableResult['lisTiposC']="";
        $query="SELECT id_categoria, nombre FROM categoria";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposC'].="<option value='".$registro['id_categoria']."'>".$registro['nombre']."</option>";
        }       
        print json_encode($jTableResult);
    break;
    // REVISAR CAMILO EL ROL
    case 'crgrTipoRol2':
        $jTableResult = array();                
        $jTableResult['lisTiposR']="";
        $query="SELECT id_rol, nombre FROM rol";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado))
        {
            $jTableResult['lisTiposR'].="<option value='".$registro['id_rol']."'>".$registro['nombre']."</option>";
        }       
        print json_encode($jTableResult);
    break;
    case 'crgrTipoRol':
        $jTableResult = array();                
        $jTableResult['lisTiposR']="";
        $query = "SELECT id_rol, nombre FROM rol ";
        $resultado = mysqli_query($conn, $query);
        while($registro = mysqli_fetch_array($resultado)) {
            // Agregar los radio buttons al resultado
            $jTableResult['lisTiposR'] .= "<input type='radio' name='tipo_rol' value='" . $registro['id_rol'] . "'>" . $registro['nombre'] . "<br>";
        }
        // Devolver el resultado como JSON
        print json_encode($jTableResult);
    break;
    
}
mysqli_close($conn);
?>