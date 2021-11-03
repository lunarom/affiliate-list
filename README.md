# dev-codetest 

## Affiliate List
Simple Laravel application which:

Parses data from a JSON file into manageable array of objects

Calculates distance between geo. coordinates given in data file, and target location (Dublin office)

Returns array of certain file entries (affiliates) within 100km, with name and affiliate ID. 

## Running the application
To run the application, clone files to a local directory

In Terminal: 

`cd` into cloned affiliate-list directory

Run `composer install` to generate dependency packages

Run `cp .env.example .env && php artisan key:generate` this will create the env file & app key needed to run the application.

Run `php artisan serve` launch the application on https://localhost:8000

-----
Gambling.com Group Dev Code Test

We have a shortlist of affiliate contact records in a text file (affiliates.txt) -- one affiliate per line, JSON-encoded. We want to invite any affiliate that lives within 100km of our Dublin office for some food and drinks using this text file as the input (Don't alter). Write a program that will read the full list of affiliates from this txt file and output the name and affiliate ids of matching affiliates (within 100km), sorted by Affiliate ID (ascending).

You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians.

The GPS coordinates for our Dublin office are 53.3340285, -6.2535495.

You can find the affiliate list in this repository called affiliates.txt.

Please don’t forget, your code should be production ready, clean and tested!

## Nice to haves:
- Demonstrate understanding of MVC
- Unit Tests
- Basic HTML output
- Usage of a PHP Framework (Not necessary but as a Laravel based company it's a bonus)
- Use original txt file as input 
