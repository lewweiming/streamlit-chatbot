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

/* framework/login.html */
class __TwigTemplate_5f9bc7b136bbf9805095be4d6d0f24bd extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "framework/login.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<style>
  .expand {
    animation: expand 0.3s ease-in;
    animation-fill-mode: forwards;
  }

  @keyframes expand {

    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.1);
    }

    100% {
      transform: scale(1);
    }
  }
</style>
";
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "<main class=\"ui segment expand\">
  <h2>Developer Login</h2>
  <p>Please enter the password to proceed.</p>
  <article>

    <form class=\"ui form\" method=\"post\" action=\"/framework/login\">

      <div class=\"field\">
        <label for=\"password\">Password</label>
        <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\" />
      </div>

      <button class=\"ui button\" type=\"submit\">Submit</button>

    </form>
  </article>
</main>
";
    }

    public function getTemplateName()
    {
        return "framework/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 28,  76 => 27,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "framework/login.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/login.html");
    }
}
