CREATE TABLE attachments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	file_name VARCHAR(100) NOT NULL,
	store_file_name VARCHAR(100) NOT NULL,
	ref_table VARCHAR(50) NOT NULL,
	ref_id INT(11),
	type INT(6) unsigned,
	file_size INT(6),
	file_type VARCHAR(50) NOT NULL,   
	is_deleted boolean NOT NULL default 0,
	created_at TIMESTAMP,
	updated_at TIMESTAMP

)

CREATE TABLE response_model ( 
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	user_id INT(6),
	type int(6) unsigned NOT NULL, 
	token VARCHAR(100),
	created_at TIMESTAMP, 
	updated_at TIMESTAMP default NOW() 
);

CREATE TABLE password_resets ( 
	email varchar(255) NOT NULL, 
	token varchar(255) NOT NULL, 
	created_at TIMESTAMP
);

CREATE TABLE users ( 
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name varchar(255) NOT NULL, 
	email varchar(255) NOT NULL, 
	email_verified_at TIMESTAMP, 
	password varchar(255) NOT NULL, 
	remember_token varchar(100) , 
	created_at TIMESTAMP default NOW(), 
	updated_at TIMESTAMP default NOW() 
);
