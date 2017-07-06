<?php

include_once "../connection/mysql.php";

    $clasification= clasificationStyle(array($_REQUEST['Sexo'],$_REQUEST['Recinto'],(float)$_REQUEST['Promedio']), "estilo", "recinto_sexo_promedio_estilo");
    echo $clasification;

/*___________________________BASE DE DATOS________________________*/

/*Hace la consulta que se le hace a la BD y devuelve el arreglo de la consulta*/
    function getData($query){
        $connection=  getConnection();
        $answer=  mysqli_query($connection,$query);
        $arraybd=array();    
        while($row = mysqli_fetch_array($answer,MYSQL_ASSOC)){   
            array_push($arraybd, $row);
        }    
        return $arraybd;
    }

/*________________________________LOGICA______________________________*/

/*Segun la informacion dada se calcula probabilidad por medio de bayes para poder clasificar  el estilo de aprendizaje*/
function clasificationStyle(array $datosUsuario,$class,$tabla){  

   $probabilityAcomodadorClass= getProbabilitiesClass($datosUsuario, "ACOMODADOR");
   $probabilityAsimiladorClass= getProbabilitiesClass($datosUsuario, "ASIMILADOR");
   $probabilityConvergenteClass= getProbabilitiesClass($datosUsuario,"CONVERGENTE");
   $probabilityDivergenteClass= getProbabilitiesClass($datosUsuario,"DIVERGENTE");

   $quantityAcomodador= getQuantity($class, "ACOMODADOR",$tabla);
   $quantitAsimilador= getQuantity($class, "ASIMILADOR",$tabla);
   $quantitConvergente= getQuantity($class, "CONVERGENTE",$tabla);
   $quantitDivergente= getQuantity($class, "DIVERGENTE",$tabla);
   
   $totalQuantity = $quantityAcomodador+$quantitAsimilador+$quantitConvergente+$quantitDivergente;
   
   $probabilities=array();
   
   $probabilityAcomodadorArray=getProbabilityArray($probabilityAcomodadorClass, $totalQuantity, $quantityAcomodador);
   $quantitAsimilador=getProbabilityArray($probabilityAsimiladorClass, $totalQuantity, $quantitAsimilador);
   $quantitConvergente=getProbabilityArray($probabilityConvergenteClass, $totalQuantity, $quantitConvergente);
   $quantitDivergente=getProbabilityArray($probabilityDivergenteClass, $totalQuantity, $quantitDivergente);
   
   array_push($probabilities,$probabilityAcomodadorArray);
   array_push($probabilities,$quantitAsimilador);
   array_push($probabilities,$quantitConvergente);
   array_push($probabilities,$quantitDivergente);

   $top=0;$clasificationNumber=0;
   for ($i = 0; $i < count($probabilities); $i++) {
      if($probabilities[$i] > $top){
          $top=$probabilities[$i];
          $clasificationNumber=$i;
      }
   }
   switch ($clasificationNumber) {
     case 0: return "Acomodador"; break;
     case 1: return "Asimilador"; break;
     case 2: return "Convergente"; break;
     default: return "Divergente"; break;
   }
}

/*Se obtienen las probabilidades de cada uno de los atributos(fi->base de datos)*/
function getProbabilitiesClass($arrayConsult,$style){
    
    $probabilitiesArray=array();
    for($i=0;$i<count($arrayConsult);$i++){
        $varstyle= "";  
        switch ($i){
          case 0: $varstyle="sexo"; break;
          case 1: $varstyle="recinto"; break;
          default: $varstyle="promedio"; break;
        }

        $query="select probabilidad from estilo_promedio_bayes where valor='$arrayConsult[$i]' and class='$style' and fi='$varstyle'";
        $probabilityQueryDB=  getData($query);      
  
            foreach ($probabilityQueryDB as $row) {
                $styleProbability = (float) $row['probabilidad'];
                array_push($probabilitiesArray, $styleProbability);
            }
        }
    return $probabilitiesArray;
}

 /*determina cual es el valor de la probabilidad de un vector*/
function getProbabilityArray($arrayProbability,$totalQuantity,$quantityPerStyle){
    $probability=1;
    for ($i = 0; $i < count($arrayProbability); $i++) {     
            $probability*=(float)$arrayProbability[$i];      
    }
    $arrayProbabilityResult=(float)$quantityPerStyle/$totalQuantity;
    return $probability*$arrayProbabilityResult;
}


/*Contar cantidad de registros segun la clase de una tabla*/
function getQuantity($type,$class,$table){
      $query="select count(*) from $table where $type='$class';";
      $getQuantityData=array();
      $getQuantityData= getData($query);    
      foreach ($getQuantityData as $row) {
       $amount=(int)$row['count(*)'];
      }
      return $amount;
    }

