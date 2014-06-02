{include file="header.tpl"}

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perfil do Usuário</h1>
                <div>
                    {if $messageError neq ""}
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span>{$messageError}</span>
                    </div>
                    {/if}
                    {if $messageSuccess neq ""}
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span>{$messageSuccess}</span>
                    </div>
                    {/if}
                    
                </div>
                <form action="userProfile.php" method="POST">
                    <input type="hidden" value="{$usuario->getId()}" name="Id">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" required="required" name="Nome" value="{$usuario->getNome()}">
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input class="form-control disabled" required="required" value="{$usuario->getEmail()}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input class="form-control" name="Senha" value="">
                    </div>
                    <div class="form-group">
                        <label>Repetir a Senha</label>
                        <input class="form-control" name="RepetirSenha" value="">
                    </div>
                    <div class="form-group">
                        <label>Data/Hora Registro</label>
                        <input class="form-control disabled" required="required" value="{$usuario->getDataCriacao()}" disabled>
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
{include file="footer.tpl"}