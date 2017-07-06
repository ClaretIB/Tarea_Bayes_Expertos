<?php
include_once "../connection/mysql.php";
//include_once "estiloAprendizajeEstudianteData";

    $clasification= clasificationRecinto(array($_REQUEST['Sexo'],(float)$_REQUEST['Promedio'],$_REQUEST['Estilo']), "recinto", "recinto_sexo_promedio_estilo");
    echo $clasification;
    //insertProbabilitiesTable("recinto_sexo_promedio_estilo", "recinto_promedio_bayes", "promedio");

/*______________________________BASE DE DATOS___________________________*/

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
/*_________________________________LOGICA________________________________*/

/*Segun la informacion dada se calcula probabilidad por medio de bayes para poder clasificar  el recinto del estudiante*/
function clasificationRecinto(array $datosUsuario,$class,$tabla){  
 
   $probabilityParaisoClass= getProbabilitiesClass($datosUsuario, "Paraiso");
   $probabilityTurrialbaClass= getProbabilitiesClass($datosUsuario, "Turrialba");

   $quantityParaiso= getQuantity($class, "Paraiso",$tabla);
   $quantityTurrialba= getQuantity($class, "Turrialba",$tabla);

   $totalQuantity = $quantityParaiso+$quantityTurrialba;

   $probabilities=array();

   $probabilityParaisoArray=getProbabilityArray($probabilityParaisoClass, $totalQuantity, $quantityParaiso);
   $probabilityTurriallbaeArray=getProbabilityArray($probabilityParaisoClass, $totalQuantity, $quantityTurrialba);

   array_push($probabilities,$probabilityParaisoArray);
   array_push($probabilities,$probabilityTurriallbaeArray);

   /*Obtiene el mayor*/
   $top=0;$clasificationNumber=0;
   for ($i = 0; $i < count($probabilities); $i++) {
      if($probabilities[$i] > $top){
          $top=$probabilities[$i];
          $clasificationNumber=$i;
      }
   }
   switch ($clasificationNumber) {
     case 0: return "Paraiso"; break;
     case 1: return "Turrialba"; break;
   }
}

/*Se obtienen las probabilidades de cada uno de los atributos(fi->base de datos)*/
function getProbabilitiesClass($vector,$clase){
    $probabilitiesArray=array();
    for($i=0;$i<count($vector);$i++){
        $varStyle= "";  
        switch ($i){
          case 0: $varStyle="sexo"; break;
          case 1: $varStyle="promedio"; break;
          default: $varStyle="estilo"; break;
        }
        $query="select probabilidad from recinto_promedio_bayes where valor='$vector[$i]' and class='$clase' and fi='$varStyle'";
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