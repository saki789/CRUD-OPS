-- Create the "site" table

CREATE TABLE site (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact VARCHAR(255),
    description TEXT,
    start_date DATE NOT NULL,
    end_date DATE
);





-- Create the "Guards" table
CREATE TABLE guards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    grid_number VARCHAR(10) NOT NULL UNIQUE,
    start DATE NOT NULL,
    comments TEXT
);

-- Create the "DutyRoster" table
CREATE TABLE duty_roster (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    site VARCHAR(255) NOT NULL,
    guard VARCHAR(255) NOT NULL,
    IN TIME NOT NULL,
    OUT TIME NOT NULL,
    status ENUM('Present', 'Day Off', 'Sick', 'Leave', 'Other') NOT NULL,
    total DECIMAL(5, 2) NOT NULL,
    extra DECIMAL(5, 2) NOT NULL,
    grand DECIMAL(5, 2) NOT NULL,
    comments TEXT
);

-- Create the "Timesheet" table
CREATE TABLE timesheet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guard_id INT NOT NULL,
    entry_date DATE NOT NULL,
    IN TIME NOT NULL,
    OUT TIME NOT NULL,
    site VARCHAR(255) NOT NULL,
    total DECIMAL(5, 2) NOT NULL,
    extra DECIMAL(5, 2) NOT NULL,
    grand DECIMAL(5, 2) NOT NULL,
    comments TEXT,
    FOREIGN KEY (guard_id) REFERENCES guards(id)
);
