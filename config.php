<?php
const Root = __DIR__;
define("CWD", dirname($_SERVER['SCRIPT_NAME']));
const DOC_ROOT = '/shoes/';
const DS = DIRECTORY_SEPARATOR;
const DB_Host = "localhost";
const DB_USER = "root";
const DB_PASS = "toor";
const DB_NAME = "shoes_store";
const DB_DRIVER = "mysql";
if (!isset($errors)){static $errors = [];}