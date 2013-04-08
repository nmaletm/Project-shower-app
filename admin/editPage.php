<?
include "parts/admin.php";
$pc = PageController::getInstance();


if($_REQUEST['mode'] == "add"){
	$page = new Page();
	$page->title = $_REQUEST['title'];
	$page->html = $_REQUEST['html'];
	$page->id = $_REQUEST['id'];
	
	$pc->save($page);
	header("Location: ?id=".$page->id);
	exit;
}
$id = $_REQUEST['id'];
if($id){
	$page = $pc->load($id);
}
?>
<? include "parts/cap.php";?>

<div class="page-header">
    <h3>
    Añadir una pregunta    </h3>
</div>
<form action="" method="post">
  <fieldset>

    <input type="hidden" name="mode" value="add"/>
	
    <h4>Página</h4>
	
	<h5>HTML</h5>
    <textarea rows="3" style="width: 100%; height: 500px;" name="html" id="codeArea"><?=$page->html?></textarea>
    <br/>
	
	<h5>Identificador</h5>
	<input type="text" name="id" value="<?=$page->id?>" style="width: 100%"/>
	
	<h5>Titulo</h5>
	<input type="text" name="title" value="<?=$page->title?>" style="width: 100%"/>
	


    <div class="form-actions">
      <button class="btn btn-primary" name="submit">Guardar</button>
    <a href="/admin/" role="button" class="btn">Cancelar</a>
    </div>
  </fieldset>
</form>
		<link rel="stylesheet" type="text/css" href="<?=$url_static?>/LDT/lib/TextareaDecorator.css">
		<style>
			/* Fix for bootstrap */
			.ldt pre{padding: 0px;white-space: pre; background: none; border: none;}
			
			
			/* highlight styles */
			.ldt .comment { color: silver; }
			.ldt .string { color: green; }
			.ldt .number { color: navy; }
			/* setting inline-block and margin to avoid misalignment bug in windows */
			.ldt .keyword { font-weight: bold; display: inline-block; margin-bottom: -1px; }
			.ldt .variable { color: #008080; }
			.ldt .define { color: blue; }
			.ldt, .ldt pre, .ldt textarea { font-size: 12px !important; }
		</style>
		<script src="<?=$url_static?>/LDT/lib/Parser.js" type="text/javascript"></script>
		<script src="<?=$url_static?>/LDT/lib/TextareaDecorator.js" type="text/javascript"></script>
		<script type="text/javascript">
			// get element shortcut
			function $(e){ return document.getElementById(e); };
			// generic syntax parser
			var parser = new Parser({
				whitespace: /\s+/,
				comment: /\/\*([^\*]|\*[^\/])*(\*\/?)?|(\/\/|#)[^\r\n]*/,
				string: /"(\\.|[^"\r\n])*"?|'(\\.|[^'\r\n])*'?/,
				number: /0x[\dA-Fa-f]+|-?(\d+\.?\d*|\.\d+)/,
				keyword: /(and|as|case|catch|class|const|def|delete|die|do|else|elseif|esac|exit|extends|false|fi|finally|for|foreach|function|global|if|new|null|or|private|protected|public|published|resource|return|self|static|struct|switch|then|this|throw|true|try|var|void|while|xor)(?!\w|=)/,
				variable: /[\$\%\@](\->|\w)+(?!\w)|\${\w*}?/,
				define: /[$A-Z_a-z0-9]+/,
				op: /[\+\-\*\/=<>!]=?|[\(\)\{\}\[\]\.\|]/,
				other: /\S+/,
			});
			// wait for the page to finish loading before accessing the DOM
			window.onload = function(){
				// get the textarea
				var textarea = $('codeArea');
				// lets set it to something interesting
				//textarea.value = '<!DOCTYPE html>\n<html>\n\t' + document.documentElement.innerHTML + '\n</html>';
				// start the decorator
				decorator = new TextareaDecorator( textarea, parser );
			};
		</script>
<? include "parts/final.php";?>