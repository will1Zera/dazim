<?php

$URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?") . "/";

$API_URL = "http://localhost/dazim/api/";

$CSRF = bin2hex(random_bytes(32));