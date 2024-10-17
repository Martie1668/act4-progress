CREATE TABLE chef (
    chefid INT AUTO_INCREMENT PRIMARY KEY,
    chefname VARCHAR (50),
    specialization\ VARCHAR(50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE recipe (
    recipeid INT AUTO_INCREMENT PRIMARY KEY,
    recipename VARCHAR (50),
    ingredients VARCHAR(50),
    chefid INT FOREIGN KEY,
);