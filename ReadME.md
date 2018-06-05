
This is a project that implements a web application to allow user crowdfunding on online website.<br>

The project development environment：MySQL(5.7.17)+Apache(2.4.23)+PHP(5.6.25)+jQuery+Bootstrap+HTML<br>
  
Some explanation for codes (folders):<br>
>1)assets — all used *.js, *.css files are classified in this folder;<br>
>2)data — all pages to deal with the website interfaces(functions) are in there. <br>
>3)database — files used to connected with MySQL database<br>
>4)interface - interfaces that deal with data queries<br>
>5)modal - some homepage modals to help display certain website pages<br>
>6)presentation - all the uploads of projects that user upload through the website are stored in this folder<br>
>7)CrowdFunding.sql - It contains the database schema we use to implement this website.<br>


Before running this project demo, you should put this folder in the Apache User directories, and then open the file “database/Connection.php”, change the MySQL information($hostName, $databaseName, $username, $password) to allow PHP code to connect your database system. Also, importing the CrowdFunding.sql to create the related database. <br>

Starting Apache Server and open “localhost/youruserdirectories/project1/index.php”, this project demo can be running.<br>
(This is a group project with a team of two members)
