<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $songs = 5678; $hours = (int)($songs/10); ?>
		<p>
			I love music.
			I have  <?php echo $songs ;?> total songs,
			which is over <?php echo $hours ;?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<?php $newspages = 5;
				if(isset($_GET["newspages"])) {
					$newspages = $_GET["newspages"];
				}
			?>
			<ol>
				<?php for ($i=11; $newspages>0; $i--, $newspages--){ ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?php echo sprintf("%02d", $i) ?>">2019-<?php echo sprintf("%02d", $i) ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<?php $artists = array("Gun N's Roses","Green Day","Blink182","Queen"); ?>
			<ol>
				<?php for($i = 0; $i < count($artists);$i++){ ?>
					<li><?= $artists[$i] ?></li>
				<?php } ?>
			</ol>
		</div>

		<div class="section">
			<h2>My Favorite Artists</h2>
			<?php $lines = file("favorite.txt") ?>
			<ol>
				<?php foreach ($lines as $line){
					$variable = explode(" ", $line);
					$uline = implode("_", $variable);
				?>
				<li><a href="http://en.wikipedia.org/wiki/<?= $uline?>"><?= $line ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php $path = "lab5/musicPHP/songs/";?>
			<ul id="musiclist">
				<?php
				foreach (glob("$path*.mp3") as $filename) {
				?>
				<li class="mp3item">
					<a href="<?= $filename ?>"><?= basename($filename, $path) ?></a> (<?= (int)(filesize($filename)/1024) ?> KB)
				</li>
				<?php } ?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php
				foreach (glob("$path*.m3u") as $filename) {
				?>
				<?php $m3ulines = file("$filename") ?>
				<li class="playlistitem"><?= basename($filename, $path) ?>
					<ul>
					<?php foreach ($m3ulines as $m3uline) {
						if(strpos($m3uline, "#") === false) { ?>
						<li><?= $m3uline ?></li>
					<?php }
					} ?>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>

		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php $path = "lab5/musicPHP/songs/";?>
			<ul id="musiclist">
				<!-- Exercise 8: Playlists (Files) -->
				<?php $m3uarr = glob("$path*.m3u");
					sort($m3uarr);
					$reversearr = array_reverse($m3uarr);
					foreach ($reversearr as $filename) {
						$m3ulines = file("$filename") ?>
				<li class="playlistitem"><?= basename($filename, $path) ?>
					<ul>
					<?php foreach ($m3ulines as $m3uline) {
						if(strpos($m3uline, "#") === false) { ?>
						<li><?= $m3uline ?></li>
					<?php }
					} ?>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>

		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php $path = "lab5/musicPHP/songs/";?>
			<ul id="musiclist">
				<!-- Exercise 8: Playlists (Files) -->
				<?php $m3uarr = glob("$path*.m3u");
					sort($m3uarr);
					$reversearr = array_reverse($m3uarr);
					foreach ($reversearr as $filename) {
						$m3ulines = file("$filename");
						shuffle($m3ulines); ?>
				<li class="playlistitem"><?= basename($filename, $path) ?>
					<ul>
					<?php foreach ($m3ulines as $m3uline) {
						if(strpos($m3uline, "#") === false) { ?>
						<li><?= $m3uline ?></li>
					<?php }
					} ?>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>

		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php $path = "lab5/musicPHP/songs/";?>
			<ul id="musiclist">
				<?php
				$filedata = array();
				foreach (glob("$path*.mp3") as $filename) {
					array_push($filedata, array((int)(filesize($filename)/1024), basename($filename, $path)));
				}
				array_multisort($filedata, SORT_DESC);
				foreach ($filedata as $size_name) {
				?>
				<li class="mp3item">
					<a href="<?= $path . $size_name[1] ?>"><?= $size_name[1] ?></a> (<?= $size_name[0] ?> KB)
				</li>
			<?php } ?>
			</ul>
		</div>



		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
