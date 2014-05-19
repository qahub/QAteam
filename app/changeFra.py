import MySQLdb
import time
from datetime import datetime

db = MySQLdb.connect(host="merry.ee.ncku.edu.tw", user="qateam", passwd="qateam01", db="qateam")
cursor = db.cursor()

now = datetime.now()
standTime = now.second

while (standTime % 15) != 0:
	standTime += 1
	if standTime == 60:
		standTime = 0

print standTime

while True:

	now = datetime.now()
	print now.second

	if now.second == standTime:
		cursor.execute("SELECT * FROM `5_NuclearState` WHERE `name` = 'nowFration'")
		result = cursor.fetchall()
		for row in result:
			nowState = row[1]
		if nowState == 0:
			cursor.execute("UPDATE `5_NuclearState` SET `value` = '1' WHERE `name` = 'nowFration'")
			db.commit()
			print "turn to 1"
		else:
			cursor.execute("UPDATE `5_NuclearState` SET `value` = '0' WHERE `name` = 'nowFration'")
			db.commit()
			print "turn to 0"
		
		standTime =  standTime + 15
		if standTime == 60:
			standTime = 0

	time.sleep(1);
