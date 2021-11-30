
function operaciones() {

    $("#formulario").hide();

    $("#nuevo").click(function () {
        $("#formulario").show();
        $(this).hide();
        $("#save").text("Save");
        
    });
    $("#cancel").click(function () {
        $("#formulario").hide();
        $("#nuevo").show();
        $("#form1").trigger("reset");
    });

    $("#save").click(function (e) {
        e.preventDefault();
        var datos = $("#form1").serialize();
        var ruta = "";
        if ($(this).text() == "Save") {
            ruta = "../CRUD/pais/GuardarPais.php";
        } else {
            ruta = "../CRUD/pais/EditarPais.php";
        }
        console.log(datos);
        $.ajax({
            url: ruta,
            method: "POST",
            data: datos, 
            dataType: "html"
        })

            .done(function (data) {
                location.reload();
                
            })

            .fail(function (jqXHR, textStatus) {
                Swal.fire({
                    position: 'top-end',
                    type: 'Error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });

    });

    $(".delete").click(function () {

        Swal.fire({
            title: 'Delete Country',
            text: "Are you sure you want to delete this country?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: 'lightgray',
            cancelButtonText: "Cancel",
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                const id = $(this).data("id");
                $.ajax({
                    url: "../CRUD/pais/EliminarPais.php",
                    method: "POST",
                    data: { id: id }, 
                    dataType: "html"
                })

                    .done(function (data) {
                        location.reload();
                    })

                    .fail(function (jqXHR, textStatus) {
                        Swal.fire({
                            position: 'top-end',
                            type: 'Error',
                            title: 'An error has occurred : ' + textStatus,
                            showConfirmButton: false,
                            timer: 1500
                        })

                    });
            }
        })
    });

    $(".edit").click(function () {

        const id = $(this).data('id');
        const idd =JSON.stringify(id);
        $.ajax({
            url: "../CRUD/pais/ConsultarPais.php",
            method: "POST",
            data: { id: idd }, 
            dataType: "json"
        })
        
            .done(function (data) {
                $("#save").text("Update");
                $("#inputID").val(data.id_pais);
                $("#inputName").val(data.nom_pais);
                $("#formulario").show();
                $("#nuevo").hide();
            })

            .fail(function (jqXHR, textStatus) {
                Swal.fire({
                    position: 'top-end',
                    type: 'Error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });
    });
}