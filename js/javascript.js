$('document').ready(function(){
    //Le agregamos los margenes por los div con position fixed
    // $('.formulario').css("margin-top", $('.user').height());
    $('.listar').css("margin-bottom", $('.finallista').height()+$('.cantidadprod').height()+$('.totalgastado').height()+20);
    $('.listar').css("margin-top", $('.agregarProductos').height());
    
    //Agregamos la imagen de carga, hasta que no se cargue toda la pagina, le podemos setear un tiempo
    setTimeout(function(){
        $(".loader").fadeOut("fast");
    }, 0);

    //Agregamos productos por ajax
    $('#agregar').click(function(e){
        event.preventDefault();
        //Al precionar el boton agregar, enviamos por ajax los datos al php
        var prod = $('#producto').val();
        var cant = $('#cantidad').val();
        var accionn = $(this).val();
        if (prod === ''){
            swal("ERROR", "Debe escribir un producto", "error");
        }else{
        //Creamos el json con todos los datos
        var datos = {"producto":prod, "cantidad":cant, "accion":accionn};
        //Enviamos por ajax los datos
        $.ajax({
            type:"POST",
            dataType: 'json',
            url:"funciones/agregar.php",
            data: datos,
        }).then( function(resp) {
            //Creamos el enmaquetado con los datos traidos
            $('.titulo').after(`
            <tr class="listado" id="`+resp.idok+`">
                <th id="`+resp.idok+`" onclick="editarProducto(`+resp.idok+`)" class="listProd">`+resp.prodok+`</th>
                <th id="`+resp.idok+`" onclick="editarCantidad(`+resp.idok+`)" class="listCant">`+resp.cantok+`</th>
                <th id="`+resp.idok+`" onclick="editarPrecio(`+resp.idok+`)" class="listPrec">$0.00</th>
                <th class="accion">
                    <button id="`+resp.idok+`" onclick="borrarProducto(`+resp.idok+`)" class="eliminar"><i class="fas fa-trash"></i></button>
                    <button id="`+resp.idok+`" onclick="marcarComprado(`+resp.idok+`)" class="comprado"><i class="fas fa-check"></i></button>
                </th>
            </tr>
            `);
        }).then( function (){
            //Hacemos que el enmaquetado aparezca con un efecto slide
            $('.listar .listado:first').hide().slideDown('fast');
            //Vaciamos los input para que podamos ingresar uno nuevo
            $('#producto').val('');
            $('#cantidad').val('');
            //Hacemos foto en el input principal para directamente escribir
            $('#producto').focus();
            $('.totalgastado').load(' .totalgastado');
            $('.cantidadprod').load(' .cantidadprod');
        });
        return false;
        }
    });

    //Agregamos usuarios por ajax
    $('#crearusuario').click(function(e){
        //Al precionar el boton agregar, enviamos por ajax los datos al php
        var nombre = $('#usuario').val();
        var contraseña = $('#contraseña').val();
        //Creamos el json con todos los datos
        var datos = {"nombre":nombre, "pass":contraseña};
        //Enviamos por ajax los datos
        $.ajax({
            type:"POST",
            dataType: 'json',
            url:"funciones/crearusuario.php",
            data: datos,
        }).done( function(resp) {
            //Imprimimos en la consola los datos que nos devuelve
            console.log(resp);
            //Creamos el usuario en caso de que la respuesta sea OK
            if (resp === 'ok') {
                swal("EXCELENTE", "Tu usuario fue creado correctamente", "success")
                .then((value) => {
                window.location='login.php';
                });
            }else{
                swal("ERROR", "El usuario ya existe, intenta con otro", "error")
                .then((value) => {
                //Vaciamos los input para que podamos ingresar uno nuevo
                $('#usuario').val('');
                $('#contraseña').val('');
                //Hacemos foto en el input principal para directamente escribir el usuario
                $('#usuario').focus();
                });
            }
        });
    });

    //Validar Login
    $('.btnenviar').click(function(event){
        event.preventDefault();
        var nombre = $('#usuario').val();
        var contraseña = $('#contraseña').val();
        var cookie = $('#checkbox').prop('checked');
        var datos = {"nombre":nombre, "pass":contraseña,"cookie":cookie};
        //Creamos el json con todos los datos
        if (nombre === "" || contraseña === ""){
            swal("DATOS INCOMPLETOS", "Coloque usuario y contraseña correctamente", "error")
        }else{
            $.ajax({
                type:"POST",
                dataType: 'json',
                url:"funciones/loguear.php",
                data: datos,
            }).done( function(resp) {
                //Imprimimos en la consola los datos que nos devuelve
                console.log(resp);
                //Creamos el usuario en caso de que la respuesta sea OK
                if (resp === 'OK') {
                    window.location='index';
                }else{
                    swal("ERROR", "El usuario y/o contraseña son erroneos", "error")
                    .then((value) => {
                    //Vaciamos los input para que podamos ingresar uno nuevo
                    $('#usuario').val('');
                    $('#contraseña').val('');
                    //Hacemos foto en el input principal para directamente escribir el usuario
                    $('#usuario').focus();
                    });
                }
            });
        }      
    });

    //Borrar todo de la lista
    $('.eliminartodo').click(function(e) {
        var usuario = $(this).attr('id');
        swal({
            hideOnOverlayClick: false,
            title: "ALERTA!",
            text: "Estas seguro de que queres borrar TODO?",
            icon: "error",
            buttons: true,
            dangerMode: true,
            }).then(function(willDelete){
            if (willDelete) {
                var accion = 'borrartodo';                
                borrartodo = {"usuario":usuario, "accion":accion};                
                $.ajax({
                    type:"POST",
                    url:"funciones/borrartodo.php",
                    data: borrartodo,
                }).done(function(){
                    $('.listar .listado').slideUp('fast');
                }).done(function(){
                    setTimeout(function() {
                        $('.listar .listado').remove('.listar .listado');
                    }, 400);
                    $('.totalgastado').load(' .totalgastado');
                    $('.cantidadprod').load(' .cantidadprod');
                });
            }
            });
    });

    //Borrar solo lo marcado como comprado
    $('.eliminarcomprado').click(function(e) {
        var usuario = $(this).attr('id');
        swal({
            hideOnOverlayClick: false,
            title: "ALERTA!",
            text: "Estas seguro de que queres borrar los elementos marcados?",
            icon: "error",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var accion = 'borrarmarcado';
                borrarmarcado = {"usuario":usuario, "accion":accion};                
                $.ajax({
                    type:"POST",
                    url:"funciones/borrarmarcado.php",
                    data: borrarmarcado,
                }).then(function(){
                    $('.activo').slideUp('fast');
                    $('.listar').slideDown('fast');
                }).done(function(){
                    $('.totalgastado').load(' .totalgastado');
                    $('.cantidadprod').load(' .cantidadprod');
                });
            }
            });
    });
    
    //Borrar solo lo NO marcado como comprado
    $('.eliminarsobrante').click(function(e) {
        var usuario = $(this).attr('id');
        swal({
            hideOnOverlayClick: false,
            title: "ALERTA!",
            text: "Estas seguro de que queres borrar los elementos NO comprados?",
            icon: "error",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var accion = 'borrarsobrante';
                borrarsobrante = {"usuario":usuario, "accion":accion};                
                $.ajax({
                    type:"POST",
                    url:"funciones/borrarsobrante.php",
                    data: borrarsobrante,
                }).then(function(){
                    $('.listar').slideUp('fast');
                    $('.listar').load(' .listar');
                    $('.listar').slideDown('fast');
                }).done(function(){
                    $('.totalgastado').load(' .totalgastado');
                    $('.cantidadprod').load(' .cantidadprod');
                });
            }
            });
    });
});

function verOcultar() {
    let passwordInput = document.querySelector('#contraseña');

    let mostrarPass = document.querySelector('.fa-solid.fa-eye');
    let ocultarPass = document.querySelector('.fa-solid.fa-eye-slash');

    if(passwordInput.getAttribute('type') === 'password'){
        passwordInput.setAttribute('type','text');
        mostrarPass.style.display = 'none';
        ocultarPass.style.display = 'initial';
    }else if (passwordInput.getAttribute('type') === 'text'){
        passwordInput.setAttribute('type','password');
        mostrarPass.style.display = 'initial';
        ocultarPass.style.display = 'none';
    }
}