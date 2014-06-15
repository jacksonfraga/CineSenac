{include file="header.tpl"}

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Filmes</h1>
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
        {foreach $filmes as $filme}            
            <div class="col-lg-6">
                <div class="display-filme">
                    <div class="cover">
                    <a href="#"><img src="{$filme->getImageUrl()}" alt="Cover do Filme" ></a>
                    </div>
                    <div class="data-movie">
                        <a href="#">{$filme->getTitulo()}</a>
                        <div>Gênero</div>
                        <div>{$filme->getGenero()}</div>
                        <div>Com</div>
                        <div>{$filme->getAtores()}</div>
                    </div>
                </div>
            </div>

        {/foreach} 
    </div>
    <!-- /#page-wrapper -->
    {include file="footer.tpl"}