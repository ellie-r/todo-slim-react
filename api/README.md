### Setup

1. Run `composer install` in root of project
2. Create database with name `to_do_app` and populate using latest version in db/
3. To run the application locally: `composer start`


### Routes

**/**
GET
- Gets all non complete tasks from the database
- Returns:
Success response - returns json with an array of objects in data parameter
    - **{ success: true, message: 'got tasks from db', data: [{'id': 1, 'name': 'task'}]**
- Error response
    - Code: 500 Content: **{"success": false, "message": "SQL error message", "data": []}**
    
**/markAsComplete/{id}**
PUT
- Marks task as completed
- Required: { id }
- Returns:
    - Success response
        - **{"success": true, "message": "Task marked as complete", "data": []}**
    - Error Responses
        - Code: 500 Content: **{"success": false, "message": "SQL error message", "data": []}**
        - Code: 400 Content: **{"success": false, "message": "Could not mark as complete", "data": []}**

**/addNewTask**
POST
- Creates new task
- Request data **{ taskName : 'task' }**
- Returns:
    - Success response
        - **{"success": true, "message": "Added new task successfully", "data": []}**
    - Error Response
        - Code: 500 Content: **{"success": false, "message": "SQL error message", "data": []}**
        - Code: 400 Content:**{"success": false, "message": "You must type a task", "data": []}**
