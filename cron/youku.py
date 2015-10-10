#!/usr/bin/python
#coding=utf-8
import sys
import os
reload(sys)
sys.setdefaultencoding("utf8")
import requests
from pyquery import PyQuery as pq
import re

def task_zhe800():
	try:
		url = 'http://www.zhe800.com/cn/checkin?checkin=1&callback=zhe_pc_signin_post'
		headers = {'Accept':'text/javascript, application/javascript, application/ecmascript, application/x-ecmascript, */*; q=0.01',
'Accept-Encoding':'gzip, deflate, sdch',
'Accept-Language':'zh-CN,zh;q=0.8,en;q=0.6',
'Connection':'keep-alive',
'Host':'www.zhe800.com',
'Cookie':'session_id=585224951.1444285119; firstTime=2015-10-08; zhe800colls=1; utmr=72; utmp=30; ju_version_new=1-0; utm_ccn=notset_c0; utm_cmd=; utm_ctr=; utm_cct=; utm_etr=tao.home; utm_csr=direct; screenversion=1%2C0; frequency=1%2C1%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0; lastTime=2015-10-09; CNZZDATA30081361=cnzz_eid%3D253863588-1444280588-%26ntime%3D1444368420; qd=0-1-22; unix_time=1444372910; ju_version=1; __utmt=1; __utma=148564220.1259830830.1444285120.1444285120.1444372910.2; __utmb=148564220.1.10.1444372910; __utmc=148564220; __utmz=148564220.1444285120.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); outoverlay=true; ppinf=2%7C1444372910000%7C1%7CeyJ1c2VyaWQiOiIxODYyNzA5Mjc2NSIsInVpZCI6InU0ODIxMzUyMiIsImNy%0AdCI6IjE0NDQzNzI5MTAwMDAiLCJyZWd3IjoiMiIsInJlZ3QiOiIwIiwicmVn%0AdGltZSI6IjE0MTEzODcwNzUiLCJpbWciOiJodHRwOi8vcGFzc3BvcnQudHVh%0AbjgwMC5jb20vaW1nL3VzZXJfZGVmYXVsdF9sb2dvX3NtYWxsLmdpZiIsImlt%0AZ18xMjAiOiJodHRwOi8vcGFzc3BvcnQudHVhbjgwMC5jb20vaW1nL3VzZXJf%0AZGVmYXVsdF9sb2dvX25vcm1hbC5naWYiLCJpZHNzIjp7ImlkMSI6MCwiaWQy%0AIjoxLCJpZDQiOjAsImlkOCI6MCwiaWQxNiI6MCwiaWQzMiI6MCwiaWQ2NCI6%0AMCwiaWQxMjgiOjB9LCJyc3JjIjoiMSIsInNpZ3ciOjMsIm5rZCI6IjAifQ%3D%3D%0A; _t8s=BAh7CkkiD3Nlc3Npb25faWQGOgZFVEkiJTMzNWQxMjVlNzBmMTUwZTg3NTdmMTkxNzA1NzE3YjA1BjsAVEkiB2N1BjsARkkiLjQ4MjEzNTIyLHVzZXJfNTMxMjE0NzUxMzJhNDUsLDE4NjI3MDkyNzY1BjsAVEkiGXdhcmRlbi51c2VyLnVzZXIua2V5BjsAVFsISSIJVXNlcgY7AEZbBmkEEq7fAkkiGTZ5YXVldHltRXo3aEJBMVVlRG5nBjsAVEkiD3NpZ25pbl93YXkGOwBGaQhJIhFfc2lnbl9pbl93YXkGOwBGaQg%3D--40d7018a94c3cd1594344f0d4c33324b116e60dc; imswitch=0; newauser=0; cart_mark=0%7C1%7C1%7Cu48213522%7C0; zhe_click=1f2241e05a91ce13df3c3a147f217d85',
'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.36'
}
		res = requests.get(url,headers=headers,timeout=10.0)
		res.encoding = 'utf-8'
		if res.status_code == 200 :
			print res.text
	except Exception, e:
		raise


