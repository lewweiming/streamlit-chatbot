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

/* forums/views/create_thread.html */
class __TwigTemplate_09347d24643c72d7f81d853ab07f9af5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "_layout_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "forums/views/create_thread.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1>Create Thread</h1>
<form method=\"post\" action=\"/forum/threads/create\" class=\"ui form\">
    <div class=\"field\">
      <label>Thread Title</label>
      <input type=\"text\" name=\"title\" placeholder=\"Enter title\">
    </div>
    <button class=\"ui button\" type=\"submit\">Submit</button>
  </form>   
";
    }

    public function getTemplateName()
    {
        return "forums/views/create_thread.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forums/views/create_thread.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/forums/views/create_thread.html");
    }
}
