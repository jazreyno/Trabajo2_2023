<?php
/* Smarty version 4.2.1, created on 2023-10-14 20:32:45
  from 'C:\xampp\htdocs\web\TRABAJO ESPECIAL\trabajo2023-3\trabajo2023\templates\tablaempresa.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_652adecd3722e6_40184424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '250b5b3aa59eda27c3d9b08b33d8688ef79a5093' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web\\TRABAJO ESPECIAL\\trabajo2023-3\\trabajo2023\\templates\\tablaempresa.tpl',
      1 => 1697308363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_652adecd3722e6_40184424 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>Empresas</h1>

<table class="table table-success table-striped-columns" id="tabla">
<th> empresas </th> 
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['empresa']->value, 'empresas');
$_smarty_tpl->tpl_vars['empresas']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['empresas']->value) {
$_smarty_tpl->tpl_vars['empresas']->do_else = false;
?>
   
       <tr> <td><a href="verProductoMarca/<?php echo $_smarty_tpl->tpl_vars['empresas']->value->id_empresa;?>
 ">  <?php echo $_smarty_tpl->tpl_vars['empresas']->value->nombre;?>
 </a></td>  

       <td><a href='borrarMarcas/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marcas;?>
'class="btn btn-danger" > Eliminar </a></td>
<a href='editarMarcasForm/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marcas;?>
'class="btn btn-success"> Editar </a></td>
       </tr>
     
 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
 
</table>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}