#!/usr/bin/env python
#-*- coding:utf-8 -*-
#@author: sundsinerj
#@date: 2017/10/25

import MySQLdb
import time
import json


db = MySQLdb.connect("10.16.12.93","zabbix","WDw2afzz3dNO","zabbix")
cursor = db.cursor()
last_time = int(time.time())
begin_time = int(last_time - 25200)
sql = 'select clock,value_avg from trends_uint where clock>='+str(begin_time)+' and clock<='+str(last_time)+' and itemid=27922;'
cursor.execute(sql)
results = cursor.fetchall()
cursor.close()
db.commit()
db.close()
formats = '%H:%M:%S'
list_date = []
for i in range(len(results)):
    data_clock = time.strftime(formats,time.localtime(int(results[i][0])))
    data_value = format(float(int(results[i][1]))/1024/1024,'.2f')
    data_value = str(data_value)
    list_date.append({"clock": data_clock,"value_avg": data_value})
    #list_date.append({data_clock: data_value})


print json.dumps(list_date)
