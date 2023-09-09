// Icono navbar Toggle
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}


// Scroll a secciones
let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');


window.onscroll = () => {
    section.forEach(sec => {
        // let top = window.scrollY;
        let top = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        let anchoViewport = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        let offset = anchoViewport < 700 ? sec.offsetTop - 500 : sec.offsetTop - 300;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');
        if(top >= offset && top < offset + height) {
            // active navbar links
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
            });
            // animaciones para la seccion activa
            sec.classList.add('show-animated');
        }else{
            sec.classList.remove('show-animated');
        }
    });

    // stick header
    let header = document.querySelector('header');

    header.classList.toggle('sticky', window.scrollY > 100);

    // quitar icono y navbar al hacer click en los links
    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');

    // animacion para el footer
    let footer = document.querySelector('footer');

    footer.classList.toggle('show-animated', this.innerHeight + this.scrollY >= document.scrollingElement.scrollHeight);
}

window.addEventListener("load", function(){
    $('form .btn').click(function(e){
        console.log('hice click');
        e.preventDefault();
        //Al precionar el boton agregar, enviamos por ajax los datos al php
        let Nombre = $('#Nombre').val();
        let Email = $('#Email').val();
        let Celular = $('#Celular').val();
        let Asunto = $('#Asunto').val();
        let Mensaje = $('#Mensaje').val();
        //Creamos el json con todos los datos
        let datos = {"Nombre":Nombre,"Email":Email,"Celular":Celular,"Asunto":Asunto,"Mensaje":Mensaje};
        console.log(datos);
        //Enviamos por ajax los datos
        $.ajax({
            type:"POST",
            dataType: 'json',
            url:"../enviarMail.php",
            data: datos,
        }).then( function(resp) {
            //Creamos el enmaquetado con los datos traidos
            if(resp == 'si'){
                console.log('si');
            }else{
                console.log('NO');
            }
        });
    });
});