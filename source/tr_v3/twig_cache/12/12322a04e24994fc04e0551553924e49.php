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

/* discussion-board/views/discussion_board.html */
class __TwigTemplate_d0cea0732a76209ca5a240236247518d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "discussion-board/views/discussion_board.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div>
    <!-- Page Header -->
    <h2 class=\"ui dividing header\">Developer Discussion Board</h2>

    <!-- TOOLBAR -->
     <div>
        <a href=\"/discussion-board/add\" class=\"ui primary button\">Add New Discussion</a>
     </div>
     <div class=\"ui hidden divider\"></div>
    
    <!-- Discussion Categories -->
    <div class=\"ui grid\">
        <div class=\"four wide column\">
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Categories</h3>
                <div class=\"ui relaxed list\">
                    
                    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 22
            echo "                    <a class=\"item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 22), "html", null, true);
            echo "</a>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                    
                </div>
            </div>
        </div>

        <div class=\"twelve wide column\">
            <!-- Latest Discussions -->
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Latest Discussions</h3>
                <div class=\"ui divided items\">
                    ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 35
            echo "                    <div class=\"item\">
                        <div class=\"content\">
                            <a class=\"header\">";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "subject", [], "any", false, false, false, 37), "html", null, true);
            echo "</a>
                            <div class=\"meta\">
                                <span>Posted by ";
            // line 39
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["i"], "name", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["i"], "name", [], "any", false, false, false, 39), "Guest")) : ("Guest")), "html", null, true);
            echo " on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "created_at", [], "any", false, false, false, 39), "d M Y"), "html", null, true);
            echo "</span>
                            </div>
                            <div class=\"description\">
                                ";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "message", [], "any", false, false, false, 42), "html", null, true);
            echo "
                            </div>
                            <div class=\"extra\">
                                <div class=\"ui label\">";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "category", [], "any", false, false, false, 45), "html", null, true);
            echo "</div>
                                <a href=\"/discussion-board/discussions/";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["i"], "id", [], "any", false, false, false, 46), "html", null, true);
            echo "\" class=\"ui right floated button\">Join Discussion</a>
                            </div>
                        </div>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                    <!-- Add more discussions here -->
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 59
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
        echo "<script>
    const API_LIST = '/api/list.php'

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            async list() {
                \$.toast({ message: 'Fetching list..' });

                let r = await axios.get(API_LIST)

                if (r.data.message == 'success') {
                    this.rows = r.data.rows
                    \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
                }
            },
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "discussion-board/views/discussion_board.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 60,  147 => 59,  137 => 51,  126 => 46,  122 => 45,  116 => 42,  108 => 39,  103 => 37,  99 => 35,  95 => 34,  83 => 24,  74 => 22,  70 => 21,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "discussion-board/views/discussion_board.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/discussion-board/views/discussion_board.html");
    }
}
