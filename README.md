# Small-Coding-Challenge-For-User-API

create an API to manage a user persistence layer.

This project was built with Laravel 5.7:

The database file is included in the project: holidayextras.sql

You can generate a new database with 100 users data with the following command: 
```
php artisan migrate:refresh --seed
```

Live demo: https://ala.tn/HolidayExtras/public/index.php

# Challenge Instructions:

I. Expose a user model. It's reasonable to expect that a user has (at least) the following attributes:
1. id - a unique user id
2. email - a user's email address
3. givenName - in the UK this is the user's first name
4. familyName - in the UK this is the user's last name
5. created - the date and time the user was added

II. Have the ability to persist user information for at least the lifetime of the test.

III. Expose functionality to create, read, update and delete (CRUD) users.

IV. Be easily consumable by a plain HTTP client (e.g. cURL or Postman) or, if using a transport other than HTTP, be trivial to write a client application to consume it.

V. Use of an industry standard data exchange format.

VI. Sanitisation checks of inputs.

VII. Alternatively if you can think of any other features that you feel would further enhance your API, then we'd love to see what you can come up with!
