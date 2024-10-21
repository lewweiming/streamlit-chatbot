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

/* discussion-board/views/join_discussion.html */
class __TwigTemplate_94e1bf54ba2bfd1969f682f141e3d6b8 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "discussion-board/views/join_discussion.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/\" class=\"section\">Home</a>
    <i class=\"right angle icon divider\"></i>
    <a href=\"/discussion-board\" class=\"section\">Discussion Board</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "subject", [], "any", false, false, false, 9), "html", null, true);
        echo "</div>
</div>
<div class=\"ui hidden divider\"></div>

<div>
    <!-- Discussion Header -->
    <h2 class=\"ui dividing header\">
        ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "subject", [], "any", false, false, false, 16), "html", null, true);
        echo "
        <div class=\"sub header\">Posted by ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "name", [], "any", false, false, false, 17), "html", null, true);
        echo " on ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "created_at", [], "any", false, false, false, 17), "d M Y"), "html", null, true);
        echo " in ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "category", [], "any", false, false, false, 17), "html", null, true);
        echo "</div>
    </h2>

    <!-- Original Post -->
    <div class=\"ui segment\">
        <p>";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "message", [], "any", false, false, false, 22), "html", null, true);
        echo "</p>
        <div class=\"ui horizontal list\">
            <div class=\"item\">
                <img class=\"ui avatar image\" src=\"https://via.placeholder.com/150\" alt=\"User Avatar\">
                <div class=\"content\">
                    <div class=\"header\">";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "name", [], "any", false, false, false, 27), "html", null, true);
        echo "</div>
                    <div class=\"description\">Member</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Replies Section -->
    <h3 class=\"ui dividing header\">Replies</h3>
    
    ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 38
            echo "    <div class=\"ui comments\">
        <!-- Comment -->
        <div class=\"comment\">
            <a class=\"avatar\">
                <img src=\"https://via.placeholder.com/150\" alt=\"User Avatar\">
            </a>
            <div class=\"content\">
                <a class=\"author\">";
            // line 45
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["post"], "name", [], "any", true, true, false, 45)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["post"], "name", [], "any", false, false, false, 45), "Guest")) : ("Guest")), "html", null, true);
            echo "</a>
                <div class=\"metadata\">
                    <span class=\"date\">";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getFilter('humanize_time')->getCallable()(twig_get_attribute($this->env, $this->source, $context["post"], "created_at", [], "any", false, false, false, 47)), "html", null, true);
            echo "</span>
                </div>
                <div class=\"text\">
                    ";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "message", [], "any", false, false, false, 50), "html", null, true);
            echo "
                </div>
                <div class=\"actions\">
                    <a href=\"/discussion-board/discussions/";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "id", [], "any", false, false, false, 53), "html", null, true);
            echo "/replies/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 53), "html", null, true);
            echo "/delete\" class=\"reply\">Remove Reply</a>
                </div>
            </div>
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "
    <!-- Add Reply Form -->
    <form method=\"post\" action=\"/discussion-board/discussions/";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "id", [], "any", false, false, false, 61), "html", null, true);
        echo "\" class=\"ui reply form\">

        <input type=\"hidden\" name=\"discussion_id\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["discussion"] ?? null), "id", [], "any", false, false, false, 63), "html", null, true);
        echo "\" />

        <div class=\"field\">
            <textarea name=\"message\" placeholder=\"Add your reply...\"></textarea>
        </div>
        <button class=\"ui primary button\" type=\"submit\">Post Reply</button>
    </form>
</div>
";
    }

    // line 73
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 74
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
        return "discussion-board/views/join_discussion.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 74,  171 => 73,  158 => 63,  153 => 61,  149 => 59,  135 => 53,  129 => 50,  123 => 47,  118 => 45,  109 => 38,  105 => 37,  92 => 27,  84 => 22,  72 => 17,  68 => 16,  58 => 9,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "discussion-board/views/join_discussion.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/discussion-board/views/join_discussion.html");
    }
}
