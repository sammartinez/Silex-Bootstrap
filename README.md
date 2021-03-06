# _Shoes_

##### Ability to add shoes by brand and what store the shoes are located at, August 28th, 2015

#### By Sam Martinez

## Description

This application allows you to add stores to a database and shoe brands associated with that store. Users are about to type into a field of input for both the Stores and Brands of Shoes to add to the database in order to see where those brands of shoes are located based on which store carries them. 

## Setup

* Load PHP server inside the /../web/ folder using 'php -S localhost:8000'
* Run 'composer install' inside the root folder to install dependencies
* Use the shoes.sql.zip and import into a mysql webpage at the location localhost:8080/phpmyadmin

* Below are the commands used in order to create the database and tables for the database:
    - CREATE DATABASE shoes;
    - USE shoes;
    - CREATE TABLE stores (name varchar(20), id serial PRIMARY KEY);
    - CREATE TABLE brands (name varchar(20), id serial PRIMARY KEY);
    - CREATE TABLE brands_stores (store_id int, brand_id int, id serial PRIMARY KEY);


## Technologies Used

Backend: PHP, Silex, MySQL, PHPUnit
Front-End: Bootstrap framework with HTML5, CSS

### Legal

Copyright (c) 2015 Sam Martinez

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
