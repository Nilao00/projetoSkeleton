FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

RUN curl -s https://ngrok-agent.s3.amazonaws.com/ngrok.asc \ 
  | tee /etc/apt/trusted.gpg.d/ngrok.asc >/dev/null && echo "deb https://ngrok-agent.s3.amazonaws.com buster main" \
  | tee /etc/apt/sources.list.d/ngrok.list \ 
  && apt update && apt install ngrok


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY .env.example /var/www/html

RUN mv /var/www/html/.env.example /var/www/html/.env

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN chmod -R 777 .

RUN ngrok config add-authtoken 1aaWzriyXAwohDLWqQC3lJXlWh0_4AufcxyHaCPK2W59c4ttN

# Set working directory
WORKDIR /var/www/html
