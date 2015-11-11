CREATE DATABASE IF NOT EXISTS myfinance;

USE myfinance;

CREATE TABLE IF NOT EXISTS personinfo (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL DEFAULT '',
    sex INT,
    department VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS activeinfo (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    sender VARCHAR(30) NOT NULL DEFAULT '',
    receiver VARCHAR(30) NOT NULL DEFAULT '',
    time VARCHAR(30), 
    location VARCHAR(50),
    moneyQuantity int,
    description TEXT,
    PRIMARY KEY (id)
);
