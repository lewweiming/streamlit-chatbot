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

/* /framework/auth/forgot_password.html */
class __TwigTemplate_bc4d61f775a5c9531994cba59dc348ae extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "/framework/auth/forgot_password.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2>Reset Password</h2>

<div class=\"ui message\">
<p>Forgot your password? Enter your email to reset it.</p>
</div>

<div class=\"ui segment\">

<form class=\"ui form\" method=\"post\" action=\"/password/forgot\">

  <div class=\"field\">
    <label for=\"email\">Email</label>
    <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" style=\"max-width: 300px;\">
  </div>

  <button class=\"ui button\" type=\"submit\">Submit</button>
</form>

</div>
";
    }

    public function getTemplateName()
    {
        return "/framework/auth/forgot_password.html";
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
        return new Source("", "/framework/auth/forgot_password.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/auth/forgot_password.html");
    }
}
