import mysql.connector
from mysql.connector import Error


def create_connection(host_name, user_name, user_password):
    """Creates a connection to a MYSql DB instance.
    Do not put any more code in this function that necessary to get connected to the DB
    The rest of the operations can be done in the returned connection variable.

    Args:
        host_name (String): The Ip address or domain name of the sql database
        user_name (String): The username on the SQL db
        user_password (String): The password of the user

    Returns:
        MySqlConnection: returns an object containing the connection the database.
    """
    connection = None
    try:
        connection = mysql.connector.connect(
            host=host_name,
            user=user_name,
            passwd=user_password
        )
        print("Connection to MySQL DB successful")
    except Error as e:
        print(f"The error '{e}' occurred")

    return connection

# This initiates the connection to the DB on the CS machines.
# To use on your own instance replace the user_name and insert a password
# DO NOT push this file to github with your password in here. Make sure you remove it first. 
connection = create_connection("dbclass.cs.nmsu.edu", "zarafat", "")


if __name__ == "__main__":
    pass