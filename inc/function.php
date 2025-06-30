<?php

    require "connect.php";

    function getDepartements(){
        $sql = "SELECT * FROM departments";
        $resultat = mysqli_query(dbconnect(), $sql);
        $data = array();
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;
    }

    function getNameToDepartments(){
        $sql = "select * from v_dept_manager_lib where to_date = '9999-01-01'";
        $resultat = mysqli_query(dbconnect(), $sql);
        $data = array();
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;

    }

    function getEmployes($id_dept) {
        $sql = "SELECT * FROM dept_emp 
        JOIN employees 
        ON dept_emp.emp_no = employees.emp_no
        WHERE dept_emp.dept_no = '%s' AND dept_emp.to_date = '9999-01-01'
        ORDER BY employees.first_name";
        $sql = sprintf($sql, $id_dept);
        $data = [];
        $resultat = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;
    }

?>