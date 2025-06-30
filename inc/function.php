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
        $sql = "SELECT * FROM v_emp_lib
        WHERE dept_no = '%s' AND to_date = '9999-01-01'
        ORDER BY first_name";
        $sql = sprintf($sql, $id_dept);
        //echo $sql;
        $data = [];
        $resultat = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;
    }

    function getEmployesInfo($emp_no) {

    }

?>