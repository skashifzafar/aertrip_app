# Organisation Log
Rest API for documenting departments and employees in an organisation.

**Prerequisites:**
- Php7.1 or Higher
- Composer
- MySql
- Laravel 5.6 or higher
- Postman (for testing)

**Overview of the Application**
The application is designed to maintain the department and employees of an organisation. The following functionalities are provided in the application:

- Creating departments
- Add employees
- Edit employees
- View employees
- Delete employees
- Search employees

We have a DB named "aertrip" with the following tables:
- Departments
  - id (auto incremented)
  - name
  - description
- Employees
  - id (auto incremented)
  - name
  - department
  - phone_num (an employee can have multiple phone numbers delimited by ";")
  - address (an employee can have multiple addresses delimited by ";")

The application has following endpoints:
- POST: /api/department/add : Creates new department entry.
  - input: {"name": $name, "description": $description}
  - output: {"name": $name, "description": $description, "updated_at": $time_stamp, "created_at": $timestamp}
- POST: /api/employee/add : Creates new employee entry.
  - input: {"name": $name, "department_name": $dept_name, "phone_numbers": $list_of_phone_numbers, "addresses": $list_of_addresses}
  - output: {"name": $name, "department": $dept_name,"phone_numbers": $list_of_phone_numbers, "addresses": $list_of_addresses>, "updated_at": $timestamp, "created_at": $timestamp, "id": $id}
- PUT:  /api/employee/update?employee_id=$id : Updates an existing employee data.
  - input: {"name": $name, "department_name": $dept_name, "phone_numbers": $list of phone numbers, "addresses": $list_of_addresses}
  - output: {"name": $name, "department": $dept_name,"phone_numbers": $list_of_phone_numbers, "addresses": $list_of_addresses>, "updated_at": $timestamp, "created_at": $timestamp}
- GET:  /api/employee/search?employee_name=$name : search for all the employees with the given name.
  - input: {}
  - output: {"id": $id,"name": $name, "department": $dept_name, "phone_num": $phone numbers, "address": $addresses, "created_at": $timestamp, "updated_at": $timestamp}
- GET:  /api/employee/view?employee_id=$id: View records specific to the requested employee.
  - input: {}
  - output: {"id": $id,"name": $name, "department": $dept_name, "phone_num": $phone numbers, "address": $addresses, "created_at": $timestamp, "updated_at": $timestamp}
- DEL:  /api/employee/delete?employee_id=$id : Delete employee data.
  - input: {}
  - output: {"id": $id,"name": $name, "department": $dept_name, "phone_num": $phone numbers, "address": $addresses, "created_at": $timestamp, "updated_at": $timestamp}


MVC architecture is followed in this application with the following directories:
- M(model):aertrip_app\app\Models
- V(view): this utility is handled by json
- C(controller):aertrip_app\app\Http\Controllers
 



  
  
