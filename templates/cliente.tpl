{include file="header.tpl"}

<div id="page-wrapper">    
    <form role="form" action="cliente.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-lg-12">
                <div><h2>Cliente</h2></div>
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
                <input type="hidden" required=required class="form-control" id="Id" name="Id" value="{$cliente->getId()}" />
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="text" required=required class="form-control" id="Nome" name="Nome" value="{$cliente->getNome()}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="{$cliente->getEmail()}" />
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="Telefone">Telefone</label>
                    <input type="text" data-inputmask="'mask': '(99) 9999-99999'" required=required class="form-control" id="Telefone" name="Telefone" value="{$cliente->getTelefone()}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">

                <div class="form-group">
                    <label for="Estado">Estado</label>
                    <input type="text" data-inputmask="'mask': 'aa'" required=required class="form-control" id="Estado" name="Estado" value="{$cliente->getEstado()}" />
                </div>
            </div>
            <div class="col-sm-10"> 
                <div class="form-group">
                    <label for="Cidade">Cidade</label>
                    <input type="text" required=required class="form-control" id="Cidade" name="Cidade" value="{$cliente->getCidade()}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="Endereco">Endereco</label>
                    <input type="text" required=required class="form-control" id="Endereco" name="Endereco" value="{$cliente->getEndereco()}" />
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="CPF">CPF</label>
                    <input type="text" data-inputmask="'mask': '999.999.999-99'" required=required class="form-control" id="CPF" name="CPF" value="{$cliente->getCPF()}" />
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="RG">RG</label>
                    <input type="text" required=required class="form-control" id="RG" name="RG" value="{$cliente->getRG()}" />
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="NomePai">NomePai</label>
                    <input type="text" required=required class="form-control" id="NomePai" name="NomePai" value="{$cliente->getNomePai()}" />
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="NomeMae">NomeMae</label>
                    <input type="text" required=required class="form-control" id="NomeMae" name="NomeMae" value="{$cliente->getNomeMae()}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Foto">Foto</label>
                    <input type="hidden" class="form-control" id="Foto" name="Foto" value="{$cliente->getFoto()}" />
                    <img class="thumbnail" src="{$cliente->getFoto()}" alt="Foto do Cliente" />
                    <input type="file" class="form-control" id="userfile" name="userfile" />
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
    <!-- /.col-lg-12 -->
</div>
<!-- /#page-wrapper -->
</div>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/inputmask/jquery.inputmask.js"></script>
    <script src="js/sb-admin.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
</body>

</html>
