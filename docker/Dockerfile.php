# 설치할 PHP 버전
FROM php:8.0.5-fpm-alpine

# RUN docker-php-ext-install 다음에 설치하고자 하는 모듈을 차례로 적는다.
RUN docker-php-ext-install pdo mysqli pdo_mysql

# 환경 설정 파일을 Production 의 것으로 복사한다.
RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
