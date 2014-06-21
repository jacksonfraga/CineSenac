{include file="header.tpl"}

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Salas</h1>
            <p><a href="sala.php" class="btn btn-primary">Nova Sala</a></p>
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
                    Listagem de Salas
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th class="hidden-xs hidden-sm">Capacidade</th>
                                    <th class="column-icon"></th>
                                    <th class="column-icon"></th>
                                </tr>
                            </thead>

                            <tbody>
                                {foreach $salas as $sala}
                                    <tr>
                                        <td>{$sala->getNome()}</td>
                                        <td class="hidden-xs hidden-sm">{$sala->getCapacidade()}</td>                                        
                                        <td><a href="sala.php?id={$sala->getId()}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        <td><a class="delete-record" href="sala.php?delete=1&id={$sala->getId()}"><span class="glyphicon glyphicon-trash"></span></a></td>
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
    {include file="footerDatatables.tpl"}