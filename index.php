<!doctype html>

<html lang="en">
<head>
	<title>Tabletop Miniatures Game Prototyping Toolkit</title>
	<meta name="description" content="Write a new tabletop miniatures game in seconds.">
	<meta property="og:site_name" content="Fundamentals of Tabletop Miniatures Game Design" />
	<meta property="og:image" content="" />
	<link href="https://fonts.googleapis.com/css?family=Orbitron|Press+Start+2P|Quantico|Russo+One|VT323|Roboto" rel="stylesheet">
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

	
	
	
</head>

<body>
<div class="container">

<h1>Tabletop Miniatures Game Prototyping Toolkit</h1>

<p>Write a new tabletop miniatures game in seconds.</p>

<p style="background-color:yellow;padding:15px"> Note for me and Glenn: the spreadsheet of data is <a href="https://docs.google.com/spreadsheets/d/12iCwt4A3GVowckUjwOw-Uj_-CLjJGkbPc6xL79Z5Xwk/edit#gid=109517467">here</a> (but currently has to be manually loaded into this tool).@Glenn - if you see anything you want to change, head over the spreadsheet.</p>

<p class="button"><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/">Roll up a new game</a></p>

<h3>What is this?</h3>
<div style="float:right;margin:0 0 15px 20px">
	<img src="FunTopMockUp260.jpg" />
	<p class="vsmall" style="width:260px;text-align:center;"><a>Buy our book!</a></p>
</div>
<p>This toolkit is provided partly as a rapid prototyping tool, allowing you to generate the skeleton of a tabletop miniatures game in moments. It also exists to make the point that if a design simply reorganises common mechanical tropes into a new order, it is unlikely to be an effective design. Effective game design tightly integrates its core ideas with mechanics to shape the players' experiences. It builds on the ideas found in our book: <em>The Fundamentals of Tabletop Miniatures Game Design</em>.</p>
<p>This toolkit doesn’t create interesting games, it creates functional ones. It can be used as a starting point or as an inspiration.</p>
<h3 class="vsmall" >Public Domain</h3>
<p class="vsmall" xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/">This toolkit <a property="dct:title" rel="cc:attributionURL" href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/">Tabletop Miniatures Game Prototyping Toolkit</a> by <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="https://ruleofcarnage.com">Glenn Ford and Mike Hutchinson</a> is offered in the public domain via <a href="https://creativecommons.org/publicdomain/zero/1.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC0 1.0 Universal<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/zero.svg?ref=chooser-v1" alt=""></a>.  We waive all of our rights to the work worldwide under copyright law, including all related and neighboring rights, to the extent allowed by law.
You can copy, modify, distribute and perform either the output or the code of this toolkit, even for commercial purposes, with no permission or attribution required. Download the code on <a>Github</a>.</p>


<!--p><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?game=<?php echo numHash(time(),8); ?>">Roll up a new game</a></p-->


<!--p><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?type=skirmish&game=<?php echo numHash(time(),8); ?>">Create a new skirmish game</a></p>
<!--p><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?type=massbattle&game=<?php echo numHash(time(),8); ?>">Create a new mass battle game</a></p>
<!--p><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?type=vehicle&game=<?php echo numHash(time(),8); ?>">Create a new vehicle game</a></p-->
<?php
// 	IF ($_GET['type'] == 'massbattle') { 
//			$game_type = 'massbattle'; 
//		} ELSEIF ($_GET['type'] == 'vehicle') {
//		$game_type = 'vehicle'; 
//		} ELSE {
//		$game_type = 'skirmish'; 
//		}
?>



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

$game_rolls = numHash(time(),8);
IF (ISSET($_GET['game'])) { $game_rolls = substr($_GET['game'],0,8); }
$dice_number = 0;

?>


<h1>Your new miniatures game is called: #<?php echo $game_rolls; ?></h1>
<p><a href="https://planetsmashergames.com/fundamentals/prototyping-toolkit/?game=<?php echo $game_rolls; ?>">Bookmark this game</a></p>


