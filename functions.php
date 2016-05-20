<?php

require_once __DIR__ . '/vendor/medoo.php';
require_once __DIR__ . '/classes/class.database.php';

$_db = new Database($_config);

/**
 * DB
 *
 * Wrapper function for Database::query($connection)
 *
 * @global $_db (Database object)
 * @param $id (string) Connection ID
 */
function db( $id ) {
    global $_db;
    return $_db->query($id);
}
