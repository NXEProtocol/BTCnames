<?php
	$path = dirname($_SERVER['PHP_SELF']);
	$path = ($path == '/' ? '' : $path);
	echo '<div class="createbox">';
		echo '<form action="api.php" method="post">';
			echo '<input type="hidden" name="type" value="add" />';	
			echo '<table>';
			echo '<tr><td class="inputtitletd">BTC Deposit:</td><td><input type="text" name="deposit" size="50" value="" /></td></tr>';
			echo '<tr><td class="inputtitletd">BTC Name:</td><td><input type="text" name="alias" size="50" value="" /></td></tr>';
			echo '<tr><td class="inputtitletd">Password:</td><td><input type="password" name="password" size="50" value="" /></td></tr>';
			echo '</table>';
			echo '<input type="hidden" name="redirect" value="http://'.$_SERVER['HTTP_HOST'].$path.'/" />';	
			echo '<input type="submit" value="Add"/>';
		echo '</form>';		
	echo '</div>';
?>