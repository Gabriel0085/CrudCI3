<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">X</button>
            <h4 class="modal-tittle"><?= isset($aluno) ? 'Editar' : 'Cadastrar'?> Aluno</h4>
        </div>
        <div class="modal-body">
            <form id="form_aluno">
                <input id="aluno_id" name="aluno_id" value="<?= isset($aluno) ? $aluno->aluno_id : '' ?>" hidden>
                <br>
                <div class="form_group">
                    <label class="col-lg-2 control-label">Nome Completo</label>
                    <div class="col-lg-10">
                        <input id="aluno_nome" name="aluno_nome" value="<?= isset($aluno) ? $aluno->aluno_nome : '' ?>" class="form-control" maxlenght="100">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form_group">
                    <label class="col-lg-2 control-label">Foto</label>
                    <div class="col-lg-10">
                        <img id="aluno_img_path" src="" style="max-height: 200px; max-widht: 200px"/>
                        <label class="btn btn-block btn-info">
                            <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar foto
                            <input type="file" id="btn_upload_aluno_img"
                            accept="image/*" onClick="imgAluno()" style="display: none;">       
                        </label>
                        <input id="aluno_img" name="aluno_img">
                        <span class="help-block"></span>
                    </div>
                </div>
                
                <div class="form_group">
                    <label class="col-lg-2 control-label">Endereço</label>
                    <div class="col-lg-10">
                        <input type="text" id="aluno_endereco" name="aluno_endereco" value="<?= isset($aluno) ? $aluno->aluno_endereco : ''?>"
                        class="form-control" maxlenght="100">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form_group text-center">
                    <button type="submit" id="btn_save_aluno" class="btn btn-primary"> 
                        <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                    </button>
                    <span class="help-block"></span>
                </div>

            </form>
        </div>
    </div>
</div>