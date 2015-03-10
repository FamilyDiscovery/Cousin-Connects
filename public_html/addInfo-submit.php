<?php include("top.html"); ?>

<strong>Thank you!</strong><br><br>
Welcome to YU Family Connect, <?= $_POST['name'] ?>!<br>
<br>
Now <a href="matches.php">log in to see your matches!</a><br>
<br>

<?php 
$name = $_POST['name'];

require_once 'Phonetic/Phonetic.php';
$phonetic = Phonetic::app()->run();   // can also be >run('sep'); or ash or gen (generic)
$soundkeys = $phonetic->BMSoundex->getNumericKeys($name);

$file = 'members.txt';
// The new data to add to the file
$data = "\n" . $_POST['yourname'] .",". $_POST['school'] .",". $_POST['name'] .",". $_POST['email'] .",". $_POST['town'] .",". $_POST['country'];

for ($i = 0; $i < count($soundkeys[0]); $i++) {
	$data .= "," . $soundkeys[0][$i]; 
}

// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

?>
	
<?php include("bottom.html"); ?>