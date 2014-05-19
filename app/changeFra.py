import MySQLdb
import time
import datetime

db = MySQLdb.connect(host="merry.ee.ncku.edu.tw", user="qateam", passwd="qateam01", db="qateam")
cursor = db.cursor()

while True:
	t = time.time()
	t = time.strftime('%S',time.localtime(t))
	print t
	if t==50:
		print 'yes'
