# 1. Imagem base com PHP e Apache
FROM --platform=$BUILDPLATFORM php:8.4-apache

# 2. Instalar dependências do sistema e extensões PHP para o Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Limpar cache do apt para a imagem ficar leve
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões do PHP (essencial para o CRUD e Banco de Dados)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Habilitar o mod_rewrite do Apache (necessário para as rotas do Laravel)
RUN a2enmod rewrite

# 4. Definir a pasta de trabalho
WORKDIR /var/www/html

# 5. Copiar os arquivos do projeto para o container
COPY . /var/www/html

# 6. Instalar o Composer (gerenciador de dependências)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN git config --global --add safe.directory /var/www/html
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 7. Dar permissão para as pastas de cache e storage do Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Expor a porta 80 (padrão do Apache)
EXPOSE 80