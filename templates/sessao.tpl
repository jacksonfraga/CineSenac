{include file="header.tpl"}

<div id="page-wrapper">    
    <form role="form" action="sessao.php" method="POST">

        <div class="row">
            <div class="col-lg-12">
                <div><h2>Sessão</h2></div>
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
            <input type="hidden" required=required class="form-control" id="Id" name="Id" value="{$sessao->getId()}" />
            <div class="col-sm-6">               
                <div class="form-group">
                    <label for="Nome">Data</label>
                    <input type="date" required=required class="form-control" id="Data" name="Data" value="{$sessao->getData()}" />
                </div>
            </div>

            <div class="col-sm-3">

                <div class="form-group">
                    <label for="Nome">Início</label>
                    <input type="time" required=required class="form-control" id="Inicio" name="Inicio" value="{$sessao->getInicio()}" />
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="Nome">Fim</label>
                    <input type="time" required=required class="form-control" id="Fim" name="Fim" value="{$sessao->getFim()}" />
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Filme</label>
                    <select class="form-control" id="FilmeId" name="FilmeId" >
                        <option value="">(Selecione)</option>
                        {foreach $filmes as $filme}
                            <option value="{$filme->getId()}" {if ($filme->getId() eq $sessao->getFilmeId())}selected{/if}>{$filme->getTitulo()}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="Telefone">Sala</label>
                    <select class="form-control" id="SalaId" name="SalaId">
                        <option value="">(Selecione)</option>
                        {foreach $salas as $sala}                            
                            <option value="{$sala->getId()}" {if ($sala->getId() eq $sessao->getSalaId())}selected{/if}>{$sala->getNome()}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Valor</label>
                    <input type="text" class="form-control" id="Valor" name="Valor" value="{$sessao->getValor()}" />
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