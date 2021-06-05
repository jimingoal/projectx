# 설치 할 PHP 버전
FROM php:8.0.5-fpm-alpine

# RUN docker-php-ext-install 다음에 설치하고자 하는 모듈을 주욱 적어주면 된다.
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-install pdo pdo_mysql

# 환경 설정 파일을 Production 의 것으로 복사한다.
RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
