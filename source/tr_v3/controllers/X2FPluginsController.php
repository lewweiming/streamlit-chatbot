<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2FPluginsController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showPluginsToInstall()
    {
        return $this->twig->render('framework/plugins/install.html');
    }
    
    function showPlugin($plugin)
    {
        return $this->twig->render('framework/plugins/install_stripe.html');
    }
    
    function installTable()
    {
        $db = Database::getPdox();
        
        $db->query('
CREATE TABLE IF NOT EXISTS tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    due_date DATE,
    status TINYINT NOT NULL,
    priority TINYINT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) COLLATE utf8mb4_general_ci ENGINE=INNODB;        
        ')->exec();
        
        d('done');
    }
}
?>