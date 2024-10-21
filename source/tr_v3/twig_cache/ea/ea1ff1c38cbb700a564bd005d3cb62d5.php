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

/* work-orders/views/preview.html */
class __TwigTemplate_966fcdb812c3f0a33f0d8d9eef34927e extends Template
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
            'script' => [$this, 'block_script'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "work-orders/views/preview.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!-- MARKDOWN -->
<script src=\"https://cdn.jsdelivr.net/npm/marked/lib/marked.umd.js\"></script>
<link rel=\"stylesheet\" href=\"/css/markdown.css\" />
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/\" class=\"section\">Home</a>
    <i class=\"right angle icon divider\"></i>
    <a href=\"/work-orders\" class=\"section\">Work Orders</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">Work Order #";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "id", [], "any", false, false, false, 15), "html", null, true);
        echo "</div>
  </div>

<h2 class=\"ui dividing header\">Work Order Details</h2>

<div class=\"ui raised segment\">
  <div class=\"ui two column grid\">
    <div class=\"column\">
      <h4 class=\"ui header\">Requestor</h4>
      <p>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "requestor", [], "any", false, false, false, 24), "html", null, true);
        echo "</p>
    </div>
    <div class=\"column\">
      <h4 class=\"ui header\">Department</h4>
      <p>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "department", [], "any", false, false, false, 28), "html", null, true);
        echo "</p>
    </div>
  </div>

  <div class=\"ui grid\">
    <div class=\"column\">
      <h4 class=\"ui header\">Description</h4>

      <div class=\"markdown markdown-body text-black\">";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "description", [], "any", false, false, false, 36), "html", null, true);
        echo "</div>
    </div>
  </div>

  <div class=\"ui two column grid\">
    <div class=\"column\">
      <h4 class=\"ui header\">Priority</h4>
      <p>
        <span class=\"ui ";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "priority", [], "any", false, false, false, 44), "html", null, true);
        echo " label\">
          ";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "priority", [], "any", false, false, false, 45), "html", null, true);
        echo "
        </span>
      </p>
    </div>
    <div class=\"column\">
      <h4 class=\"ui header\">Status</h4>
      <p>
        <span class=\"ui ";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 52), "html", null, true);
        echo " label\">
          ";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 53), "html", null, true);
        echo "
        </span>
      </p>
    </div>
  </div>

  <div class=\"ui two column grid\">
    <div class=\"column\">
      <h4 class=\"ui header\">Date Submitted</h4>
      <p>";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "date_submitted", [], "any", false, false, false, 62), "html", null, true);
        echo "</p>
    </div>
  </div>
</div>
";
    }

    // line 68
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        echo "<script>
let collection = document.getElementsByClassName('markdown')
let nodes = Array.from(collection)
nodes.forEach(el => {
    el.innerHTML = marked.parse(el.innerHTML.replace(/&gt;+/g, '>'), {
        mangle: false,
        headerIds: false
    })
})
</script>
";
    }

    public function getTemplateName()
    {
        return "work-orders/views/preview.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 69,  150 => 68,  141 => 62,  129 => 53,  125 => 52,  115 => 45,  111 => 44,  100 => 36,  89 => 28,  82 => 24,  70 => 15,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "work-orders/views/preview.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/work-orders/views/preview.html");
    }
}
