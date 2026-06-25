<?php
class Koneksi {
    private static $host = "localhost";
    private static $db_name = "DB_UAS_PBO_TI1D_Fathir_Ihza_Mahendra";
    private static $username = "root"; // Username default MySQL/XAMPP
    private static $password = "";     // Password default MySQL/XAMPP
    private static $conn = null;

    public static function getKoneksi() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                // Mengatur error mode ke Exception untuk mempermudah debugging
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error: Koneksi Gagal! " . $e->getMessage() . "<br>";
            }
        }
        return self::$conn;
    }
}
?>