<h2>Rules Conventions</h2>
<ul>
<li><strong>More Specific Rules:</strong> The text of a specific rule can conflict with the general rules. In case of a conflict, the text relating to the more specific circumstance overrides the more general rule.</li>
<li><strong>Simultaneous Effects:</strong> If the effects of multiple rules appear to occur at the same time, the player whose turn it is decides the order of resolution. If this is unclear for any reason, roll-off and the winner of the roll-off decides the order of resolution.</li>
<li><strong>Roll-Off:</strong> Whenever a roll-off is required, both players roll a D6 and the player with the highest result is the winner of the roll-off. In the event of a tie, the players roll-off again.</li>
</ul>

<h2>Golden Rule</h2>
<?php
$roll = substr($game_rolls,$dice_number++,1);
if ($roll <= 2) {
	echo '<p><strong>[Bias to realism]</strong> In this game, if a rule is unclear, choose whichever reasonable interpretation appears most realistic.</p>';
} elseif ($roll <= 5) {
	echo '<p><strong>[Bias to action]</strong> In this game, if a rule is unclear, choose whichever reasonable interpretation benefits the active player.</p>';
} else {	
	echo "<p><strong>[Flip a coin]</strong> In this game, if a rule is unclear, each player nominates a reasonable interpretation. The players roll-off, and the winner of the roll-off chooses which interpretation to apply.</p>";
}
?>


<h2>Units</h2>
<p>Units in this game are:</p>
<?php
$roll = substr($game_rolls,$dice_number++,1);
if ($roll <= 4) {
	echo '<p><strong>[Squads]</strong> Units in this game are models grouped into loose formations. All models in a unit are activated with a single activation but perform actions individually. When moving, every model of the unit (after the first) must end within 1” of another member of the unit.</p>';
} elseif ($roll <= 9) {
	echo "<p><strong>[Individuals]</strong> Units in this game are single models which activate, move and perform actions individually.</p>";
} else {	
	echo '<strong>[Ranked]</strong> Units in this game are models grouped into ranked formations and may not leave them. Models are deployed in blocks at least five columns wide in base contact with the nearest members of the same unit. All models in a Ranked unit are activated with a single activation and perform all actions as a single unit. The unit moves as a single model.</p>';
	
}

?>

<h2>Stats</h2>
<?php // TODO: Add alternative names for the stats?
?>
<p>Units in this game are defined by the following stats:</p>
<ul>
 <li><strong>Speed:</strong> the maximum distance they can travel in a single Move Action</li>
 <li><strong>Ranged Skill:</strong> the number of dice rolled when making Ranged Actions.</li>
 <li><strong>Close Skill:</strong> the number of dice rolled when making Ranged Actions.</li>
  <li><strong>Morale:</strong> the number of dice rolled when making Morale Tests. </li>
 <li><strong>Defense:</strong> the difficulty of aggressor's Ranged and Close Actions.</li>
 <li><strong>Wounds:</strong> the number of wounds the model can suffer before they are removed from play</li>
</ul>



<h2>Resolution Mechanic</h2>
<?php // TODO: Add alternative resolution systems
?>
<p>When called upon to make a Difficulty [x]+ Stat Test, the unit's controller rolls a number of D6 equal to the named stat. Each dice that rolls equal to or higher than the difficult [x] is a success. The Stat Test is a Success If the controller rolls a one or more successes, else it is a Failure. If not stated, the Difficulty is 4+ (requiring dice rolls of 4+ for successes).</p>

<h2>Game Tokens</h2>
<p>At the start of each turn, each player receives 5 Game Tokens.</p>
<p>After rolling a Stat Test, if the Stat Test was failed, the rolling player may discard a Game Token to re-roll the Stat Test.</p>


<h2>Line of Sight</h2>

<?php
$roll = substr($game_rolls,$dice_number++,1);
if ($roll <= 5) {
	echo '<p><strong>[Models Eye View]</strong> If it is possible to draw a straight line from the eyes (or other visual apparatus) of a viewing model to a point a target model without opaque impediment, that target model is in the viewing model’s line of sight. The player aligns one eye with the back of the head (or rear of any other visual apparatus) of the viewing model while closing their other eye. The viewing model is temporarily removed, anything the player can see is in the viewing model’s line of sight.</p>';
} else {
	echo '<p><strong>[Abstracted]</strong> If it is possible to draw a straight line within the viewing model’s arc of sight from any part of the viewing model’s base to any part of a target model’s base without that line crossing a visual blocker the target model is within line of sight. Visual blockers are enemy models of a height equal to or greater than the viewing or target model, and terrain designated as blocking.</p>';

}
?>

