<?php include("top.html"); ?>

<form name="male" action="matches-submit.php" method="get">
	<fieldset>
		<legend> Returning User: </legend>

			<strong> Name: </strong><input id="youknow" type="text" name="name" maxlength="16" size="16" style="margin-top: 0px; margin-bottom: 8px; border-bottom-width: 0px; padding-bottom: 1px;"><br>

		<input type="submit" value="View My Matches">
	</fieldset>
</form>

<br><br><br><br>
<?php

$members = file("members.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$total=0;
foreach($members as $member) {
	$total++;
}
echo $total;

 ?>

<?php include("bottom.html"); ?>