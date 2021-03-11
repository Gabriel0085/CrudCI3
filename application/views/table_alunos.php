<div class="container-fluid">
    <h2 class="text-center"><strong>Gerenciar Alunos</strong></h2>
    <button type="button" onClick="modalAluno()" title="Adcionar Aluno" class="btn btn-success"><i class="fa fa-plus"></i></button>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($alunos)){
                    foreach($alunos as $aluno){?>
                    <tr>
                        <td scope="row">
                            <img src="<?= base_url().$aluno->aluno_img ?>" style="height: 120px; widht: 120px; max-width: 100%"/>
                        </td>
                        <td><?= $aluno->aluno_nome ?></td>
                        <td><?= $aluno->aluno_endereco ?></td>
                        <td>
                            <button type="button" onClick="modalAluno(<?= $aluno->aluno_id ?>)" title="Editar" class="btn btn-warning fa fa-pencil-square-o"></button>
                            <button type="button" onClick="alertExcluir(<?= $aluno->aluno_id ?>)" title="Excluir" class="btn btn-danger fa fa-trash-o"></button>
                        </td>
                    </tr>
            <?php   }
                }
            ?>
        </tbody>
    </table>
</div>