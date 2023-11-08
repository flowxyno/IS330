DROP DATABASE IF EXISTS leftoff;

CREATE DATABASE IF NOT EXISTS leftoff;
USE leftoff;

CREATE TABLE users (		
   userID INT PRIMARY KEY auto_increment,		
   firstName VARCHAR(50),		
   lastName VARCHAR(50),		
   userName VARCHAR(50), 		
   passwordHash VARCHAR(255)		
);		

CREATE TABLE tags (		
   tagID INT PRIMARY KEY auto_increment,		
   tagName VARCHAR(50)		
);		

CREATE TABLE series (
   seriesID INT PRIMARY KEY auto_increment,
   seriesName VARCHAR(100),
   synop TEXT,
   coverArt VARCHAR(255)
);

CREATE TABLE seriesTags (
   seriesTagID INT PRIMARY KEY auto_increment,
   seriesID INT, 
   tagID INT, 
   FOREIGN KEY (seriesID) REFERENCES series(seriesID),
   FOREIGN KEY (tagID) REFERENCES tags(tagID)
);

CREATE TABLE episodes (
   episodeID INT PRIMARY KEY auto_increment,
   seriesID INT,
   episodeNumber INT,
   episodeTitle VARCHAR(100),
   episodeSynop TEXT,
   FOREIGN KEY (seriesID) REFERENCES series(seriesID)
);

CREATE TABLE seriesTrackers (
   trackerID INT PRIMARY KEY auto_increment,
   userID INT,
   seriesID INT,
   episodeID INT,
   lastWatched DATETIME,
   FOREIGN KEY (userID) REFERENCES users(userID),
   FOREIGN KEY (seriesID) REFERENCES series(seriesID), 
   FOREIGN KEY (episodeID) REFERENCES episodes(episodeID)
);
