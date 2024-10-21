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

/* pages/discussion_board.html */
class __TwigTemplate_bf5bfec6ed8fce978125739258518cf7 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/discussion_board.html", 1);
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
    
    <!-- Discussion Categories -->
    <div class=\"ui grid\">
        <div class=\"four wide column\">
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Categories</h3>
                <div class=\"ui relaxed list\">
                    <a class=\"item\">Frontend Development</a>
                    <a class=\"item\">Backend Development</a>
                    <a class=\"item\">AI & Machine Learning</a>
                    <a class=\"item\">DevOps & Cloud</a>
                </div>
            </div>
        </div>

        <div class=\"twelve wide column\">
            <!-- Latest Discussions -->
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Latest Discussions</h3>
                <div class=\"ui divided items\">
                    <div class=\"item\">
                        <div class=\"content\">
                            <a class=\"header\">How to optimize AI models for real-time applications?</a>
                            <div class=\"meta\">
                                <span>Posted by Jane on 2024-09-21</span>
                            </div>
                            <div class=\"description\">
                                <p>I'm looking for ways to optimize large AI models for real-time performance. Any ideas?</p>
                            </div>
                            <div class=\"extra\">
                                <div class=\"ui label\">AI & Machine Learning</div>
                                <a href=\"/p/join_discussion\" class=\"ui right floated button\">Join Discussion</a>
                            </div>
                        </div>
                    </div>

                    <div class=\"item\">
                        <div class=\"content\">
                            <a class=\"header\">Best practices for securing backend APIs</a>
                            <div class=\"meta\">
                                <span>Posted by Mike on 2024-09-20</span>
                            </div>
                            <div class=\"description\">
                                <p>What are the best practices for securing APIs? I'm working on a travel app.</p>
                            </div>
                            <div class=\"extra\">
                                <div class=\"ui label\">Backend Development</div>
                                <div class=\"ui right floated button\">Join Discussion</div>
                            </div>
                        </div>
                    </div>

                    <!-- Add more discussions here -->
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 67
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
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
        return "pages/discussion_board.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 68,  116 => 67,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/discussion_board.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/discussion_board.html");
    }
}