<h2>Arc of Sight</h2>

<?php
$roll = substr($game_rolls,$dice_number++,1);
if ($roll <= 3) {
	$arc = '360 degrees.';
} elseif ($roll <= 6) {
	$arc =  '180 degrees.';
} else {	
	$arc =  "90 degrees.";
}
?>
<p>The arc of sight is a sector of a circle with its arc centred on the designated front of the model and radiating from its head (or other visual apparatus) of: <strong><?php echo $arc;?></strong></p>





<h2>Round Structure</h2>

<h3>Phases</h3>
<p>A Game consists of Rounds. A Round consists of Turns. A Turn consists of Phases in the following order:</p>
	
	<ol>
		<li>Initiative Phase</li>
		<?php
			$roll = substr($game_rolls,$dice_number++,1);
			if ($roll <= 0) { // TODO: REMOVING PHASED TURNS FOR NOW, AS THEY MAKE THINGS COMPLICATED	(SET to <= 3 to restore)	
				$game_structure = 'phased';
				$phases = array('Movement Phase','Ranged Actions Phase','Close Actions Phase','Special Actions Phase','Morale Phase');
				shuffle($phases);
			} else {	
				$game_structure = 'unphased';
				$phases = array('Action Phase');
			} 

		foreach ($phases as $phase) {
			echo '<li>' . $phase . '</li>';
		}
		?>
		<li>End Phase</li>
	</ol>


<h2>Initiative</h2>

<?php
$roll = substr($game_rolls,$dice_number++,1);
switch($roll) {
	case 1:
	case 2: 
		echo '<p><strong>[Random (Static)]</strong> At the start of the game, players roll-off and the winner of the roll-off becomes the First Player for the whole game.</p>';
		break;
	case 3:
	case 4:
		echo '<p><strong>[Random (Shifting)]</strong> At the start of each Initiative Phase, players roll-off and the winner of the roll-off becomes the First Player.</p>';
		break;
	case 5:
		echo '<p><strong>[Earnt (Leader)]</strong> At the start of the game, players roll-off and the winner of the roll-off becomes the First Player. At the start of each Initiative Phase, the player with the most Victory Points becomes the First Player.</p>';
		break;
	case 6:
		echo '<p><strong>[Earnt (Laggard)]</strong> At the start of the game, players roll-off and the winner of the roll-off becomes the First Player. At the start of each Initiative Phase, the player with the fewest Victory Points becomes the First Player.</p>';
		break;
	case 7:
		echo '<p><strong>[Earnt (Resource Buy)]</strong> At the start of the game, players roll-off and the winner of the roll-off becomes the First Player. At the start of each Initiative Phase, players secretly bid any number of their Game Tokens. Reveal the bids simultaneously. Each player rolls a number of D6 equal to their bid, sums the result and discards their bid Game Tokens. The player with the highest total becomes the First Player.</p>';
		break;
	case 8:
		echo '<p><strong>[Earnt (Resource Bid)]</strong> At the start of the game, players roll-off and the winner of the roll-off becomes the First Player. At the start of each Initiative Phase, players secretly bid any number of their Game Tokens. Reveal the bids simultaneously and the player that bid the most discards their bid Game Tokens and becomes the First Player.</p>';
		break;
	case 9:
		echo '<p><strong>[Bought]</strong> At the start of the game, the player who spent the fewest points at force selection becomes the First Player for the whole game. If points are equal, players roll-off and the winner of the roll-off becomes the First Player for the whole game.</p>';
		break;
    default:
		echo "<p><strong>[Individuals]</strong> Units in this game are single models moving relatively freely in a skirmish setting.</p>";
}

?>

<h2>Action Phase</h2>

<h3>Activation Order</h3>

