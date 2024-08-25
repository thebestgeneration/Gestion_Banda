function start_loader(){
    $('body').append('<div id="preloader"><div class="loader-holder"><div></div><div></div><div></div><div></div>')
}

function end_loader(){
    $('#preloader').fadeOut('fast', function(){
        $('#preloader').remove();
    })
}

$(document).ready(function(){
    /**
     * Código para que valide el logueo del socio
     */

    $('#login-frm').submit(function(e){
        e.preventDefault()
        start_loader()
        if($('.err_msg').length > 0)
           $('.err_msg').remove()
        $.ajax({
            url: _base_url_ + 'app/services/Login.php?f=login',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err)
            },
            success: function(resp){
                try{
                    resp = JSON.parse(resp);
                    if(resp.status == 'success'){
                        location.replace(_base_url_ + 'app/views/');
                    } else if (resp.status == 'incorrect') {
                        var _frm = $('#login-frm')
                        var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Usuario o contraseña incorrectos</div>"
                        _frm.prepend(_msg)
                        _frm.find('input').addClass('is-invalid')
                        $('[name="username"]').focus();
                    }
                } catch(e){
                    console.error('Error parseando la respuesta JSON', e);
                } finally {
                    end_loader();
                }                      
            }
        })
    })
})