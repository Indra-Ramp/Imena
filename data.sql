CREATE OR REPLACE VIEW v_dept_manager_lib AS SELECT dept_manager.*, departments.dept_name, 
employees.first_name, employees.last_name, employees.gender, employees.birth_date, employees.hire_date
FROM dept_manager JOIN departments ON dept_manager.dept_no = departments.dept_no
JOIN employees ON dept_manager.emp_no = employees.emp_no;