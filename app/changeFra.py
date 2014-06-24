import MySQLdb
import MySQLdb.cursors
import time
from datetime import datetime

def getState(cursor, db) :

	cursor.execute("SELECT * FROM `5_NuclearState`")
	result = cursor.fetchall()
	dict = {}
	for row in result :
		name = row['name']
		value = row['value']
		dict[name] = value

	return dict

def setState(cursor, db, name, value) :

	cursor.execute("UPDATE `5_NuclearState` SET `value` = '"+value+"' WHERE `name` = '"+name+"'")
	db.commit()



def create_new_round(nowFra, nowTable, cursor,db) :

	if nowFra == 1 :
		nowTable = nowFra
		nowFration = "White"
	else :
		nowTable = nowFra
		nowFration = "Black"

	qTableName = "5_"+nowFration+"NuclearQ"+str(nowTable)
	aTableName = "5_"+nowFration+"NuclearA"+str(nowTable)

	qsql = "CREATE TABLE `"+qTableName+"`(id int(4) auto_increment primary key, uid varchar(100), comment longtext, grade int(1) DEFAULT 0, date date, time time, username varchar(20), evaluate mediumtext)"
	asql = "CREATE TABLE `"+aTableName+"`(id int(4) auto_increment primary key, uid varchar(100), comment longtext, grade int(1) DEFAULT 0, date date, time time, username varchar(20), evaluate mediumtext)"

	cursor.execute(qsql)
	db.commit()
	cursor.execute(asql)
	db.commit()


def output_and_change_fration(cursor,db) :

	row = getState(cursor,db)
	nowTable = 0;

	if row['nowFration'] == 1 :
		nowTable = row['whiteNum']
		nowFration = "White"
	else :
		nowTable = row['blackNum']
		nowFration = "Black"

	nowFraNum = row['nowFration']
	nowStatus = "A"

	tableName = "5_" + nowFration + "Nuclear" + nowStatus + nowTable;
	cursor.execute("SELECT * FROM `"+tableName+"` ORDER BY `grade` DESC")
	result = cursor.fetchone()
	contentA = result['comment']
	
	nowStatus = "Q"
	tableName = "5_" + nowFration + "Nuclear" + nowStatus + nowTable;
	cursor.execute("SELECT * FROM `"+tableName+"` ORDER BY `grade` DESC")
	result = cursor.fetchone()
	contentQ = result['comment']

	cursor.execute("INSERT INTO `5_qaDataNuclear`(`content`, `contentQ`,`fration`,`table`) VALUES('"+str(contentA)+"','"+str(contentQ)+"', '"+nowFraNum+"','"+nowTable+"')")
	db.commit()
	
	nowTable = int(nowTable) + 1
	nowTable = str(nowTable)
	print nowTable
	if 	int(nowFraNum) == 2 :
		cursor.execute("UPDATE `5_NuclearState` SET `value` = '"+nowTable+"' WHERE `name` = 'blackNum'")
		db.commit()
		cursor.execute("SELECT * FROM `5_NuclearState` WHERE `name` = 'whiteNum'")
		result = cursor.fetchone()
		nowTable = result['value']
		nowFraNum = 1
		print 'next white'
	else :
		cursor.execute("UPDATE `5_NuclearState` SET `value` = '"+nowTable+"' WHERE `name` = 'whiteNum'")
		db.commit()
		cursor.execute("SELECT * FROM `5_NuclearState` WHERE `name` = 'blackNum'")
		result = cursor.fetchone()
		nowTable = result['value']
		nowFraNum = 2
		print 'next black'

	cursor.execute("UPDATE `5_NuclearState` SET `value` = '"+str(nowFraNum)+"' WHERE `name` = 'nowFration'")
	db.commit()
	
	create_new_round(nowFraNum, nowTable, cursor, db)

def change_mode(cursor, db) :

	row = getState(cursor, db)
	if not(cmp(str(row['nowStatus']), "Q")) :
		setState(cursor, db, "nowStatus", "A")
	elif not(cmp(str(row['nowStatus']), "A")) :
		setState(cursor, db, "nowStatus", "Q")


db = MySQLdb.connect(host="merry.ee.ncku.edu.tw", user="qateam", passwd="qateam01", db="qateam", cursorclass=MySQLdb.cursors.DictCursor)
cursor = db.cursor()

#now = datetime.now()
#standTime = now.second
qTime = 60   
aTime = 60   
wikiTime = 10 


#while (standTime % qTime) != 0:
#	standTime += 1
#	if standTime == 60:
#		standTime = 0

#print standTime

while True:
	time.sleep(5)
	change_mode(cursor, db)
	print "chagne mode!"
	time.sleep(5)
	output_and_change_fration(cursor, db)
	print "output ! "
