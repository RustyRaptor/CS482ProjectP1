# DBs Project

## Requirements

- MYSQL Connector
- Python 3.6
- Run on CS Machines

## Setup

### Database setup

1. Connect to mysql on CS machines
   1. `mysql -h dbclass -u your_username -p
2. Select the database
   1. list the databases to pick from and pick the one.
      1. `show databases;`
   2. Select the one with your name and class name
      1. `use name_of_db`
3. Execute the sql files we made in part 1 (you will need to specify their path if you aren't in the correct folder)
   1. `source cleardb.sql`
   2. `source crtdb.sql`
   3. `source insdb.sql`

4. You can test the setup by running disptbl and dispvals as well.

## Running part2.py

(first setup the database above)

1. cd into the git repo root folder. 
2. run `python3 part2.py <args>

The `<args>` is a space separated list of questions to answer. Has to be numbers between 1 and 8 inclusive.
