<?php

use FilhoCodes\TwigStackExtension\TwigStackExtension;
use Twig\Extra\Intl\IntlExtension;

/*
- This class is used to handle Twig
*/
class Twig
{
    public static $t; // The Twig instance

    public static function getTwig()
    {
        if (self::$t === null)
        self::$t = self::init();
        return self::$t;
    }

    public static function init()
    {
        $template_folders = [
            $_SERVER['DOCUMENT_ROOT'] . '/views',
            $_SERVER['DOCUMENT_ROOT'] . '/modules',
            // Add more folders as needed
        ];

        ## Create new Twig instance
        $loader = new Twig\Loader\FilesystemLoader($template_folders);
        $t = new Twig\Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'] . 'twig_cache',
            'auto_reload' => true
        ]);

        /* ADD TWIG CUSTOM FILTERS */
        $filter = new Twig\TwigFilter('humanize_time', function ($datetime) {
            $dt = new HumanizeTime($datetime);
            return $dt->humanize();
        });
        $t->addFilter($filter);

        /* ADD TWIG EXTENSIONS */
        $t->addExtension(new TwigStackExtension());
        $t->addExtension(new IntlExtension());

        return $t;
    }

    /*
    - Gets the template content specified at path
    */
    public static function getTemplate($path)
    {
        $t = self::getTwig();
        $template = $t->render($path);

        return $template;
    }
}

?>