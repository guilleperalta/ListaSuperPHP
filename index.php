<?php
session_start();
if (isset($_COOKIE['usuario'])){
    $_SESSION['nombre'] = $_COOKIE['usuario'];
    echo $_SESSION['nombre'];
}
if(!isset($_SESSION['nombre']) && !isset($_COOKIE['usuario'])){
    header("Location:login.php");
}
require('header.php');
?>
<div class="agregarProductos">
    <div class="user">
        <div class="usuario">
            Bienvenid@: <h4><?php
            echo $_SESSION['nombre']
            ?></h4>
        </div>
        <a class="cerrarsession" href="salir.php">Cerrar session</a>
    </div>
    <form action="#" method="post" class="formulario">
        <div class="primero">
            <div>
                <input type="text" id="producto" name="producto" placeholder="producto" autocomplete="off">
            </div>
            <br>
            <div>
                <input type="number" id="cantidad" placeholder="cantidad" name="cantidad">
            </div>
        </div>
        <div class="btnboton">
            <button type="submit" class="agregar" id="agregar" value="agregar">
            <i class="fas fa-plus fa-4x"></i></button>
        </div>
    </form>
</div>
<table class="listar">
    <tr class="titulo">
        <th class="tituloProducto">Producto</th>
        <th class="tituloCantidad">Cantidad</th>
        <th class="precio">Precio/u</th>
        <th class="tituloAccion">Accion</th>
    </tr>
    <?php 
    try {
        require_once ('funciones/conexion.php');
        $usuario = $_SESSION['nombre'];
        $producto = "SELECT * FROM listasuper WHERE user ='$usuario' ORDER BY id DESC";
        $productos = $conn->query($producto);
        } catch (Exception $e) {
        $error = $e->getMessage();
        }
        while($elemento = $productos->fetch_assoc()):
    ?>
        <tr class="listado <?php echo $elemento['comprado'];?>" id="<?php echo $elemento['id'];?>">
            <th id="<?php echo $elemento['id'];?>" onclick="editarProducto(<?php echo $elemento['id'];?>)" class="listProd"><?php echo $elemento['nombre']; ?></th>
            <th id="<?php echo $elemento['id'];?>" onclick="editarCantidad(<?php echo $elemento['id'];?>)" class="listCant"><?php echo $elemento['cantidad']; ?></th>
            <th id="<?php echo $elemento['id'];?>" onclick="editarPrecio(<?php echo $elemento['id'];?>)" class="listPrec">$<?php echo $elemento['preciounitario']; ?></th>
            <th class="accion">
                <button id="<?php echo $elemento['id'];?>" onclick="borrarProducto(<?php echo $elemento['id'];?>)" class="eliminar"><i class="fas fa-trash"></i></button>
                <button id="<?php echo $elemento['id'];?>" onclick="marcarComprado(<?php echo $elemento['id'];?>)" class="comprado"><i class="fas fa-check"></i></button>
            </th>
        </tr>
    <?php endwhile; ?>
        <tr id="resultados">
            <th class="cantidadprod">
                Cantidad de productos: <span><?php
                    try {
                        require_once ('funciones/conexion.php');
                        $usuario = $_SESSION['nombre'];
                        $producto = "SELECT * FROM listasuper WHERE user ='$usuario' ORDER BY id DESC";
                        $productos = $conn->query($producto);
                        } catch (Exception $e) {
                        $error = $e->getMessage();
                        }
                        $canttotal = 0;
                        foreach ($productos as $key) {
                            $cant = $key['cantidad'];
                            $canttotal = $canttotal + $cant;
                        }
                        echo $canttotal;
                ?></span>
            </th>
            <th class="totalgastado">
                Total gastado: <span>$<?php
                try {
                    require_once ('funciones/conexion.php');
                    $usuario = $_SESSION['nombre'];
                    $producto = "SELECT * FROM listasuper WHERE user ='$usuario' ORDER BY id DESC";
                    $productos = $conn->query($producto);
                    } catch (Exception $e) {
                    $error = $e->getMessage();
                    }
                    $totalfinal = 0;
                    foreach ($productos as $key) {
                        $cant = $key['cantidad'];
                        $total = $key['preciounitario'];
                        $multiplicacion = $total * $cant;
                        $totalfinal += $multiplicacion;
                    }
                    echo $totalfinal;
                ?></span>
            </th>
        </tr>
    </table>
