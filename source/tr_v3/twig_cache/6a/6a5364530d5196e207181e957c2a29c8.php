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

/* framework/dashboard/articles/add_article.html */
class __TwigTemplate_3e6403695d616c63e7dae4ae503159e6 extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "framework/dashboard/articles/add_article.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!-- SIMPLE MDE -->
<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css\">
<script src=\"https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<main x-data=\"main\">
  <div class=\"ui container\">

    <!-- BREADCRUMBS -->
    <div class=\"ui breadcrumb\">
      <a href=\"/framework/admin\" class=\"section\">Admin</a>
      <i class=\"right angle icon divider\"></i>
      <a href=\"/framework/admin/articles\" class=\"section\">Articles</a>
      <i class=\"right angle icon divider\"></i>
      <div class=\"active section\">Add Article</div>
    </div>

    <h1>Add Awesome Article</h1>

    <!-- FORM -->
    <form method=\"post\" action=\"/framework/admin/articles/create\" class=\"ui form\">
      <div class=\"field\">
        <label>Article Title</label>
        <input ype=\"text\" name=\"title\" placeholder=\"Article Title\">
      </div>

      <!-- <div class=\"field\">
        <label>Startup Website</label>
        <input x-model=\"input.website\" type=\"text\" name=\"startup-website\" placeholder=\"https://www.website.com\">
      </div> -->

      <button type=\"submit\" class=\"ui positive button\">
        Submit
      </button>
    </form>
  </div>

</main>
";
    }

    // line 45
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "<script>
  var simplemdeAddModal = new SimpleMDE({ element: \$(\"#simplemde-add-modal\")[0] });
</script>
<script defer>

  document.addEventListener('alpine:init', () => {

    Alpine.data('main', () => ({
      init() {

      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "framework/dashboard/articles/add_article.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 46,  100 => 45,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "framework/dashboard/articles/add_article.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/dashboard/articles/add_article.html");
    }
}
