-- drop database if exists testepratica;

-- create database if not exists testepratica;

CREATE TABLE IF NOT EXISTS locations (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    street JSON,
    city varchar(50),
    state varchar(50),
    country varchar(50),
    postcode varchar(50),
    coordinates JSON,
    timezone JSON
);

CREATE TABLE IF NOT EXISTS clientes (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    gender varchar(50),
    name JSON,
    location_id int(11), 
    email varchar(50),
    login JSON,
    dob JSON,
    registered JSON,
    phone varchar(50),
    cell varchar(50),
    picture JSON,
    nat varchar(50),
    FOREIGN KEY (location_id) REFERENCES locations (id)
);
