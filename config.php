<?php
const Root = __DIR__;
define("Home", dirname($_SERVER['SCRIPT_NAME']));
const DS = DIRECTORY_SEPARATOR;
const DB_Host = "localhost";
const DB_USER = "root";
const DB_PASS = "toor";
const DB_NAME = "shoes_store";
const DB_DRIVER = "mysql";
if (!isset($errors)){static $errors = [];}