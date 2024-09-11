Event Management System
Overview
The Event Management System is a comprehensive platform built with PHP to facilitate the management of events. It features three main components:

User Panel: For attendees to browse and register for events.
Vendor Panel: For vendors to list their events and manage them.
Admin Panel: For administrators to oversee and manage the entire system.
Features
User Panel:

Browse upcoming events.
Register for events.
View event details.
Manage personal profile.
Vendor Panel:

List new events.
Update or delete existing events.
View event registrations and manage attendee lists.
Admin Panel:

Manage users and vendors.
Approve or reject vendor event listings.
Generate reports on event statistics.
Oversee the overall system health and performance.
Requirements
PHP >= 7.4
MySQL >= 5.7
Web server (e.g., Apache, Nginx)
Composer (for dependency management, if applicable)
Installation
Clone the repository:

bash
Copy code
git clone https://github.com/yourusername/event-management-system.git
cd event-management-system
Configure the database:

Create a MySQL database and user.
Import the database.sql file located in the sql folder into your MySQL database.
Update the database connection settings in config/database.php.
Install dependencies:

If you are using Composer for dependency management, run:

bash
Copy code
composer install
Set up environment variables:

Copy the .env.example file to .env and configure your environment settings.

Run the application:

Ensure your web server is configured to serve the application, and navigate to the project directory. Open your browser and visit http://localhost/your-project-folder to access the system.