/*__________________________PROBABILIDADES TABLA BD_________________________*/ 
//Esto se utilizo para llenar las probabilidades de los diferentes datos

/*function insertProbabilitiesTable($tablaAconsultar, $tablaParaProbabilidades, $campoConsulta) {

    $probabilityAttribute = 0;
    switch ($campoConsulta) {
      case 'recinto': $probabilityAttribute = 0.5; break;
      case 'estilo': $probabilityAttribute = 0.25; break;
      default: $probabilityAttribute = 0.05; break;
    }

    $arrayDataBD = array();
    $arrayDataBD = querys($tablaAconsultar, $campoConsulta);
    //arreglo que contiene la probabilida de cada fila de la tabla
    $arrayDataBD = probabilidadConBayes($tablaAconsultar, $campoConsulta, $arrayDataBD, 3, $probabilityAttribute);
    // insert($tablaParaProbabilidades, $arrayDataBD);
}

function querys($tablaData, $campoConsulta) {
    $class = "estilo";//cambiar por sexo, recinto para las demas
  
    $dataResultQuery = array(); 
    for ($i = 0; $i < 4; $i++) {//cambiar a 2 para las demas el fin
        $estilo = "";
        switch ($i) {
          case 0: $estilo = "ACOMODADOR"; break;// cambiar  $estilo = "F";
          case 1: $estilo = "ASIMILADOR"; break;// cambiar $estilo = "M";    
          case 2: $estilo = "CONVERGENTE"; break;
          default : $estilo = "DIVERGENTE"; break;
        }
            $nota = 6;
        while ( $nota < 10.1) {
            for ($u=0; $u < 100; $u++) { 
                $notaConDecimales= $nota.".".$u;//cambiar si se quiera hacer por rangos poner 0.25
                $consultQuery = array();
                $query = "select count(*) from $tablaData where $campoConsulta = $notaConDecimales and  $class = '$estilo' ;";//cambiar consulta con rangos 
                $consultQuery = getData($query);
                if ($consultQuery == null) {
                    $consultQuery = array([$campoConsulta], [$class], ['count(*)']);
                    $consultQuery[$campoConsulta] = $nota;
                    $consultQuery[$class] = $estilo;
                    $consultQuery['count(*)'] = 0;
                    array_push($dataResultQuery, $consultQuery);
                } else {
                    $dataResultQuery = fillArray($dataResultQuery, $consultQuery,$campoConsulta,$class,$estilo,$notaConDecimales);
                }
            }
             $nota++;
        }
    }
    return $dataResultQuery;
}

//se calcula el metodo para bayes
function probabilidadConBayes($tablaConsulta, $campoConsulta, $arrayBD, $numeroCampos, $probabilityAttribute) {
    $arrayProbabilidades = array();
    foreach ($arrayBD as $row) {
        $arrayCont = array();
        $amountcol = (int) $row['count(*)'];
        $contenido = $row[$campoConsulta];
        $clase = $row['estilo'];
        $amount = "";
        $query = "select count(*) from $tablaConsulta where estilo='$class';";
        $resultAmount = array();
        $resultAmount = getData($query);
        foreach ($resultAmount as $row) {
            $amount = (int) $row['count(*)'];
        }
        //BAYES 
        $probabilidad =(float) ($amountcol+($numeroCampos*$probabilityAttribute))/($amount + $numeroCampos);
        array_push($arrayCont, $campoConsulta); array_push($arrayCont, $contenido);
        array_push($arrayCont, $clase); array_push($arrayCont, (float) $probabilidad);
        array_push($arrayProbabilidades, $arrayCont);
    }
    return $arrayProbabilidades;
}

//llena datos del array que se extrajo de la base de datos hacia un array 
function fillArray($dataResultQuery, $consultQuery,$campoConsulta,$class,$estilo,$notaConDecimales) {
    foreach ($consultQuery as $row) {
       $consultQuery = array([$campoConsulta], [$class], ['count(*)']);
       $consultQuery[$campoConsulta] = $notaConDecimales;
       $consultQuery[$class] = $estilo;
       $consultQuery['count(*)'] = $row['count(*)'];
        array_push($dataResultQuery, $consultQuery);
    }
    return $dataResultQuery;
}

function insert($tablaAconsultar, $datos) {
    $connection = getConnection();
    foreach ($datos as $row) {
        $query = "insert into $tablaAconsultar (fi,valor,class,probabilidad)"
        ."values('".$row[0]."','".$row[1]."','".$row[2]."',".$row[3].")";
        $answer = mysql_query($query, $connection);
        if (!$answer) {
            die('Error: ' . mysql_error());
        }
    }
}
  */