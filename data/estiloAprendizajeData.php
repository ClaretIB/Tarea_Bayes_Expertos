<?php

include_once "../connection/mysql.php";

    $clasification=  clasificationStyle(array((int)$_REQUEST['CA'],(int)$_REQUEST['EC'],(int)$_REQUEST['EA'],(int)$_REQUEST['OR']), "estilo", "recinto_estilo");
    echo $clasification;

 /*_______________________BASE DE DATOS______________________*/

 /*Hacer consulta a la base y devuelve array de esa consulta*/ 
    function getData($query){
        $conexion=  getConnection();
        $answer=  mysqli_query($conexion,$query);
        $arraybd=array();    
        while($row = mysqli_fetch_array($answer,MYSQL_ASSOC)){   
            array_push($arraybd, $row);
        }    
        $datos=  $arraybd;
         return $datos;
    }

/*__________________________LOGICA_________________________*/

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
          case 0: $varstyle="ca"; break;
          case 1: $varstyle="ec"; break;
          case 2: $varstyle="ea"; break;
          default: $varstyle="or_"; break;
        } 
      
        $query="select probabilidad from recinto_estilo_bayes where valor='$arrayConsult[$i]' and class='$style' and fi='$varstyle'";
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

