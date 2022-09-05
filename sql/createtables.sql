CREATE TABLE importdata (
    id INT NOT NULL,
    category_name VARCHAR(127) NOT NULL,
    flavor_name VARCHAR(127) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE category (
    category_id INT NOT NULL AUTO_INCREMENT,
    category_name CHAR(128) NOT NULL,
    PRIMARY KEY (category_id),
    CONSTRAINT uc_category1 UNIQUE (category_name)
);

CREATE TABLE flavor (
    flavor_id INT NOT NULL AUTO_INCREMENT,
    category_id INT NOT NULL,
    flavor_name CHAR(128) NOT NULL,
    PRIMARY KEY (flavor_id),
    FOREIGN KEY (category_id)
        REFERENCES category(category_id),
    CONSTRAINT uc_flavor1 UNIQUE (category_id, flavor_name)
);

CREATE TABLE quote (
    quote_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    email VARCHAR(255) NOT NULL,
    capability INT,
    comments VARCHAR(255),
    newsletter TINYINT,
    PRIMARY KEY(quote_id)
);