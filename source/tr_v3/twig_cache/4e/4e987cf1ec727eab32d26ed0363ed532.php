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

/* /framework/auth/login.html */
class __TwigTemplate_58f52da8898ac5e921e649ea8cbde0bb extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "/framework/auth/login.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<script src=\"https://accounts.google.com/gsi/client\" async></script>
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "<div class=\"ui segment\">
  <h1>Login</h1>

  <form class=\"ui form\" method=\"post\" action=\"/login\">

    ";
        // line 13
        if (($context["page"] ?? null)) {
            // line 14
            echo "    <input type=\"hidden\" name=\"page\" value=\"";
            echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
            echo "\" />
    ";
        }
        // line 16
        echo "
    <div class=\"field\">
      <label for=\"email\">Email</label>
      <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" />
    </div>

    <div class=\"field\">
      <label for=\"password\">Password</label>
      <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\" />
    </div>

    <div class=\"field\">
      <div class=\"ui checkbox\">
        <input value=\"1\" name=\"remember\" type=\"checkbox\">
        <label>Remember me</label>
      </div>
    </div>


    <div class=\"field\">
      <a href=\"/password/forgot\">Forgot password</a>
    </div>


    <div id=\"g_id_onload\" data-client_id=\"";
        // line 40
        echo twig_escape_filter($this->env, ($context["g_oauth_client_id"] ?? null), "html", null, true);
        echo "\"
      data-context=\"signin\" data-ux_mode=\"redirect\" 
      data-login_uri=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["g_oauth_redirect_uri"] ?? null), "html", null, true);
        echo "\" data-auto_prompt=\"false\">
    </div>

    <div class=\"g_id_signin\" data-type=\"standard\" data-shape=\"rectangular\" data-theme=\"outline\" data-text=\"signin_with\"
      data-size=\"large\" data-logo_alignment=\"left\">
    </div>

    <button class=\"ui button\" type=\"submit\">Submit</button>


  </form>
</div>
";
    }

    // line 56
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 57
        echo "<script>
  \$('.ui.checkbox').checkbox();
</script>
";
    }

    public function getTemplateName()
    {
        return "/framework/auth/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 57,  124 => 56,  107 => 42,  102 => 40,  76 => 16,  70 => 14,  68 => 13,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/framework/auth/login.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/auth/login.html");
    }
}
