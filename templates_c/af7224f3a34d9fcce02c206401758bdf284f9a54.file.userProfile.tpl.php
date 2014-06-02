<?php /* Smarty version Smarty-3.1.18, created on 2014-06-01 18:50:32
         compiled from "templates\userProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3027538b7b0052d176-22004525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af7224f3a34d9fcce02c206401758bdf284f9a54' => 
    array (
      0 => 'templates\\userProfile.tpl',
      1 => 1401659430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3027538b7b0052d176-22004525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_538b7b0079e4d3_29970301',
  'variables' => 
  array (
    'messageError' => 0,
    'messageSuccess' => 0,
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538b7b0079e4d3_29970301')) {function content_538b7b0079e4d3_29970301($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perfil do Usuário</h1>
                <div>
                    <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span><?php echo $_smarty_tpl->tpl_vars['messageError']->value;?>
</span>
                    </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['messageSuccess']->value!='') {?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span><?php echo $_smarty_tpl->tpl_vars['messageSuccess']->value;?>
</span>
                    </div>
                    <?php }?>
                    
                </div>
                <form action="userProfile.php" method="POST">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getId();?>
" name="Id">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" required="required" name="Nome" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getNome();?>
">
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input class="form-control disabled" required="required" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getEmail();?>
" disabled>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input class="form-control" name="Senha" value="">
                    </div>
                    <div class="form-group">
                        <label>Repetir a Senha</label>
                        <input class="form-control" name="RepetirSenha" value="">
                    </div>
                    <div class="form-group">
                        <label>Data/Hora Registro</label>
                        <input class="form-control disabled" required="required" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getDataCriacao();?>
" disabled>
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
