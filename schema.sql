CREATE TABLE attachments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	file_name VARCHAR(100) NOT NULL,
	path VARCHAR(100) NOT NULL,
	is_deleted boolean NOT NULL default 0,
	created_at TIMESTAMP,
	updated_at TIMESTAMP default NOW()
)

CREATE TABLE response_model ( 
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	type int(6) unsigned NOT NULL, 
	created_at TIMESTAMP, 
	updated_at TIMESTAMP default NOW() 
);

CREATE TABLE password_resets ( 
	email varchar(255) NOT NULL, 
	token varchar(255) NOT NULL, 
	created_at TIMESTAMP, 
);

CREATE TABLE users ( 
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name varchar(255) NOT NULL, 
	email varchar(255) NOT NULL, 
	email_verified_at TIMESTAMP, 
	password varchar(255) NOT NULL, 
	remember_token varchar(100) , 
	created_at TIMESTAMP, 
	updated_at TIMESTAMP default NOW() 
);
