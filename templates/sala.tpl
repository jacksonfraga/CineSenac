{include file="header.tpl"}

<div id="page-wrapper">    
    <form role="form" action="sala.php" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <div><h2>Sala</h2></div>
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
        <div class="row">
            <div class="col-sm-8">
                <input type="hidden" required=required class="form-control" id="Id" name="Id" value="{$sala->getId()}" />
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="text" required=required class="form-control" id="Nome" name="Nome" value="{$sala->getNome()}" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Email">Capacidade</label>
                    <input type="number" class="form-control" id="Capacidade" name="Capacidade" value="{$sala->getCapacidade()}" />
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