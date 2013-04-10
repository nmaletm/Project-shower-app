<?
// This page can be only loaded included from /admin/editTab.php

$tab = $GLOBALS['tab'];
$isEditing = $GLOBALS['isEditing'];
?>
	<h5>HTML</h5>
    <textarea rows="3" style="width: 100%; height: 500px;" name="html" id="codeArea"><?=$tab->html?></textarea>
    <br/>
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
			// generic syntax parser
			var parser = new Parser({
				whitespace: /\s+/,
				comment: /\/\*([^\*]|\*[^\/])*(\*\/?)?|(\/\/|#)[^\r\n]*/,
				string: /"(\\.|[^"\r\n])*"?|'(\\.|[^'\r\n])*?/,
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
				var textarea = document.getElementById('codeArea');
				// lets set it to something interesting
				//textarea.value = '<!DOCTYPE html>\n<html>\n\t' + document.documentElement.innerHTML + '\n</html>';
				// start the decorator
				decorator = new TextareaDecorator( textarea, parser );
			};
		</script>