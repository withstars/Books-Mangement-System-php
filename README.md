# 图书管理系统
## 系统功能
图书管理系统课程设计，采用PHP和MySQL开发。并适当使用了UI框架Bootstrap. 该系统实现了读者和管理员登陆，图书的增删改查，读者的增删改查，借还图书，密码修改，卡号挂失，超期提醒等的功能。
## 数据库
本系统数据库共有六张数据表。admin为管理员表，book_info为图书信息表，class_info为分类信息表，lend_list为借还信息表，reader_card为读者证表,reader_info为读者信息表。
## 文件结构
文件中admin开头的为管理员功能，reader开头的为读者功能。index.php为登陆页面。mysqli_connect.php为数据库连接文件。
## 如何使用
1. 下载本系统压缩包并解压至服务器www目录下。
2. 将sql文件导入数据库。
3. 在本系统mysqli_connect.php文件中配置数据库连接。
4. 在浏览器地址栏中输入 http://localhost/BooksMangementSystem 即可进入该系统。
5. 默认管理员账号20170001，密码111111，默认用户账号1501014101，密码111111。


