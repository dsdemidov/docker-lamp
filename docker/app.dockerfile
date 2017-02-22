FROM php:apache
RUN a2enmod rewrite \
	&& docker-php-ext-install -j$(nproc) mysqli \
	&& service apache2 restart
