<?php

$router->get('course', 'Course@get_course');
$router->post('course', 'Course@create_course');
$router->delete('course', 'Course@delete');
$router->put('course', 'Course@update_course');

/*subjet request*/
$router->get('subject', 'subjects@get_all_subjects');
$router->post('subject', 'subjects@create_subjects');
$router->delete('subject', 'subjects@delete');
$router->put('subject', 'subjects@update_subjects');

?>