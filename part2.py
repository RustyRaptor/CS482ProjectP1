# -*- coding: utf-8 -*-
"""Project Part 2

This program will take in as an argument the question number and then optionally
other arguments needed by the question for inserts, updates, or deletes

Example:
        python3 part2.py 6 blah 420 blahblah 69

Attributes:
    module_level_variable1 (int): Module level variables may be documented in
        either the ``Attributes`` section of the module docstring, or in an
        inline docstring immediately following the variable.

        Either form is acceptable, but the two should not be mixed. Choose
        one convention to document module level variables and be consistent
        with it.

Todo:
    * For module TODOs
    * You have to also use ``sphinx.ext.todo`` extension

.. _Google Python Style Guide:
   http://google.github.io/styleguide/pyguide.html

"""

import mysql.connector
from mysql.connector import Error
import sys

from typing import List


def create_connection(host_name: str, user_name: str, user_password: str,
                      db_name: str) -> mysql.connector.MySQLConnection:
    """Creates a connection to a MYSql DB instance.
    Do not put any more code in this function that necessary to get connected to the DB
    The rest of the operations can be done in the returned connection variable.

    Args:
        host_name (String): The Ip address or domain name of the sql database
        user_name (String): The username on the SQL db
        user_password (String): The password of the user
        db_name (String): The name of the database you want to connect to

    Returns:
        MySqlConnection: returns an object containing the connection the database.
    """
    connection_obj = None
    try:
        connection_obj = mysql.connector.connect(
            host=host_name,
            user=user_name,
            passwd=user_password,
            database=db_name
        )
        print("Connection to MySQL DB successful")
    except Error as e:
        print(f"The error '{e}' occurred")

    return connection_obj


def execute_query(connection_obj: mysql.connector.MySQLConnection, query: str, param_tuple: tuple) -> List[tuple]:
    """
    Executes a given SQL query and returns the result
    Args:
        connection_obj (mysql.connector.MySQLConnection): The MySqlConnection object we created

        query (str): A string containing a valid SQL Query and optionally formatter
        strings %s for where the parameters in the param_tuple will go

        param_tuple (tuple): A tuple of the parameters to go into the query.
        Pass empty tuple if there are no params. If there is only one param
        make sure to add a comma after it so python knows it's a tuple e.g.
        ("John",) instead of ("John").

    Returns:
        The result of the query we run as a List of tuples
    Raises:
        an error if something went wrong with the connection or query.
    """

    print(param_tuple)
    print(query)

    result = "NO RESULT"
    cursor = connection_obj.cursor()
    try:
        cursor.execute(query, params=param_tuple)
        try:
            result = cursor.fetchall()
        except mysql.connector.InterfaceError:
            pass
        cursor.close()
        connection_obj.commit()

        print("Query executed successfully")
    except Error as e:
        print(f"The error '{e}' occurred")
        print(cursor.statement)

    return result


# Functions for each question
def question_1(connection, args: List):
        print("This is the answer to q1")
        #execute_query(connection, 'INSERT INTO `Site` (`siteCode`, `type`, `address`, `phone`) VALUES (%s, %s, %s, %s);',(2999, 'bar', '1700 E University Ave. Las Cruces, NM 88003', '(123) 456-7890'))
        results = execute_query(connection, "SELECT * FROM Site WHERE address LIKE %s %s %s;", ("%", *args, "%"))
        print(results)

def question_2(connection, args: List):
        print("This is the answer to q2")
        #execute_query

def question_3(connection, args: List):
        print("This is the answer to q3")

def question_4(connection, args: List):
        print("This is the answer to q4")

def question_5(connection, args: List):
        print("This is the answer to q5")
        results = execute_query(connection, 'SELECT Administrator.empID, Administrator.name, AdmWorkHours.hours FROM Administrator INNER JOIN AdmWorkHours ON Administrator.empID=AdmWorkHours.empID ORDER BY AdmWorkHours.hours ASC;',())
        print(results)
def question_6(connection, args: List):
        print("This is the answer to q6")
        results = execute_query(connection, 'SELECT TechnicalSupport.name FROM TechnicalSupport INNER JOIN Specializes ON TechnicalSupport.empID=Specializes.empID WHERE Specializes.modelNo=%s;',(*args,))
        print(results)

def question_7(connection, args: List):
        print("This is the answer to q7")
        results = execute_query(connection, 'SELECT Salesman.name, Purchases.commissionRate FROM Salesman INNER JOIN Purchases ON Salesman.empID=Purchases.empID ORDER BY Purchases.commissionRate DESC;',())
        print(results)

def question_8(connection, args: List):
        print("This is the answer to q8")
        admincount = execute_query(connection, 'SELECT * FROM Administrator;',())
        salescount = execute_query(connection, 'SELECT * FROM Salesman;',())
        techcount = execute_query(connection, 'SELECT * FROM TechnicalSupport;',())
        adminsize = len(admincount)
        salessize = len(salescount)
        techsize = len(techcount)

        print('Role                 Count')
        print('--------------------------')
        print('Administrator','         ', adminsize)
        print('Salesmen','              ', salessize)
        print('Technical Support','     ', techsize)

q_dict = {
        "1": question_1,
        "2": question_2,
        "3": question_3,
        "4": question_4,
        "5": question_5,
        "6": question_6,
        "7": question_7,
        "8": question_8
}
"""q_dict (dict): maps the string number of a question to it\'s function"""

# Command line arguments can be passed and read from sys.argv as a python list of strings
if __name__ == "__main__":
    print(f"Arguments count: {len(sys.argv)}")
    for i, arg in enumerate(sys.argv):
        print(f"Argument {i:>6}: {arg}")
    



    # This initiates the connection to the DB on the CS machines.
    # To use on your own instance replace the user_name and insert a password
    # DO NOT push this file to github with your password in here. Make sure you remove it first.
    connection = create_connection("dbclass.cs.nmsu.edu", "zarafat", "Randomhack123_", "zarafat_482502fa20")

    mysql.connector.paramstyle = "format"

    print(mysql.connector.paramstyle)

    # Test a simple select statement
    #query_result = execute_query(connection, 'SELECT * FROM Salesman;', ())
    #print(query_result)

    # This will insert data to test the prepared statement
    #query_result = execute_query(connection, 'INSERT INTO Video (VideoCode, videoLength) VALUES (%s, %s);', (2006, 43))
    #print(query_result)

    question_no = sys.argv[1]
    other_args = sys.argv[2:]
    
    q_dict[question_no](connection, other_args)