<div class="finallista">
    <div class="botoneseliminar">
        <button class="eliminartodo" id="<?php echo $_SESSION['nombre'];?>">Eliminar todo</button>
        <button class="eliminarcomprado" id="<?php echo $_SESSION['nombre'];?>">Eliminar lo marcado</button>
        <button class="eliminarsobrante" id="<?php echo $_SESSION['nombre'];?>">Eliminar lo NO marcado</button>
        <!-- <button class="exportar">Guardar lista</button> -->
    </div>
    <div class="desarrollado">
        Desarrollado por <a href="guilleperalta.com" target="_blank">Guille PERALTA</a>
    </div>
</div>

<!-- Llamamos a todas las funciones -->
<script type="text/javascript">
//Borrar un producto
function borrarProducto(id){
    var idprod = id;
    swal({
    title: "ALERTA!",
    text: "Estas seguro de que queres borrar el elemento?",
    icon: "error",
    buttons: true,
    hideOnOverlayClick: false,
    }).then((eliminar) => {
    if (eliminar) {
        var accion = 'eliminar';
        datosBorrar = {"id":idprod, "accion":accion};      
        $.ajax({
            type:"POST",
            url:"funciones/eliminar.php",
            data: datosBorrar,
            success:function(r){
            $('th', '#'+idprod+'').slideUp('fast');
            setTimeout(function(){
                $('tr').remove('#'+idprod+'');
            }, 200);
            }
        }).done(function(){
            $('.totalgastado').load(' .totalgastado');
            $('.cantidadprod').load(' .cantidadprod');
        });
    }
    });
}

//Marcar elemento como activo
function marcarComprado(id){
    var idprod = id;
    $('#'+idprod+'.comprado').parent().parent().toggleClass('activo');
    var accion = 'marcar';        
    datosMarcar = {"id":idprod, "accion":accion};        
    $.ajax({
        type:"POST",
        url:"funciones/marcar.php",
        data: datosMarcar,
    });
};

//Editar precio
function editarPrecio(id){
    var idprod = id;
    var prec = $('.listPrec', '#'+id).text();
    swal("Editar precio:", {
        buttons: true,
        content: {
            element: "input",
            attributes: {
                type: "number",
                value: prec,
            },
        },
    })
    .then((precio) => {
        if (precio) {
        var accion = 'editarprecio';
        editarprecio = {"id":idprod, "accion":accion ,"precio":precio};        
        $.ajax({
            type:"POST",
            url:"funciones/editarprecio.php",
            data: editarprecio,
        }).done(function(){
            $('.totalgastado').load(' .totalgastado');
            $('.cantidadprod').load(' .cantidadprod');
            $('.listPrec', '#'+idprod).text('$'+precio);
        });
    }
    });                  
};

//Editar elemento seleccionado
function editarProducto(id){
    var idprod = id;
    var prod = $('.listProd', '#'+id).text();
    swal("Editar producto:", {
        buttons: true,
        content: {
            element: "input",
            attributes: {
                type: "text",
                value: prod,
            },
        },
    })
    .then((producto) => {
        if (producto) {
        var accion = 'editarproducto';
        editarproducto = {"id":idprod, "accion":accion ,"producto":producto};        
        $.ajax({
            type:"POST",
            url:"funciones/editarproducto.php",
            data: editarproducto,
        }).done(function(){
            $('.listProd', '#'+idprod).text(producto);
        });
    }
    });                                
};

//Editar la cantidad
function editarCantidad(id){
    var idprod = id;
    var cant = $('.listCant', '#'+id).text();
    swal("Editar cantidad:", {
        buttons: true,
        content: {
            element: "input",
            attributes: {
                type: "number",
                value: cant,
            },
        },
    })
    .then((cantidad) => {
        if (cantidad) {
        var accion = 'editarcantidad';
        editarcantidad = {"id":idprod, "accion":accion ,"cantidad":cantidad};        
        $.ajax({
            type:"POST",
            url:"funciones/editarcantidad.php",
            data: editarcantidad,
        }).done(function(){
            $('.listCant', '#'+idprod).text(cantidad);
            $('.totalgastado').load(' .totalgastado');
            $('.cantidadprod').load(' .cantidadprod');
        });
    }
    });                                
};
</script>
<?php
    require('footer.php');
?>