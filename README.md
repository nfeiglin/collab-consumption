#The Collaborative Consumption Marketplace Platform  Project (CCMPP)

**The migrations are currently not working. They will be fixed soon!**

Laravel 4.0 based collaborative consumption platform designed to be a starting place for those wanting to create a collaborative consumption website.

###CCCMP:
- is currently similiar to an Airbnb-type site for office space
- does not have any inbuilt payment functionality
- does not have an automated booking system. There is a booking request form that emails the site owner the details for them to follow up


####See a working demo at [http://worldburrow.com/staging](http://worldburrow.com/staging)

##Configuration
1. Clone or download this repo onto your computer.
2. Run ```composer install``` in your command line. You must have Composer on your machine for this to work.
3. Fill in your database and email configurations in ```app/config/database.php``` and ```app/config/mail.php```
4. Replace the ``key`` in ```app/config/app.php``` with a random 32 character string.
5. Run ``artisan migrate``. This will create all the tables in the database.
6. Run ``artisan serve`` to see the fruits of your labour in your web browser.
7. Modify to your liking.
8. Tell us about your project based on CCMPP by opening an issue here on Github.

*All pull requests are welcome*
