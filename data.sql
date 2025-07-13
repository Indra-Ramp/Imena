CREATE OR REPLACE VIEW v_dept_manager_lib AS SELECT dept_manager.*, departments.dept_name, 
employees.first_name, employees.last_name, employees.gender, employees.birth_date, employees.hire_date
FROM dept_manager JOIN departments ON dept_manager.dept_no = departments.dept_no
JOIN employees ON dept_manager.emp_no = employees.emp_no;

<<<<<<< HEAD
CREATE OR REPLACE VIEW v_emp_lib AS SELECT employees.*, departments.dept_name, departments.dept_no, dept_emp.from_date, dept_emp.to_date
=======
CREATE OR REPLACE VIEW v_emp_lib AS SELECT employees.*, departments.dept_name, departments.dept_no, dept_emp.from_date, dept_emp.to_date 
>>>>>>> abdf95d1132552402c72baf16f50bfd7c67f1816
FROM employees 
JOIN dept_emp ON dept_emp.emp_no = employees.emp_no
JOIN departments ON dept_emp.dept_no = departments.dept_no;

<<<<<<< HEAD
CREATE OR REPLACE VIEW v_emp_dept_current AS SELECT * FROM v_emp_lib
WHERE to_date = '9999-01-01';

CREATE OR REPLACE VIEW v_salary_emploi as select s.salary, s.to_date as s_date, s.from_date as sf_date,t.title, e.* from salaries s join employees e on s.emp_no = e.emp_no join titles t on e.emp_no=t.emp_no;

CREATE OR REPLACE VIEW v_salary_emploi_dept as select ve.*, vs.salary, vs.title, vs.s_date, vs.sf_date from v_emp_lib as ve JOIN v_salary_emploi as vs ON ve.emp_no = vs.emp_no;

CREATE OR REPLACE VIEW v_count_emp_dept as select dept_no as c_emp_dept_no, count(*) as c_emp_dept from v_emp_lib group by dept_no;

CREATE OR REPLACE VIEW v_emp_dept as select * from v_dept_manager_lib join v_count_emp_dept on dept_no = c_emp_dept_no;

CREATE OR REPLACE VIEW v_title_emp as select t.emp_no as t_no, title, from_date, to_date, 
e.emp_no as e_no, birth_date, first_name, last_name, gender, hire_date
 from titles t join employees e on t.emp_no = e.emp_no;

CREATE OR REPLACE VIEW v_male as select title as t_male, e.emp_no as male_no,count(gender) as c_male from employees e 
join titles t on e.emp_no = t.emp_no where gender = "M" group by title;
CREATE OR REPLACE VIEW v_female as select title as t_female, e.emp_no as female_no,count(gender) as c_female from employees e 
join titles t on e.emp_no = t.emp_no where gender = "F" group by title;

CREATE OR REPLACE VIEW v_group_emploi as select * from 
v_title_emp join v_male on v_title_emp.e_no = v_male.male_no 
join v_female on v_male.t_male=v_female.t_female;
=======
CREATE OR REPLACE VIEW v_salary_emploi as select s.salary, t.title, e.* from salaries s join employees e on s.emp_no = e.emp_no join titles t on e.emp_no=t.emp_no;
>>>>>>> abdf95d1132552402c72baf16f50bfd7c67f1816
