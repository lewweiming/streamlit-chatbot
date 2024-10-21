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

/* _layout_filemanager.html */
class __TwigTemplate_deb798594dd51f734d7c79371d78eae5 extends Template
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
  <title>X2F Filemanager</title>
  <link rel=\"stylesheet\" href=\"/css/bulma.css\"></style>
  <!-- <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css\"> -->
  ";
            // line 8
            $this->displayBlock('head', $context, $blocks);
            // line 9
            echo "</head>
<body>

<!-- NAVBAR -->
<nav class=\"navbar is-black\" role=\"navigation\" aria-label=\"main navigation\">
  <div class=\"navbar-brand\">
    <a class=\"navbar-item\" href=\"#\">
      <span class=\"title is-4 has-text-white has-text-weight-bold\">X2F File Manager</span>
    </a>

    <a role=\"button\" class=\"navbar-burger\" aria-label=\"menu\" aria-expanded=\"false\" data-target=\"navbarBasicExample\">
      <span aria-hidden=\"true\"></span>
      <span aria-hidden=\"true\"></span>
      <span aria-hidden=\"true\"></span>
    </a>
  </div>

  <div id=\"navbarBasicExample\" class=\"navbar-menu\">
    <div class=\"navbar-start\">
      <a href=\"/\" class=\"navbar-item\">
        Home
      </a>

      <a href=\"/framework/admin/main\" class=\"navbar-item\">
        Admin
      </a>

    </div>

    <div class=\"navbar-end\">
      <a class=\"navbar-item\">
        Version 1.0.0
      </a>
      <div class=\"navbar-item\">
        <div class=\"buttons\">
          <a href=\"/framework/logout\" class=\"button is-white\">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<main>
  ";
            // line 54
            $this->displayBlock('content', $context, $blocks);
            // line 55
            echo "  </main>

  <!-- ADDITIONAL SCRIPTS -->
  <footer>
  ";
            // line 59
            $this->displayBlock('script', $context, $blocks);
            // line 60
            echo "  </footer>
</body>
</html>";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    // line 8
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 54
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 59
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "_layout_filemanager.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 59,  131 => 54,  125 => 8,  110 => 60,  108 => 59,  102 => 55,  100 => 54,  53 => 9,  51 => 8,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout_filemanager.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_layout_filemanager.html");
    }
}
