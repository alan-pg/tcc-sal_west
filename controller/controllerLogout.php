<?php

$session = new Classes\ClassSessions();
$session->destructSessions();
header("Location: ../login");
