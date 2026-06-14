SELECT * FROM tubes.users;

SELECT * FROM letter_submissions;

SELECT
id,
name,
role,
prodi_id
FROM users;

SELECT * FROM program_studi;

UPDATE users
SET prodi_id = 1
WHERE id = 2;

UPDATE users
SET prodi_id = 2
WHERE id = 3;

select*from tubes.users;

UPDATE users
SET prodi_id = 2
WHERE id = 8;

UPDATE users
SET prodi_id = 2
WHERE id = 9;