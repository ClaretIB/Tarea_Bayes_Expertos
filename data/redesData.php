<?php
include_once "../connection/mysql.php";
   
    $clasification= clasificationRed(array((int)$_REQUEST['Re'], $_REQUEST['Ca'], $_REQUEST['Co'], (int)$_REQUEST['Li']));
    echo $clasification;

/*_______________________________BASE DE DATOS___________________________________*/

/*Hacer consulta a la base y devuelve array de esa consulta*/ 
    function getData($query){
      $connection=  getConnection();
      $answer=  mysqli_query($connection,$query);
      $arraybd=array();    
      while($row = mysqli_fetch_array($answer,MYSQL_ASSOC)){   
        array_push($arraybd, $row);
      }    
      return $arraybd;
    }

/*__________________________________LOGICA_______________________________________*/
/*Segun la informacion dada se calcula probabilidad por medio de bayes para poder clasificar  la clase de red*/
function clasificationRed($puntoA){   

    $probabilityAClass=  getProbabilitiesClass($puntoA, "A");
    $probabilityBClass = getProbabilitiesClass($puntoA, "B");

    $quantityA= getQuantity("class", "A","redes");
    $quantityB= getQuantity("class", "B","redes");

    $totalQuantity = $quantityA+$quantityB;

    $probabilityAArray= getProbabilityArray($probabilityAClass, $totalQuantity, $quantityA);
    $probabilityBArray= getProbabilityArray($probabilityBClass, $totalQuantity, $quantityB);
  
    $clasification="B";
    if($probabilityAArray>$probabilityBArray){
       $clasification="A";
    }
    return $clasification;
}

/*Se obtienen las probabilidades de cada uno de los atributos(fi->base de datos)*/
function getProbabilitiesClass($vector,$clase){
    $probabilitiesArray=array();
    for($i=0;$i<count($vector);$i++){
        
        $varStyle=  ""; 
        switch ($i){
            case 0: $varStyle="reliability"; break;
            case 1: $varStyle="number_of_links"; break;
            case 2: $varStyle="capacity"; break;
            default : $varStyle="costo"; break;
        } 
        $query="select probabilidad from redes_bayes where valor='$vector[$i]' and class='$clase' and fi='$varStyle'";

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