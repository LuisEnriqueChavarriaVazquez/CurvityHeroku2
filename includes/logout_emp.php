<?php

    include_once 'emp_session.php';

    $empSession = new EmpSession();
    $empSession->closeSession();

    header("location: ../index.php");

?>