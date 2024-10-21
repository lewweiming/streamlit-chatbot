<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* _layout_admin_fomantic.html */
class __TwigTemplate_19a3da046ec8867770a178bb5d3b67ac extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        ob_start();
        try {
            // line 1
            echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=utf-8>
    <title>X2F Auth - Admin</title>

    <!-- You MUST include jQuery 3+ before Fomantic -->
    <script src=\"https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://dev.cushiejobs.com/apps/fomantic-ui/dist/semantic.min.css\">
    <script src=\"https://dev.cushiejobs.com/apps/fomantic-ui/dist/semantic.min.js\"></script>

    <!-- ALPINE + AXIOS -->
    <script src=\"//unpkg.com/alpinejs\" defer></script>
    <script src=\"https://unpkg.com/axios/dist/axios.min.js\"></script>

    <!-- ADDITIONAL HEADERS -->
    ";
            // line 18
            $this->displayBlock('head', $context, $blocks);
            // line 19
            echo "</head>

<body>

     <!-- NAVBAR -->
     ";
            // line 24
            $this->loadTemplate("parts/navbar_admin.html", "_layout_admin_fomantic.html", 24)->display($context);
            // line 25
            echo "
     <!-- ROUTE CONTENT -->
     ";
            // line 27
            $this->displayBlock('content', $context, $blocks);
            // line 28
            echo "

    <!-- NAVBAR: BOTTOM FIXED -->
    <nav class=\"ui bottom fixed menu\">
        
        <a class=\"item\" href=\"/framework/admin/crud\">CRUD</a>
        <a class=\"item\" href=\"/framework/admin/inbox/main\">Inbox</a>
        <a class=\"item\" href=\"/framework/admin/file-manager\">File Manager</a>
        <a class=\"item\" href=\"/framework/admin/x2-file-uploads\">X2 File Uploads</a>
        <a class=\"item\" href=\"/framework/admin/twig\">Twig</a>
        <a class=\"item\" href=\"/framework/admin/debugger/main\">Debugger</a>
        <a class=\"item\" href=\"/framework/admin/routes\">Routes</a>
        <a class=\"item\" href=\"/framework/admin/definitions\">Definitions</a>
        <a class=\"item\" href=\"/framework/admin/pages\">Pages</a>
        <a class=\"item\" href=\"/framework/admin/database\">Database</a>
        <a class=\"item\" href=\"/framework/admin/plugins/install\">Plugins</a>
        
        
        
        <!-- Add more items or customize as needed -->
    </nav>


    <!-- ADDITIONAL SCRIPTS -->
    <script>
    \$('.ui.dropdown').dropdown();
    </script>
    <!-- HANDLE FLASH ERRORS / SUCCESS -->
    <script>
        var flash = ";
            // line 57
            echo json_encode(($context["flash"] ?? null));
            echo " // Dictionary Object

        if (flash) {
            renderFlashElement(flash)
        }

        function renderFlashElement(flash) {

            if ('success' in flash) {

                flash.success.forEach((message) => {
                    \$.toast({
                        class: 'success',
                        message: message
                    });
                })

            } else if ('error' in flash) {

                flash.error.forEach((message) => {

                    \$.toast({
                        class: 'error',
                        message: message
                    });
                })
            }
        }
    </script>
    ";
            // line 86
            $this->displayBlock('script', $context, $blocks);
            // line 87
            echo "</body>

</html>";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    // line 18
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 86
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "_layout_admin_fomantic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 86,  164 => 27,  158 => 18,  143 => 87,  141 => 86,  109 => 57,  78 => 28,  76 => 27,  72 => 25,  70 => 24,  63 => 19,  61 => 18,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout_admin_fomantic.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_layout_admin_fomantic.html");
    }
}
