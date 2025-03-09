### Project Overview

This is a Task Management System built with Laravel and Laravel Admin. The application allows users to manage tasks, categories, and tags using an intuitive admin panel.

### Features

• Task Management: Create, edit, delete, and assign tasks.
• Category Management: Organize tasks into different categories.
• Tag Management: Assign multiple tags to tasks.
• Task Status Updates: Mark tasks as pending or completed.
• Bulk Actions: Mark multiple tasks as completed at once.
• Admin Dashboard: View statistics on tasks, categories, and tags.

### Installation & Setup

1. Clone the Repository
   git clone https://github.com/GecaMelisa/task-manager.git
   cd task-manager

2. Install Dependencies
   composer install
   npm install

3. Configure Environment
   • cp .env.example .env
   • DB_DATABASE=your_database
   • DB_USERNAME=your_username
   • DB_PASSWORD=your_password

4. Run Migrations & Seed Database
   php artisan migrate --seed

5. Start the Server
   php artisan serve
   The application will be available at http://127.0.0.1:8000

### Admin Panel Access

• URL: http://127.0.0.1:8000/admin
• Default Admin Credentials:
• Username: admin
• Password: password

To create a new admin user:
• php artisan admin:create-user

If you forget the admin password, reset it via:
• php artisan tinker
Then run:
•use Encore\Admin\Auth\Database\Administrator;
Administrator::where('email', 'admin@example.com')->update(['password' => bcrypt('newpassword')]);

### Features & Usage Guide

### Task Management

• Navigate to Admin Panel > Tasks
• Click Create to add a new task
• Edit task details such as title, description, due date, category, and tags
• Use the bulk action to mark tasks as completed

### Category & Tag Management

• Navigate to Admin Panel > Categories or Tags
• Create, edit, or delete categories/tags
• Assign tasks to categories and tags

### Admin Dashboard

•View task, category, and tag statistics
• Quick access to task management

### Database Structure & Relationships

1. **Tasks Table (tasks)**
   | Column | Type | Constraints | Description |
   |-------------|--------|------------------------------------|----------------------------------|
   | id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique Task ID |
   | title | STRING | NOT NULL | Task Title |
   | description | TEXT | NULLABLE | Task Description |
   | due_date | DATE | NOT NULL | Task Due Date |
   | status | ENUM | DEFAULT 'pending' | Task Status (Pending, Completed) |
   | category_id | INT | FOREIGN KEY (`categories.id`) | Associated Category |
   | created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Created Timestamp |
   | updated_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Updated Timestamp |

2. **Categories table (categories)**
   | Column | Type | Constraints | Description |
   |--------|--------|---------------------------|---------------|
   | id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique ID |
   | name | STRING | NOT NULL, UNIQUE | Category Name |
   | created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Created Timestamp |
   | updated_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Updated Timestamp |

3. **Tags table (tags)**
   | Column | Type | Constraints | Description |
   |--------|--------|---------------------------|-------------|
   | id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique ID |
   | name | STRING | NOT NULL, UNIQUE | Tag Name |
   | created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Created Timestamp |
   | updated_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Updated Timestamp |

4. **Pivot table (task_tag)**
   | Column | Type | Constraints | Description |
   |----------|------|---------------------------------|------------------------|
   | task_id | INT | FOREIGN KEY (`tasks.id`) | Links to `tasks` table |
   | tag_id | INT | FOREIGN KEY (`tags.id`) | Links to `tags` table |

5. **Users Table (`users`)**
   | Column | Type | Constraints | Description |
   |------------|-----------|----------------------------------------|---------------------------|
   | id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique User ID |
   | name | STRING | NOT NULL | User's Full Name |
   | email | STRING | NOT NULL, UNIQUE | User Email Address |
   | password | STRING | NOT NULL | Hashed Password |
   | created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Account Created Timestamp |
   | updated_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Last Updated Timestamp |

### Screenshots

1. **Admin Login Page** - Users must log in with their credentials to access task management features
   ![Admin Login Page](image.png)

2. **Admin Dashboard** - Displays an overview of tasks, categories, and tags, providing quick access to task management.
   ![Admin Dashboard](image-1.png)

3. **Task List Page** - Displays a list of all tasks with details such as title, status, category, and tags. Tasks are color-coded based on their status for better visibility.
   ![Task List Page](image-4.png)

4. **Task List Page - Overview & Actions** - Displays all tasks with filtering, bulk actions, and export options. Also, allows users to edit, view, or delete a task.
   ![Task List Page - Overview & Actions](image-6.png)(image-7.png)

5. **Task Edit Page** - Users can modify task details such as title, description, category, tags, due date, and status. The page allows updating or deleting the task directly.
   ![Task Edit Page](image-8.png)

6. **Task Detail & Deletion Confirmation** - Users can view task details, including title, status, category, and tags. The page also allows editing and deleting a task, with a confirmation prompt before deletion to prevent accidental removals.
   ![Task Detail & Deletion Confirmation](image-9.png)(image-10.png)

7. **Task Filtering & Search** - The task list page includes a filtering and search feature, allowing users to search for tasks by ID, title, and status. Users can apply filters, search for specific tasks, and reset filters when needed. The results are dynamically displayed in the task list below.
   ![Task Filtering & Search](image-11.png)

8. **Task Creation Page** - Users can add a new task by entering the title, description, category, tags, due date, and status. Required fields are marked with an asterisk (\*). The Reset button clears the form, while the Submit button saves the task. The List button on the top-right navigates back to the task list.
   ![Task Creation Page](image-14.png)

9. **Category List Page** - Displays all available task categories in a structured table format. Users can filter, export, and manage categories efficiently
   ![Category List Page](image-12.png)

### Code Quality & Documentation

•Follows MVC Architecture – The project adheres to the Model-View-Controller (MVC) pattern, ensuring clean separation of concerns and maintainability.
• Well-Documented Functions – Key functions include inline comments explaining their purpose and logic.
• Structured Migrations & Model Relationships:
• Each model (Task, Category, Tag) has clearly defined relationships (one-to-many, many-to-many).
• Migrations ensure database consistency and automatic schema generation.
• Best Practices Used:
• Mass assignment protection using $fillable in models.
• Foreign key constraints in migrations for data integrity.
• Laravel Admin panel integration for a user-friendly experience.
