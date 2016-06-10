<?php

require_once __DIR__ . '/vendor/medoo.php';
require_once __DIR__ . '/classes/class.database.php';

/**
 * Filter: db/config
 * 
 * @NOTE This filter is applied VERY early in
 * the bootstrapping process. In order to use it,
 * your plugin name must begin with letters 0-9, a-c
 * and filters must be applied from your plugin
 * functions.php file.
 */
$_config['db'] = apply_filters( 'db/config', $_config['db'] );

// Create Database instance
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
