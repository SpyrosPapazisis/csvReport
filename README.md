# csvReport

Problem Statement
A bike hire scheme consists of a number of bike hire situations from which bikes can be rented.

A CSV report can be produced containing the history of bike movements over a specified period.

FILEPATH = "data.csv"

File Format: 

Station ID:         Integer, representing the bike hire station.

Bike                ID: Integer, representing the bike itself.

Arrival Datetime:   Datetime in format YYYYMMDDThh:mm:ss Representing the date/time the bike arrived at the station. It is empty if the bike was at the station at the start of                     the reporting period.
Departure Datetime: Datetime in format YYYYMMDDThh:mm:ss Representing the date/time the bike departed from the station. It is empty if the bike was at the station at the end of                     the reporting period.

TASK

Please write a program that will read the CSV report from the current working directory, and print the
average (mean) journey duration, across all bikes and all stations, for the reporting period, in format
hh:mm:ss.

The application is written in php, not extra software or frameworks required
There is a data.csv file already in the repo that it can be used as an example
If you want to upload your own data file you need to follow the same structure as in data.csv example
