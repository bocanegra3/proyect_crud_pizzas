create table users (
id_user int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username varchar(20) NOT NULL,
password char(64) NOT NULL,
email varchar(80) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
active char(2) DEFAULT "SI"
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;
