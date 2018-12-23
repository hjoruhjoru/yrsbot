CREATE TABLE attachments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	file_name VARCHAR(100) NOT NULL,
	path VARCHAR(100) NOT NULL,
	is_deleted boolean not null default 0,
	created_at TIMESTAMP,
	updated_at TIMESTAMP default NOW()
)

CREATE TABLE response_model ( 
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	type int(6) unsigned NOT NULL, 
	created_at TIMESTAMP, 
	updated_at TIMESTAMP default NOW() 
);
