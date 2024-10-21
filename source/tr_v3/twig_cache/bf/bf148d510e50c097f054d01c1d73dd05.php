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

/* /framework/auth/register.html */
class __TwigTemplate_dad71b8e955b5259498bfc528c228f2e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "/framework/auth/register.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!-- G RECAPTCHA V3 -->
<script src=\"https://www.google.com/recaptcha/api.js?render=";
        // line 5
        echo twig_escape_filter($this->env, ($context["g_recaptcha_site_key"] ?? null), "html", null, true);
        echo "\"></script>
<script src=\"https://accounts.google.com/gsi/client\" async></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<div x-data=\"main\" class=\"ui segment\">
<h1>Register</h1>
<form class=\"ui form info\" name=\"register\" method=\"post\" action=\"/register\">

  <input x-ref=\"recaptchaToken\" type=\"hidden\" name=\"g_recaptcha_token\" />

  <div class=\"field\">
    <label for=\"username\" >Username</label>
    <input type=\"text\" name=\"username\" id=\"username\" placeholder=\"Username\" />
    <div class=\"ui info message\">
    <p>Username consists of at least 5 alphanumeric characters with no spaces and no special characters</p>
    </div>
  </div>

  <div class=\"field\">
    <label for=\"email\" >Email</label>
    <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" />
    <div class=\"ui info message\">
    <p>Please enter the email address you want to  associate with your account</p>
    </div>
  </div>

  <div class=\"field\">
    <label for=\"email\" >Password</label>
    <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\" />

    <div class=\"ui info message\">
      <p>Your password should contain at least 7 characters with one uppercase letter and one numeric character.</p>
    </div>
  </div>

  <div id=\"g_id_onload\"
      data-client_id=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["g_oauth_client_id"] ?? null), "html", null, true);
        echo "\"
      data-context=\"signup\"
      data-ux_mode=\"redirect\"
      data-login_uri=\"";
        // line 45
        echo twig_escape_filter($this->env, ($context["g_oauth_redirect_uri"] ?? null), "html", null, true);
        echo "\"
      data-auto_prompt=\"false\">
  </div>

  <div class=\"g_id_signin\"
      data-type=\"standard\"
      data-shape=\"rectangular\"
      data-theme=\"outline\"
      data-text=\"signup_with\"
      data-size=\"large\"
      data-logo_alignment=\"left\">
  </div>

  <button @click=\"mitigateRegister()\" class=\"ui button\" type=\"button\">Submit</button>

</form>
</div>
";
    }

    // line 65
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
        echo "<script defer>

  /* RECAPTCHA */
  const gRecaptchaSiteKey = \"";
        // line 69
        echo twig_escape_filter($this->env, ($context["g_recaptcha_site_key"] ?? null), "html", null, true);
        echo "\";

  document.addEventListener('alpine:init', () => {

  Alpine.data('main', () => ({
    // items: ['apple','pear'],
    // async pushOrange() {
    //   await this.items.push('orange')
    // }
    /* When button is pressed */
    mitigateRegister() {
      /* RECAPTCHA MITIGATION - START */
      grecaptcha.ready(() => {
          grecaptcha.execute(gRecaptchaSiteKey, {action: 'submit'}).then((token) => {
            
              // Add your logic to submit to your backend server here.
              this.\$refs.recaptchaToken.value = token

              // Submit form
              document.forms['register'].submit();
              
          });
      });
      /* RECAPTCHA MITIGATION - END */
    },
  }))
})
</script>
";
    }

    public function getTemplateName()
    {
        return "/framework/auth/register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 69,  132 => 66,  128 => 65,  106 => 45,  100 => 42,  66 => 10,  62 => 9,  55 => 5,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/framework/auth/register.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/auth/register.html");
    }
}
