<?php

class Database
{
    public static $pdo;
    public static $pdox;

    /* Returns a shared instance of PDO using Singleton approach so that prepare_database is only called once */
    public static function getPdo()
    {
        if (self::$pdo === null)
            self::$pdo = self::prepare_database();
        return self::$pdo;
    }

    /*
    $config - DATABASE['local'], containing array of information
    This part can be improved, if enabled, causes a bug when both local and external calls do not work
    */
    public static function getPdox($config = DATABASE['local'])
    {
        // if (self::$pdox === null) // Optionally checks if singleton instance already exists..
            self::$pdox = new Buki\Pdox(self::config($config));
        return self::$pdox;
    }

    /*
    - Used by Buki\Pdox successor to Embryo
    */
    public static function config($config)
    {
        $config = [
            'host'		=> $config['server'],
            'driver'	=> 'mysql',
            'database'	=> $config['name'],
            'username'	=> $config['username'],
            'password'	=> $config['password'],
            'charset'	=> 'utf8',
            'collation'	=> 'utf8mb3_unicode_ci',
            'prefix'	 => ''
        ];

        return $config;
    }

    /***
    Returns a PDO object
    ***/
    public static function prepare_database() { 

        # Initialise DB
        $servername = DATABASE['local']['server'];
        $dbname = DATABASE['local']['name'];    
        $username = DATABASE['local']['username'];
        $password = DATABASE['local']['password'];

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8;", $username, $password);
        }

        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        return $pdo;
    }    

}

?>
