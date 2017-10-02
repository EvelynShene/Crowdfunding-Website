
This is a project that implements a web application to allow user crowdfunding on online website.

The project development environment：MySQL(5.7.17)+Apache(2.4.23)+PHP(5.6.25)+jQuery+Bootstrap+HTML
  
Some explanation for codes (folders):
1)assets — all used *.js, *.css files are classified in this folder;
2)data — all pages to deal with the website interfaces(functions) are in there. 
3)database — files used to connected with MySQL database
4)interface - interfaces that deal with data queries
5)modal - some homepage modals to help display certain website pages
6)presentation - all the uploads of projects that user upload through the website are stored in this folder
7)CrowdFunding.sql - It contains the database schema we use to implement this website.


Before running this project demo, you should put this folder in the Apache User directories, and then open the file “database/Connection.php”, change the MySQL information($hostName, $databaseName, $username, $password) to allow PHP code to connect your database system. Also, importing the CrowdFunding.sql to create the related database. 

Starting Apache Server and open “localhost/youruserdirectories/project1/index.php”, this project demo can be running.
