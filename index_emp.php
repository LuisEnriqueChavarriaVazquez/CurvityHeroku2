<?php
include_once 'includes/empresa.php';
include_once 'includes/emp_session.php';

$empSession = new EmpSession();
$emp = new Emp();

if(isset($_SESSION['user'])){
    $emp->setEmp($empSession->getCurrentEmp());
    include_once 'operacionesEmpresa.php';
}else if(isset($_POST['username_emp']) && isset($_POST['password_emp'])){
    $empForm = $_POST['username_emp'];
    $passForm = $_POST['password_emp'];

    if($emp->empExists($empForm, $passForm)){
        $empSession->setCurrentEmp($empForm);
        $emp->setEmp($empForm);

        include_once 'operacionesEmpresa.php';
    }else{
        include_once 'loginEmpresa.php';
    }

}else{
    include_once 'loginEmpresa.php';
}

?>