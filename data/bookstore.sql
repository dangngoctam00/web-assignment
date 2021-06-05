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
    date_review datetime,
    content longtext,
    PRIMARY KEY (book_id, customer_id, date_review),
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

create table image_foto(
    book_id int,
    link varchar(50),
    primary key (book_id,link)
);
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_twitter, link_instagram) VALUES
("Lê Bá Thông", "Co-founder", "/assets/images/slide1.jpg","https://www.facebook.com/thong.leba.3", "https://www.instagram.com/thongleb/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_twitter, link_instagram) VALUES
("Nguyễn Phi Thông", "Co-founder", "/assets/images/slide2.jpg","https://www.facebook.com/profile.php?id=100008734362594", "https://www.instagram.com/thongleb/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_twitter, link_instagram) VALUES
("Đặng Ngọc Tâm", "Manager", "/assets/images/slide3.jpg","https://www.facebook.com/scotlandyard00", "https://www.instagram.com/dntt_00/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_twitter, link_instagram) VALUES
("Nguyễn Ngọc Thuấn", "Marketer", "/assets/images/slide4.jpg","https://www.facebook.com/ngocthuan1210", "https://www.instagram.com/dntt_00/", "https://twitter.com/thong94584917");

# insert image_foto
INSERT INTO image_foto (book_id,link) VALUES (1,"../../../assets/images/detail_book_page/1/1.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (1,"../../../assets/images/detail_book_page/1/2.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (1,"../../../assets/images/detail_book_page/1/3.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (2,"../../../assets/images/detail_book_page/2/1.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (2,"../../../assets/images/detail_book_page/2/2.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (3,"../../../assets/images/detail_book_page/3/1.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (3,"../../../assets/images/detail_book_page/3/2.png");

INSERT INTO image_foto (book_id,link) VALUES (4,"../../../assets/images/detail_book_page/4/1.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (5,"../../../assets/images/detail_book_page/5.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (6,"../../../assets/images/detail_book_page/6.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (7,"../../../assets/images/detail_book_page/7.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (8,"../../../assets/images/detail_book_page/8.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (9,"../../../assets/images/detail_book_page/9.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (10,"../../../assets/images/detail_book_page/10.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (11,"../../../assets/images/detail_book_page/11.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (12,"../../../assets/images/detail_book_page/12.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (13,"../../../assets/images/detail_book_page/13.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (14,"../../../assets/images/detail_book_page/14.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (15,"../../../assets/images/detail_book_page/15.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (16,"../../../assets/images/detail_book_page/16.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (17,"../../../assets/images/detail_book_page/17.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (18,"../../../assets/images/detail_book_page/18.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (19,"../../../assets/images/detail_book_page/19.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (20,"../../../assets/images/detail_book_page/20.jpeg");


