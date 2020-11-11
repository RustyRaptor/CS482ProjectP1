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

### Notes

* We were unable to reach Brandon throughout the course of our work on Part 2 of this project. He did not contribute to part 2.


### Assumptions

1. The program assumes that inserted commissionRate value is average commission rate.


## Setup PHP

### The Easy Way (using the makefile ziad made)
```bash
make setup_php --silent
```

### The hard way (using the CS instructions :( )

1. Login to your CS machine account. 
2. in your home folder create a folder called `public_html`
	- `mkdir ~/public_html`
3. Setup the folder permissions for that folder
	- `chmod 0711 public_html`
4. Also setup folder perms for your home folder because that wasn't enough aparently.
	- `chmod 0711 ~/`
5. Copy all the files under `/php` in the git repo into the `public_html` folder 
	- open `https://www.cs.nmsu.edu/~<your_user_name>` in your browser.
	- example `https://www.cs.nmsu.edu/~zarafat` for Ziad's
6. It should work now. You can also test using an html file. 


## Deploy our code
1. Make changes to the PHP code in the repo
2. Commit your changes
3. `make deploy_php --silent`

