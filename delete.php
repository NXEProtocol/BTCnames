<?php 
	include 'header.php';
?>
<div class="body">
<?php
	$path = dirname($_SERVER['PHP_SELF']);
	$path = ($path == '/' ? '' : $path);
	echo '<div class="deletebox">';
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			if (isset($_GET['result']))
			{
				$resultid = $_GET['result'];
				switch ($resultid)
				{
					case 0:
						echo 'Unknown Error. Contact Staff: team@btcnames.org';
					break;
					case 1:
						echo 'All done. :)';
					break;
					case 2:
						echo 'Name not found!';
					break;
					case 3:
						echo 'Database Error. Contact Staff: team@btcnames.org';
					break;
					
					default:
	
					break;
				}
			}
		}
		echo '<form action="api.php" method="post">';
			echo '<input type="hidden" name="type" value="delete" />';	
			echo '<table>';
			echo '<tr><td class="inputtitletd">BTC Name:</td><td><input type="text" name="alias" size="50" value="" /></td></tr>';
			echo '<tr><td class="inputtitletd">Password:</td><td><input type="password" name="password" size="50" value="" /></td></tr>';
			echo '</table>';
			echo '<input type="hidden" name="redirect" value="http://'.$_SERVER['HTTP_HOST'].$path.'/delete.php" />';	
			echo '<input type="submit" value="Delete"/>';
		echo '</form>';		
	echo '</div>';
?>
</div>
<?php 
	include 'footer.php';
?>