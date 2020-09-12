import os
import mysql.connector
import time
conn=mysql.connector.connect(host="localhost",user="proxy",passwd="HciC0KeRXSSKzoDI",database="network_limiter1")
cursor=conn.cursor()
def check_device():
	cursor.execute("select device.MAC_address from device  inner join user on user.User_id=device.user_id where device.Device_status=1 and user.User_Status=1 and user.Internet_status=1 and user.consumed_data<=user.Daily_Limit")
	result=cursor.fetchall()
	devices=[]
	for i in result:
		i=str(i[0])
		devices.append(i)
	return devices

def data_usage():
    r=os.popen("sudo iw wlan0 station dump")
    data_Uses={}
    time_Uses={}
    data=r.read().split()
    for i in range(0,len(data),58):
        mac=data[i+1]
        bytess=data[i+10]
        timess=data[i+56]
        data_Uses[mac]=bytess
        time_Uses[mac]=timess
    cursor.execute("update device set online=0")
    conn.commit()
    for i in data_Uses:
        #print("update device set consumed_data=consumed_data+"+data_Uses[i]+"-actual_data,actual_data="+data_Uses[i]+" where actual_data<"+data_Uses[i]+" and MAC_address='"+i+"'")
        cursor.execute("update device set online=1,consumed_data=consumed_data+"+data_Uses[i]+"-actual_data,actual_data="+data_Uses[i]+" where actual_data<"+data_Uses[i]+" and MAC_address='"+i+"'")
        conn.commit()
        if(cursor.rowcount>0):
            print(i, "device using internet")
        cursor.execute("update device set online=1,actual_data="+data_Uses[i]+" where actual_data>"+data_Uses[i]+" and MAC_address='"+i+"'")
        conn.commit()
        #if(cursor.rowcount>0):
        #    print(i, "device data usage reset record(s) affected")
        cursor.execute("update user set user.consumed_data=(SELECT SUM(device.consumed_data) from device where device.user_id=user.User_Id)")
        conn.commit()
        #if(cursor.rowcount>0):
        #    print(i, "user data usage reset record(s) affected")
    for i in time_Uses:
        #print("update device set consumed_time=consumed_time+"+time_Uses[i]+"-actual_time,actual_time="+time_Uses[i]+" where actual_time<"+time_Uses[i]+" and MAC_address='"+i+"'")
        cursor.execute("update device set consumed_time=consumed_time+"+time_Uses[i]+"-actual_time,actual_time="+time_Uses[i]+" where actual_time<"+time_Uses[i]+" and MAC_address='"+i+"'")
        conn.commit()
        if(cursor.rowcount>0):
            print(i, "is connecting to wifi")
        cursor.execute("update device set online=1,actual_time="+time_Uses[i]+" where actual_time>"+time_Uses[i]+" and MAC_address='"+i+"'")
        conn.commit()
        #if(cursor.rowcount>0):
        #    print(i, "device time usage reset record(s) affected")
        #cursor.execute("update user set device.consumed_time=(SELECT SUM(device.consumed_time) from device where device.user_id=user.User_Id)")
        #conn.commit()
        #if(cursor.rowcount>0):
        #    print(cursor.rowcount, "user time usage reset record(s) affected")

def data_reset():
	#print("update device set today_date=CURDATE(),consumed_data=0 where today_date!=CURDATE() or today_date is NULL")
	cursor.execute("insert INTO sessions (session_date, consumed_data, consumed_time, device_id, user_id) SELECT today_date, consumed_data, consumed_time, id, user_id from device where device.today_date!=CURDATE()")
	conn.commit()
	if(cursor.rowcount>0):
		print("new day: session added",cursor.rowcount)
	cursor.execute("update device set today_date=CURDATE(),consumed_data=0,consumed_time=0 where today_date!=CURDATE() or today_date is NULL")
	conn.commit()
	if(cursor.rowcount>0):
		print("new day: restart data/time",cursor.rowcount)


Devices=[]
while True:
	data_reset()
	data_usage()
	Devices2=check_device()
	if Devices2!=Devices:
		cursor.execute("update device set online=0")
        	conn.commit()
		print("devices changes")
		Devices=Devices2
		os.popen("sudo ebtables -X")
		os.popen("sudo ebtables -F")
		for i in Devices:
			print(i)
			os.popen("sudo ebtables -I FORWARD -s "+i+" -j ACCEPT")
			os.popen("sudo ebtables -I FORWARD -d "+i+" -j ACCEPT")
		os.popen("sudo ebtables -A FORWARD -j DROP")

	time.sleep(5)



