
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba_php</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
.contenedor {
  margin-top: 12%;
    margin-left: 38%;
}
.botones {
    background-color: #31438f;
    color: white;
    position: absolute;
    margin-top: 12%;
    margin-left: 38%;
}
.botonespro {
    padding: 12px;
    color: white;
}
</style>
<script> function publicar_click(id_table) {

$.ajax({
    type: "POST",
    url: 'ajax/form_crono_ajax.php',
    data: { align: id_table },
    success: function(response) {

        console.log(response);
      var jsonData = JSON.parse(response);
            if (jsonData.success == "1")
            {
                alert('Publicado');
                location.href = 'form_crono.php';
            }
            else
            {
                alert('Invalid Credentials!');
            }
    }
});
}</script>
<body>