Initial action:  main.php


# TheatreBooking - PHP, JavaScript, HTML5, CSS, and MySQL
project work done during November 2016 for the module "Web-Based Information Systems Development"


Assessment details - 

Assessment Objectives

Create a theatre booking system using PHP, JavaScript, HTML5, CSS, and MySQL.

Top
Requirements

Your Web Based theatre booking system should conform to the following requirements:

Present a list of productions and performance times from the database
Allow the user to select a performance
Present information on available seats and prices from the current state of the database
Allow the user to book one or more seats
Confirm booking details and show total cost
Allow the user to enter the customer name and email address (where you can assume e-tickets will be sent -- no need to implement e-ticket delivery), and confirm the purchase
At this point a real system would invoke a payment system. You may ignore this and end the process by displaying a confirmation message and a receipt for assumed payment.
Top
Allocation of Marks

70% of the available marks will be for good solutions to requirements 1 to 5. These will be divided approximately 60% for quality and correctness of the code, 10% for presentation.
20% will be for completing requirements 6 and 7. These may involve changes to the current database model to store customer details.
10% for additional features that enhance the usability of the application, e.g., allowing users to alter their bookings after stage 5.
Top
Setting up the database

We suggest you use the database schema provided in this document to create your database.

You are free to expand on this.

The Theatre Scenario:

The theatre mounts shows which are identified by their titles. Each show has a basic ticket price which is assigned by the theatre management accoding to the expected popularity of the show. There can be many performances of each show with the possibility of more than one per day.

Seats in the theatre are identified by a number within each row. The price of a seat depends upon which area of the theatre it is in. Each area has a figure which is multiplied with the basic price to get the price for all seats in the area. The areas are named back stalls, front stalls, balcony, and box, in order of increasing price.

Bookings are accepted for particular seats in particular performances, and the name of the customer is recorded against each booked seat for a performance.

Theatre relational schema:

Production (Title,BasicTicketPrice)
Performance (PerfDate,PerfTime,Title)
Zone (Name,PriceMultiplier)
Seat (RowNumber,Zone)
Booking (BookingId,Name,Email,PerfDate,PerfTime,RowNumber)

Theatre conceptual model

conceptual diagram image

Theatre SQL table definitions

Execute the following SQL, in order of table appearance:

CREATE TABLE Zone(
 Name char(12) not null,
 PriceMultiplier float not null default 1.0, 
 PRIMARY KEY (Name)
); 

CREATE TABLE Seat(
 RowNumber char(6) not null,
 Zone char(12) not null,
 PRIMARY KEY (RowNumber),
 FOREIGN KEY (Zone) REFERENCES Zone(Name)
);

CREATE TABLE Production(
 Title varchar(100) not null,
 BasicTicketPrice numeric(5,2) not null,
 PRIMARY KEY (Title)
);

CREATE TABLE Performance(
 PerfDate date not null,
 PerfTime time not null,
 Title varchar(100) not null,
 PRIMARY KEY (PerfDate, PerfTime),
 FOREIGN KEY (Title) REFERENCES Production(Title)
);

CREATE TABLE Booking(
 BookingId varchar(255) not null,
 PerfDate date not null,
 PerfTime time not null,
 Name varchar(255) not null,
 Email varchar(255) not null,
 RowNumber char(6) not null,
 PRIMARY KEY (BookingId),
 FOREIGN KEY (PerfDate,PerfTime) REFERENCES Performance(PerfDate,PerfTime),
 FOREIGN KEY (RowNumber) REFERENCES Seat(RowNumber)
);
Populating the database

You are provided with two sql scripts to populate the database with:

zone.sql

seat.sql

You will need to identify how you can run a .sql file against your database. Alternatively, copy the contents of the SQL file and run this against your database, using the MySQL interface.

In regards to populating Production and Performance, I leave this down to you (come up with something interesting!).

Examples for production and performances:

INSERT INTO Production VALUES('Fame', 15.00);
INSERT INTO Performance VALUES('2015-12-10','16:00:00','Fame');
Top
Tips

A good solution will combine what you have learnt in HTML, CSS, JavaScript, PHP, and SQL.

We are looking for clear, concise, and commented code.

Make use of javascript validation, server side (php) validation to check against input.

Ensure your database is not vulnerable to SQL injection attacks. To do so, make use of the functions available to PHP and MySQL.

Have a look at existing theatre booking websites to get an idea of the type of functionality we expect, in relation to our requirements.

We want the website to look nice, so use CSS, however, we are not expecting amazing CSS design, just enough to make it sensible, and usable.

Top
Submission

Submit via RAPTOR

Save your website in the raptor project assignment space: /proj/co887c/assessment2/xxxx/ where 'xxxx' should be replaced by your username.

It should be a direct copy of your webroot. Do not zip up the files as we will access this directory in order to mark your work, and we want to see the website working.

You should be able to view the pages of your assignment at the following URL:

http://raptor.kent.ac.uk/proj/co887c/assessment2/xxxx
where 'xxxx' should be replaced by your username (you need to append the file-name of your initial page to the URL above, if it does not have name "index").
Assessment start: Tuesday 15st November 2016
Due date: Tuesday 13th December 2016, by 23:55
NOTE: Your submission site will automatically be locked at the submission date. If you do not submit by then, you will not be able to.
If you have questions, please ask!

Plagiarism

All work must be your own. You may make use of code snippets, etc, you must reference these in your code! The grade will be proportional to your original contribution (do not submit existing or near complete solutions available on the web, you will get zero).

Submission deadlines are hard. Any work submitted beyond the assessment due date will receive a mark of 0. Concessions will only be given for valid reasons, via the course administration office.

Top
