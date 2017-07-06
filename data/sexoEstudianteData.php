<?php
include_once "../connection/mysql.php";
//include_once "estiloAprendizajeEstudianteData";

    $clasification= clasificationSexo(array($_REQUEST['Recinto'],(float)$_REQUEST['Promedio'],$_REQUEST['Estilo']), "sexo", "recinto_sexo_promedio_estilo");
    echo $clasification;
    //insertProbabilitiesTable("recinto_sexo_promedio_estilo", "sexo_promedio_bayes", "promedio");

/*___________________________BASE DE DATOS_____________________________*/


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

/*_________________________________LOGICA_______________________________*/

/*Segun la informacion dada se calcula probabilidad por medio de bayes para poder clasificar el sexo del estudiante*/
    function clasificationSexo(array $datosUsuario,$class,$tabla){

       $probabilityFemeninoClass= getProbabilitiesClass($datosUsuario, "F");
       $probabilityMasculinoClass= getProbabilitiesClass($datosUsuario, "M");
      
       $quantityFemenino= getQuantity($class, "F",$tabla);
       $quantityMasculino= getQuantity($class, "M",$tabla);
       
       $totalQuantity = $quantityFemenino+$quantityMasculino;
       $probabilities=array();
       
       $probabilityFemeninoArray=getProbabilityArray($probabilityFemeninoClass, $totalQuantity, $quantityFemenino);
       $probabilityMasculinoArray=getProbabilityArray($probabilityMasculinoClass, $totalQuantity, $quantityMasculino);
       
       array_push($probabilities,$probabilityFemeninoArray);
       array_push($probabilities,$probabilityMasculinoArray);
      
       /*Obtiene el mayor*/
       $top=0;$clasificationNumber=0;
       for ($i = 0; $i < count($probabilities); $i++) {
          if($probabilities[$i] > $top){
              $top=$probabilities[$i];
              $clasificationNumber=$i;
          }
       }
       switch ($clasificationNumber) {
         case 0: return "F"; break;
         case 1: return "M"; break;
       }
    }

/*Se obtienen las probabilidades de cada uno de los atributos(fi->base de datos)*/
    function getProbabilitiesClass($vector,$clase){
        $probabilitiesArray=array();
        for($i=0;$i<count($vector);$i++){
            
            $varStyle= ""; 
            switch ($i){
              case 0: $varStyle="recinto"; break;
              case 1: $varStyle="promedio"; break;
              default: $varStyle="estilo"; break;
             } 
            $query="select probabilidad from sexo_promedio_bayes where valor='$vector[$i]' and class='$clase' and fi='$varStyle'";
            
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