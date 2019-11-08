<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		$checklist = array("name", "id", "course", "cardnum");
		$iserr = false;
		foreach ($checklist as $key) {
			$iserr = ($iserr||$_POST[$key] == ""||!isset($_POST[$key]));
		}

		if ($iserr){
		?>

			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
	} elseif (!preg_match('/^[a-z|A-Z| |-]+$/', $_POST["name"])) {
		?>

			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		} elseif (!preg_match('/^[4|5][0-9]{15}$/', $_POST["cardnum"], $matches)) {
		?>

			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>

		<?php
		# if all the validation and check are passed
		} else {
			$name = $_POST["name"];
			$id = $_POST["id"];
			$courses = implode(', ', $_POST['course']);
			$grade = $_POST["grade"];
			$cardnum = $_POST["cardnum"];
			$card = $_POST["card"];
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name: <?= $name ?></li>
			<li>ID: <?= $id ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course:
				<?= $courses ?>
			</li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit: <?= $cardnum ?> (<?= $card ?>)</li>
		</ul>

		<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "./loosers.txt";
			$user = "$name;$id;$cardnum;$card\n";
			file_put_contents($filename, $user, FILE_APPEND | LOCK_EX);
			$users = file_get_contents($filename);
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		<pre><?= $users ?></pre>
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->


		<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){ }
		?>

	</body>
</html>
