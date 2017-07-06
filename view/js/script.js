/*
  Lo unico que hacen estos metodos es capturar valores de entrada, por ajax mandarlos al data y pintar los valores de salida
  En algunas ocaciones se usa un algoritmo para llear automaticamente los select de la interfaz
*/
function calcularProf(){
        
    a = document.final.A.value; b = document.final.B.value; c = document.final.C.value; d = document.final.D.value; 
    e = document.final.E.value; f = document.final.F.value; g = document.final.G.value; h = document.final.H.value;

    $.ajax({
        url:"../data/profesoresData.php?A="+a+"&B="+b+"&C="+c+"&D="+d+"&E="+e+"&F="+f+"&G="+g+"&H="+h,
        type: "POST", 
        success:function(result) {
        document.getElementById("Class").innerHTML = "El tipo de profesor es: "+result;
        }
    });
}
/*****************/
function calcularEstiloApren(){
    ec =parseInt(document.estilo.c5.value)+
        parseInt(document.estilo.c9.value)+
        parseInt(document.estilo.c13.value)+
        parseInt(document.estilo.c17.value)+
        parseInt(document.estilo.c25.value)+
        parseInt(document.estilo.c29.value);
    or =parseInt(document.estilo.c2.value)+
        parseInt(document.estilo.c10.value)+
        parseInt(document.estilo.c22.value)+
        parseInt(document.estilo.c26.value)+
        parseInt(document.estilo.c30.value)+
        parseInt(document.estilo.c34.value);
    ca =parseInt(document.estilo.c7.value)+
        parseInt(document.estilo.c11.value)+
        parseInt(document.estilo.c15.value)+
        parseInt(document.estilo.c19.value)+
        parseInt(document.estilo.c31.value)+
        parseInt(document.estilo.c35.value);
    ea =parseInt(document.estilo.c4.value)+
        parseInt(document.estilo.c12.value)+
        parseInt(document.estilo.c24.value)+
        parseInt(document.estilo.c28.value)+
        parseInt(document.estilo.c32.value)+
        parseInt(document.estilo.c36.value);

        caec = ca-ec;
        eaor = ea-or;
              

        document.final.EC.value = ec;
        document.final.RO.value = or;
        document.final.CA.value = ca;
        document.final.EA.value = ea;
        document.final.CAEC.value = caec;
        document.final.EAOR.value = eaor;
                  
        $.ajax({
            url:"../data/estiloAprendizajeData.php?CA="+ca+"&EC="+ec+"&EA="+ea+"&OR="+or, 
            type: "POST",
            success:function(result){  
            document.getElementById("ESTILOFINAL").innerHTML = "El estilo de aprendizaje es: "+result;
            }
        });
}
/****************************/
    function calcularAprenEstu(){
          recinto =document.final.recinto.value;
          promedio=parseFloat(document.final.enteros.value+"."+document.final.decimales.value);
          sexo=document.final.sex.value;

          $.ajax({
          url:"../data/estiloAprendizajeEstudianteData.php?Sexo="+sexo+"&Recinto="+recinto+"&Promedio="+promedio, //the page containing php script
          type: "POST",
          success:function(result) {
                        document.getElementById("estilo").innerHTML = result;
                      }
                  });
    }

    function cargarAprenEstu(){
        var enteros=document.getElementById("enteros");
        var decimales=document.getElementById("decimales");
        var i=10;
        var j=0;      
        while(i>=6){         
        enteros.options.add(new Option(i,i));
        i-=1;
        }   
        while(j<100){         
        decimales.options.add(new Option(j,j));
        j+=25;/*Cambiar por 1*/
        }
    }
      
      
    function SeleccionarAprenEstu(){
      var lista=document.getElementById("enteros")
      var deci=document.getElementById("decimales")
      var sel=lista.options[lista.selectedIndex].value
   
      if(sel==10){
       deci[0].selected = true;
       document.getElementById("decimales").disabled = true;
      }else{
       document.getElementById("decimales").disabled = false;
      }   
    }
    /*******************/
    function calcularRecintoEstu(){
    
        sexo =document.final.sex.value;
        promedio=parseFloat(document.final.enteros.value+"."+document.final.decimales.value);
        estilo=document.final.ESTILOFINAL.value;

        $.ajax({
            url:"../data/recintoEstudianteData.php?Sexo="+sexo+"&Promedio="+promedio+"&Estilo="+estilo, //the page containing php script
            type: "POST", 
            success:function(result){
            
              document.getElementById("Recinto").innerHTML = result;
            }
        });
    }


  function cargarRecintoEstu(){
      var enteros=document.getElementById("enteros");
      var decimales=document.getElementById("decimales");
      var i=10;
      var j=0;      
      while(i>=6){         
          enteros.options.add(new Option(i,i));
          i-=1;
      }   
      while(j<100){         
          decimales.options.add(new Option(j,j));
          j+=25;/*cambiar por 1*/
      }
    }
    
    
    function SeleccionarRecintoEstu(){
        var lista=document.getElementById("enteros")
        var deci=document.getElementById("decimales")
        var sel=lista.options[lista.selectedIndex].value
     
        if(sel==10){
         deci[0].selected = true;
         document.getElementById("decimales").disabled = true;
        }else{
         document.getElementById("decimales").disabled = false;
        }
    }
  /***********************/
      function calcularRedes(){
        re = document.final.Re.value;
        ca = document.final.Ca.value;
        co = document.final.Co.value;
        li = document.final.Li.value;

      $.ajax({
        url:"../data/redesData.php?Re="+re+"&Ca="+ca+"&Co="+co+"&Li="+li, 
        type: "POST", 
        success:function(result) {
          document.getElementById("Class").innerHTML = result;
        }
       });
    }

    function cargarRedes(){
      var links=document.getElementById("Li");
      var j=7;          
      while(j<=20){         
        links.options.add(new Option(j,j));
        j+=25;/*cambiar por 1*/
      }
    }
    /********************************/
    function calcularSexoEstu(){
    
        recinto =document.final.recinto.value;
        promedio=parseFloat(document.final.enteros.value+"."+document.final.decimales.value);
        estilo=document.final.ESTILOFINAL.value;

        $.ajax({
        url:"../data/sexoEstudianteData.php?Recinto="+recinto+"&Promedio="+promedio+"&Estilo="+estilo, 
        type: "POST", 
        success:function(result) {
                        sexo = "";
                        if (result == "M") {
                            sexo = "Masculino";
                        } else if(result == "F") {
                            sexo = "Femenino";
                        }else{
                          sexo = result;
                        }
                        document.getElementById("sex").innerHTML = sexo;
                    }
                });
}


  function cargarSexoEstu(){
      var enteros=document.getElementById("enteros");
      var decimales=document.getElementById("decimales");
      var i=10;
      var j=0;      
      while(i>=6){         
      enteros.options.add(new Option(i,i));
      i-=1;
      }   
      while(j<100){         
      decimales.options.add(new Option(j,j));
      j+=1;
      }
    }
    
    
    function SeleccionarSexoEstu(){
    var lista=document.getElementById("enteros")
    var deci=document.getElementById("decimales")
    var sel=lista.options[lista.selectedIndex].value
 
    if(sel==10){
     deci[0].selected = true;
     document.getElementById("decimales").disabled = true;
    }else{
     document.getElementById("decimales").disabled = false;
    }
      
  }