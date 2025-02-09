# Alex's To-Do App!

This project was created as part of an assignment for Fintel's interview process. This was my first attempt at using Laravel, and modern PHP syntax/features. 

# Database Interactivity
This web-app interacts with a single database table, called Tasks, which contain the following columns (with examples):
|     ...      | id  | name                       | description                                  | priority | created_at              | updated_at              |
|-----------|-----|----------------------------|----------------------------------------------|----------|-------------------------|-------------------------|
| Data Type | INT | VARCHAR                    | VARCHAR                                      | INT      | DATETIME                | DATETIME                |
|           |     |                            |                                              |          |                         |                         |
| Example 1 | 1   | Go shopping                | Go to Tesco and grab milk, eggs & bread.     | 3        | 2025-02-06 08:30:20.880 | 2025-02-06 08:30:20.880 |
| Example 2 | 2   | Finish Fintel Assignement! | Finish implementation and test app functions | 5        | 2025-02-06 08:30:28.880 | 2025-02-06 08:30:28.880 |

The table was defined using a PHP migration file, specifically using the [Laravel Simple Migrations](https://packagist.org/packages/mylesduncanking/laravel-simple-migration) composer package.

## Eloquent
A Task model was created for Task objects, allowing all database fields to be assigned en masse (using an empty $guarded=[] field). These models were used to as the object. The use of my model allows the on-screen Tasks to always remain in sync with the MySQL database table.

# View Components
Livewire was used within the web-app to create two main components, displayed nesting within the default Blade welcome page. 

### TaskCard
Which populates a styled card with Task data from the database. TaskCard provides two buttons, bound to the underlying Task model, to toggle a task's completion status or delete it. Tasks are uniquely identified within the app by their id field.

Classes are conditionally applied based on task completion to the class as a whole and the toggleTask button within, to allow for a stylistic distinction between open and closed tasks.

When tasks are interacted with, the taskUpdated function is called, which the next component (TaskManager) listens for.


### TaskManager
TaskManager is the main brains of the application. It iterates all existing tasks and creates a TaskCard for each and provides the functionality to add new tasks using a form. There are two separate lists within this component and tasks are populated into either depending on their completion status. Within each list, tasks are sorted in descending order of their priority values. 

Whenever there is any changes to any task- such as if a new task is added or if an existing is deleted/has it's status updated- TaskManager refreshes the view, by re-sorting existing task objects. It achieves this by listening for the taskUpdated function call, which is called from within TaskCards whenever a Task is removed or opened/closed.

# Concerns & Comments
- I believe the use of $guarded allows for non-existing database fields to be added to the table, which is a potential security and performance concern. In future iterations, I would instead use $fillable and specifically define fields to accept, although this may throw exceptions that would need to be handled.

- Most logic is handled directly within the TaskManager Livewire component. In the future, I'd like to make use of controller classes, adopting a more MVC-approach, to separate application logic concerns more.

- Existing tasks can't currently be edited. They can only be added, completed/re-opened or removed.

- TaskManager contains two separate task lists, for open and closed tasks. It would be better to create a single TaskList component to display these in a more dynamic, extensible way.

- Priority is currently not used for anything except as a defualt sorting mechanism. Adding additional functionality to sort/filter tasks based on their various attributes would be great, or to at least style different priorities differently.

- My SCSS is also quite messy, with some redundancy/duplicate styles. It could do with being more optimised, adopting better SCSS features like mixins for brevity.