def task_tuan800():
	try:
		url = 'http://www.tuan800.com/cn/ajax/checkin/checkin'
		headers = {'Accept':'application/json, text/javascript, */*; q=0.01',
'Accept-Encoding':'gzip, deflate, sdch',
'Accept-Language':'zh-CN,zh;q=0.8,en;q=0.6',
'Connection':'keep-alive',
'Host':'www.tuan800.com',
'Cookie':'ppinf_lastTime=1444446266000; qd=48213522-0-0-1-2; btv=%25B9%25D4-%255D%25D6%2529p%25F1D%255B%25BA%25BAH%258D%25B7%25BA; current_city=wuhan; sc=%252A%251A%251A%251A%251A%2519%251F; ucid=9%2C1%2C10%2F10; _tu=b2h0bVlMV1BMUmFmMitJUVR6dkVZSHdpU3JoK1ZNeTBKT2NRajQvSC9FTzJkazBjNzJ3ZWhsdzh3SjdvL3kxQi0tQ1JhUGl3TmtRZzVZaHQ2R3o3QzZGUT09; CNZZDATA30039752=cnzz_eid%3D1823590836-1444443097-http%253A%252F%252Fhelp.zhe800.com%252F%26ntime%3D1444443097; utm_csr=help.zhe800.com; utm_ccn=notset_c0; utm_cmd=; utm_ctr=; utm_cct=; utm_etr=www.tuan800.com/; uc=x; puinf=%7B%22msg_cnt%22%3A%220%22%2C%22activity_cnt%22%3A%220%22%2C%22followers_cnt%22%3A%220%22%7D; _tuan800_session=BAh7GkkiD3Nlc3Npb25faWQGOgZFVEkiJTdjOTM1OWRkMTJjYmIxZmVmOTAzNWY0MzNiZjk1ZGQwBjsARkkiCHVfMAY7AEZpBBKu3wJJIgh1XzEGOwBGSSIYdXNlcl81MzEyMTQ3NTEzMmE0NQY7AFRJIgh1XzQGOwBGaQBJIgh1XzYGOwBGaQBJIgh1XzcGOwBGaQdJIgh1XzkGOwBGSXU6CVRpbWUNy6IcgAAAcOcHOgtvZmZzZXRpAoBwOgl6b25lSSIIQ1NUBjsAVEkiCXVfMTAGOwBGaQBJIgdjdQY7AEZJIi40ODIxMzUyMix1c2VyXzUzMTIxNDc1MTMyYTQ1LCwxODYyNzA5Mjc2NQY7AFRJIhl3YXJkZW4udXNlci51c2VyLmtleQY7AFRbCEkiCVVzZXIGOwBGWwZpBBKu3wJJIhk2eWF1ZXR5bUV6N2hCQTFVZURuZwY7AFRJIg9zaWduaW5fd2F5BjsARmkISSIRX3NpZ25faW5fd2F5BjsARmkISSILbXNnY250BjsARmkASSIPbXNnY250dGltZQY7AEZJdTsGDUPlHIBTOLQiCjoNbmFub19udW1pAuQDOg1uYW5vX2RlbmkGOg1zdWJtaWNybyIHmWA7B2kCgHA7CEkiCENTVAY7AFRJIhBib2FyZG1zZ2NudAY7AEZpAEkiFGJvYXJkbXNnY250dGltZQY7AEZJdTsGDUPlHIC9Q7QiCjsJaQJQAzsKaQY7CyIHhIA7B2kCgHA7CEkiCENTVAY7AFQ6D3Nlc3Npb25faWRJIiUyZDQ0NDI4ODA1MDJkYjZmMDhhZjNhNjg2MjkxM2Q1YgY7AEY6C21zZ2NudGkAOg9tc2djbnR0aW1lSXU7Bg1D5RyAm6%2FCIgo7CWkCcwM7CmkGOwsiB4gwOwdpAoBwOwhJIghDU1QGOwBUOhBib2FyZG1zZ2NudGkAOhRib2FyZG1zZ2NudHRpbWVJdTsGDUPlHIDMtMIiCjsJaQJjAjsKaQY7CyIHYRA7B2kCgHA7CEkiCENTVAY7AFQ%3D--4880df108c54b004a60b2129d562b4d4fa85d98d; ppinf=2%7C1444446524000%7C1%7CeyJ1c2VyaWQiOiIxODYyNzA5Mjc2NSIsInVpZCI6InU0ODIxMzUyMiIsImNy%0AdCI6IjE0NDQ0NDY1MjQwMDAiLCJyZWd3IjoiMiIsInJlZ3QiOiIwIiwicmVn%0AdGltZSI6IjE0MTEzODcwNzUiLCJpbWciOiIvL3Bhc3Nwb3J0LnR1YW44MDAu%0AY29tL2ltZy91c2VyX2RlZmF1bHRfbG9nb19zbWFsbC5naWYiLCJpbWdfMTIw%0AIjoiLy9wYXNzcG9ydC50dWFuODAwLmNvbS9pbWcvdXNlcl9kZWZhdWx0X2xv%0AZ29fbm9ybWFsLmdpZiIsImlkc3MiOnsiaWQxIjowLCJpZDIiOjEsImlkNCI6%0AMCwiaWQ4IjowLCJpZDE2IjowLCJpZDMyIjowLCJpZDY0IjowLCJpZDEyOCI6%0AMCwiaWQyNTYiOjAsImlkNTEyIjowfSwicnNyYyI6IjEiLCJzaWd3IjozLCJu%0Aa2QiOiIwIn0%3D%0A; __utmv=1.on; __utma=1.561008009.1444446546.1444446546.1444446546.1; __utmb=1; __utmc=1; __utmz=1.1444446546.1.1.utmccn=(referral)|utmcsr=help.zhe800.com|utmcct=/detail/274|utmcmd=referral',
'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.36'
}
		res = requests.post(url,headers=headers,timeout=10.0)
		res.encoding = 'utf-8'
		if res.status_code == 200 :
			print res.text
	except Exception, e:
		raise

if __name__ == '__main__':
	task_zhe800()
	task_tuan800()
	l = ['<?php echo date("Y-m-d H:i:s",time())?>',]
	f = open('/usr/share/nginx/www/ptime.php','w')
	f.writelines(l)
