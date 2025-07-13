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
        $sql = "select * from v_emp_dept group by dept_no";
        $resultat = mysqli_query(dbconnect(), $sql);
        $data = array();
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;

    }

    function getEmployes($id_dept) {
        $sql = "SELECT * FROM v_emp_dept_current
        WHERE dept_no = '%s'
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
        $sql = "select * from v_emp_lib where emp_no = '%s'";
        $sql = sprintf($sql, $emp_no);
        // echo $sql;
        $data = array();
        $resultat = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;
    }


    function getHistory($emp_no){
        $sql = "select * from v_salary_emploi_dept where emp_no = '%s'";
        $sql = sprintf($sql, $emp_no);
        // echo $sql;
        $data = array();
        $resultat = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;
    }

    function getSalaryEmploi($emp_no){
        $sql = "select * from v_salary_emploi where emp_no='%s'";
        $sql = sprintf($sql, $emp_no);
        $data = [];
        $resultat = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[count($data)-1]);
        return $data;
    }

    function totalCount($dept, $emp, $min, $max) {
        $min = $min != '' ? $min : 0;
        $max = $max != '' ? $max : 200;
        $dept_req = ' AND dept_name LIKE "%'.$dept.'%"';
        $emp_req = ' AND first_name LIKE "%'.$emp.'%" OR last_name LIKE "%'.$emp.'%"';
        $age_req = ' AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN %s AND %s';
        $age_req = sprintf($age_req, $min, $max);
        $sql_req = "SELECT * FROM v_emp_lib WHERE 1 = 1".$dept_req.$emp_req.$age_req;
        $sql = "SELECT count(*) AS count FROM (%s) AS temp_table";
        $sql = sprintf($sql, $sql_req);
        $result = mysqli_query(dbconnect(), $sql);
        return mysqli_fetch_assoc($result)['count'];
    }

    function getPagination($numero, $max, $section) {
        $ret = array();
        $numberofP = $max / $section > (intdiv($max, $section)) ? intdiv($max, $section) + 1 : intdiv($max, $section);
            $ret[0][0] = 1;
            $ret[0][1] = true;
            $ret[1][0] = $numero >= 5 ? "..." : '';
            $ret[1][1] = false;
            $start_end = $numero <= (intdiv($max, $section) - 5 ) ? $numero - 2 : intdiv($max, $section) - 4; 
            $start = $numero >= 4 ? $start_end : 2;
            $i = 2;
            for($i = 2; $start <= $numberofP && $i <= 6; $i++) {
                $ret[$i][0] = $start;
                $ret[$i][1] = true;
                $start++;
            }
            $ret[$i][0] = $numero <= intdiv($max, $section) - 5 ? "..." : '';
            $ret[$i][1] = false;
            $i++;
            $ret[$i][0] = $numberofP >= 5 ? $numberofP : '';
            $ret[$i][1] = true;
        return $ret;
    }

    function getListByCriteres($dept, $emp, $min, $max, $numero, $section) {
        $min = $min != '' ? $min : 0;
        $max = $max != '' ? $max : 200;
        $emp_sep = explode(' ', $emp);
        $start = 20 * ($numero - 1);
        $fullname = count($emp_sep) == 2 ? ' OR (first_name LIKE "%'.$emp_sep[0].'%" AND last_name LIKE "%'.$emp_sep[1].'%")' : '';
        $dept_req = ' AND dept_name LIKE "%'.$dept.'%"';
        $emp_req = ' AND ((first_name LIKE "%'.$emp.'%" OR last_name LIKE "%'.$emp.'%")'.$fullname.')';
        $age_req = ' AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN %s AND %s';
        $age_req = sprintf($age_req, $min, $max);
        $sql = "SELECT *, CASE 
        WHEN to_date = '9999-01-01' THEN 'Current department' 
        ELSE 'Old department'
        END AS dept_stat
        FROM v_emp_lib WHERE 1 = 1".$dept_req.$emp_req.$age_req." LIMIT ".$start.", ".$section;
       // echo $sql;
        $result = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data) - 1]);
        return $data;
    }

    function groupEmploi(){
        $sql = "SELECT * FROM v_group_emploi";
        $resultat = mysqli_query(dbconnect(), $sql);
        $data = [];
        while($data[] = mysqli_fetch_assoc($resultat));
        unset($data[(count($data))-1]);
        return $data;
    }

?>