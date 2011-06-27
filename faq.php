<?php 
	include 'header.php';
?>
<div class="body">
	<div class="QABox">
		<span class="question">What exactly is BTCnames?</span>
		<br />
		<span class="answer">It is a free naming/aliasing service for Bitcoin users. It gives them the opportunity to replace the long Deposit hash with a short, self chosen string. The idea behind BTCnames is to simplify shop/marketing integration of commercial Bitcoin users and to simplify daily usage for everybody who uses Bitcoins.</span>
	</div>
	<div class="QABox">
		<span class="question">Does it risks the anonymity Bitcoin offers?</span>
		<br />
		<span class="answer">No, aside from the values you enter with adding a name and two timestamps (added and last resolved), there are no extra information saved. Additionally your name and your password are hashed with salt using the whirlpool algorithm.</span>
	</div>
	<div class="QABox">
		<span class="question">Are there any limitations of names to be used?</span>
		<br />
		<span class="answer">No. As all names are hashed with whirlpool, the theoretical maximum is double as all BTC hashes. So if all BTC hashes are linked to one user and every user wants to use this service, everybody gets two.</span>
	</div>
	<div class="QABox">
		<span class="question">Why do I need a password?</span>
		<br />
		<span class="answer">The password give you the ability to delete your entry.</span>
	</div>
	<div class="QABox">
		<span class="question">How can I delete an entry?</span>
		<br />
		<span class="answer">Use this form: <a href="delete.php">Delete</a> </span>
	</div>
	<div class="QABox">
		<span class="question">Why does this site looks so crappy?</span>
		<br />
		<span class="answer">As there is no webdesigner working on it. Do you want to? Mail us. team [at] btcnames.org</span>
	</div>
	<div class="QABox">
		<span class="question">Can I integrate the BTCnames API into my webapp/software?</span>
		<br />
		<span class="answer">Yes, you can and you are asked to do so. Read the <a href="devfaq.php">developer FAQ</a> for more info.</span>
	</div>
	<div class="QABox">
		<span class="question">I have further questions.</span>
		<br />
		<span class="answer">Send us a mail. team [at] btcnames.org</span>
	</div>
</div>
<?php 
	include 'footer.php';
?>