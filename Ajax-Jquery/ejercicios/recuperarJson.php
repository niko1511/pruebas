<html>

<head>
        <meta http-equiv="Content-Type" content="text/html;" />
        <meta charset="utf-8" />
        <title>Ajax1 - Comprobar disponibilidad del login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
                function comprobar_disponibilidad(login) {
                        var parametros = {
                                login: login
                        };
                        $.ajax({
                                data: parametros,
                                url: "servidor/compruebaDisponibilidadJSON.php",
                                dataType: "html",
                                type: "POST",
                                beforeSend: function() {
                                        $("#disponible").html("Comprobando");
                                },
                                success: function(response) {
                                        procesar_respuesta(response);
                                },
                        });
                }

                function procesar_respuesta(respuesta_json) {
                        //var objeto_json = eval("("+respuesta_json+")");
                        var objeto_json = JSON.parse(respuesta_json);

                        var disponible = objeto_json.disponible;

                        if (disponible == "si") {
                                disponible = "El nombre está disponible";
                        } else {
                                var alternativas = objeto_json.alternativas;
                                disponible =
                                        "El nombre NO está disponible. <br>Posibles alternativas:<BR>";
                                for (i in alternativas) {
                                        disponible += alternativas[i] + "<br>";
                                }
                        }

                        $("#disponible").html(disponible);
                }
                $(document).ready(function() {
                        $("#comprobar").click(function() {
                                comprobar_disponibilidad($("#login").val());
                        });
                });
        </script>
</head>

<body>
        <h1>Comprobar disponibilidad del login</h1>
        <form>
                <label for="login">Nombre de usuario:</label>
                <input type="text" name="login" id="login" />
                <a id="comprobar" href="#">Comprobar disponibilidad...</a>
        </form>
        <div id="disponible"></div>
</body>

</html>