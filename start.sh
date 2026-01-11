#!/bin/bash

set -e

echo "⏳ Aguardando banco de dados (MySQL saudável pelo Docker)..."

# Garantia extra (opcional, mas seguro)
until php -r "
try {
    new PDO(
        'mysql:host=planti_db;dbname=planti;port=3306',
        'admin',
        '9x*UwARA5@'
    );
    echo 'DB OK';
} catch (Exception \$e) {
    exit(1);
}
"; do
  echo "⏳ Banco ainda não disponível..."
  sleep 3
done

echo "✔ Banco disponível!"

echo "📦 Instalando dependências..."
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "🧱 Executando migrations..."
php spark migrate --force

echo "🚀 Iniciando CodeIgniter 4..."
php spark serve --host 0.0.0.0 --port 3000
