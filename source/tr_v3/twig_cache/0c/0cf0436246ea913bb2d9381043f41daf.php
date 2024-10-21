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

/* /framework/dashboard/articles/edit_article.html */
class __TwigTemplate_818ae43ba3152fa328dab0f480707211 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "/framework/dashboard/articles/edit_article.html", 1);
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
        echo "<main x-data=\"main\" data-article=\"";
        echo twig_escape_filter($this->env, json_encode(($context["article"] ?? null)));
        echo "\" data-images=\"";
        echo twig_escape_filter($this->env, json_encode(($context["images"] ?? null)));
        echo "\">
  <div class=\"ui container\">

    <!-- BREADCRUMBS -->
    <div class=\"ui breadcrumb\">
      <a href=\"/framework/admin\" class=\"section\">Admin</a>
      <i class=\"right angle icon divider\"></i>
      <a href=\"/framework/admin/articles\" class=\"section\">Articles</a>
      <i class=\"right angle icon divider\"></i>
      <div class=\"active section\">Edit Article: ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "title", [], "any", false, false, false, 19), "html", null, true);
        echo "</div>
    </div>

    <h1>Edit Awesome Article</h1>

    <!-- GRID -->
    <div class=\"ui grid two columns\">

      <div class=\"column\">

        <!-- FORM -->
        <form method=\"post\" action=\"/framework/admin/article/";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "id", [], "any", false, false, false, 30), "html", null, true);
        echo "\" class=\"ui form\">
          <div class=\"field\">
            <label>Article Title</label>
            <input type=\"text\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "title", [], "any", false, false, false, 33), "html", null, true);
        echo "\" name=\"title\" placeholder=\"Article Title\">
          </div>

          <div class=\"field\">
            <label>Article Thumbnail Path</label>
            <input type=\"text\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "thumbnail_path", [], "any", false, false, false, 38), "html", null, true);
        echo "\" name=\"thumbnail_path\" placeholder=\"Article Thumbnail Path. Http paths can be used.\">
          </div>

          <div class=\"field\">
            <label>Article Source Url</label>
            <input type=\"text\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "source_url", [], "any", false, false, false, 43), "html", null, true);
        echo "\" name=\"source_url\" placeholder=\"Url source\">
          </div>

          <div class=\"field\">
            <label>Article Tags</label>
            <input type=\"text\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "tags", [], "any", false, false, false, 48), "html", null, true);
        echo "\" name=\"tags\" placeholder=\"Comma separated tags\">
          </div>

          <div class=\"field\">
            <label>Markdown Content</label>
            <!-- TEXTAREA -->
            <textarea name=\"markdown_content\" id=\"simplemde\">";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "markdown_content", [], "any", false, false, false, 54), "html", null, true);
        echo "</textarea>
          </div>

          <button type=\"submit\" class=\"ui positive button\">
            Update
          </button>
        </form>
      </div>
      <div class=\"column\">
        <h2 class=\"ui header\">Images</h2>
        <p>Click on image to load into markdown content</p>
        <div class=\"ui small images\">
          <template x-for=\"image in images\">
          <img @click=\"onImageClick(image)\" :src=\"`/assets/x2f/articles/\${article.id}/images/\${image}`\">
          </template>
        </div>
      </div>
    </div>

  </div>

</main>
";
    }

    // line 78
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 79
        echo "<script>
  var simplemde;
</script>
<script defer>

  const API_CREATE = '/api/x2-framework/articles/create.php'

  document.addEventListener('alpine:init', () => {

    Alpine.data('main', () => ({
      article: {},
      images: [],
      init() {
        this.\$nextTick(() => {

          this.loadArticle();
          this.loadImages();

          if (simplemde === undefined) {
            simplemde = new SimpleMDE({ element: \$(\"#simplemde\")[0] });
          }
        });
      },
      loadArticle() {
        let r = document.querySelector('[data-article]');
        this.article = JSON.parse(r.dataset.article)
      },
      loadImages() {
        let r = document.querySelector('[data-images]');
        this.images = JSON.parse(r.dataset.images)
      },
      onImageClick(filename) {

        let imageMarkdown = `![](/assets/x2f/articles/\${this.article.id}/images/\${filename})`;

        var pos = simplemde.codemirror.getCursor();
        simplemde.codemirror.setSelection(pos, pos);
        simplemde.codemirror.replaceSelection(imageMarkdown)

      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "/framework/dashboard/articles/edit_article.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 79,  158 => 78,  131 => 54,  122 => 48,  114 => 43,  106 => 38,  98 => 33,  92 => 30,  78 => 19,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/framework/dashboard/articles/edit_article.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/dashboard/articles/edit_article.html");
    }
}
