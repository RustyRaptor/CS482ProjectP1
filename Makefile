RED='\033[92m'
END='\033[0m'

all: setup q1 q2 q3 q4 q5 q6 q7 q8

setup:
	mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < cleardb.sql;
	mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < crtdb.sql;
	mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < insdb.sql;
	mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < disptbl.sql;
	mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < dispvals.sql;
	echo -e "\n\n"
q1 :
	echo -e "${RED}Question 1 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 1 "Peruvian Paso"  
	python3 part2.py 1 "Streamwood" 
	python3 part2.py 1 "Nicholls Ave" 
	echo -e "\n\n"
q2 :
	echo -e "${RED}Question 2 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 2 "Random"  
	python3 part2.py 2 "Smart"  
	python3 part2.py 2 "Virtue"  
	python3 part2.py 2 "Something"  
	echo -e "\n\n"
q3 :
	echo -e "${RED}Question 3 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 3 
	echo -e "\n\n"
q4 :
	echo -e "${RED}Question 4 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 4 "944.769.2722"  
	python3 part2.py 4 "420.69.420"  
	echo -e "\n\n"
q5 :
	echo -e "${RED}Question 5 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 5 
	echo -e "\n\n"
q6 :
	echo -e "${RED}Question 6 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 6 "1003" 
	python3 part2.py 6 "1004" 
	python3 part2.py 6 "1009" 
	echo -e "\n\n"
q7 :
	echo -e "${RED}Question 7 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 7 
	echo -e "\n\n"
q8 :
	echo -e "${RED}Question 8 Tests${END}"
	echo -e "${RED}---------------------------------------------------------------------------${END}"
	python3 part2.py 8
	echo -e "\n\n"

deploy_php: setup_php
	cp ./php/* ~/public_html
setup_php:
	echo -e "${RED} you can safely ignore File Exists errors its just ensuring the folders exist ${END}"
	mkdir ~/public_html || chmod 0711 ~/public_html || chmod 0711 ~/
	echo -e "THIS IS A TEST" > ~/public_html/test.html
	echo -e "${RED} If you want to test the web server go to https://www.cs.nmsu.edu/~${USER} in a web browser ${END}"
	sh crabrave/crabrave.sh
