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
class __TwigTemplate_25f0b90b279665306b6b8a99e4c0bf09 extends Template
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
    <title>X2F Auth</title>

    <!-- You MUST include jQuery 3+ before Fomantic -->
    <script src=\"https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/fomantic-ui/semantic.min.css\">
    <script src=\"/fomantic-ui/semantic.min.js\"></script>

    <!-- ALPINEJS + AXIOS -->
    <script src=\"//unpkg.com/alpinejs\" defer></script>
    <script src=\"https://unpkg.com/axios/dist/axios.min.js\"></script>

    <!-- Additional Headers / Styles -->
    ";
            // line 18
            $this->displayBlock('head', $context, $blocks);
            // line 19
            echo "    ";
            echo '###{FilhoCodes\TwigStackExtension\Stack\head}###';
            // line 20
            echo "</head>

<body data-flash=\"";
            // line 22
            echo twig_escape_filter($this->env, json_encode(($context["flash"] ?? null)));
            echo "\">

    <!-- NAVBAR -->
    ";
            // line 25
            $this->loadTemplate("parts/navbar.html", "_layout_fomantic.html", 25)->display($context);
            // line 26
            echo "
    <div class=\"ui container\" style=\"margin-top: 30px; margin-bottom: 30px;\">

        ";
            // line 29
            if ((twig_length_filter($this->env, ($context["flash"] ?? null)) > 0)) {
                // line 30
                echo "        <div id=\"flashMessages\"></div>
        ";
            }
            // line 32
            echo "
        ";
            // line 33
            $this->displayBlock('content', $context, $blocks);
            // line 34
            echo "
    </div>

    <!-- FOOTER -->
    <!-- <div class=\"ui hidden divider\"></div>
    <div class=\"ui vertical footer segment\">
        <div class=\"ui container\">
            Cushiejobs 2023. All Rights Reserved
        </div>
    </div> -->


  <!-- NAVBAR: BOTTOM FIXED -->
  <nav class=\"ui bottom fixed menu\">
    <a class=\"item\" href=\"#\">Home</a>
    <a class=\"item\" href=\"#\">About</a>
    <a class=\"item\" href=\"#\">Contact</a>
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
            // line 136
            $this->displayBlock('script', $context, $blocks);
            // line 137
            echo "    ";
            echo '###{FilhoCodes\TwigStackExtension\Stack\script}###';
            // line 138
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

    // line 33
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 136
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
        return array (  230 => 136,  224 => 33,  218 => 18,  203 => 138,  200 => 137,  198 => 136,  94 => 34,  92 => 33,  89 => 32,  85 => 30,  83 => 29,  78 => 26,  76 => 25,  70 => 22,  66 => 20,  63 => 19,  61 => 18,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout_fomantic.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_layout_fomantic.html");
    }
}