<p>In the Action Phase, units are activated using the following rules:</p>

<?php
$roll = substr($game_rolls,$dice_number++,1);
switch($roll) {
	case 1:
	case 2:
		echo '<p><strong>[IGOUGO]</strong> Starting with the First Player, each player activates all their units, and then passes play to the player to their left. Once all units have activated, the phase ends.</p>';
		break;
	case 3:
	case 4:
		echo '<p><strong>[Alternating]</strong> Starting with the First Player, each player activates a single unit, and then passes play to the player to their left. Once all units have activated, the phase ends.</p>';
		break;
	case 5:
		echo '<p><strong>[Limited Activations]</strong> Each player receives 5 Activation Tokens at the start of the phase. Starting with the First Player, each player selects a unit and spends 1 Activation Token to activate the unit, and then passes play to the player to their left. Once all Activation Tokens are spent, the phase ends.</p>';
		break;
	case 6:
	echo '<p><strong>[Fungible Activations]</strong> Starting with the First Player, each player selects a unit and spends 1 Game Token to activate the unit, and then passes play to the player to their left. Once all Game Tokens are spent, the phase ends.</p>';
	case 7:
	echo '<p><strong>[Unreliable Activation Order]</strong> Starting with the First Player, each player selects a unit and rolls a Difficulty 3+ Morale Test. If they succeed, they activate the unit, and then select another unit, testing again to activate. If they fail, play passes to the player to their left. Once all units are activated, the round ends.</p>';
		break;
	case 8:
		echo '<p><strong>[Push Your Luck]</strong> Starting with the First Player, each player selects a unit and declares a number of activations. They rolls a Morale Test, with a Difficulty equal to the declared number. If they succeed, they activate the unit the declared number of times. If they fail, the unit does not activate, but counts as having activated. Once all units have activated, the round ends.</p>';
		break;
    default:
		echo '<p><strong>[Batched Activations]</strong> Starting with the First Player, each player selects up to three units and activates them unit and then passes play to the player to their left. Once all units are activated, the round ends.</p>';
}

?>
<p>Each unit may only be activated once.</p>


<h3>Action Points</h3>
<?php
$roll = substr($game_rolls,$dice_number++,1);
if ($roll <= 3) {
	echo '<p><strong>[Move+Action]</strong> When a unit activates, in may take a move action and one of its other listed actions, in any order, but no action twice.</p>';
} elseif ($roll <= 6) {
	echo '<p><strong>[Two AP]</strong> When a unit activates, in may take any two of its listed actions, in any order, and may take the same action twice.</p>';
} elseif ($roll <= 8) {
	echo '<p><strong>[Two Unique Actions]</strong> When a unit activates, in may take any two of its listed actions, in any order, but no action twice.</p>';
} else {	
	echo '<p><strong>[One Of Everything]</strong> When a unit activates, in may take all its listed actions once, in any order.</p>';
}
?>


<h3>Actions</h3>
<p>Units have the following actions available to them:</p>

<ul>
	<li><strong>Move Action:</strong> move using the rules given below</li>
	<li><strong>Close Action:</strong> target an enemy model with one of this unit's Close Actions</li>
	<li><strong>Ranged Action:</strong> target an enemy model with one of this unit's Ranged Actions</li>
	<li><strong>Special Action:</strong> perform a one of this unit's Special Actions</li>
</ul>


<h2>Movement</h2>
<p>When a unit takes a Move Action, follow these rules:</p>
<?php
$roll = substr($game_rolls,$dice_number++,1);
if ($roll <= 3) {
	echo '<p><strong>[Free Movement]</strong> Pivot the unit any amount, move it forwards in a straight line as desired, repeat until total distance moved equals the unit’s Speed stat or the player wishes to stop.</p>';
} elseif ($roll <= 6) {
	echo '<p><strong>[Restricted Movement]</strong> Pivoting up to 90 degrees counts as reducing the unit’s Movement by ¼. Moving backwards or sideways counts as taking double the distance moved. The line of movement need not be straight, but when curved distance moved is measured by the point that travels the furthest. Move the unit until total distance moved equals the unit’s Speed stat or the player wishes to stop.</p>';
} elseif ($roll <= 8) {
	echo '<p><strong>[Momentum Movement]</strong> The unit may pivot up to 45 degrees per 2" moved, and must move at least 1/2 of its Speed stat in inches.</p>';
} else {	
	echo '<p><strong>[Measureless movement]</strong> Pivot the unit any amount, then move it forwards in a straight line as far as desired, or until it comes into contact with terrain over 1" high, an enemy model, or fully crosses into a differently classify area of terrain.</p>';
}
?>


