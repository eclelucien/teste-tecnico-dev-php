
create table clientes(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    gender varchar(50) not null,
    name JSON not null,
    location_id int(1),
    email varchar(50) not null,
    login JSON,
    dob JSON,
    registered JSON,
    phone varchar(50) not null,
    cell varchar(50) not null,
    picture JSON,
    nat varchar(50) not null,
    FOREIGN KEY (location_id) REFERENCES location (id)
);

create table  locations(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    street JSON,
    city varchar(50) not null,
    state varchar(50) not null,
    country varchar(50) not null,
    postcode int(1),
    coordinates JSON,
    timezone  JSON,
);

