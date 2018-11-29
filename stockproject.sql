--final project SQL Can be use to completely delte and rebuild project
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP SCHEMA IF EXISTS murillox ;
CREATE SCHEMA IF NOT EXISTS murillox;
USE murillox;

create table users 
(
    c_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    firstname VARCHAR(50) NOT NULL DEFAULT '',
    lastname VARCHAR(50) NOT NULL DEFAULT '',
    email VARCHAR(50) NOT NULL DEFAULT '',
    user_type VARCHAR(100) NOT NULL,
    password VARCHAR(128) NOT NULL DEFAULT '',
    acc_id INT NOT NULL ,
    primary key(c_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table portfolio 
(
    p_id INT NOT NULL AUTO_INCREMENT,
    c_id INT NOT NULL,
    t_id INT NOT NULL,
    numshares int NOT NULL,
        primary key(p_id) 
);

create table ticker 
(
    t_id INT NOT NULL AUTO_INCREMENT,
    companyname VARCHAR(50) NOT NULL DEFAULT '',
    ticker VARCHAR(5) NOT NULL DEFAULT '',
        primary key(t_id) 
);

create table account 
(
    acc_id INT NOT NULL AUTO_INCREMENT,
	balance DECIMAL(9, 4) NOT NULL,
        primary key(acc_id) 
);

create table transactionregister  
(
    id INT NOT NULL AUTO_INCREMENT,
    transaction_type INT NOT NULL,
	transaction_DR DECIMAL(9, 4) NOT NULL,
    transaction_CR DECIMAL(9, 4) NOT NULL,
    date VARCHAR(20) NOT NULL DEFAULT '',
    reference_id INT NOT NULL,
    primary key(id) 
);

create table stockmarket 
(
    t_id INT NOT NULL,
    currentvalue DECIMAL(9, 4) NOT NULL,
	openingvalue DECIMAL(9, 4) NOT NULL,
    closingvalue DECIMAL(9, 4) NOT NULL,
    stock_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
