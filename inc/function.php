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

    function totalCount($sql_req) {
        $sql = "SELECT count(*) AS count FROM (%s) AS temp_table";
        $sql = sprintf($sql, $sql_req);
        $result = mysqli_query(dbconnect(), $sql);
        return mysqli_fetch_assoc($result);
    }

    function getPagination($numero) {
        $ret = array();
            $ret[0][0] = 1;
            $ret[0][1] = true;
            $ret[1][0] = $numero >= 5 ? "..." : '';
            $ret[1][1] = false;
            $start = $numero >= 2 ? $numero - 2 : 2;
            $i = 2;
            for($i = 2; $i <= 6; $i++) {
                $ret[$i][0] = $start;
                $ret[$i][1] = true;
                $start++;
            }
            $ret[$i][0] = "...";
            $ret[$i][1] = false;
        return $ret;
    }

    function getListByCriteres($dept, $emp, $min, $max, $numero, $section) {
        $min = $min != '' ? $min : 0;
        $max = $max != '' ? $max : 200;
        $start = 20 * ($numero - 1);
        $dept_req = ' AND dept_name LIKE "%'.$dept.'%"';
        $emp_req = ' AND first_name LIKE "%'.$emp.'%" OR last_name LIKE "%'.$emp.'%"';
        $age_req = ' AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN %s AND %s';
        $age_req = sprintf($age_req, $min, $max);
        $sql = "SELECT * FROM v_emp_lib WHERE 1 = 1 AND to_date = '9999-01-01'".$dept_req.$emp_req.$age_req." LIMIT %s, %s";
        $sql = sprintf($sql, $start, $section);
        $result = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data) - 1]);
        return $data;
    }

?>