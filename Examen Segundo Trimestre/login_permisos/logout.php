<?php
require_once("./session-vars.php");

session_destroy();

header("Location: index.php");