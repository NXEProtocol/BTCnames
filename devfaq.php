<?php 
	include 'header.php';
?>
<td class="globTD">
	<div class="body">
		<div class="QABox">
			<span class="question">How does the API works?</span>
			<br />
			<span class="answer">The API is at the moment, aside from one feature, a straight GET API. At the moment it offers only three features: Add, Resolve, Delete. Additionally it offers the optional feature to redirect after completion with a result field using GET. This is how the front end of this site uses it. The only POST feature at the moment is a simple sha256 password hasher which calls the GET api after completion.</span>
		</div>
		<div class="QABox">
			<span class="question">What is its syntax?</span>
			<br />
			<span class="answer">To add an entry:
			<br /><small>api.php?type=add&deposit=btc_hash&alias=plainusername&key=password[&redirect=url]</small><br/>
			To resolve an entry:
			<br /><small>api.php?type=resolve&alias=plainusername[&redirect=url]</small><br/>
			To delete an entry:
			<br /><small>api.php?type=resolve&alias=plainusername&key=password[&redirect=url]</small><br/>
			Optional fields are marked with [].</span>
		</div>
		<div class="QABox">
			<span class="question">How to deal with password?</span>
			<br />
			<span class="answer">Within the API the password is hashed with salt, but aside from this, its recommended to hash it before using the API, just make sure the hashing algorithm don't change without changing the entries.<br/>All entries added using the front end are hashed first using the API post request. So if you added entries manually which should then be handled automatically, there should be a sha256 hashing prior the API call.</span>
		</div>
		<div class="QABox">
			<span class="question">Is the API open source?</span>
			<br />
			<span class="answer">Yes it is: <a href="https://github.com/0x10/BTCnames">BTCnames@github</a> </span>
		</div>
	</div>
</td>
<?php 
	include 'footer.php';
?>