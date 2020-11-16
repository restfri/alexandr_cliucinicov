@ECHO OFF
ECHO Starting PHP FastCGI...
set PATH=D:\php7.4;%PATH%
D:\php7.4\php-cgi.exe -b 127.0.0.1:9123 -c D:\php7.4\php.ini