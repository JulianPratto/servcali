function Logged() {

    $.ajax({
        url: "./php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })

        .done(function (data) {
            console.log(data);
            if (data.respuesta == "no") {
                $("#LoggedIcon").hide();
                $("#TablesLeft").hide();
            } else {
                $("#MyUserRol").text(data.rol_t);
                $("#MyUserName").text(data.name);
                $("#UnloggedIcon").hide();
                if (data.rol == "1") {
                    $("#TablesLeft").hide();
                }
            }

        })

        .fail(function (jqXHR, textStatus) {

        });

    $('#LogoutButton').click(function () {
        $.get('./php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });


}

function Logged1() {
    $("#save-emp").hide();
    $("#cancel-emp").hide();
    $("#save-cliente").hide();
    $("#cancel-cliente").hide();
    $.ajax({
        url: "../php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })

        .done(function (data) {
            console.log(data);
            if (data.respuesta == "no") {
                $("#LoggedIcon").hide();
                $("#TablesLeft").hide();
            } else {
                $("#MyUserRol").text(data.rol_t);
                $("#MyUserName").text(data.name);
                $("#UnloggedIcon").hide();
                if (data.rol == "1") {
                    $("#TablesLeft").hide();
                    $("#div-emp").hide();
                    $.ajax({
                        url: "../CRUD/cliente/ConsultarCliente.php",
                        method: "POST",
                        data: { id: data.user },
                        dataType: "json"
                    })

                        .done(function (data2) {
                            $("#save").text("Update");
                            $("#inputID").prop("disabled", true);
                            $("#inputID").val(data2.id_cliente);
                            $("#inputName").val(data2.nom_cliente);
                            $("#inputFecNac").val(data2.fecha_nac);
                            $("#inputCel").val(data2.celular);
                            $("#inputEmail").val(data2.email);
                            $("#inputPeso").val(data2.peso);
                            $("#inputEst").val(data2.estatura);
                            $("#inputDir").val(data2.direccion);
                            $("#inputContra").val(data2.contraseña);
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
                } else {
                    $("#div-cliente").hide();
                    $.ajax({
                        url: "../CRUD/empleado/ConsultarEmpleado.php",
                        method: "POST",
                        data: { id: data.user },
                        dataType: "json"
                    })

                        .done(function (data1) {
                            console.log(data1);
                            $("#save").text("Update");
                            $("#inputID_E").prop("disabled", true);
                            $("#inputID_E").val(data1.id_empleado);
                            $("#inputName_E").val(data1.nom_empleado);
                            $("#inputFecNac_E").val(data1.fecha_nac);
                            $("#inputCel_E").val(data1.celular);
                            $("#inputEmail_E").val(data1.email);
                            $("#inputPeso_E").val(data1.peso);
                            $("#inputEst_E").val(data1.estatura);
                            $("#inputDir_E").val(data1.direccion);
                            $("#inputContra_E").val(data1.contraseña);
                            $("#inputRol_E").val(data1.id_rol);
                            $("#inputSede_E").val(data1.id_sede);
                        })

                        .fail(function (jqXHR, textStatus) {
                            Swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'An error has occurred : ' + textStatus,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        });
                }
            }

        })

        .fail(function (jqXHR, textStatus) {

        });

    $('#LogoutButton').click(function () {
        $.get('../php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });
    
    $('#EditMyUser').click(function () {
        $("#inputName_E").prop("disabled", false);
        $("#inputFecNac_E").prop("disabled", false);
        $("#inputCel_E").prop("disabled", false);
        $("#inputEmail_E").prop("disabled", false);
        $("#inputPeso_E").prop("disabled", false);
        $("#inputEst_E").prop("disabled", false);
        $("#inputDir_E").prop("disabled", false);
        $("#inputContra_E").prop("disabled", false);
        $("#inputName").prop("disabled", false);
        $("#inputFecNac").prop("disabled", false);
        $("#inputCel").prop("disabled", false);
        $("#inputEmail").prop("disabled", false);
        $("#inputPeso").prop("disabled", false);
        $("#inputEst").prop("disabled", false);
        $("#inputDir").prop("disabled", false);
        $("#inputContra").prop("disabled", false);
        $("#EditMyUser").hide();
        $("#save-emp").show();
        $("#cancel-emp").show();
        $("#save-cliente").show();
        $("#cancel-cliente").show();
    });

    $("#save-emp").click(function (e) {
        e.preventDefault();
        $("#inputID_E").prop("disabled", false);
        $("#inputSede_E").prop("disabled", false);
        $("#inputRol_E").prop("disabled", false);
        var datos = $("#form-emp").serialize();
        console.log(datos);
        $.ajax({
            url: "../CRUD/empleado/EditarEmpleado.php",
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
                    type: 'error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });

    });
    $("#save-cliente").click(function (e) {
        e.preventDefault();
        $("#inputID").prop("disabled", false);
        $("#inputRol").prop("disabled", false);
        var datos = $("#form-cliente").serialize();
        console.log(datos);
        $.ajax({
            url: "../CRUD/cliente/EditarCliente.php",
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
                    type: 'error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });

    });
    $('#cancel-cliente').click(function () {
        location.reload();
    });
    $('#cancel-emp').click(function () {
        location.reload();
    });
}
