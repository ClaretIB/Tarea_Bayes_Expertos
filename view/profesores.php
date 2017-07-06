<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tarea 2</title>
        <meta name="description" content="Tarea 1 del curso Sistemas Expertos, basada en el algoritmo de euclides"/>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="css/estilo.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
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
        <h2 style="color: #0080FF">Tipo de profesor</h2>
        <br>
        <h4 style="font-weight: bold;">Instrucciones</h4>
            <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3" >
                Segun la informacion que ingrese el usuario se clasificara el profesor por los siguienes tipos: (beginner, intermediate, advanced).</font></font>
            </p><br>
            
            <form name="final" action="estilo.php" method="post">    
                 <strong><font size="3">Demographic</font></strong><br>
                <font size="3">Age:<select id="A" name="A" value="A">
                <option value="1">  teacher’s age  30 </option>
                <option value="2"> teacher’s age > 30 AND < 55  </option>
                <option value="3"> teacher’s age > 55 </option>
                    </select><br>
                    
                Gender:<select id="B" name="B" value="B">
                <option value="F">Female</option>
                <option value="M">Male</option>
                <option value="NA">Not available</option>
                </select><br>
                 
                        <strong>Background</strong><br>
                Teacher’s self-evaluation of his skill or experience teaching the selected subject.<br>
                <select id="C" name="C" value="C">
                <option value="B">Beginner </option>
                <option value="I">Intermediate </option>
                <option value="A">Advanced</option>
                </select><br>
                
                Number of times the teacher has taught this type of course.<br>
                <select id="D" name="D" value="D">
                <option value="1">Never</option>
                <option value="2">1 to 5 times </option>
                <option value="3">more than 5 times</option>
                </select><br>
                        
                Teacher’s background discipline or area of expertise<br>
                <select id="E" name="E" value="E">
                <option value="DM">Decision-making </option>
                <option value="ND">Network design </option>
                <option value="O">Other</option>
                </select><br>
                
                 Teacher’s skills using computers.<br>      
                 <select id="F" name="F" value="F">
                 <option value="L"> Low</option>
                 <option value="A">Average</option>
                 <option value="H">High</option>
                 </select><br>  
                         
                 Teacher’s experience using Web-based technology for teaching.<br>
                 <select id="G" name="G" value="G">
                 <option value="N">Never</option>
                 <option value="S">Sometimes</option>
                 <option value="O">Often </option>
                 </select><br> 
                         
                 Teacher’s experience using this Web site.<br>
                 <select id="H" name="H" value="H">
                 <option value="N">Never</option>
                 <option value="S">Sometimes</option>
                 <option value="O">Often </option>
                 </select><br><br>
                
                 <input value="Consultar" onclick="calcularProf()" type="button" class="btn btn-info"/>
                 <br><br>
                 <span name="Class" id="Class"></span>
                  </font>
            </form>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script> 
    </body>
</html>
