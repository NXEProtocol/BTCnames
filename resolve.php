<?php
	$path = dirname($_SERVER['PHP_SELF']);
	$path = ($path == '/' ? '' : $path);
	echo '<div class="resolvebox">';
		echo '<form action="api.php" method="get">';
			echo '<input type="hidden" name="type" value="resolve" />';	
			echo '<table>';
			echo '<tr><td class="inputtitletd">BTC Name:</td><td><input type="text" name="alias" size="50" value="" /></td></tr>';
//			echo '<tr><td class="inputtitletd">Password:</td><td><input type="text" name="password" size="50" value="" /></td></tr>';
			echo '</table>';
		//	echo '<input type="hidden" name="redirect" value="http://'.$_SERVER['HTTP_HOST'].$path.'/" />';	
			echo '<input type="submit" value="Resolve"/>';
		echo '</form>';		
	echo '</div>';
?>