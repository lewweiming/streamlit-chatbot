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

/* forums/views/threads.html */
class __TwigTemplate_65a339c9cb02f854599d0a056639c506 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "forums/views/threads.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<!-- HEADER -->
<h1 class=\"ui horizontal divider center aligned header\">Threads</h1>

<!-- SEARCH -->
<div class=\"ui hidden section divider\"></div>
<div class=\"ui grid centered\">
    <div class=\"ui large form\">
    <div class=\"field\">
        <input type=\"text\" placeholder=\"Search..\">
    </div>
    <div>
        <button class=\"ui primary button\">Search</button>
        <a href=\"/forum/threads/create\" class=\"ui primary button\">Create Thread</a>
        
    </div>
    </div>
</div>



<!-- THREADS -->
<div class=\"ui items\">
  ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["threads"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["thread"]) {
            // line 30
            echo "  <div class=\"item\">
    <div class=\"image\">
      <img src=\"https://via.placeholder.com/150\">
    </div>
    <div class=\"content\">
      <a class=\"header\">";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["thread"], "title", [], "any", false, false, false, 35));
            echo "</a>
      <div class=\"meta\">
        <span>Description</span>
      </div>
      <div class=\"description\">
        <p></p>
      </div>
      <div class=\"extra\">
        <a href=\"/forum/thread/";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["thread"], "id", [], "any", false, false, false, 43), "html", null, true);
            echo "\" class=\"ui left floated primary button\">
          View thread
          <i class=\"right chevron icon\"></i>
        </a>
      </div>
    </div>
  </div>
  
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['thread'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "    
</div>

";
    }

    public function getTemplateName()
    {
        return "forums/views/threads.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 52,  103 => 43,  92 => 35,  85 => 30,  81 => 29,  57 => 7,  53 => 6,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forums/views/threads.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/forums/views/threads.html");
    }
}
