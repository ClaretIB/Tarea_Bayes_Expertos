<?php
include_once "../connection/mysql.php";
    
    $result= clasificationProfesor( array((int)$_REQUEST['A'],$_REQUEST['B'],$_REQUEST['C'],(int)$_REQUEST['D'],
            $_REQUEST['E'],$_REQUEST['F'],$_REQUEST['G'],$_REQUEST['H']));
    echo $result;

/*_____________________________BASE DE DATOS__________________________*/
    
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

/*______________________________LOGICA_______________________________*/
/*Segun la informacion dada se calcula probabilidad por medio de bayes para poder clasificar  la clase de profesor*/
function clasificationProfesor($datosUsuario){   

   $probabilityBeginnerClass= getProbabilitiesClass($datosUsuario, "Beginner");
   $probabilityIntermediateClass= getProbabilitiesClass($datosUsuario, "Intermediate");
   $probabilityAdvancedClass= getProbabilitiesClass($datosUsuario,"Advanced");

   $quantityBeginer= getQuantity("class", "Beginner","profesores");
   $quantityIntermediate= getQuantity("class", "Intermediate","profesores");
   $quantityAdvanced= getQuantity("class", "Advanced", "profesores");
   
   $totalQuantity = $quantityIntermediate+$quantityBeginer+$quantityAdvanced;

   $probabilities=array();

   $probabilityBeginnerArray=getProbabilityArray($probabilityBeginnerClass, $totalQuantity, $quantityBeginer);
   $probabilityIntermediateArray=getProbabilityArray($probabilityIntermediateClass, $totalQuantity, $quantityIntermediate);
   $probabilityAdvancedArray=getProbabilityArray($probabilityAdvancedClass, $totalQuantity, $quantityAdvanced);
   
   array_push($probabilities,$probabilityBeginnerArray);
   array_push($probabilities,$probabilityIntermediateArray);
   array_push($probabilities,$probabilityAdvancedArray);

   /*Obtiene el mayor*/
   $top=0;$clasificationNumber=0;
   for ($i = 0; $i < count($probabilities); $i++) {
      if($probabilities[$i] > $top){
          $top=$probabilities[$i];
          $clasificationNumber=$i;
      }
   }
   switch ($clasificationNumber) {
     case 0: return "Beginner"; break;
     case 1: return "Intermediate"; break;
     default: return "Advanced"; break;
   }
}

/*Se obtienen las probabilidades de cada uno de los atributos(fi->base de datos)*/
function getProbabilitiesClass($vector,$clase){
    $probabilitiesArray=array();
    for($i=0;$i<count($vector);$i++){
        $varStyle=  ""; 
        switch ($i){
        case 0: 
          $varStyle="a"; 
          break;
        case 1: 
          $varStyle="b"; 
          break;
        case 2: 
          $varStyle="c"; 
          break;
        case 3: 
          $varStyle="d";
          break;
        case 4: 
          $varStyle="e"; 
          break;
        case 5: 
          $varStyle="f"; 
          break;
        case 6: 
          $varStyle="g"; 
          break;
        default : 
          $varStyle="h"; 
          break;
    }
        $query="select probabilidad from profesores_bayes where valor='$vector[$i]' and class='$clase' and fi='$varStyle'";
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