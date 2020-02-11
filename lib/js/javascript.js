



//nova mascara
$('#cpf , #dataNascimento').on('focus', function () {
    VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");
    VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999");
});


//retorno do root
function getRoot()
{
    var root = "http://" + document.location.hostname + "/";
    return root;
}




//Ajax do formulário de cadastro
$("#formCadastro").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();
    
    $.ajax({
        url: getRoot() + 'tcc/controller/controllerSolicitarAcesso',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.retornoCad').empty();
            if (response.retorno == 'erro') {
                //getCaptcha();
                $.each(response.erros, function (key, value) {
                    $('.retornoCad').append(value + '<br>');
                });
            } else {
                $('.retornoCad').append('Cadastro realizado com sucesso!');
            }
        }
    });
});


//Ajax reset senha

$("#formReset").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();
    
    $.ajax({
        url: getRoot() + 'tcc/controller/controllerResetSenha',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.retornoCad').empty();
            if (response.retorno == 'erro') {
               $('.retornoCad').append(response.erros);
            } else {
                $("#reset").remove();
                $('.retornoCad').append('Seu CNPJ é sua nova senha');
            }
        }
    });
});


//Ajax do formulário de solicitar acesso
$("#formAcesso").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();
    
    $.ajax({
        url: getRoot() + 'tcc/controller/controllerSolicitarAcesso',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
             $('.retornoCad').empty();
            if (response.retorno == 'erro') {
                //getCaptcha();
                $.each(response.erros, function (key, value) {
                    $('.retornoCad').append(value + '<br>');
                });
            } else {
                $("#solicita").remove();
                $('.retornoCad').append('<br><br><div class="row justify-content-center">\n\
                                        <div class="card-text">\n\
                                        <h3>Cadastro realizado!</h3> \n\
                                        <br>Sua solicitação de acesso será avaliada em até 24horas.<br> Aguarde autorização do administrador do sistema.\n\
                                        </div>\n\
                                        </div>\n\
                                        <div><br>\n\
                                        <a href="index"  target="_self" class="btn btn-primary btn-icon-split" >\n\
                                         <span class="icon text-white-50"><i class="fas fa-arrow-circle-left"></i></span>\n\
                                        <span class="text">Login</span></a>\n\
                                        <br><br>\n\
                                        </div>');
            }
          
        }
    });
});

//Ajax do formulário de login 
$("#formLogin").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        url: getRoot() + 'tcc/controller/controllerLogin',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if (response.retorno == 'success') {
                window.location.href = response.page;
            } else {
               // getCaptcha();
               /*
                if (response.tentativas == true) {
                    $('.loginFormulario').hide()
                } */
                
                $('.resultadoForm').empty();
                $.each(response.erros, function (key, value) {
                    $('.resultadoForm').append(value + '<br>');
                });

            }
        }
    });
});

    // ajax novo agendamento
$('#formAgendar').on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();
    
    $.ajax({
        url: getRoot() + 'tcc/controller/controllerPreventiva',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.retornoCad').empty();
            if (response.retorno == 'erro') {
                
                $.each(response.erros, function (key, value) {
                    $('.retornoCad').append(value + '<br>');
                });
            } else {
                window.location.href = 'agenda_preventiva?retorno=Agendamento concluido!';
                
            }
        }
    });
});





// Janela modal cadastro

	$('#exampleModal').on('show.bs.modal', function (event) {
		  
            var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipientid = button.data('id_usuario') // Extract info from data-* attributes
		  var recipientnome = button.data('nome')
		  var recipientemail = button.data('email')
                  var recipientcpf = button.data('cpf')
                  var recipientdataNascimento = button.data('nascimento')
                  var recipientpermissoes = button.data('permissoes')
                  var recipientdatacriacao = button.data('dataCriacao')
                  
                  
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('ID usuário: ' + recipientid)
		  modal.find('#id_usuario').val(recipientid)
		  modal.find('#nome').val(recipientnome)
		  modal.find('#email').val(recipientemail)
                  modal.find('#cpf').val(recipientcpf)
		  modal.find('#dataNascimento').val(recipientdataNascimento)
                  modal.find('#permissoes').val(recipientpermissoes)
                  modal.find('#dataCriacao').val(recipientdatacriacao)
		  
		});
                
                
                //janela modal avaliar chamado
                $('#ModalAvaliar').on('show.bs.modal', function (event) {
		  
            var button = $(event.relatedTarget) 
		  var recipientid = button.data('id_chamado') 
                  
		  var modal = $(this)		  
		  modal.find('#id_chamado').val(recipientid);
		  modal.find('.id-chamado').text('Nº chamado' + recipientid);
		  
		});
                
                
        // script do select novo chamado
       $("#departamento").on("change",function(){
           var id_departamento = $("#departamento").val();
          
           $.ajax({
               url: getRoot() + 'tcc/controller/subCategoria',
               type: 'POST',
               data:{id:id_departamento},
               beforeSend: function(){
                   $("#subCategoria").css({'display':'block'});
                   $("#subCategoria").html("carregando...");
               },
               success: function(data){
                    $("#subCategoria").css({'display':'block'});
                    $("#subCategoria").html(data);
               },
               error: function(data){
                   $("#subCategoria").css({'display':'block'});
                   $("#subCategoria").html("houve um erro ao carregar");
               }
           });
       });

