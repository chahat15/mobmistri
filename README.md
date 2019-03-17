# mobmistri

To test our database we have use xampp localhost server

Make two database in localhost:
1. Email_verify
2. Phone_repair

# Sql query to make tables in Email_verify: 

CREATE TABLE User_email_verify(User_Email VARCHAR(255) NOT NULL PRIMARY KEY,
                                Verification_Code VARCHAR(6) NOT NULL);
                                
# Sql query to make tables in Phone_repair: 

CREATE TABLE Customers_info(Id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             Phone_name VARCHAR(255) NOT NULL,
                             Phone_problem VARCHAR(255) NOT NULL,
                             User_Name VARCHAR(100) NOT NULL,
                             User_Contact_no VARCHAR(11) NOT NULL,
                             User_email VARCHAR(255) NOT NULL,
                             User_Address VARCHAR(255) NOT NULL,
                             Repair_date VARCHAR(20) NOT NULL,
                             spare_phone_require VARCHAR(5) NOT NULL);
