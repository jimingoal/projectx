# PHP 8.0.3 (최신버전) + FPM + Alpine 리눅스 조합
#
# 구성: PDO, MySQLi, GD, Exif
#
FROM php:8.0.3-fpm-alpine

# RUN docker-php-ext-install 다음에 설치하고자 하는 모듈을 주욱 적어주면 된다.
RUN docker-php-ext-install pdo pdo_mysql mysqli exif

# GD2 설치.(이미지처리모듈)
RUN apk add --no-cache \
    freetype \
    libpng \
    libjpeg-turbo \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
        docker-php-ext-install -j${NPROC} gd && \
        apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# 환경 설정 파일을 Production 의 것으로 복사한다.
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# 위 원소스에서 에러나서 알아보니 디렉토리가 없다고 한다 위 PHP_INI_DIR을 모르는 관계로
# 일단 주석처리한 후 docker-compose up -d 실행함
# 정상적으로 구동 후 exec -it www_docker_php /bin/sh 로 컨테이너로 들어감
# /usr/local/etc/php/php.ini-production 위치를 확인함
# docker cp www_docker_php:/usr/local/etc/php/php.ini-production ./etc/
# 위 명령을 통해 호스트 etc밑으로 설정파일을 가져와서 이름을 php.ini로 변경해줌
# 이제 다 지우고 다시 compose up 을 하면 호스트의 php.ini파일로 컨테이너 환경설정이 덮어짐

# 요약 compose up => exec php접속 => php.ini-production위치파악 => exit
# => docker cp 컨테이너명:컨테이너폴더 호스트폴더 => 다시 compose up
