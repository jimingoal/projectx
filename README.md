# docker + nginx + php + mariaDB


# 오류 및 해결과정
- phpmyadmin 로그인 안됨 (mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: Name or service not known)
 . 원인 : 서버 잘못입력
 . 서버에 mydb가 아닌 mariadb 로 입력
 . docker system prune -a 입력 후 docker-compose up

- phpmyadmin 로그인 안됨 (confused ?? 관련한 오류 뜲)
 . 원인 : 기존 다른 창으로 로그인 되어 있는데 새 창에 로그인 또 하려고 해서,
 . 기존 창 지우고 새 창으로 다시 로그인하면 됨

- phpmyadmin 로그인 안됨 (access denied 접근권한 없다는 메시지)
 . 원인 : 해당 계정이 서버에 접속할 권한이 없어서 로그인 안됨
 . root로 먼저 로그인 후 해당 db에 사용자 권한 추가해줄 것

- flutter crud 예제 학습 중 PDFException 발생(NOTICE: PHP message: PHP Fatal error:  Uncaught PDOException: could not find driver in /docker/home/flutter_api/db.php:8)
 . 원인 : PDO driver 설치가 안되어 있어서 오류남
 . php.ini 파일 extension에 pdo 관련한 것들 모두 주석(;) 해제
 . Dockerfile.php 에 pdo driver 설치항목 추가 (RUN docker-php-ext-install mysqli pdo_mysql)
 . 기존 php container에는 pdo driver 설치가 안되어 있으므로 기존 컨테이너 삭제 후 docker-compose up 실행하면 새 드라이버 포함해서 컨테이너 설치됨