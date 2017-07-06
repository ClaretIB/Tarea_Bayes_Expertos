<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Calculo de distancias</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>  
</head>

<body onload="cargarAprenEstu()">
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
          <h2 style="color: #0080FF">Estilo de Aprendizaje del estudiante</h2>
          <br>
           <h4 style="font-weight: bold;">Instrucciones</h4>
        <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3" >
                Con base en el recinto, el sexo y el promedio de matricula ingresados por el usuario, se adivinara el estilo de aprendizaje del estudiante</font></font>
            </p><br><br>
          <form name="final" action="estilo.php" method="post">
              <font size="3">
                  Recinto:<select id="recinto" name="recinto" value="Recinto">
                  <option value="Turrialba">Turrialba</option>
                  <option value="Paraiso">Paraíso</option>
                  </select><br>
                  
                  Sexo:<select id="sex" name="sex" value="Sexo">
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
                  </select><br>
                
            Promedio de matrícula anterior:
            <select name="enteros" value="enteros" id="enteros" onchange="SeleccionarAprenEstu()"></select>
            <strong>.</strong>
            <select name="decimales" value="decimales" id="decimales" disabled></select>
            <br><br>
            El estilo del estudiante es:&nbsp;&nbsp; <span name="estilo" id="estilo"></span>
            <br><br>
            <input value="Consultar" onclick="calcularAprenEstu()" type="button" class="btn btn-info">
            </font>
          </form>
      </section>
</body>
</html>
