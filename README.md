# Assignment - PHP Invoice System

### Getting Started
Creating PHP application that allows the user to follow the actions:

  - List the invoices
  - Export the transactions as a CSV file
  - View invoice details
  - Set the payment status of each invoice to paid / unpaid
  - Export a CSV customer report

### Installation

**Required: XAMPP**

##### Import to database

Create the `assignment_db` database and import the `database.sql`file through the MySql Interface. 

OR

At the MySQL shell log in as root
```
# mysql -u root -p
```
Create the `assignment_db` database
```sh
CREATE DATABASE assignment_db;
```
Connect to the created database
```
mysql> use assignment_db;
```
At the Windows command line upload the `database.sql` file in the `C:\xampp\mysql\bin`.
```sh
$  mysql -u root -p assignment_db < FULL_PATH\database.sql
```
##### Put the site in the folder

In the `C:\xampp\htdocs` directory copy the `assignment` folder.

##### Run the application

Browse the application at http://localhost/assignment/
