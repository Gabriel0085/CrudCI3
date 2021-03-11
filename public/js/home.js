$(document).ready(function() {
    carregarAluno();
});

/**
 * Função que requisita uma view do controller
 * e injeta seu conteudo dentro de uma div
 */
function carregarAluno() 
{
    $.ajax({
        type: 'GET',
        url: BASE_URL + "home/carregar-aluno/",
        dataType: "HTML",
    }).done(function(dataReturn){
        $('#tab_alunos').html(dataReturn);
    });

}

/**
 * ajax que irá retornar uma view (modal de inserir e editar) 
 * e carregar ele dentro de uma div da view home
 */
function modalAluno(alunoId = null) 
{
    $.ajax({
        type: 'GET',
        url: BASE_URL + "home/modal-aluno/",
        dataType: "HTML",
        data : {
            alunoId : alunoId
        }
    }).done(function(dataReturn){
        $('#modal_aluno').html(dataReturn);
        clearErrors();
        $("#form_aluno")[0].reset();
        $("#aluno_img_path").attr("src", "");
        $('#modal_aluno').modal();
    });

}

/**
 * Função de upload de imagem
 */
function imgAluno() 
{
    $("#btn_upload_aluno_img").change(function(){
        uploadImg($(this), $("#aluno_img_path"), $("#aluno_img"));
    })
}

/**
 * Ajax para edição ou inserção de um novo registro
 */
$(document).on("submit", "#form_aluno", (function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: BASE_URL + "home/cadastrar-aluno/",
        dataType: "json",
        data: $(this).serialize(),
    })
    .done(function(response){
        if(response["status"]){
            $("#modal_aluno").modal("hide");
            Swal.fire(
                'Sucesso!',
                'A ação foi concluída com sucesso!',
                'success'
                )
            carregarAluno();
        }
        else{
            showErrorsModal(response["error_list"]);
        }
    })
}));

/**
 * função de alerta que, dependendo da resposta, chama uma função de exclusão
 */
function alertExcluir(alunoId){
    Swal.fire({
        title: 'Você tem certeza?',
        text: "O aluno será permanentemente excluído!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim!'
      }).then((result) => {
        if (!result.isConfirmed) {
            excluirAluno(alunoId);
            Swal.fire(
            'Removido!',
            'O aluno foi removido com sucesso!.',
            'success'
          )
          carregarAluno();
        }
      })
}

/**
 * função de exclusão
 */
function excluirAluno(alunoId){
    $.ajax({
        type: "POST",
        url: BASE_URL + "home/excluir-aluno/",
        dataType: "json",
        data: {
            alunoId : alunoId
        }
    })
    .done(function(response){
        return true;
    })
    .fail(function(response){
        return false;
    });
}