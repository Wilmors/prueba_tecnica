
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba_php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <form class="form_group_bb" id="form_infor" action="#" type_form="create">
        <div class="card-body">
            <div class="tab-content" id="tab_content">
                <div class="tab-pane fade show active" id="informacion_basica" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">Información básica</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="objeto">Objeto*</label>
                                                <div class="input-group input-group-sm">
                                                    <input required placeholder="Escriba un objeto" name="objeto" id="objeto" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar" id="form_info">
        </div>
    </form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#form_infor').submit(function(e) {
            e.preventDefault();
            console.log("holiss");
            $.ajax({
                type: "POST",
                url: 'form_ajax.php',
                data: $(this).serialize(),
                success: function(response) {
                    var jsonData = JSON.parse(response);

                    if (jsonData.success == "1") {
                        location.href = 'botones.php';
                    } else {
                        alert('Credenciales inválidas!');
                    }
                },
                error: function() {
                    alert('Error al procesar la solicitud');
                }
            });
        });
    });
</script>

</body>
</html>