<h2>Ranged Actions</h2>
<p>Each Ranged Action has a <strong>Range</strong>, which is the maximum range of the  action.</p>

<p>Target a unit in line of sight and range. Make a Ranged Skill Test with a Difficulty equal to the target's Defense stat. If the test is successful, resolve the effects of the Ranged Action.</p>

<p>If the target is obscured, discard the one successful dice roll before resolving the test.<p>

<h3>Example Ranged Actions</h3>
<p>The following are generic examples of possible Ranged Actions within this system:</p>
<ul>
	<li><strong>Handgun:</strong> Range 8". Target suffers 1 wound per success rolled.</li>
	<li><strong>Shotgun:</strong> Range 4". Target suffers 2 wounds per success rolled.</li>
	<li><strong>Rifle:</strong> Range 24". Target suffers 1 wound per success rolled.</li>
	<li><strong>Machine Gun:</strong> Range 24". The attacker adds 5 to their Ranged Skill stat. Target suffers 1 wound per success rolled.</li>
	<li><strong>Grenade:</strong> Range 4". May target any number of models within 2" of a point on the tabletop. Resolve each attack separately. Target suffers 1 wound per success rolled.</li>
</ul>
	
<h3>Damage</h3>
<p>After an action causes a model to gains one or more wounds: if that model has wounds equal to or above its Wounds stat, it must pass a Difficulty 4+ Morale Test or be removed from play.</p>
	
<h2>Close Actions</h2>
<p>Each Close Action has a <strong>Range</strong>, which is the maximum range of the action. A Range of zero or "-" means the maximum range of the action is base-to-base contact.</p>

<h3>Example Close Actions</h3>
<p>The following are generic examples of possible Ranged Actions within this system:</p>
<ul>
	<li><strong>Punch:</strong> Range 0. Target suffers 2 wounds per success rolled.</li>
	<li><strong>Shove:</strong> Range 0. Target suffers 1 wounds per success rolled, and is pushed directly away from the attacking model by 1" per success rolled.</li>
	<li><strong>Sword:</strong> Range 1". Target suffers 3 wounds per success rolled.</li>
</ul>

<h3>Damage</h3>
<p>After an action causes a model to gains one or more wounds: if that model has wounds equal to or above its Wounds stat, it must pass a Difficulty 4+ Morale Test or be removed from play.</p>

<h2>Special Actions</h2>
<p>Each Special Action has a <strong>Range</strong>, which is the maximum range of the action. A Range of zero or "-" means the maximum range of the action is base-to-base contact.</p>

<h3>Example Close Actions</h3>
<p>The following are generic examples of possible Ranged Actions within this system:</p>
<ul>
	<li><strong>Shout:</strong> Range 8". Target makes a Move action, under their controller's control.</li>
	<li><strong>Interact:</strong> Range 0. Scenario dependant.</li>
	<li><strong>Patch Up:</strong> Range 0. Target removes 1 wound per success rolled.</li>
</ul>


<h2>Morale</h2>
When a friendly unit is removed from play within 6" and line of sight of a unit, that unit must make a Difficulty 4+ Morale Test. If they fail it, they must ... TODO


<h2>Terrain</h2>


<h2>Force selection</h2>


<h2>Deployment</h2>


<h2>TODO Game Length</h2>

The game ends at the end of round <?php echo rand(3,10);?>.

At the start of a round a player Rolls and adds the number of rounds that have passed, and the total is nine or more.

When the game end, the player who has the most victory points is the winner.


<h2>Objectives</h2>


<h2>Victory</h2>


</div>
</body>
</html>