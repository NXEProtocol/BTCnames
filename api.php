<?php
	include 'config.php';

	$path = dirname($_SERVER['PHP_SELF']);
	$path = ($path == '/' ? '' : $path);
	
	/*
		The post method is currently a little password hasher.
		It gets a posted password and some other data (needed for the GET string)
		and redirects to the corresponding get string.
	*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$pw = hash('sha256', htmlentities($_POST['password']));
		$redirect = htmlentities($_POST['redirect']);
		$type = $_POST['type'];
		if ($type == 'add')
		{
			header('Location: http://'.$_SERVER['HTTP_HOST'].$path.'/api.php?type='.$type.'&deposit='. htmlentities($_POST['deposit']) . '&alias='.htmlentities($_POST['alias']).'&key='.$pw.'&redirect='.$redirect);
		}
		else if ($type == 'delete')
		{
			header('Location: http://'.$_SERVER['HTTP_HOST'].$path.'/api.php?type='.$type.'&alias='.htmlentities($_POST['alias']).'&key='.$pw.'&redirect='.$redirect);
		}
		else
		{
			header('Location: http://'.$_SERVER['HTTP_HOST'].$path.'/api.php?type=error&code=000');
		}
		

		exit;
	}
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$type 		= $_GET['type'];
		$redirect	= $_GET['redirect'];
		$result 	= '';

		if ($type == 'add')
		{
			// read values;
			$depo 	= htmlentities($_GET['deposit']);
			$alias 	= htmlentities($_GET['alias']);
			$key 	= htmlentities($_GET['key']);
			// add to db
			$result = AddName($depo, $alias, $key);
			//redirect if wanted
			if ($redirect != '')
			{
				header('Location: '. $redirect.'?result='.$result);
			}
			else	// or just print result
			{
				echo $result;
			}
		}
		else if ($type == 'resolve')
		{
			// read value
			$alias 	= htmlentities($_GET['alias']);
			// query db
			$result = ResolveName($alias);
			//redirect if wanted
			if ($redirect != '')
			{
				header('Location: '. $redirect.'?result='.$result);
			}
			else	// or just print result
			{
				echo $result;
			}
		}
		else if ($type == 'delete')
		{
			// read values;
			$alias	= htmlentities($_GET['alias']);
			$key 	= htmlentities($_GET['key']);
			// add to db
			$result = DeleteEntry($alias,$key);
			//redirect if wanted
			if ($redirect != '')
			{
				header('Location: '. $redirect.'?result='.$result);
			}
			else	// or just print result
			{
				echo $result;
			}
		}
		else
		{
			$code = $_GET['code'];
			//TODO: implement error codes in external file
			if ($code == '000')
			{
				echo 'Wrong type in POST processing.';
			}
			else
			{
				echo 'Unknown Error';
			}
		}
		exit;	
	}
	
	
	
	/*
	  salted hashing of a plain text with whirlpool hashing
	  returns the hashed value
	*/
	function HashIt($string, $salt)
	{
		return hash('whirlpool', $salt.$string.$salt);
	}
	
	
	/*
		hashes the username, just to provide errors 
	*/
	function HashUsername($username)
	{
		return HashIt($username, strlen($username).$username);
	}
	
	
	/*
	  Main function to add a new entry to db.
	  attributes:
	  	$deposit: BTC hash
	  	$username: username in plain text
	  	$password: chosen userpassword (in plaintext/user encrypted)
	  	
	  returns a result id:
	  	0: could not insert user, unknown error
	  	1: OK
	  	2: duplicate
	  	3: db error
	  	4: wrong btc hash
	*/
	function AddName($deposit, $username, $password)
	{
		$result=0;
		//hash username
		$hash = HashUsername($username);
		//check for duplicates		
		$queryresults = ExecSQLReturnAArray("SELECT * FROM btcnames WHERE name='".$hash."'");
		//query went ok		
		if ($queryresults != FALSE)
		{
			//no dupes found
			if (mysql_num_rows($queryresults) == 0)
			{
				//hash key
				$hashedkey = HashIt($password, $hash);
				//insert all into db
				$query = "INSERT INTO `btcnames` (`btc`, `name`, `key`) VALUES ('".$deposit."', '".$hash."', '".$hashedkey."')";
				$queryresults = ExecSQLReturnAArray($query);
				//insert went OK
				if ($queryresults != FALSE)
				{
					$result=1;
				}
				else	//insert went wrong
				{
					$result=3;
				}
			} 
			else	//dupes found
			{
				$result=2;
			}
		}
		else //query went wrong
		{
			$result=3;
		}
		return $result;	
	}


	/*
	  Main function to recieve a btc hash from db.
	  attributes:
	  	$username: username in plain text
	  	
	  returns a btc hash or result id:
	  	0: could not retrieve user, unknown error
	  	1: reserved
	  	2: not found
	  	3: db error
	*/	
	function ResolveName($username)
	{
		$result = 0;
		//hash username
		$hash = HashUsername($username);
		//query db
		$queryresults = ExecSQLReturnAArray("SELECT btc FROM btcnames WHERE name='".$hash."'");
		//query went ok
		if ($queryresults != FALSE)
		{
			//something found
			if (mysql_num_rows($queryresults) > 0)
			{
				//fetch result
				$row = mysql_fetch_row($queryresults);
				//return
				$result=$row[0];
			}
			else //nothing found
			{
				$result=2;
			}
		}
		else //query went wrong
		{
			$result = 3;
		}
		return $result;
		
	}
	
	/*
	  Main function to delete an entry from db.
	  attributes:
	  	$username: username in plain text
	  	$password: in plain text/user encrypted
	  	
	  returns result id:
	  	0: could not retrieve user, unknown error
	  	1: deleted
	  	2: not found
	  	3: db error
	*/
	function DeleteEntry($username,$password)
	{
		$result=0;
		//hash username
		$hash = HashUsername($username);
		//hash key
		$hashedkey = HashIt($password, $hash);
		$queryresults = ExecSQLReturnAArray("DELETE FROM btcnames WHERE name='".$hash."' AND key='".$hashedkey."'");
		//query went ok		
		if ($queryresults != FALSE)
		{
			$result = 1;
		
		}
		else //query went wrong
		{
			$result = 3;
		}
	}

?>