# -*- coding: utf-8 -*-
"""Project Part 2

This program will take in as an argument the question number and then optionally
other arguments needed by the question for queries

Example:
        python3 part2.py 6 paramhere

Attributes:
    module_level_variable1 (int): Module level variables may be documented in
        either the ``Attributes`` section of the module docstring, or in an
        inline docstring immediately following the variable.

        Either form is acceptable, but the two should not be mixed. Choose
        one convention to document module level variables and be consistent
        with it.

"""

import mysql.connector
from mysql.connector import Error
import sys

from typing import List

# Colored printing might not work in all consoles
RED = '\033[91m'
END = '\033[0m'

two_param_message = f"""
                        {RED}Wrong argument count please pass two arguments,
                        the question number and the query parameters {END}
                    """
one_param_message = f"""
                        {RED}Wrong argument count, please pass only one argument,
                        The question number {END}
                    """


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
        print(f"Connection failed. The error '{e}' occurred")

    return connection_obj


def execute_query(connection_obj: mysql.connector.MySQLConnection, query: str,
                  param_tuple: tuple) -> List[tuple]:
    """
    Executes a given SQL query and returns the result
    Args:
        connection_obj (mysql.connector.MySQLConnection): The MySqlConnection 
        object we created

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

    # print(param_tuple)
    # print(query)

    result = [("NO RESULT",)]
    cursor = connection_obj.cursor()
    try:
        cursor.execute(query, params=param_tuple)
        try:
            result = cursor.fetchall()
        except mysql.connector.InterfaceError:
            pass
        # print(cursor.statement)
        cursor.close()
        connection_obj.commit()

        print("Query executed successfully")
    except Error as e:
        print(f"{RED}The error '{e}' occurred {END}")
        print(cursor.statement)
    if type(result) == list and len(result) == 0:
        result = [("NO RESULT",)]

    return result


def print_results(result: [tuple]):
    """Neatly print each tuple in the query results list

    Args:
        result (List[tuple]): The list of tuples returned by cursor.fetchall()
    """
    for i in result:
        print(i)


# Functions for each question
def question_1(connection, args: List):
    assert len(args) == 1, two_param_message

    input_query = """
        SELECT * FROM Site WHERE address LIKE %s;
    """
    results = execute_query(connection, input_query, ("%"+args[0]+"%",))
    print_results(results)


def question_2(connection, args: List):
    assert len(args) == 1, two_param_message

    input_query = """
        SELECT DigitalDisplay.serialNo, Specializes.modelNo,
        TechnicalSupport.name
        FROM DigitalDisplay INNER JOIN Specializes
        ON DigitalDisplay.modelNo=Specializes.modelNo 
        INNER JOIN TechnicalSupport 
        ON TechnicalSupport.empID=Specializes.empID
        WHERE schedulerSystem=%s
    """

    results = execute_query(connection, input_query, (*args,))
    print_results(results)


def question_3(connection, args: List):
    assert len(args) == 0, one_param_message
    namelist = []

    results = execute_query(
        connection, "SELECT DISTINCT name FROM TechnicalSupport ORDER BY name ASC;", ())

    for key, val in enumerate(results):
        namelist.append([val[0], 1, []])

    for key, val in enumerate(namelist):
        result = execute_query(
            connection, "SELECT empId, name, gender FROM TechnicalSupport WHERE name = %s;", (val[0],))
        count = len(result)
        namelist[key][2] = result
        namelist[key][1] = count

    print("Name  Cnt")
    print("------------")

    for i in namelist:
        print(i[0], i[1], i[2] if len(i[2]) > 1 else "")


def question_4(connection, args: List):
    assert len(args) == 1, two_param_message

    input_query = """
        SELECT * FROM Client WHERE phone=%s;
    """
    results = execute_query(connection, input_query, (*args,))
    print_results(results)


def question_5(connection, args: List):
    assert len(args) == 0, one_param_message

    input_query = """
        SELECT  Administrator.empId, Administrator.name, SUM(AdmWorkHours.hours)  
        FROM  Administrator INNER JOIN AdmWorkHours ON AdmWorkHours.empID=Administrator.empID
        GROUP BY AdmWorkHours.empId
        ORDER BY SUM(AdmWorkHours.hours) ASC;
    """

    results = execute_query(
        connection, input_query, ())
    print_results(results)


def question_6(connection, args: List):
    assert len(args) == 1, two_param_message

    input_query = """
        SELECT TechnicalSupport.name
        FROM TechnicalSupport INNER JOIN Specializes 
        ON TechnicalSupport.empID=Specializes.empID
        WHERE Specializes.modelNo=%s;
    """
    results = execute_query(connection, input_query, (*args,))
    print_results(results)


def question_7(connection, args: List):
    assert len(args) == 0, one_param_message
    input_query = """
        SELECT  Salesman.name, AVG(Purchases.commissionRate), Purchases.empId 
        FROM Salesman INNER JOIN Purchases ON Salesman.empID=Purchases.empID
        GROUP BY Purchases.empId
        ORDER BY AVG(Purchases.commissionRate) DESC;
    """
    results = execute_query(connection, input_query, ())
    print_results(results)


def question_8(connection, args: List):
    assert len(args) == 0, one_param_message

    admincount = execute_query(connection, 'SELECT * FROM Administrator;', ())
    salescount = execute_query(connection, 'SELECT * FROM Salesman;', ())
    techcount = execute_query(
        connection, 'SELECT * FROM TechnicalSupport;', ())
    adminsize = len(admincount)
    salessize = len(salescount)
    techsize = len(techcount)

    print('Role                 Count')
    print('--------------------------')
    print('Administrator', '         ', adminsize)
    print('Salesmen', '              ', salessize)
    print('Technical Support', '     ', techsize)


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

# Command line arguments can be passed and read from sys.argv as a python list of strings


def main():

    # This initiates the connection to the DB on the CS machines.
    # To use on your own instance replace the user_name and insert a password
    connection = create_connection(
        "dbclass.cs.nmsu.edu", "zarafat", "Randomhack123_", "zarafat_482502fa20")
    
    mysql.connector.paramstyle = "format"

    question_no = sys.argv[1]
    other_args = sys.argv[2:]

    print("The answer to Q"+question_no+":")
    try:
        q_dict[question_no](connection, other_args)
    except AssertionError as e:
        print(RED + "Something went wrong with your inputs:" + END, e)
    except KeyError:
        print(RED + "This question does not exist. Please pass the correct question number as a digit" + END)
    except:
        print(
            RED + "Something unexpected happened with the program check your params" + END)


if __name__ == "__main__":
    main()
