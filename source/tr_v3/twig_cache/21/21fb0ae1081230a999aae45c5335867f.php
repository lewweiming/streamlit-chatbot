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
class __TwigTemplate_b657bdc7e9787986921f58cd99d8d6ad extends Template
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
    <title>TR V3 - Admin</title>

    <!-- You MUST include jQuery 3+ before Fomantic -->
    <script src=\"https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/fomantic-ui/semantic.min.css\">
    <script src=\"/fomantic-ui/semantic.min.js\"></script>

    <!-- ALPINE + AXIOS -->
    <script src=\"//unpkg.com/alpinejs\" defer></script>
    <script src=\"https://unpkg.com/axios/dist/axios.min.js\"></script>

    <!-- ADDITIONAL HEADERS -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/app.css\">

    ";
            // line 20
            $this->displayBlock('head', $context, $blocks);
            // line 21
            echo "    ";
            echo '###{FilhoCodes\TwigStackExtension\Stack\head}###';
            // line 22
            echo "</head>

<body data-flash=\"";
            // line 24
            echo twig_escape_filter($this->env, json_encode(($context["flash"] ?? null)));
            echo "\">

    <!-- NAVBAR -->
    ";
            // line 27
            $this->loadTemplate("parts/navbar_admin.html", "_layout_admin_fomantic.html", 27)->display($context);
            // line 28
            echo "
    <!-- ROUTE CONTENT -->
    <div class=\"ui container\" style=\"padding-bottom: 70px;\">
    ";
            // line 31
            $this->displayBlock('content', $context, $blocks);
            // line 32
            echo "    </div>

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
        <a class=\"item\" target=blank href=\"/vendor/adminer/adminer_x2f.php\">Adminer</a>
        <a class=\"item\" href=\"/framework/admin/plugins/install\">Plugins</a>
        
        
        
        <!-- Add more items or customize as needed -->
    </nav>


    <!-- ADDITIONAL SCRIPTS -->
    <script>
    \$('.ui.dropdown').dropdown();
    </script>
    <!-- HANDLE FLASH ERRORS / SUCCESS -->
    <script>
        var flashData = document.querySelector('[data-flash]');
        var flash = JSON.parse(flashData.dataset.flash); // Dictionary Object

        if (flash) {
            renderFlashElement(flash)
            renderFlashMessages(flash) // Optional
        }

        // Flash messages NOT toast
        function renderFlashMessages(flash) {

            const flashMesagesContainer = document.getElementById('flashMessages');

            // Render success messages
            if ('success' in flash) {
                flash.success.forEach(message => {
                    const el = document.createElement(\"div\");
                    el.className = \"ui success message\";
                    el.textContent = message;

                    const iconEl = document.createElement(\"i\");
                    iconEl.className = \"close icon\";

                    el.prepend(iconEl);
                    flashMesagesContainer.append(el)
                })
            }

            // Render error messages
            if ('error' in flash) {
                flash.error.forEach(message => {
                    const el = document.createElement(\"div\");
                    el.className = \"ui error message\";
                    el.textContent = message;

                    const iconEl = document.createElement(\"i\");
                    iconEl.className = \"close icon\";

                    el.prepend(iconEl);
                    flashMesagesContainer.append(el)
                })
            }

            // Active Dismissable blocks
            \$('.message .close').on('click', function () { \$(this).closest('.message').transition('fade'); });

        }

        function renderFlashElement(flash) {

            if ('success' in flash) {

                flash.success.forEach((message) => {
                    \$.toast({
                    class: 'success',
                    message: message
                    });
                })

            }
            
            if ('error' in flash) {

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
            // line 135
            $this->displayBlock('script', $context, $blocks);
            // line 136
            echo "    ";
            echo '###{FilhoCodes\TwigStackExtension\Stack\script}###';
            // line 137
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

    // line 20
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 135
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
        return array (  224 => 135,  218 => 31,  212 => 20,  197 => 137,  194 => 136,  192 => 135,  87 => 32,  85 => 31,  80 => 28,  78 => 27,  72 => 24,  68 => 22,  65 => 21,  63 => 20,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout_admin_fomantic.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_layout_admin_fomantic.html");
    }
}
