-- Active: 1709766400996@@127.0.0.1@3308

-- Drop the database if it already exists
DROP DATABASE IF EXISTS roomate_radar;

-- create the database
CREATE DATABASE roommate_radar;

USE roommate_radar;

-- Create the tables
CREATE Table Room_Listings (
    listing_id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255),
    hostel_name VARCHAR(255),
    hostel_cost DECIMAL
);

CREATE Table Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    passwrd VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    gender TINYINT(1) NOT NULL,
    dob DATE,
    ethnicity VARCHAR(255),
    listing_id INT,
    FOREIGN KEY (listing_id) REFERENCES Room_Listings(listing_id),
    CONSTRAINT check_field CHECK (gender IN (0, 1))
);

CREATE Table Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    rating INT,
    review_date DATE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE Table Preferences (
    preference_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    comment VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE Table Profile (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    photo_name VARCHAR(255),
    bio VARCHAR(255),
    facebook VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE Table Roommate_History (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    roommate_id INT NOT NULL,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (roommate_id) REFERENCES Users(user_id)
);

CREATE Table Dislikes (
    dislike_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    COMMENT VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

INSERT INTO Room_Listings (location, hostel_name, hostel_cost) 
VALUES 
('Berekuso', 'Old Dufie', 6200),
('Berekuso', 'Dufie Annex', 7000),
('Berekuso', 'Hosanna', 4000), 
('Berekuso', 'New Hosanna', 7200),
('Berekuso', 'Masere', 5000),
('Berekuso', 'New Masere', 5500),
('None', 'None',0);


