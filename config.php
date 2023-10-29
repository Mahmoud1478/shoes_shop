<?php
global $server;
if (isset($_REQUEST)){
}

const Root = __DIR__;

define("CWD", dirname($server->script_name));
const DOC_ROOT = '/shoes/';
const DS = DIRECTORY_SEPARATOR;
const DB_Host = "localhost";
const DB_USER = "root";
const DB_PASS = "toor";
const DB_NAME = "shoes_store";
const DB_DRIVER = "mysql";
const ADMIN_ROOT = "admin";
if (!isset($errors)){static $errors = [];}