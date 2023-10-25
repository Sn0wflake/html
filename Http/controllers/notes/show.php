<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = 12;

$note = $db -> query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->find_or_fail();

authorize($note['user_id'] == $current_user_id);

view("notes/show.view.php",[
    'heading' => 'Note',
    'note' => $note,
]);
