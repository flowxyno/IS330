USE leftoff;

SELECT firstName, lastName 
FROM users;

SELECT series.seriesName, tags.tagName
FROM series
JOIN seriesTags ON series.seriesID = seriesTags.seriesID
JOIN tags ON seriesTags.tagID = tags.tagID;

INSERT INTO users (firstName, lastName, userName, passwordHash)
VALUES ('John', 'Doe', 'johndoe', 'HashedPassword');

UPDATE users
SET lastName = 'Smith'
WHERE userID = 1;

DELETE FROM users
WHERE firstName = 'John';