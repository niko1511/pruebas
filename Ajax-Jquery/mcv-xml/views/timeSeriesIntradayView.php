<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;" />
	<meta charset="utf-8">
	<title>Ajax1 - Comprobar disponibilidad del login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


	<script type="text/javascript">
		function cargar_provincias() {
			//var parametros = {};
			$.ajax({
				data: '',
				url: 'servidor/cargaIntradayXML.php',
				dataType: 'html',
				type: 'POST',
				beforeSend: function() {
					$("#disponible").html("Comprobando");
				},
				success: function(response) {
					procesar_respuesta_provincias(response);
				}
			});
		}

		function procesar_respuesta_provincias(doc_xml) {
			var listaProvincias = document.getElementById("provincia");
			listaProvincias.options[0] = new Option("- selecciona -");
			var documento_xml = $.parseXML(doc_xml);
			var $xml = $(documento_xml);
			$xml.find("INTRADAY").each(function(index) {
				$provincia = $(this);
				codigo = $provincia.find("DAY").text();
				nombre = $provincia.find("OPEN").text();
				listaProvincias.options[index + 1] = new Option(nombre, codigo);
			});
		}



		$(document).ready(function() {
			cargar_provincias();

		});
	</script>
</head>

<body>
	<h1>Listas desplegables encadenadas Municipio</h1>

	<form>
		<label for="provincia">Provincia</label>
		<select id="provincia">
			<option>Cargando...</option>
		</select>
		
	</form>
</body>

</html>