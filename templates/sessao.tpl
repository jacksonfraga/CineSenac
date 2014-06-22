{include file="header.tpl"}

<div id="page-wrapper">    
    <form role="form" action="sessao.php" method="POST">

        <div class="row">
            <div class="col-lg-12">
                <div><h2>Filme</h2></div>
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
            <div class="col-lg-12">
                <input type="hidden" required=required class="form-control" id="Id" name="Id" value="{$filme->getId()}" />
                <div class="form-group">
                    <label for="Nome">Titulo</label>
                    <input type="text" required=required class="form-control" id="Titulo" name="Titulo" value="{$filme->getTitulo()}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Email">Duração</label>
                    <input type="number" class="form-control" id="Duracao" name="Duracao" value="{$filme->getDuracao()}" />
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="form-group">
                    <label for="Telefone">URL de Imagem</label>
                    <input type="text" required=required class="form-control" id="ImageUrl" name="ImageUrl" value="{$filme->getImageUrl()}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Lançamento</label>
                    <input type="date" class="form-control" id="Lancamento" name="Lancamento" value="{$filme->getLancamento()}" />
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="Telefone">Término</label>
                    <input type="date" required=required class="form-control" id="Termino" name="Termino" value="{$filme->getTermino()}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Atores</label>
                    <input type="text" class="form-control" id="Atores" name="Atores" value="{$filme->getAtores()}" />
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="Telefone">Gênero</label>
                    <input type="text" required=required class="form-control" id="Genero" name="Genero" value="{$filme->getGenero()}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="Estado">Sinopse</label>
                    <textarea class="form-control" required=required id="Sinopse" name="Sinopse" rows="6">{$filme->getSinopse()}</textarea>
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