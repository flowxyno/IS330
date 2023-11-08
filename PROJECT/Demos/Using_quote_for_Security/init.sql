DROP DATABASE IF EXISTS demo;

CREATE DATABASE demo;

-- Using the Created Database

USE demo;

-- Creating a Table

CREATE TABLE Starships (

    ID INT PRIMARY KEY,

    Name VARCHAR(255),

    Class VARCHAR(255),

    Captain VARCHAR(255),

    FirstLaunch DATE

);

-- Inserting Data into the Table

INSERT INTO Starships (ID, Name, Class, Captain, FirstLaunch) VALUES
(1, 'USS Enterprise', 'Constitution', 'James T. Kirk', '2245-04-11'),
(2, 'USS Voyager', 'Intrepid', 'Kathryn Janeway', '2371-01-04'),
(3, 'USS Defiant', 'Defiant', 'Benjamin Sisko', '2371-06-24'),
(4, 'USS Discovery', 'Crossfield', 'Gabriel Lorca', '2256-05-11'),
(5, 'USS Reliant', 'Miranda', 'Clark Terrell', '2282-08-09'),
(6, 'USS Stargazer', 'Constellation', 'Jean-Luc Picard', '2333-07-20'),
(7, 'USS Equinox', 'Nova', 'Rudolph Ransom', '2370-03-08'),
(8, 'USS Lakota', 'Excelsior', 'Erika Benteen', '2290-11-03'),
(9, 'USS Shenzhou', 'Walker', 'Philippa Georgiou', '2249-07-11'),
(10, 'USS Prometheus', 'Prometheus', 'Logan MacLeod', '2374-02-12');

