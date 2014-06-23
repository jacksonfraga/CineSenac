{include file="header.tpl"}

<div id="page-wrapper">    
    <form role="form" action="ingresso.php" method="POST">

        <div class="row">
            <div class="col-lg-12">
                <div><h2>Ingresso</h2></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    {if $messageError neq ""}
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <span>{$messageError}</span>
                        </div>
                    {/if}
                    {if $messageSuccess neq ""}
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <span>{$messageSuccess}</span>
                        </div>  
                    {/if}

                </div>
            </div>
        </div>

        <input type="hidden" required=required class="form-control" id="Id" name="Id" value="{$ingresso->getId()}" />

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Sessao</label>
                    <select class="form-control" id="SessaoId" name="SessaoId" required="required">
                        <option value="">(Selecione)</option>
                        {foreach $sessoes as $sessao}
                            <option value="{$sessao->getId()}" {if ($sessao->getId() eq $ingresso->getSessaoId())}selected{/if}>{$sessao->getDisplay()}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="Telefone">Cliente</label>
                    <select class="form-control" id="ClienteId" name="ClienteId" required="required">
                        <option value="">(Selecione)</option>
                        {foreach $clientes as $cliente}                            
                            <option value="{$cliente->getId()}" {if ($cliente->getId() eq $ingresso->getClienteId())}selected{/if}>{$cliente->getNome()}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
    <!-- /.col-lg-12 -->
</div>
<!-- /#page-wrapper -->
</div>
{include file="footer.tpl"}