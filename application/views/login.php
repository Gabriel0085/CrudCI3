<section style="min-height: calc(100vh - 83px);" class="light-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-offset col-lg-6 text-center formLogin">
				<div class="section-title">
					<h2>Login</h2>
                    <form id="login_form" method="post">
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" id="usuario_login" placeholder="Usuário" name="usuario_login" class="form-control">
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </div>
                                        <input type="password" placeholder="Senha" name="usuario_senha" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" id="btn_login" class="btn btn-block">
                                        Login
                                    </button>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</section>