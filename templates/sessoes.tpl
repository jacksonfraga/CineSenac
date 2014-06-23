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
                                    <th class="hidden-sm">Capacidade</th>
                                    <th class="column-icon"></th>
                                    <th class="column-icon"></th>
                                    <th class="column-icon"></th>
                                </tr>
                            </thead>

                            <tbody>
                                {foreach $sessoes as $sessao}
                                    <tr>
                                        <td>{$sessao->getFilme()->getTitulo()}</td>
                                        <td>{$sessao->getInicio()}</td>
                                        <td class="hidden-sm">
                                            <div class="progress">
                                                <div class="progress-bar {if ($sessao->getCapacidade() >= 100)}progress-bar-danger{elseif ($sessao->getCapacidade() > 90)}{/if}" role="progressbar" aria-valuenow="{$sessao->getCapacidade()}" aria-valuemin="0" aria-valuemax="100" style="width: {$sessao->getCapacidade()}%;">{$sessao->getCapacidade()}%</div>
                                            </div>
                                        </td>
                                        <td><a href="ingresso.php?SessaoId={$sessao->getId()}" class="btn btn-primary">Comprar</a></td>
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
    <div class="row hidden-sm">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Capacidade (Legenda)</h3>
                </div>
                <div class="panel-body">
                    <span class="label label-primary">Sessão Disponível</span>
                    <span class="label label-warning">Últimos Ingressos</span>
                    <span class="label label-danger">Sessão Lotada</span
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
{include file="footerDatatables.tpl" subtemplate="sessoesDatatable.tpl"}