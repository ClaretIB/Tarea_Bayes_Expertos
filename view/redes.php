<!DOCTYPE html >
<html>
<head>
  <meta charset="UTF-8">
  <title>Tarea 2</title>
  <meta name="description" content="Tarea 1 del curso Sistemas Expertos, basada en el algoritmo de euclides"/>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</head>

  <body onload="cargarRedes()">
        <header>
            <nav class="navbar navbar-inverse" id="navNormal">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">Inicio</a></li>           
                        <li><a href="estiloAprendizaje.php">Estilo de aprendizaje</a></li>
                        <li><a href="profesores.php">Clase de profesor</a></li>
                        <li><a href="redes.php">Clase de red</a></li>
                        <li><a href="recintoEstudiante.php">Recinto del estudiante</a></li>
                        <li><a href="sexoEstudiante.php">Sexo del estudiante</a></li>
                        <li><a href="estiloAprendizajeEstudiante.php">Estilo de aprendizaje del estudiante</a></li>    
                    </ul>
                </div>
            </nav>
        </header>
   
        <section> 
        <h2 style="color: #0080FF">Redes</h2>  
        <br>
        <h4 style="font-weight: bold;">Instrucciones</h4>               
                <p  class="western" align="justify" lang="es-ES"><font size="3">
                Con base en la informacion brindada por el usuario en el siguiente formulario, se calculara el tipo de red. 
                </font></p>
	             <br />
	
           <form name="final" action="estilo.php" method="post">    
            <p class="western" align="justify" lang="es-ES"><font size="3">
                
              <div>Reability:
                <select id="Re" name="Re" value="Re">
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
                      
              <div>Links:
                <select id="Li" name="Li" value="Li">
                </select>
              </div>
                   
              <div>Capacity
                <select id="Ca" name="Ca" value="Ca">
                  <option value="Low">Low</option>
                  <option value="Medium">Medium</option>
                  <option value="High">High</option>
                </select>
              </div>
                 
              <div>Costo
                <select id="Co" name="Co" value="Co">
                  <option value="Low">Low</option>
                  <option value="Medium">Medium</option>
                  <option value="High">High</option>
                </select>
              </div><br>
                           
              El tipo de red es:&nbsp;&nbsp; <span name="Class" id="Class"></span><br><br>
              <input value="Consultar" onclick="calcularRedes()" type="button" class="btn btn-info"/>
              </font>
            </p>
        </form>
      </section>   
</body>
</html>