function page_views(){
    $(".pagetr").remove();
    var periodo = $("#pages-select").val();
    
$.getJSON('http://localhost/tcc/models/ClassRelatorios/chamados_reabertos_por_mes/' + periodo,function(data){
    
    $.each(data, function(key, val){
        var container= '<tr class="pagetr">';
        container +=        '<td cass="small font-weight-bold">' + key + '</td>';
        container +=        '<td>' + val + '</td>';
        container +=    '</tr>'; 
        $("#pages").append(container);
        });
    }); 
}
page_views();

$("#pages-select").change(function(){
   page_views(); 
});



function avaliacao_chamado(){
    $(".travaliacao").remove();
    var periodo = $("#avalia-select").val();
    
    $.getJSON('http://localhost/tcc/models/ClassRelatorios/media_avaliacao/' + periodo,function(data){
       
        
        //var dep1 =  Math.round(dep1);
        var container= '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">SERVIÇOS GERAIS</td>';
        container +=        '<td> ' + data[1] + '</td>';
        container +=    '</tr>'; 
        
        container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">HIDRÁULICA</td>';
        container +=        '<td>' + data[2] + '</td>';
        container +=    '</tr>'; 
        
        container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">ELÉTRICA</td>';
        container +=        '<td>' + data['3'] + '</td>';
        container +=    '</tr>'; 
        
        container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">MANUTENÇÃO PREDIAL</td>';
        container +=        '<td>' + data['4'] + '</td>';
        container +=    '</tr>'; 
        
        container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">OBRA</td>';
        container +=        '<td>' + data['5'] + '</td>';
        container +=    '</tr>';
        
         container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">SEGURANÇA PATRIMONIAL</td>';
        container +=        '<td> ' + data['6'] + '</td>';
        container +=    '</tr>';
        
        container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">BOMBEIRO CIVIL</td>';
        container +=        '<td>' + data['7'] + '</td>';
        container +=    '</tr>';
        
         container +=    '<tr class="travaliacao">';
        container +=        '<td cass="small font-weight-bold">Média</td>';
        container +=        '<td> ' + data['8'] + '</td>';
        container +=    '</tr>';
        
        $("#avalia-tabela").append(container);
        
    });
}

avaliacao_chamado();

$("#avalia-select").change(function(){
   avaliacao_chamado(); 
});



// Barras relatorios manutenção preventiva
$.getJSON('http://localhost/tcc/models/ClassRelatorios/relatorio_agenda_preventiva/0',function(data){
    var total = 0;
    $.each(data,function(key, val){
       total += parseInt(val); 
    });
    var emDia = data['total'] - data['atrasado'];
    var atrasado = data['atrasado'];
    var total = data['total'];
    
    var porEmDia = parseFloat(((emDia * 100) / total).toFixed(2));
    var porAtrasado = parseFloat(((atrasado * 100) / total).toFixed(2));
    
    
var testeBar =  '<h4 class="small font-weight-bold">'+ emDia +' Concluido <span class="float-right">' + porEmDia +'%</span></h4>';
    testeBar +=  '<div class="progress mb-4">';
    testeBar +=    '<div class="progress-bar bg-success" role="progressbar" style="width:' + porEmDia + '%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=    '</div>';
    
    testeBar +=   '<h4 class="small font-weight-bold"> ' + atrasado + ' Atraso <span class="float-right">' + porAtrasado + '%</span></h4>';
    testeBar +=   '<div class="progress mb-4">';
    testeBar +=   '<div class="progress-bar bg-danger" role="progressbar" style="width:' + porAtrasado + '%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=   '</div>';
    
    
    
$("#manuPrevBar").append(testeBar);
});