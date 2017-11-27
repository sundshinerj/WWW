#!/usr/bin/env python
#-*- coding:utf-8 -*-
#@author: sundsinerj
#@date: 2017/10/25

import MySQLdb
import time
import json


db = MySQLdb.connect("127.0.0.1","root","root","xedaojia_ams")
cursor = db.cursor()
# last_time = int(time.time())
# begien_time = int(last_time - 21600)

last_time = 1506412800
begien_time = 1506398400
sql = 'select clock,value_avg from trends_uint where clock>='+str(begien_time)+' and clock<='+str(last_time)+';'
cursor.execute(sql)
results = cursor.fetchall()
cursor.close()
db.commit()
db.close()

formats = '%H:%M:%S'
time.strftime(formats,time.localtime(1508941095))
list_date = []
#print(format(float(a)/float(b),'.2f'))
for i in range(len(results)):
    data_clock = time.strftime(formats,time.localtime(int(results[i][0])))
    data_value = format(float(int(results[i][1]))/1024/1024,'.2f')
    data_value = str(data_value)
    list_date.append({"clock": data_clock,"value_avg": data_value})
    #list_date.append({data_clock: data_value})


print json.dumps(list_date)