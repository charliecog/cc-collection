<?php

require_once 'functions.php';

$db = createDbConn();
$games = getGames($db);
$gameHtml = displayGames($games);

?>

<html>
<head>
    <link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <main>
        <?= $gameHtml; ?>
    </main>
</body>
</html>
