-- Active: 1709766400996@@127.0.0.1@3308

-- Drop the database if it already exists
DROP DATABASE IF EXISTS roomate_radar;

-- create the database
CREATE DATABASE roommate_radar;

USE roommate_radar;

-- Create the tables
CREATE Table ethnicity(
    eth_id INT AUTO_INCREMENT PRIMARY KEY,
    eth_name VARCHAR(255),
    eth_desc VARCHAR(255)
);

CREATE Table room_listings (
    listing_id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255),
    hostel_name VARCHAR(255),
    hostel_cost DECIMAL
);

CREATE Table users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    passwrd VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    gender TINYINT(1) NOT NULL,
    dob DATE,
    ethnicity INT,
    listing_id INT,
    FOREIGN KEY (listing_id) REFERENCES room_listings(listing_id) ON DELETE CASCADE,
    FOREIGN KEY (ethnicity) REFERENCES ethnicity(eth_id) ON DELETE CASCADE,
    CONSTRAINT check_field CHECK (gender IN (0, 1))
);

CREATE Table reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    rating INT,
    review_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE Table preferences (
    preference_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    comment VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

CREATE Table profile (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    photo_name VARCHAR(255),
    bio VARCHAR(255),
    facebook VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE Table roommate_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    roommate_id INT NOT NULL,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (roommate_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE Table dislikes (
    dislike_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    COMMENT VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

INSERT INTO ethnicity (eth_name, eth_desc)
VALUES
('African', 'Ethnic groups indigenous to Africa'),
('Asian', 'Ethnic groups indigenous to Asia'),
('European', 'Ethnic groups indigenous to Europe'),
('Native American', 'Indigenous peoples of the Americas'),
('Hispanic/Latino', 'Ethnic groups with origins in Latin America or Spain'),
('Middle Eastern', 'Ethnic groups from the Middle East region'),
('Indigenous Peoples', 'Various indigenous ethnic groups from around the world'),
('Pacific Islander', 'Ethnic groups indigenous to the Pacific Islands'),
('Jewish', 'Ethnic group associated with Judaism'),
('Romani', 'Ethnic group with roots in South Asia, traditionally nomadic');

INSERT INTO room_listings (location, hostel_name, hostel_cost) 
VALUES 
('Berekuso', 'Old Dufie', 6200),
('Berekuso', 'Dufie Annex', 7000),
('Berekuso', 'Hosanna', 4000), 
('Berekuso', 'New Hosanna', 7200),
('Berekuso', 'Masere', 5000),
('Berekuso', 'New Masere', 5500),
('None', 'None',0);


