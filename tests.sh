

mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < cleardb.sql
mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < crtdb.sql
mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < insdb.sql
mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < disptbl.sql
mysql --defaults-extra-file=sqlcred.txt -h dbclass -u zarafat zarafat_482502fa20 < dispvals.sql


echo "Question 1 Tests"
echo "----------------"
python3 part2.py 1 "Peruvian Paso" && # non existant street
python3 part2.py 1 "Streamwood" && # existing street


echo "Question 2 Tests"
echo "----------------"

python3 part2.py 2 "Random" && # existant system
python3 part2.py 2 "Smart" && # existant system
python3 part2.py 2 "Virtue" && # existant system
python3 part2.py 2 "Peepee" && # non existing system


echo "Question 3 Tests"
echo "----------------"

python3 part2.py 3 &&


echo "Question 4 Tests"
echo "----------------"
python3 part2.py 4 "944.769.2722" && # existing phone
python3 part2.py 4 "420.69.420" && # nonexisting phone


echo "Question 5 Tests"
echo "----------------"

python3 part2.py 5 &&


echo "Question 6 Tests"
echo "----------------"
python3 part2.py 6 "1003" &&
python3 part2.py 6 "1004" &&
python3 part2.py 6 "1009" &&


echo "Question 7 Tests"
echo "----------------"
python3 part2.py 7 &&


echo "Question 8 Tests"
echo "----------------"
python3 part2.py 8



