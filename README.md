# NBA API Library
[![Build Status](https://travis-ci.org/jasonroman/nba-api.svg?branch=master)](https://travis-ci.org/jasonroman/nba-api)

This is a PHP library used to access data across various endpoints on NBA websites.  The full documentation can be found at [http://nbasense.com/nba-api/](http://nbasense.com/nba-api/).  This contains installation instructions, usage examples, and runnable/filterable reporting on all endpoints.

### Troubleshooting

If you are having trouble retrieving requests that access **stats.nba.com/stats/**, it appears that the NBA has blocked off access to these endpoints on some level; this blocking seems to occur on many cloud hosting providers such as Amazon AWS, Digital Ocean, and Heroku.

In my testing, these endpoints have always worked when developing locally.