-- Active: 1650919402035@@127.0.0.1@3306@paypagev2
CREATE TABLE customers(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR (255) NOT NULL,
    last_name VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    created_at DATE default CURRENT_TIME
) ;

CREATE TABLE pwdreset(  
    pwdResetId int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pwdResetEmail VARCHAR (255),
    pwdResetSelector VARCHAR (255),
    pwdResetToken VARCHAR (255),
    pwdResetIdExpires VARCHAR (255)
) ;

CREATE TABLE transactions(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customer_id VARCHAR (255) NOT NULL,
    product VARCHAR (255) NOT NULL,
    amount VARCHAR (255) NOT NULL,
    currency VARCHAR (255) NOT NULL,
    status VARCHAR (255) NOT NULL,
    created_at DATE
) ;

CREATE TABLE users(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usersName VARCHAR (255),
    usersEmail VARCHAR (255),
    usersUid VARCHAR (255),
    usersPwd VARCHAR (255)
) ;