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

/* _layout_fomantic.html */
class __TwigTemplate_6c6a8df93fdeaebaefbde1bf8a33934a extends Template
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
            'unwrapped_content' => [$this, 'block_unwrapped_content'],
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
    <title>Travelgowhere V3</title>

    <!-- You MUST include jQuery 3+ before Fomantic -->
    <script src=\"https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/fomantic-ui/semantic.min.css\">
    <script src=\"/fomantic-ui/semantic.min.js\"></script>

    <!-- ALPINEJS + AXIOS -->
    <script src=\"//unpkg.com/alpinejs\" defer></script>
    <script src=\"https://unpkg.com/axios/dist/axios.min.js\"></script>

    <!-- Additional Headers / Styles -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/app.css\">
    ";
            // line 19
            $this->displayBlock('head', $context, $blocks);
            // line 20
            echo "    ";
            echo '###{FilhoCodes\TwigStackExtension\Stack\head}###';
            // line 21
            echo "</head>

<body data-flash=\"";
            // line 23
            echo twig_escape_filter($this->env, json_encode(($context["flash"] ?? null)));
            echo "\">

    <!-- NAVBAR -->
    ";
            // line 26
            $this->loadTemplate("parts/navbar.html", "_layout_fomantic.html", 26)->display($context);
            // line 27
            echo "
    ";
            // line 28
            $this->displayBlock('unwrapped_content', $context, $blocks);
            // line 29
            echo "
    <div class=\"ui container\" style=\"padding-top: 30px; padding-bottom: 70px;\">

        ";
            // line 32
            $this->displayBlock('content', $context, $blocks);
            // line 33
            echo "
    </div>

    <!-- FOOTER -->
    ";
            // line 37
            $this->loadTemplate("_footer.html", "_layout_fomantic.html", 37)->display($context);
            // line 38
            echo "    
    <!-- <div class=\"ui hidden divider\"></div>
    <div class=\"ui vertical footer segment\">
        <div class=\"ui container\">
            Cushiejobs 2023. All Rights Reserved
        </div>
    </div> -->


  <!-- NAVBAR: BOTTOM FIXED -->
  <nav class=\"ui bottom fixed centered inverted menu\">
    <a class=\"item\" href=\"#\">Home</a>
    <a class=\"item\" href=\"#\">About</a>
    <a class=\"item\" href=\"#\">Contact</a>
    <!-- Add more items or customize as needed -->
    <a href=\"/framework/admin/main\" class=\"item\">Admin</a>
    ";
            // line 54
            if ((twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "is_logged_in", [], "any", false, false, false, 54) == true)) {
                // line 55
                echo "    <a href=\"/framework/logout\" class=\"item\">Admin Logout</a>
    ";
            }
            // line 57
            echo "  </nav>


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
            // line 141
            $this->displayBlock('script', $context, $blocks);
            // line 142
            echo "    ";
            echo '###{FilhoCodes\TwigStackExtension\Stack\script}###';
            // line 143
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

    // line 19
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 28
    public function block_unwrapped_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 32
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 141
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "_layout_fomantic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 141,  242 => 32,  236 => 28,  230 => 19,  215 => 143,  212 => 142,  210 => 141,  124 => 57,  120 => 55,  118 => 54,  100 => 38,  98 => 37,  92 => 33,  90 => 32,  85 => 29,  83 => 28,  80 => 27,  78 => 26,  72 => 23,  68 => 21,  65 => 20,  63 => 19,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout_fomantic.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_layout_fomantic.html");
    }
}
