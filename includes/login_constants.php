<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/19/2018
 * Time: 2:35 PM
 */

const LOGIN_USERNAME_KEY = 'login_username';
const LOGIN_PASSWORD_KEY = 'login_password';
const LOGIN_BUTTON_VALUE = 'login';
const REGISTER_USERNAME_KEY = 'register_username';
const REGISTER_PASSWORD_KEY = 'register_password';
const REGISTER_CONFIRM_PASSWORD_KEY = 'register_confirm_password';
const REGISTER_BUTTON_VALUE = 'register';

/**
 * Session keys
 */
const SESSION_USERNAME_KEY = 'username';

/**
 * User account fields
 */

const ACCOUNT_USERNAME_FIELD = 0;
const ACCOUNT_PASSWORD_HASH_FIELD = 1;

/**
 * Files and paths
 */

const USER_ACCOUNT_FILE = 'data/users.csv';


/**
 * Error messages
 */

const E_LOGIN = 'Error Logging In!';
const E_REGISTER ='Error Registering';

const E_NO_USERNAME = 'Username must be supplied';
const E_NO_PASSWORD = 'Password must be supplied';
const E_NO_CONFIRM = 'Password confirmation must be supplied';
const E_CONFIRM_MISMATCH = 'Passwords do not match!';
const E_ACCOUNT_EXISTS = 'Username already exists';
const E_USERNAME_NOT_FOUND = 'Username does not exist.';
const E_PASSWORD_INCORRECT = 'Password is incorrect.';

