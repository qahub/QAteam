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
		if nowState == 2:
			cursor.execute("SELECT * FROM `5_BlackNuclear1` ORDER BY `grade` DESC")
			row = cursor.fetchone();
			comment = row[2]
			print comment	

			cursor.execute("INSERT INTO `5_qaDataNuclear`(`content`, `fration`) VALUES('"+str(comment)+"', '2')")
			db.commit()

			cursor.execute("UPDATE `5_NuclearState` SET `value` = '1' WHERE `name` = 'nowFration'")
			db.commit()
			print "turn to 1"
		else:
			cursor.execute("SELECT * FROM `5_WhiteNuclear1` ORDER BY `grade` DESC")
			row = cursor.fetchone();
			comment = row[3]
			print comment	
			cursor.execute("INSERT INTO `5_qaDataNuclear`(`content`, `fration`) VALUES('"+str(comment)+"', '1')")
			db.commit()

			cursor.execute("UPDATE `5_NuclearState` SET `value` = '2' WHERE `name` = 'nowFration'")
			db.commit()
			print "turn to 2"
		
		standTime =  standTime + 15
		if standTime == 60:
			standTime = 0

	time.sleep(1);
