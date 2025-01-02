<!doctype html>

<html lang="en">
<head>
	<title>Tabletop Miniatures Game Prototyping Toolkit</title>
	<meta name="description" content="Write a new tabletop miniatures game in seconds.">
	<meta property="og:site_name" content="Fundamentals of Tabletop Miniatures Game Design" />
	<meta property="og:image" content="FunTopMockUp260.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Orbitron|Special+Elite|Quantico|Russo+One|VT323|Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="styles.css">  
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-68265959-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-68265959-1');
	</script>

	<?php
	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	//// HASHING FUNCTION
	function numHash($str, $len=null)
	{
		$binhash = md5($str, true);
		$numhash = unpack('N2', $binhash);
		$hash = $numhash[1] . $numhash[2];
		if($len && is_int($len)) {
			$hash = substr($hash, 0, $len);
		}
		return $hash;
	}
	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	
	$number_of_dice_rolls_required = 15;
	$game_rolls = numHash(time(),$number_of_dice_rolls_required);
	IF (ISSET($_GET['seed'])) { $game_rolls = substr($_GET['seed'],0,$number_of_dice_rolls_required); }
	$dice_number = 0;
	
	$game_rolls_new = numHash(time()+1,$number_of_dice_rolls_required);

	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	//// NAME GENERATOR
	// Get the table files
	$first = file_get_contents('name-generator/first.txt');
	$second = file_get_contents('name-generator/second.txt');
	
	// Here we split it into lines
	$first = explode("\n", $first);
	shuffle($first);
	$second = explode("\n", $second);
	shuffle($second);
	
	
	$game_name = $first[0] . ' ' . $second[0];
	IF (ISSET($_GET['game_name'])) { $game_name = html_entity_decode($_GET['game_name']); }
	
	$game_name_new = $first[1] . ' ' . $second[1];
	
	?>	
	
	
</head>

<body>
<div class="container">

<h3 class="roc-header">The Rule of Carnage</h3>
<h1 class="roc-header">Tabletop Miniatures Game Prototyping Toolkit</h1>

<p>Write a new tabletop miniatures game in seconds!</p>
<p class="button" id="generate"><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?seed=<?php echo $game_rolls_new; ?>&game_name=<? echo htmlentities($game_name_new); ?>">Roll up a new game</a></p>

<br/>
<h3>What is this?</h3>
<div style="float:right;margin:0 0 15px 20px">
	<a href="https://planetsmashergames.com/fundamentals"><img src="FunTopCover260.jpg" class="book-image" /></a>
	<p class="vsmall" style="text-align:center;" class="book-image"><a href="https://www.routledge.com/The-Fundamentals-of-Tabletop-Miniatures-Game-Design-A-Designers-Handbook/Ford-Hutchinson/p/book/9781032324012">Pre-order now!</a></p>
</div>
<p>This toolkit is as a rapid prototyping tool, allowing you to generate the skeleton of a tabletop miniatures game in moments. It also exists to make the point that if a design simply reorganises common mechanical tropes into a new order, it is unlikely to be an effective design. Effective game design tightly integrates its core ideas with mechanics to shape the players' experiences.</p> 
<p>This toolkit builds on the ideas found in our upcoming book: <a href="https://www.routledge.com/The-Fundamentals-of-Tabletop-Miniatures-Game-Design-A-Designers-Handbook/Ford-Hutchinson/p/book/9781032324012">The Fundamentals of Tabletop Miniatures Game Design</a>.</p>
<p>This toolkit doesn’t create interesting games, it creates functional ones. It can be used as a starting point or as an inspiration. It isn't quite finished yet and will be developed over the next few months.</p>
<br/>

<h3 class="vsmall" >Public Domain</h3>
<p class="vsmall" xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/">This toolkit <a property="dct:title" rel="cc:attributionURL" href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/">Tabletop Miniatures Game Prototyping Toolkit</a> by <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="https://ruleofcarnage.com">Glenn Ford and Mike Hutchinson</a> is offered in the public domain via <a href="https://creativecommons.org/publicdomain/zero/1.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC0 1.0 Universal<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/zero.svg?ref=chooser-v1" alt=""></a>.  We waive all of our rights to the work worldwide under copyright law, including all related and neighboring rights, to the extent allowed by law.
You can copy, modify, distribute and perform either the output or the code of this toolkit, even for commercial purposes, with no permission or attribution required. Download the code on <a href="https://github.com/crikeymiles2/tabletop-miniatures-game-prototyping-toolkit" target="_blank">Github</a>.</p>
<br/><br/><br/>



<?php	
	IF (ISSET($_GET['seed'])) 
		{ ?>
		
			<h1 id="rules">Your new miniatures game is called: <span class="game-name" style="color:crimson;"><?php echo $game_name; ?></span></h1>
			<p>Seed: #<?php echo $game_rolls; ?> | 
			
			<?php echo  '<a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?seed=' .  $game_rolls . '&game_name=' . htmlentities($game_name) . '">Bookmark this game</a> | <a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?seed=' .  $game_rolls_new . '&game_name=' . htmlentities($game_name_new) . '">Roll up a new game</a></p>';

		include_once('game-generator.php'); 
		}
		
	ELSE { 
			echo '<p class="button" id="generate"><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?seed=' . $game_rolls_new . '&game_name=' . htmlentities($game_name_new) . '">Roll up a new game</a></p>'; 
		} 
?>




<footer>
<p class="vsmall">Version 0.4 (Beta). Rules text by <a href="https://www.manokentgames.com/">Glenn Ford</a> and <a href="https://planetsmashergames.com">Mike Hutchinson</a>. <a href="https://github.com/crikeymiles2/tabletop-miniatures-game-prototyping-toolkit" target="_blank">Terrible PHP</a> by Mike. Buy our book, <a href="https://planetsmashergames.com/fundamentals">The Fundamentals of Tabletop Miniatures Game Design</a>.</p>
</footer>

</div>
</body>
</html>