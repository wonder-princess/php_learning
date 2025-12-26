CREATE TABLE contact (

    id int auto_increment primary key,
    email varchar(255),
    url varchar(255),
    os tinyint,
    browser varchar(255),
    contact varchar(255),
    create_date datetime default current_timestamp 
);