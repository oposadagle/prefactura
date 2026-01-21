<?php
// Incluye el autoload de Composer para cargar las dependencias de Laravel
require __DIR__ . '/vendor/autoload.php';

// Carga el archivo .env de Laravel
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configura la conexion a la base de datos usando las variables del .env
$config = [
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
];

// Crea una nueva conexión PDO
try {
    $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ejecuta la consulta para recrear la tabla
    $sql = "DROP TABLE IF EXISTS masa; CREATE TABLE masa AS SELECT * FROM masas;";
    
    // Ejecutar las consultas por separado ya que PDO no ejecuta múltiples statements en una sola llamada
    $pdo->exec("DROP TABLE IF EXISTS masa;");
    $pdo->exec("CREATE TABLE masa AS SELECT * FROM masas;");

    // Registra el éxito en el archivo de log
    file_put_contents(__DIR__ . '/logs/success.log', "Tabla 'masa' recreada correctamente desde 'masas': " . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
} catch (Exception $e) {
    // Registra el error en el archivo de log
    file_put_contents(__DIR__ . '/logs/error.log', "Error al recrear la tabla: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
}