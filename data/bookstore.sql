drop SCHEMA if EXISTS bookstore;
create SCHEMA bookstore;
use bookstore;
CREATE TABLE customer (
    id int AUTO_INCREMENT,
    name varchar(40),
    email varchar(50) unique not null,
    phone varchar(15),
    birthdate date,
    registered_at datetime,
    active INT(1) NOT NULL DEFAULT '0',
    password text,
    PRIMARY KEY (id)
);
create TABLE admin(
    id int AUTO_INCREMENT,
    email varchar(50),
    first_name varchar(20) not null,
    last_name varchar(20) not null,
    user_name varchar(30) UNIQUE,
    phone varchar(15),
    birthdate date,
    registered_at datetime,
    password text,
    PRIMARY KEY (id)
);
create TABLE employee(
    id int AUTO_INCREMENT,
    full_name varchar(40),
    work_as varchar(20),
    link_image varchar(100),
    link_facebook varchar(100),
    link_twitter varchar(100),
    link_instagram varchar(100),
    active INT(1) NOT NULL DEFAULT '0',
    password text,
    PRIMARY KEY (id)
);

create table categories(
    category varchar(20),
    primary key (category)
);

create TABLE book(
	id int AUTO_INCREMENT,
    name varchar(20) not NULL,
    category varchar(20) not null,
    price int not null,
    description longtext,
    link_image varchar(50),
    published_at date,
    is_bestseller int(1) default '0',
    PRIMARY KEY (id),
    foreign key (category) references categories(category)
);
#One book may have more than 1 author.
CREATE TABLE written_by (
    book_id int,
    author varchar(20),
    PRIMARY key (book_id,author),
    FOREIGN key (book_id) REFERENCES book(id)
);
CREATE table reviewed_by(
    book_id int,
    customer_id int,
    #Number of stars 0-5 quality and price
    quality int,
    price int,
    PRIMARY KEY (book_id, customer_id),
    FOREIGN KEY (book_id) REFERENCES book(id),
    FOREIGN key (customer_id) REFERENCES customer(id)
);
CREATE TABLE shopping_log(
    id int AUTO_INCREMENT,
    customer_id int,
    total_price int,
    created_at datetime,
    PRIMARY KEY (id),
    FOREIGN key (customer_id) REFERENCES customer(id)
);
#shopping log contains books and numbers of each of book.
create table shopping_log_entry(
    log_id int,
    book_id int,
    quantity int,
    PRIMARY key(log_id, book_id),
    FOREIGN key (log_id) REFERENCES shopping_log(id),
    FOREIGN key (book_id) REFERENCES book(id)
);
create table send_email_log(
    id int AUTO_INCREMENT,
    first_name varchar(20),
    last_name varchar(20),
    email varchar(30),
    website varchar(50),
    subject varchar(100),
    message varchar(255),
    created_at datetime,
    PRIMARY KEY (id)
);

create table verification_account(
    email varchar(50),
    hash text,
    primary key (email),
    foreign key (email) references customer(email)
);
INSERT INTO employee (full_name, work_as, link_image,link_facebook, link_instagram,link_twitter) VALUES
("Lê Bá Thông", "Co-founder", "/assets/images/about_page/avatar1.gif","https://www.facebook.com/thong.leba.3", "https://www.instagram.com/thongleb/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_instagram,link_twitter) VALUES
("Nguyễn Phi Thông", "Co-founder", "/assets/images/about_page/avatar2.gif","https://www.facebook.com/profile.php?id=100008734362594", "https://www.instagram.com/thongleb/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_instagram,link_twitter ) VALUES
("Đặng Ngọc Tâm", "Manager", "/assets/images/about_page/avatar3.gif","https://www.facebook.com/scotlandyard00", "https://www.instagram.com/dntt_00/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_instagram, link_twitter) VALUES
("Nguyễn Ngọc Thuấn", "Marketer", "/assets/images/about_page/avatar4.gif","https://www.facebook.com/ngocthuan1210", "https://www.instagram.com/dntt_00/", "https://twitter.com/thong94584917");
