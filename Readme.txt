COMP4711 Assignment 2
Zurich
Jason Roque and Sandra Buchanan

Readme

We have included a full SQL dump of our attraction table  as well as a a copy of the  
SQL code used to create the table.  Both are in the data folder in our source files

Data Plan
- we are bringing our website up-to-date to Assignment 1 and proceeding to Assignment 2
- we are also going to redesign our website to be look nicer and more user friendly
- we are going to implement a relational database for our data and replacing the current nested array
    - our database schema for the time being will be as follows:
        _id - unique identifier and primary key
        category - category of the attraction
        link - website link to specific attraction
        caption - title/caption of the attraction
        description - description of the attraction
        location - the location of the attraction
        price - average price of the attraction
        dateAdded - the date the attraction was added to the website
        image - main image of attractions
        subimg1 - sub-image of attraction
        subimg2 - 2nd sub-image of attraction
        subimg3 - 3rd sub-image of attraction
- All categories will have more than 1 attraction to begin the process of populating our database of attractions
- When added more attractions to each category, we created a page to show the list of attractions for each category
- For all our attractions, we will add 3 additional images for each attraction
- For the addition 3 images in each attraction will be displayed by using the "LightBox" implementation
- Our homepage will now display the most recently added attraction to the website 
- Our homepage also updates the 3 categories pictures to the most recently added attraction to that specific category
- We will created an Administration page to view all the attraction in one page
    - this will also allow the "administrator" to be able to edit or delete an attraction of their choosing
