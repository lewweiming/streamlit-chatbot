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

/* pages/_blank_page_content_loading.html */
class __TwigTemplate_f4164d8e5febecafee2adf931bae3b0e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/_blank_page_content_loading.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui main text container\" style=\"margin-top: 2em; margin-bottom: 2em;\">
  <h1 class=\"ui header\">Now with UserInbox</h1>
    <h1 class=\"ui header\">
      <a href=\"https://github.com/lewweiming/fomantic-ui/tree/main/crud-templates\">CRUD Supported</a>
    </h1>
    <p>This is a basic fixed menu template using fixed size containers.</p>
    <p>A text container is used for the main container, which is useful for single column layouts</p>
    <div class=\"ui placeholder\">
        <div class=\"image header\">
            <div class=\"line\"></div>
            <div class=\"line\"></div>
        </div>
        <div class=\"paragraph\">
            <div class=\"line\"></div>
            <div class=\"line\"></div>
            <div class=\"line\"></div>
            <div class=\"line\"></div>
            <div class=\"line\"></div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pages/_blank_page_content_loading.html";
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
        return new Source("", "pages/_blank_page_content_loading.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/_blank_page_content_loading.html");
    }
}
