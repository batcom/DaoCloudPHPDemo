#!/usr/bin/python
#coding=utf-8
import sys
import os
reload(sys)
sys.setdefaultencoding("utf8")
import requests
from pyquery import PyQuery as pq
import re

def task_youku():
	try:
		url = 'http://actives.youku.com/ac/sign/index?pl=web'
		headers = {'Accept':'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
'Accept-Encoding':'gzip, deflate, sdch',
'Accept-Language':'zh-CN,zh;q=0.8,en;q=0.6',
'Connection':'keep-alive',
'Host':'actives.youku.com',
'Cookie':'__tft=1398838466399; __vtft=1398838469901; __ysuid=138304163077493h; __ali=1441077602213VK9; ykss=50ffec55bb026b2b2195f9ee; __aliCount=1; _l_lgi=786872194; yktk=1%7C1441595235%7C15%7CaWQ6Nzg2ODcyMTk0LG5uOuaUr%2BS7mOWuneeUqOaItzIxMTI3NzA4LHZpcDp0cnVlLHl0aWQ6Nzg2ODcyMTk0LHRpZDow%7Ca42f2fbf2744827c0134fc517a3ef616%7C0ae9062d49b9687111bb4e160842c6b3dfe7f7e4%7C1%7C1; __hpage_style=0; u=%E6%94%AF%E4%BB%98%E5%AE%9D%E7%94%A8%E6%88%B721127708; advideo={"adv205916_3": 3, "adv205987_5": 2, "adv206012_2": 1, "adv206025_2": 1}; Hm_lvt_b1851d4a9be3924e34c0990e59df9634=1441595285; Hm_lpvt_b1851d4a9be3924e34c0990e59df9634=1441595285; rpvid=1441595284921sxf-1441595288721',
'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.36'
}
		res = requests.get(url,headers=headers,timeout=10.0)
		res.encoding = 'utf-8'
		if res.status_code == 200 :
			doc = pq(res.text)
			print doc(".signinfo").find('h3').text()
	except Exception, e:
		raise


if __name__ == '__main__':
	task_youku()
	l = ['<?php echo date("Y-m-d H:i:s",time())?>',]
	f = open('/usr/share/nginx/www/ptime.php','a')
	f.writelines(l)
