<?php include("top.html"); ?>

<strong>Matches for <?= $_GET['name']?></strong>
<br>

<ul>
<div class="match">

<?php 

$members = file("members.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$name = $_GET['name'] . "";

//array to store matches
$matches = array("");

require_once 'Phonetic/Phonetic.php';
$phonetic = Phonetic::app()->run();   // can also be >run('sep'); or ash or gen (generic)
$soundkeys = $phonetic->BMSoundex->getNumericKeys($name);

//search to see if file contains matches
foreach($members as $str_info) {
	if (strpos($str_info,$soundkeys[0][0]) !== false || strpos($str_info,$soundkeys[0][1]) !== false || strpos($str_info,$soundkeys[0][2]) !== false || strpos($str_info,$soundkeys[0][3]) !== false) {
		array_push($matches, $str_info);
	}
}

$name = explode(",", $name);
$entry = "all info for search entry";
$info = "details of the search entry";
$info_temp = "details of each line of entry being searched";

	// find most recent entry for this name
	for ($i = 1; $i < count($matches) ; $i++) {
		//if (strpos($members[$i],$name[7]) !== false) {
			// store each detail from entry into a str array
			$info = explode(",", $matches[$i]);
			//checkMatch();
			//printMatches();
			echo "
			<li>
				<p> 
				<img src=\"user.jpg\" alt=\"$info[0]\">
				$info[0]</p>
				<ul>
					<li>School: $info[1]</li>
					<li>Email: $info[3]</li>
					<li>Searching: $info[2]</li>
					<li>From: $info[4], $info[5]</li>
				</ul> 
		
			</li>";
		//} 
	}
	
function checkMatch() {
	global $info, $members, $info_temp;
	
	for ($j = 0; $j < filesize("members.txt"); $j++) {
		$info_temp = explode(",", $members[$j]);
		// check if opposite gender
		//if ($info[1] != $info_temp[1]) {
			// check if age is within specified range
			//if ($info_temp[2] >= $info[5] && $info_temp[2] <= $info[6]) {
				// check if the same operating system
				//if ($info[4] == $info_temp[4]) {
					// check if similar personality
					//if (checkPersonality()) {
						
						printMatches();
					//}
				//}
			//}
		//}
	}
}	

function checkPersonality() {
global $info, $info_temp;
	// check if at least one letter matches in personality traits
	for ($k = 0; $k < 4; $k++) {
		if ($info[3][$k] == $info_temp[3][$k]) {
			return true;
		}
	}
}

function printMatches() {
global $info, $matches;
echo "
	<li>
		<p>
		<img src=\"user.jpg\" alt=\"$info[0]\">
		 $info[0]</p> 
		<ul>
			<li>School: $info[1]</li>
			<li>Email: $info[2]</li>
			<li>Searching Surname: $info[3]</li>
			<li>From: $info[4], $info[5]</li>
		</ul> 
		
	</li>";
}

?>

</div>
</ul>

<?php include("bottom.html"); ?>