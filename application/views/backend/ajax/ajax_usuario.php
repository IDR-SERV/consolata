<script type="text/javascript">
    $(function(){
        $("#menu-derecha-home").click();

        $("#btn_crear_usuario").click(function(){
          window.location.href = 'usuario?flag=1';
        });

        $("#btn-nuevo-usuario").click(function(){
          $('#modal_nuevo_usuario').modal('show');
          $('#modal_nuevo_usuario').find('.modal-title').text('Agregar Usuario');
          $('#frm_usuario').attr('action', '<?= base_url() ?>defaultbackend/nuevo_usuario');
        });

        $('#btn_guardar_usuario').click(function(){
          var url = $('#frm_usuario').attr('action');
          var data = $('#frm_usuario').serialize();//envia todos los datos del formulario
          //validacion del formulario
          var nick = $('input[name=nick_usuario]');
          var nivel = $('select[name=nivel_usuario]');
          var email = $('input[name=email_usuario]');
          var resultado = '';

          if(nick.val()==''){
            nick.parent().addClass('has-error');
          }else{
            nick.parent().removeClass('has-error');
            resultado += '1';
          }

          if(nivel.val()==0){
            nivel.parent().addClass('has-error');
          }else{
            nivel.parent().removeClass('has-error');
            resultado += '2';
          }

          if(email.val()==''){
            email.parent().addClass('has-error');
          }else{
            email.parent().removeClass('has-error');
            resultado += '3';
          }

          if(resultado == '123'){
            $.ajax({
              type: 'ajax',
              method: 'post',
              url: url,
              data: data,
              async: false,
              dataType: 'json',
              success: function(respuesta){
                 if(respuesta.success){
                  $('#modal_nuevo_usuario').modal('hide');
                  $('#frm_usuario')[0].reset();
                  if(respuesta.type == 'add'){
                    type = 'creado';
                  }else if(respuesta.type == 'updt'){
                    type = 'editado';
                  }
                  $('.alert-success').html('Usuario ' + type + ' exitosamente').fadeIn().delay(4000).fadeOut('slow');
                  mostrarUsuarios();
                 }else{
                  alert('Error');
                 }
              },
              error: function(){
                alert('Lo sentimos. No se pudo almacenar este registro.');
              }
            });
          }

        });

        /*
        Este ajax edita los registros al hacer clic en el boton de acciones de la tabla
        */
        $('#mostrar_data').on('click', '.item-edit', function(){
          var id = $(this).attr('data');
          $('#modal_nuevo_usuario').modal('show');
          $('#modal_nuevo_usuario').find('.modal-title').text('Editar Usuario');
          $('#frm_usuario').attr('action', '<?= base_url() ?>defaultbackend/update_usuario');
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?= base_url() ?>defaultbackend/editar_usuario',
            data: {id: id},
            async: false,
            dataType:'json',
            success: function(data){
              $('input[name=nick_usuario]').val(data.nick);
              $('input[name=nivel_usuario]').val(data.nivel_id);
              $('input[name=email_usuario]').val(data.email);
              $('input[name=id_usuario]').val(data.id);
            },
            error: function(){
              alert('No se pudo editar el registro.');
            }
          });
        });

        /*
        Este ajax elimina el registro al hacer clic en el boton delete de la tabla
        */
        $('#mostrar_data').on('click', '.item-delete', function(){
          var id = $(this).attr('data');
          $('#modal_eliminar_usuario').modal('show');
          $('#modal_eliminar_usuario').find('.modal-title').text('Eliminar Usuario');
          //se previen la eliminacion
          $('#btnDelete').unbind().click(function(){
            $.ajax({
              type: 'ajax',
              method: 'get',
              url: '<?= base_url() ?>defaultbackend/eliminar_usuario',
              data: {id: id},
              async: false,
              dataType:'json',
              success: function(data){
                if(data.success){
                  $('#modal_eliminar_usuario').modal('hide');
                  $('.alert-success').html('Usuario eliminado exitosamente').fadeIn().delay(4000).fadeOut('slow');
                  mostrarUsuarios();
                }else{
                  alert('Error al eliminar el usuario');
                }
                

              },
              error: function(){
                alert('No se pudo eliminar el registro.');
              }
            });
          });

          
        });

         mostrarUsuarios();

        function mostrarUsuarios(){
          /*
          Esta funcion lista a todos los usuarios en la tabla
          */
          $.ajax({
            type: 'ajax',
            url: '<?= base_url() ?>defaultbackend/tablaUsuarios',
            async: false,
            dataType: 'json',
            success: function(data){
              html='';
              var i;
              for(i=0; i < data.length; i++){
                 html +='<tr>'+
                          '<td class="hidden">' + data[i].id + '</td>'+
                          '<td class="text-uppercase" style="width:10%;">' + data[i].nick+ '</td>'+
                          '<td class="text-uppercase" style="width:35%;">' + data[i].email + '</td>'+
                          '<td class="text-uppercase" style="width:20%;">' + data[i].nivel + '</td>'+
                          '<td class="text-uppercase" style="width:15%">' + data[i].activ + '</td>'+
                          '<td style="width:20%;" class="text-center">'+
                            '<a href="#" title="Leer"><i class="glyphicon glyphicon-eye-open text-success"></i></a>'+
                            '&nbsp;'+
                            '<a href="javascript:;" class="item-edit" data="' + data[i].id + '" title="Editar"><i class="glyphicon glyphicon-pencil text-primary"></i></a>'+
                            '&nbsp;'+
                            '<?php if($nivel == 'ADMINISTRADOR') {?>'+
                            '<a class="item-delete" href="javascript:;" data="' + data[i].id + '" title="Eliminar"><i class="glyphicon glyphicon-remove-sign text-danger"></i></a>'+
                            '<?php } ?>'+
                          '</td>'+
                        '</tr>'
              }
              $('#mostrar_data').html(html);
            },
            error: function(){
              alert('No se pudo obtener registro de la base de datos');
            }
          });
        }//Fin de mostrar usuarios

        function addUsuario(){

        }//Fin de addUsuario

  	});//Fin del function principal
</script>