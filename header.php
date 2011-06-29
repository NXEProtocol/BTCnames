<?php
	require_once('template.php');
	echo HTMLHEADER;
	$path = dirname($_SERVER['PHP_SELF']);
	$path = ($path == '/' ? '' : $path);
	$home = 'http://'.$_SERVER['HTTP_HOST'].$path.'/';
?>
		<div class="header">
		
			<p class="headline"><a href="<?php echo $home; ?>">BTCnames</a></p>
			<br/><center>an aliasing service for Bitcoin user.</center>
		</div>
<table class="contentbox" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<b class="rrcorner">
			<b class="rrcorner1"><b></b></b>
			<b class="rrcorner2"><b></b></b>
			<b class="rrcorner3"></b>
			<b class="rrcorner4"></b>
			<b class="rrcorner5"></b></b>
		</td>
	</tr>
	<tr>