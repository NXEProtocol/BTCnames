<?php
	require_once('template.php');
	echo HTMLHEADER;
	$path = dirname($_SERVER['PHP_SELF']);
	$path = ($path == '/' ? '' : $path);
	$home = 'http://'.$_SERVER['HTTP_HOST'].$path.'/';
?>
		<div class="header">
		
			<p class="headline"><a href="<?php echo $home; ?>">BTCnames</a></p>
			<br/>an aliasing service for Bitcoin user.
		</div>