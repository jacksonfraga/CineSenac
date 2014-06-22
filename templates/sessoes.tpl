{include file="header.tpl"}

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sessões</h1>
            <p><a href="sessao.php" class="btn btn-primary">Nova Sessão</a></p>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listagem de Sessões
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Filme</th>
                                    <th>Início</th>
                                    <th class="column-icon"></th>
                                    <th class="column-icon"></th>
                                </tr>
                            </thead>

                            <tbody>
                                {foreach $sessoes as $sessao}
                                    <tr>
                                        <td>{$sessao->getFilme()->getTitulo()}</td>
                                        <td>{$sessao->getInicio()}</td>
                                        <td><a href="sessao.php?id={$sessao->getId()}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        <td><a class="delete-record" href="sessao.php?delete=1&id={$sessao->getId()}"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    </tr>
                                {/foreach} 
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /#page-wrapper -->
</div>
    {include file="footerDatatables.tpl" subtemplate="sessoesDatatable.tpl"}