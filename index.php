<?php

declare(strict_types=1);

/**
 * AUTHOR : AVONTURE Christophe
 *
 * Written date : 3 october 2018
 *
 * Excel raw table to markdown converter
 * Simply copy, from Excel, a table and paste here to convert
 * table to markdown
 *
 * The javascript has been written by `Jonathan Hoyt` and available on GitHub:
 * https://github.com/jonmagic/copy-excel-paste-markdown.
 *
 * JS script updated to:
 * - Call marked.js (https://www.npmjs.com/package/marked) to render the table from markdown
 * 		to html
 * - Add bootstrap class to the rendered table
 */

define('REPO', 'https://github.com/cavo789/marknotes_xls2md');

// Get the GitHub corner
$github = '';
if (is_file($cat = __DIR__ . DIRECTORY_SEPARATOR . 'octocat.tmpl')) {
    $github = str_replace('%REPO%', REPO, file_get_contents($cat));
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="author" content="Christophe Avonture" />
		<meta name="robots" content="noindex, nofollow" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8;" />
		<title>Marknotes - XLS2MD - Convert Excel raw table to Markdown table</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<style>
			textarea {
				margin-top:10px;
				font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace;
			}

			.form-control {
				padding: none;
				font-size: 0.8em;
			}
		</style>
	</head>
	<body>
		<?php echo $github; ?>
		<div class="container">
			<div class="page-header"><h1>Marknotes - XLS2MD</h1></div>
			<div class="container">
				<div class="form-group">
					<label for="editor">Simply copy, from Excel, a table and paste here to convert 
						table to markdown.</label>
					<details>
						<summary>How to use?</summary>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm">
									<ol>
										<li>In your Excel worksheet, select a range like f.i. 
											$A$1:$H:$25 (first row need to contains column's headings).</li>
										<li>Press <kbd>CTRL</kbd><kbd>C</kbd></li>
										<li>In this form, click in the text area here below</li>
										<li>Press <kbd>CTRL</kbd><kbd>V</kbd></li>
									</ol>
									<p>The copied data will be immediately converted to a markdown table 
										and a HTML preview will be rendered.</p>
									<p>Adjust the markdown syntax if needed and copy/paste into your 
										notes.</p>
								</div>
								<div class="col-sm">
									<img height="300px" src="https://raw.githubusercontent.com/cavo789/marknotes_xls2md/master/image/demo.gif" alt="Demo">
								</div>
							</div>
						</div>
					</details>
					<textarea class="form-control" rows="10" id="editor" name="editor"></textarea>
				</div>
				<hr/>
				<pre id="Markdown">&nbsp;</pre>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" type="text/javascript"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://unpkg.com/marked@0.3.6"></script>
		<script src="script.js" type="text/javascript"></script>
	</body>
</html>
