{include file="header.tpl"}

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clientes</h1>
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
                    Listagem de Clientes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th class="hidden-xs hidden-sm">Telefone</th>
                                    <th class="hidden-xs hidden-sm">Cidade</th>
                                    <th class="column-icon"></th>
                                    <th class="column-icon"></th>
                                    <th class="column-icon"></th>
                                </tr>
                            </thead>

                            <tbody>
                                {foreach $clientes as $cliente}
                                    <tr>
                                        <td>{$cliente->getNome()}</td>
                                        <td class="hidden-xs hidden-sm">{$cliente->getTelefone()}</td>
                                        <td class="hidden-xs hidden-sm">{$cliente->getCidade()}</td>
                                        <td><span class="glyphicon glyphicon-eye-open"></span></td>
                                        <td><span class="glyphicon glyphicon-edit"></span></td>
                                        <td><span class="glyphicon glyphicon-trash"></span></td>
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
    
    {include file="footerDatatables.tpl"}