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

/* _footer.html */
class __TwigTemplate_b9f0aa173f06f97d6275ec51f6d98432 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        ob_start();
        try {
            // line 1
            echo "
<div class=\"ui hidden divider\"></div>
<div class=\"ui inverted vertical footer segment\">
  <div class=\"ui center aligned container\">
    <div class=\"ui stackable inverted divided grid\">
      <div class=\"three wide column\">
        <h4 class=\"ui inverted header\">Section 1</h4>
        <div class=\"ui inverted link list\">
          <a href=\"#\" class=\"item\">Link 1</a>
          <a href=\"#\" class=\"item\">Link 2</a>
          <a href=\"#\" class=\"item\">Link 3</a>
        </div>
      </div>
      <div class=\"three wide column\">
        <h4 class=\"ui inverted header\">Section 2</h4>
        <div class=\"ui inverted link list\">
          <a href=\"#\" class=\"item\">Link 1</a>
          <a href=\"#\" class=\"item\">Link 2</a>
          <a href=\"#\" class=\"item\">Link 3</a>
        </div>
      </div>
      <div class=\"three wide column\">
        <h4 class=\"ui inverted header\">Section 3</h4>
        <div class=\"ui inverted link list\">
          <a href=\"#\" class=\"item\">Link 1</a>
          <a href=\"#\" class=\"item\">Link 2</a>
          <a href=\"#\" class=\"item\">Link 3</a>
        </div>
      </div>
      <div class=\"seven wide column\">
        <h4 class=\"ui inverted header\">Footer Header</h4>
        <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
      </div>
    </div>
    <div class=\"ui inverted section divider\"></div>
    <img src=\"https://via.placeholder.com/150\" class=\"ui centered mini image\">
    <div class=\"ui horizontal inverted small divided link list\">
      <a class=\"item\" href=\"#\">Site Map</a>
      <a class=\"item\" href=\"#\">Contact Us</a>
      <a class=\"item\" href=\"#\">Terms and Conditions</a>
      <a class=\"item\" href=\"#\">Privacy Policy</a>
    </div>
  </div>
</div>

        ";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    public function getTemplateName()
    {
        return "_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_footer.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_footer.html");
    }
}
