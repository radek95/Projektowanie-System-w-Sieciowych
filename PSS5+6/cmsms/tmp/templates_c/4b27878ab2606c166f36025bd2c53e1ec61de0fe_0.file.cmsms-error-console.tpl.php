<?php
/* Smarty version 3.1.31, created on 2023-05-15 01:03:11
  from "C:\xampp\htdocs\cmsms\lib\assets\templates\cmsms-error-console.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_646168afb68135_72695792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b27878ab2606c166f36025bd2c53e1ec61de0fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cmsms\\lib\\assets\\templates\\cmsms-error-console.tpl',
      1 => 1683496198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646168afb68135_72695792 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_root_url')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>CMS Made Simple - Error Console</title>
		<meta name="robots" content="noindex, nofollow" />
        <style>
			body {
				min-width: 900px;
				font-family: sans-serif;
				color: #232323;
				line-height: 1.3;
				font-size: 12px;
				background: #e9ecef;
			}
			#wrapper {
				width: 75%;
				background: #fff;
				margin: auto;
				padding: 15px 25px;
				box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
			}
			h1 {
				margin: 0;
				color: #ddd;
				font-size: 112px;
				font-family: Impact, Haettenschweiler, "Franklin Gothic Bold", Charcoal, "Helvetica Inserat", "Bitstream Vera Sans Bold", "Arial Black", sans serif;
			}
			h2 {
				border-radius: 6px;
				padding: 10px;
				font-weight: normal;
				color: #666;
				background: #ddd;
				border-color: #333;
			}
			pre {
				border: 1px solid #d5d5d5;
				border-left: 7px solid #d5d5d5;
				font-size: 13px;
				color: #333;
				font-family: Consolas, 'Andale Mono WT', 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', 'Courier New', monospace;
				padding: 15px;
				overflow: auto;
				word-wrap: break-word;
				border-radius: 6px;
			}
			.clear { clear: both }
			.important {
				color: #333;
				font-weight: bold;
			}
			.info {
				float: left;
				font-size: 16px;
				line-height: 25px;
				color: #999;
				margin-top: -10px;
				margin-left: 180px;
			}
			.logo {
				padding: 20px 0;
				text-align: center;
				width: 75%;
				margin: auto;
			}
			.message { font-weight: bold }
        </style>
    </head>
    <body>
        <div class="logo">
            <img src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/lib/assets/images/cmsms-logo.png" alt="CMS Made Simple" />
        </div>
        <div id="wrapper">
            <h1>Oops!</h1>
            <p class="info">
                It looks like something went wrong and an error has occurred.<br />
				A notification has been added to the admin log.
            </p>
            <div class="clear"></div>
			<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
				<h2><span class="important">ERROR</span> at line <?php echo $_smarty_tpl->tpl_vars['e_line']->value;?>
 of file <?php echo $_smarty_tpl->tpl_vars['e_file']->value;?>
:</h2>
				<p class="message">ERROR MESSAGE:</p>
				<pre><?php echo $_smarty_tpl->tpl_vars['e_message']->value;?>
</pre>
				<p class="message">TRACK TRACE:</p>
				<pre><?php echo $_smarty_tpl->tpl_vars['e_trace']->value;?>
</pre>
			<?php }?>
        </div>
    </body>
</html><?php }
}
