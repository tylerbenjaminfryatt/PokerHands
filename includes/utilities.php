<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 12/3/2018
 * Time: 1:28 PM
 */


const FILE_KEY_FIELD = 0;
const ACCOUNT_DATA_FILE = 'data/account_data.csv';
const SESSION_DATA_ACCOUNT_USERNAME_FIELD = 0;
const SESSION_DATA_ACCOUNT_SESSION_FIELD = 1;


function save_session()
{
    $username = get_session_value(SESSION_USERNAME_KEY);
    add_key_value($username, [$username, serialize($_SESSION)], ACCOUNT_DATA_FILE);
}

function restore_session()
{
    $username = get_session_value(SESSION_USERNAME_KEY);
   $session_data = lookup_key_value($username, ACCOUNT_DATA_FILE);
   if(!empty($session_data)) {
       $_SESSION = unserialize($session_data[SESSION_DATA_ACCOUNT_SESSION_FIELD]);
   }
}


function require_secure()
{
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

        exit();
    }

}
function require_login()
{
    if(!isset($_SESSION[SESSION_USERNAME_KEY]) || empty($_SESSION[SESSION_USERNAME_KEY])){
        header('Location:' . LOGIN_PAGE);

        exit();
}
restore_session();
}

function get_post_value($key)
{
    if (isset($_POST[$key])) {
        return htmlentities($_POST[$key]);
    }
    return '';
}

function get_session_value($key)
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
    return '';

}

function set_session_value($key, $value)
{
    $_SESSION[$key] = $value;
    save_session();
}





function lookup_key_value($key, $filename)
{
    $file = fopen($filename, 'r');
    flock($file, LOCK_SH);

    do {
        $line = fgetcsv($file);
        if ($line[FILE_KEY_FIELD] === $key) {
            break;
        }
    } while($line);
    flock($file, LOCK_UN);
    fclose($file);
    return $line;

}

function add_key_value($key, $record, $filename)
{
    $file = fopen($filename, 'r+');
    flock($file, LOCK_EX);
    $contents = [];
    do {
        $line = fgetcsv($file);
        if (!$line) {
            break;
        }

        $contents[$line[FILE_KEY_FIELD]] = $line;

    } while ($line);
    $contents[$key] = $record;
    ftruncate($file, 0);
    rewind($file);
    foreach ($contents as $line) {
        fputcsv($file, $line);

    }
    flock($file,LOCK_UN);
    fclose($file);
}

function destroy_session()
{
    $session_info = session_get_cookie_params();
    $_SESSION = [];
    setcookie(session_name(), '', $session_info['path'], $session_info['domain'], $session_info['secure'], $session_info['httponly']);
    session_destroy();
}
