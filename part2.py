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


def execute_query(connection_obj: mysql.connector.MySQLConnection, query: str) -> List[tuple]:
    """
    Executes a given SQL query and returns the result
    Args:
        connection_obj: The MySqlConnection object we created
        query: A string containing a valid SQL Query

    Returns:
        The result of the query we run as a List of tuples
    Raises:
        an error if something went wrong with the connection or query.
    """

    result = "QUERY FAILED"
    cursor = connection_obj.cursor()
    try:
        cursor.execute(query)
        result = cursor.fetchall()
        cursor.close()
        connection_obj.commit()

        print("Query executed successfully")
    except Error as e:
        print(f"The error '{e}' occurred")
    return result


# Command line arguments can be passed and read from sys.argv as a python list of strings
if __name__ == "__main__":
    print(f"Arguments count: {len(sys.argv)}")
    for i, arg in enumerate(sys.argv):
        print(f"Argument {i:>6}: {arg}")

    # This initiates the connection to the DB on the CS machines.
    # To use on your own instance replace the user_name and insert a password
    # DO NOT push this file to github with your password in here. Make sure you remove it first.
    connection = create_connection("dbclass.cs.nmsu.edu", "zarafat", "Randomhack123_", "zarafat_482502fa20")
    query_result = execute_query(connection, "SELECT * FROM Salesman;")
    print(query_result)
