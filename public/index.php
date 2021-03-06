<?php

require '../vendor/autoload.php';
require '../config/database.php';


$products = App\Entities\User::get();

include "../resources/views/lists.php";