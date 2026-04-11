#!/bin/bash

# set -e

echo "🔍 Verificando se o banco está vazio..."

TABLE_COUNT=$(php -r "
try {
    \$pdo = new PDO(
        'mysql:host=planti_db;dbname=planti;port=3306',
        'admin',
        '9x*UwARA5@'
    );

    \$stmt = \$pdo->query('SHOW TABLES');
    \$tables = \$stmt->fetchAll();

    echo count(\$tables);
} catch (Exception \$e) {
    echo '0';
}
")

if [ \"$TABLE_COUNT\" -eq 0 ]; then
  echo "🧱 Banco vazio, executando migrations..."
  php spark migrate --force
else
  echo "✔ Banco já possui tabelas ($TABLE_COUNT), pulando migrations."
fi

echo "🚀 Iniciando CodeIgniter 4..."
php spark serve --host 0.0.0.0 --port 3000
