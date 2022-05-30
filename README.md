## Movie database 

This is my basic movie database CRUD app using Laravel and Vue. Please note this is my first time using Vue. I thought it would be fun to learn while doing this but I may have not designed it using best practices.

## Getting Started

The database used while developing was an sqlite database. To set this up when running locally navigate to the project root folder and run:

```
touch database/database.sqlite
```

Then run the migrations and you should be ready to go!

## Improvements

I would have liked to test the app and gotten the app ready for deployment but I ran out of time. 

To test the app I would have used: 

  - PHPUnit
  - Laravel Dusk

To prepare for deployment I would:

  - Cached my routes
  - Cached my vues
  - Cached my config
  - Turned off APP_DEBUG
  - Removed unused files
