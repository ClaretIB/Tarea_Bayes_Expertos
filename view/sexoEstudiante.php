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
<body onload="cargarSexoEstu()">
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
        <h2 style="color: #0080FF">Sexo del estudiante</h2>
        <br>
         <h4 style="font-weight: bold;">Instrucciones</h4>
        <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3" >
                Con base en el estilo de aprendizaje, el recinto y el promedio de matricula ingresados por el usuario, se adivinara el sexo del estudiante</font></font>
            </p><br><br>
            <form name="final" action="estilo.php" method="post">
            <font size="3">

             Escoja su estilo de aprendizaje:
             <select name="ESTILOFINAL" value="Estilo">
                <option value="DIVERGENTE">Divergente</option>
                <option value="CONVERGENTE">Convergente</option>
                <option value="ASIMILADOR">Asimilador</option>
                <option value="ACOMODADOR">Acomodador</option>
            </select><br>
            Recinto:
            <select id="recinto" name="recinto" value="Recinto">
                <option value="Turrialba">Turrialba</option>
                <option value="Paraiso">Paraíso</option>
            </select><br>
              
          Promedio de matrícula anterior:
          <select name="enteros" value="enteros" id="enteros" onchange="SeleccionarSexoEstu()"></select>
          <strong>.</strong>
          <select name="decimales" value="decimales" id="decimales" disabled></select>
          <br><br>
          El sexo del estudiante es:&nbsp;&nbsp; <span name="sex" id="sex"></span>
          <br><br>
          <input value="Consultar" onclick="calcularSexoEstu()" type="button" class="btn btn-info">
            </font>
          </form>
  </section>         
</body>
</html>
