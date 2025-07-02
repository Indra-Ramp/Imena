CREATE OR REPLACE VIEW v_dept_manager_lib AS SELECT dept_manager.*, departments.dept_name, 
employees.first_name, employees.last_name, employees.gender, employees.birth_date, employees.hire_date
FROM dept_manager JOIN departments ON dept_manager.dept_no = departments.dept_no
JOIN employees ON dept_manager.emp_no = employees.emp_no;

CREATE OR REPLACE VIEW v_emp_lib AS SELECT employees.*, departments.dept_name, departments.dept_no, dept_emp.from_date, dept_emp.to_date 
FROM employees 
JOIN dept_emp ON dept_emp.emp_no = employees.emp_no
JOIN departments ON dept_emp.dept_no = departments.dept_no;

CREATE OR REPLACE VIEW v_salary_emploi as select s.salary, t.title, e.* from salaries s join employees e on s.emp_no = e.emp_no join titles t on e.emp_no=t.emp_no;
