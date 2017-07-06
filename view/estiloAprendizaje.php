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
        <h2 style="color: #0080FF">Estilo de aprendizaje</h2>
            <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>
            <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>
            <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> Para
            utilizar el instrumento usted debe conceder una calificación alta a
            aquellas palabras que mejor caracterizan la forma en que usted
            aprende, y, una calificación baja a las palabras que menos
            caracterizan su estilo de aprendizaje.</font></font></p>

            <p class="western" lang="es-ES"><font color="#000000"><font size="3">Le puede ser difícil seleccionar
            las palabras que mejor describen su estilo de aprendizaje, ya que no
            hay respuestas correctas o incorrectas.</font></font></p>

            <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> Todas
            las respuestas son buenas ya que el fin del instrumento es describir
            como y no juzgar su habilidad de aprender.</font></font></p>

            <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> De
            inmediato encontrará nueve series de cuatro palabras de cada línea.
            Ordene de mayor a menor cada serie o juego de cuatro palabras,
            ubicando 4 en la palabra que mejor caracteriza su estilo de
            aprendizaje, un 3 en la palabra siguiente en cuanto a la
            correspondencia con su estilo; a la siguiente un 2, y un 1 a la
            palabra que menos caracteriza su estilo. Tenga cuidado de ubicar un
            número distinto al lado de cada palabra. </font></font></p>

            <big><big><br>Yo aprendo...</big></big>

            <form name="estilo">
                <font size="3">
              <table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
                <tbody>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            discerniendo<br>
                    </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            ensayando<br>
                    </td>
                    <td style="vertical-align: top;">
                    <select name="c3">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            involucrándome</td>
                    <td style="vertical-align: top;">
                    <select name="c4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            practicando</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            receptivamente </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c6">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            relacionando </td>
                    <td style="vertical-align: top;">
                    <select name="c7">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            analíticamente </td>
                    <td style="vertical-align: top;">
                    <select name="c8">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            imparcialmente </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c9">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            sintiendo </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c10">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            observando </td>
                    <td style="vertical-align: top;">
                    <select name="c11">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            pensando </td>
                    <td style="vertical-align: top;">
                    <select name="c12">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            haciendo </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c13">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aceptando </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c14">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            arriesgando </td>
                    <td style="vertical-align: top;">
                    <select name="c15">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            evaluando </td>
                    <td style="vertical-align: top;">
                    <select name="c16">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            con cautela </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c17">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            intuitivamente </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c18">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            productivamente </td>
                    <td style="vertical-align: top;">
                    <select name="c19">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            lógicamente </td>
                    <td style="vertical-align: top;">
                    <select name="c20">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            cuestionando </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c21">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            abstracto </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c22">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            observando </td>
                    <td style="vertical-align: top;">
                    <select name="c23">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            concreto </td>
                    <td style="vertical-align: top;">
                    <select name="c24">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            activo </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c25">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            orientado al presente </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c26">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            reflexivamente </td>
                    <td style="vertical-align: top;">
                    <select name="c27">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            orientado hacia el futuro </td>
                    <td style="vertical-align: top;">
                    <select name="c28">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            pragmático </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c29">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la experiencia </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c30">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la observación </td>
                    <td style="vertical-align: top;">
                    <select name="c31">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la conceptualización </td>
                    <td style="vertical-align: top;">
                    <select name="c32">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            aprendo más de la experimentación </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c33">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            emotivo </td>
                    <td style="vertical-align: top; width: 25%;">
                    <select name="c34">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            reservado </td>
                    <td style="vertical-align: top;">
                    <select name="c35">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            racional </td>
                    <td style="vertical-align: top;">
                    <select name="c36">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
            abierto </td>
                  </tr>

                </tbody>
              </table>
              <br>
              
            </font>
            </form>

            <form name="final" action="estilo.php" method="post"> <font size="3">
                Columna EC  <input name="EC" maxlength="12" size="12" type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Columna OR  <input name="RO" maxlength="12" size="12" type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                Columna CA  <input name="CA" maxlength="12" size="12" type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                Columna EA  <input name="EA" maxlength="12" size="12" type="text"><br>

                Eje Vertical CA-EC <input maxlength="3" size="3" name="CAEC">&nbsp;&nbsp;&nbsp;&nbsp;
                Eje Horizontal EA-OR <input maxlength="3" size="3" name="EAOR">&nbsp;<br><br>

                  <br>
                     
                <input value="Consultar" onclick="calcularEstiloApren()" type="button" name="cacular" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                <span name="ESTILOFINAL" id="ESTILOFINAL"></span>
                </font>
            </form>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>  
    </body>
</html>

