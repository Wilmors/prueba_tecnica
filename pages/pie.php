<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script >
$(document).ready(function() {
    $('#datatable').DataTable({
        "paging": false,
        "searching": false,
        "info": false,
        "order": false,
        "ordering": false,
    });


    $('#selct_segmento').change(function() {
        recargar_select_familia();
    });

    function recargar_select_familia() {
        $.ajax({
            type: "POST",
            url: 'ajax/form_modal_ajax.php',
            data: { segmento: $('#selct_segmento').val() },
            success: function(r) {
                $('#selct_familia').html(r);
            }
        });
    }


    $('#selct_familia').change(function() {
        recargar_selct_clase();
    });

    function recargar_selct_clase() {
        $.ajax({
            type: "POST",
            url: 'ajax/form_modal_ajax.php',
            data: { familia: $('#familia').val() },
            success: function(r) {
                $('#selct_clase').html(r);

            }
        });
    }


    $('#selct_clase').change(function() {
      recargar_selct_producto();
    });

    function recargar_selct_producto() {
        $.ajax({
            type: "POST",
            url: 'ajax/form_modal_ajax.php',
            data: { clase: $('#clase').val() },
            success: function(r) {
                $('#selct_producto').html(r);
            }
        });
    }


    $('#selct_producto').change(function() {
      recargar_selct_guardar();
    });

    function recargar_selct_guardar() {
        $.ajax({
            type: "POST",
            url: 'ajax/form_modal_ajax.php',
            data: { producto: $('#producto').val() },
            success: function(response) {
              var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                      $('#modal_oculto').val(jsonData.name);
                    }
                    else
                    {
                        alert('Invalid Credentials!');
                    }
            }
        });
    }

         $('#form_modal').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'ajax/form_submit_ajax.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                      $('#actividad').val(jsonData.name);
                      $('#oculto').val(jsonData.codigo);
                      $('#Modal').modal('hide');

                    }
                    else
                    {
                        alert('Invalid Credentials!');
                    }
               }
           });
         });


    $('#form_infor').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'ajax/form_ajax.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        $("#nav_ofertas").show();
                        $("#guardar_procesos").hide();
                        $(".disable_input").attr('readonly',true);
                        $(".disable_select").attr('disabled',true);

                    }
                    else
                    {
                        alert('Invalid Credentials!');
                    }
               }
           });
         });



   

    $('#refresh').click(function() {
        publicar_fecha_actual();
    });

    function publicar_fecha_actual() {

        $.ajax({
            type: "POST",
            url: 'ajax/form_crono_ajax.php',
            data: { fecha_actual: $('#refresh').attr("fecha_actual") },
            success: function(response) {
              var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        location.href = 'form_crono.php';
                    }
                    else
                    {
                        alert('Invalid Credentials!');
                    }
            }
        });
    }

    function cargar_table(){
        $.ajax({
            type: "POST",
            url: 'ajax/form3_ajax.php',
            data: {
                "cerrada" : $("#cerrada").val(),
                "descripcion" : $("#descripcion").val(),
                "comprador" : $("#comprador").val(),
                "selct_estado" : $("#selct_estado").val()
            },
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    $('#tr_td').html(jsonData.producto);
                }
                else
                {
                    alert('Invalid Credentials!');
                }
            }
        });
    }
    cargar_table();

    $('#form_busqueda').submit(function(e) {
        e.preventDefault();
        cargar_table();
    });

    $('#Excel').click(function() {
        excel();
    });

    function excel() {

        $.ajax({
            type: "POST",
            url: 'ajax/form_excel.php',
            data: { 
                "cerrada" : $("#cerrada").val(),
                "descripcion" : $("#descripcion").val(),
                "comprador" : $("#comprador").val(),
                "selct_estado" : $("#selct_estado").val()},
                
            success: function(response) {
                alert('Excel creado');
                window.location.href = '../../prueba_tecnica/Reporte_general.xlsx';
            }
        });
    }


  $('#agregar').click(function(event) {
    event.preventDefault();
    var titulo = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var archivos = $('#archivos')[0].files;
    var formData = new FormData();
    formData.append('titulo', titulo);
    formData.append('descripcion', descripcion);
    for (var i = 0; i < archivos.length; i++) {
      formData.append('archivos[]', archivos[i]);
    }
    $.ajax({
      url: 'ajax/guardar_archivo.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        console.log(response);
        var jsonData = JSON.parse(response);
        alert("Achivos agreados con exito");
        $('#titulo').val('');
        $('#descripcion').val('');
        $('#archivos').val('');
        $('#contenido_tabla').html(jsonData.table_files);
      }
    });
  });

});
</script>
</body>

</html>