<object data="https://github.com/marronmarasigan/mantis/raw/master/User%20Manual%20Manila%20Tourist%20Information%20System.pdf" type="application/pdf" width="700px" height="700px">
    <embed src="https://github.com/marronmarasigan/mantis/raw/master/User%20Manual%20Manila%20Tourist%20Information%20System.pdf">
        <p>Please download the PDF to view it: <a href="https://github.com/marronmarasigan/mantis/raw/master/User%20Manual%20Manila%20Tourist%20Information%20System.pdf">Download PDF</a>.</p>
    </embed>
</object>

# mantis

# Manila Tourist Information System

# User Manual

## A. INSTALLATION OF MANILA TOURIST INFORMATION SYSTEM

#### This section discusses on how to install this system to a computer.

### 1. XAMPP Required

```
Before installing the system, please make sure that the computer has XAMPP installed with
Apache and MySQL enabled.
```
```
If XAMPP is not yet installed in your computer, please download it from this link and install it:
```
```
https://www.apachefriends.org/download.html
```
```
Run the XAMPP program and start the Apache and MySQL services by clicking the “Start” button
beside them. Once clicked, the button will turn to “Stop”. Simply click again to stop the service.
```

### 2. Copy System to Computer

Copy the folder named “mantis” into the XAMPP _htdocs_ folder of your computer. This “ _mantis_ ”
folder contains the entire Manila Tourist Information System.

### 3. Edit database.php Configuration file

Locate the database.php file of the system. This is found in the path
_“mantis\application\config_ ”.

Open the file using a text editor (ex. Notepad++) and change values of username and password
in the _$db_ section to the username and password of your computer’s PHPMyAdmin (MySQL).

Note: The default value for username is ‘ _root_ ’ and for password is _(blank)._


### 4. Import Mantis Database

Open your browser and type “ _localhost/phpmyadmin_ ” in order to access the PHPMyAdmin
page. Login using the credentials of your PHPMyAdmin. Then import the _mantis.sql_ file located
in the path “ _mantis\assets_ ”. The import popup window can be found by clicking the Query
Window button found in the upper left corner of the PHPMyAdmin page.

### 5. Success

You may now access the Manila Tourist Information System in your computer. Simply open your
browser and type “ _localhost/mantis_ ” in the address bar in order to launch the system.

Should a problem occur, please repeat steps 2 – 4 of this section and follow instructions
properly.


## B. USER GUIDE OF MANILA TOURIST INFORMATION SYSTEM

This section discussed how to use the system and how to navigate around all of its pages.

### 1. Initialization

Open your browser and type “ _localhost/mantis_ ” in the address bar in order to launch the system.

### 2. Home Page

This is the home page of the Manila Tourist Information System. It contains the navigation bar with links
to the list of places, itineraries and create your own itinerary page.


### 3. Login Page

This page is used in order to log in to the system. Only registered users are able to log in. If you don’t
have an account yet in the system, you need to register first.

To login to the system, simply provide your email address and password in their respective text fields
and click the Log In button.

### 4. Register Page

This page is for those who do not have an account yet in the system. Provide a valid email address,
name, and password in order to register an account. Click Register button once information has been
provided.


### 5. View All Places Page

This page displays all of the places included in the system. Click on either the image or the name of the
place to view the place’s information. The places displayed in this page are grouped according to their
category.

### 6. View All Itineraries Page

This page displays all of the itineraries saved in the system. Click on either the image or the name of the
itinerary to view the itinerary’s information.


### 7. Place Page

This page shows information regarding a specific place such as location, business hours, days open, and
description. This page also features a user review section where a logged in user can provide user review
about the place. In order to give a review, select a rating and fill up the textbox with comments about
the place and submit it by clicking the button.


### 8. Itinerary Page

This page shows information regarding a specific itinerary. It displays which places are included in this
specific itinerary. The itinerary can be exported into PDF by clicking the Export as PDF button found
below the page.

### 7. Create Itinerary Page

This page is for users who wish to create their own itinerary. Users need to fill all fields in the form
provided in order for the system to generate an itinerary. Select from the dropdown menu on each field
your preferred option. The Places of Interest dropdown menu has a multi select function, meaning a
user can pick as many tags as they want.


### 8. View Created Itinerary Page

This page shows the generated itinerary by the system using the user’s input from the Create Itinerary
Page. The user has an option to save the newly created itinerary to the system or to export it as PDF.
Buttons for these functionalities can be found below the page in order to perform such options.


### 9. Save Created Itinerary Page

This page shows the generated itinerary similar to the View Created Itinerary Page but with additional
form that asks the user for the name of the newly created itinerary. Click the Save button to save the
itinerary to the system. Only logged in users can save an itinerary to the system.


### 10. Generated PDF

This shows a PDF containing itinerary information, resulting when the Export as PDF button is clicked.

### 11. Admin Dashboard

This page is the Admin Dashboard of the system. Here, an administrator can add, edit, and delete a
place. The admin can also edit and delete itineraries. A list of all places and itineraries are displayed in a
table along with buttons corresponding to actions the admin account can perform. Simply click on the
buttons to perform actions.

The Admin Dashboard can be accessed by logging in with an admin account. The login page for the
dashboard is the same as the Login Page for regular users. The admin credentials are as follows:

Email Address: admin@admin.com
Password: admin



### 12. Add Place Page

This page shows when the Add Place button is clicked from the dashboard. Here, the admin can add a
new place by filling up all information in the form provided. Click Add Place once all fields are filled up to
add the place to the system or click Cancel to cancel action and resume to dashboard.


### 13. Edit Place Page

This page shows when the Edit button is clicked from the dashboard. Here, the admin can edit an
existing place in the system by updating all information in the form provided. Click Edit Place once all
fields are filled up to update the place information or click Cancel to revert changes and resume to
dashboard.

### 14. Delete Place Modal

This modal shows up when the Delete button is clicked from the places table. This serves as a
confirmation for the admin to really continue with the desired action. Click the Delete button to
continue deleting the place to the system or click Cancel to cancel action.


### 15. Edit Itinerary Modal

This modal shows up when the Edit button is clicked from the itineraries table. This serves as a
confirmation for the admin to really continue with the desired action. Update fields and click the Edit
button to continue updating the itinerary name or click Cancel to revert changes.

### 16. Delete Itinerary Modal

This modal shows up when the Edit button is clicked from the itineraries table. This serves as a
confirmation for the admin to really continue with the desired action. Update fields and click the Edit
button to continue updating the itinerary name or click Cancel to revert changes.

### 17. Status Message

A status message appears in the top of the Admin Dashboard page whenever an action is performed.


