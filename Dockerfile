# 1. Imagem base 
FROM --platform=$BUILDPLATFORM php:8.4-apache

# 2. Instalar dependências (Adicionado libpq-dev para o Postgres)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Instalar extensões (Trocado pdo_mysql por pdo_pgsql)
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# 4. Habilitar mod_rewrite
RUN a2enmod rewrite

# 5. Configuração do Apache para apontar para a pasta /public do Laravel
# (O Laravel precisa que o Apache olhe para a pasta public, não para a raiz)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY . /var/www/html

# 6. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN git config --global --add safe.directory /var/www/html
RUN composer install --no-interaction --optimize-autoloader

# 7. Permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80