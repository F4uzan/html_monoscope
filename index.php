<?php include 'php/common.php'; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Monoscope</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/icon.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Monoscope">
    <link rel="apple-touch-icon-precomposed" href="images/icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/icon.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/icon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
	.mini-card {
	  width: 380px;
	  height: 150px;
	}
	.no-selection {
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	}
    </style>
  </head>
  <body class="mdl-demo mdl-color--white mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--white">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="overview">
		<img class="section--center mdl-grid no-selection" src="images/icon.png" width="100px" height="100px">
          <section class="section--center mini-card mdl-grid mdl-grid--no-spacing mdl-shadow--6dp">
            <div class="mdl-card mdl-cell mini-card mdl-cell--12-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text">
				<form action="php/action.php" method="GET" id="search-field">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" name="search" id="search">
					<label class="mdl-textfield__label" for="search">Search</label>
				</div>
				<div class="section--center mdl-grid mdl-grid--no-spacing">
				
					<?php
					$plugin_dir = glob('plugins/*.xml');
					
					if (is_array($plugin_dir)) {
						foreach($plugin_dir as $filename) {
							$raw_plugin = simplexml_load_file($filename) or die("Cannot create object");
							$plugin_load = xml2array($raw_plugin);
							
							$id = $plugin_load['id'];
							$icon = $plugin_load['icon'];
							$icon_format = $plugin_load['icon_format'];
							$search_uri = $plugin_load['search_uri'];
							
							echo "<div class='mdl-layout-spacer'></div>";
							echo "<span class='mdl-chip mdl-chip--contact'>";
							echo "<input type='image' class='mdl-chip__contact no-selection' src='images/$icon.$icon_format' name='engine' id='engine' value='$id'>";
							echo "</span>";
							echo "<div class='mdl-layout-spacer'></div>";
						}
					}
					?>
				</div>
				</form>
              </div>
            </div>
          </section>
        </div>
      </main>
    </div>
    <script src="js/material.min.js"></script>
</body>
