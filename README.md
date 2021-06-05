# docker + nginx + php + mariaDB


# 오류 및 해결과정
- phpmyadmin 로그인 안됨 (mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: Name or service not known)
 . 서버에 mydb가 아닌 mariadb 로 입력
 . docker system prune -a 입력 후 docker-compose up