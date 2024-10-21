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

/* forums/views/thread.html */
class __TwigTemplate_c85f6b32feaf9082a3448ba767a247a0 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "forums/views/thread.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"content\">
    <h1>Hello World</h1>
    <p>Lorem ipsum<sup><a>[1]</a></sup> dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui. Fusce erat odio, sollicitudin vel erat vel, interdum mattis neque. Sub<sub>script</sub> works as well!</p>
    <h2>Second level</h2>
    <p>Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque condimentum maximus mi, sit amet commodo arcu rutrum id. Proin pretium urna vel cursus venenatis. Suspendisse potenti. Etiam mattis sem rhoncus lacus dapibus facilisis. Donec at dignissim dui. Ut et neque nisl.</p>
    <ul>
        <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet.</li>
        <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis.</li>
        <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus.</li>
        <li>Ut non enim metus.</li>
    </ul>
</div>

<h1>All Replies</h1>
<div class=\"ui comments\">
";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["replies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["reply"]) {
            // line 20
            echo "
    <div class=\"comment\">
      <a class=\"avatar\">
        <img src=\"/images/avatar/small/joe.jpg\">
      </a>
      <div class=\"content\">
        <a class=\"author\">Joe Henderson</a>
        <div class=\"metadata\">
          <div class=\"date\">1 day ago</div>
        </div>
        <div class=\"text\">
          <p>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reply"], "body", [], "any", false, false, false, 31), "html", null, true);
            echo "</p>
        </div>
        <div class=\"actions\">
          <a class=\"reply\">Reply</a>
        </div>
      </div>
    
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reply'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "</div>

<h2>Add Reply</h2>
<form method=\"post\" action=\"/forum/thread/";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thread"] ?? null), "id", [], "any", false, false, false, 42), "html", null, true);
        echo "/reply\" class=\"ui form\">

    <div class=\"field\">
      <label>Reply Body</label>
      <textarea type=\"text\" name=\"body\" placeholder=\"Write something...\"></textarea>
    </div>
    <button class=\"ui button\" type=\"submit\">Submit</button>
  </form>  
";
    }

    public function getTemplateName()
    {
        return "forums/views/thread.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 42,  98 => 39,  84 => 31,  71 => 20,  67 => 19,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forums/views/thread.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/forums/views/thread.html");
    }
}
