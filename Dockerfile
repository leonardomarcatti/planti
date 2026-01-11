FROM php:8.2-cli

# Dependências do sistema (SEM banco)
RUN apt-get update && apt-get install -y \
   git \
   unzip \
   zip \
   curl \
   libicu-dev \
   tzdata \
   && docker-php-ext-install mysqli pdo pdo_mysql intl \
   && apt-get clean \
   && rm -rf /var/lib/apt/lists/*

# Timezone
ENV TZ=America/Sao_Paulo

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Diretório da aplicação
WORKDIR /app

# Código da aplicação
COPY . /app

# Script de inicialização
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Permissões do CodeIgniter
RUN chown -R www-data:www-data /app/writable \
   && chmod -R 775 /app/writable

# Porta do CodeIgniter (spark serve)
EXPOSE 3000

CMD ["/start.sh"]
