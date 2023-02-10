<?php

/**
 * Creates a DB connection
 *
 * @return PDO the db conn
 */
function createDbConn(): PDO
{
    $db = new PDO('mysql:host=db; dbname=game_boy_games', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * retrieves game boy games from the db
 *
 * @param PDO $db
 *
 * @return array the games array of arrays
 */
function getGames(PDO $db): array
{
    $stmnt = $db->prepare("SELECT `name`, `year`, `img` FROM `games`;");
    $stmnt->execute();
    return $stmnt->fetchAll();
}

/**
 * turns an array of arrays into html
 *
 * @param array $games array of arrays, each with a name, year and img
 *
 * @return string the html to display
 */
function displayGames(array $games): string
{
    $result = '';
    foreach ($games as $game) {
        if(
            array_key_exists('name', $game)
            && array_key_exists('year', $game)
            && array_key_exists('img', $game)
        ) {
            $result .= '<div>
                            <h1>' . $game['name'] . '</h1>
                            <p>' . $game['year'] . '</p>
                            <img src="' . $game['img'] . '" />
                        </div>';
        }
    }
    return $result;
}