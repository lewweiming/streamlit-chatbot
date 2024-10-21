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

/* pages/join_discussion.html */
class __TwigTemplate_cc840f5aff0a5d72649dbbfc73b60de2 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/join_discussion.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div>
    <!-- Discussion Header -->
    <h2 class=\"ui dividing header\">
        How to optimize AI models for real-time applications?
        <div class=\"sub header\">Posted by Jane on 2024-09-21 in AI & Machine Learning</div>
    </h2>

    <!-- Original Post -->
    <div class=\"ui segment\">
        <p>I'm looking for ways to optimize large AI models for real-time performance. Specifically, I need advice on memory management and latency reduction strategies. Any suggestions?</p>
        <div class=\"ui horizontal list\">
            <div class=\"item\">
                <img class=\"ui avatar image\" src=\"https://via.placeholder.com/150\" alt=\"User Avatar\">
                <div class=\"content\">
                    <div class=\"header\">Jane</div>
                    <div class=\"description\">AI Engineer</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Replies Section -->
    <h3 class=\"ui dividing header\">Replies</h3>
    
    <div class=\"ui comments\">
        <!-- Comment 1 -->
        <div class=\"comment\">
            <a class=\"avatar\">
                <img src=\"https://via.placeholder.com/150\" alt=\"User Avatar\">
            </a>
            <div class=\"content\">
                <a class=\"author\">Mike</a>
                <div class=\"metadata\">
                    <span class=\"date\">1 day ago</span>
                </div>
                <div class=\"text\">
                    Have you tried model quantization or pruning? These methods can reduce the model size significantly and improve performance.
                </div>
                <div class=\"actions\">
                    <a class=\"reply\">Reply</a>
                </div>
            </div>
        </div>

        <!-- Comment 2 -->
        <div class=\"comment\">
            <a class=\"avatar\">
                <img src=\"https://via.placeholder.com/150\" alt=\"User Avatar\">
            </a>
            <div class=\"content\">
                <a class=\"author\">Anna</a>
                <div class=\"metadata\">
                    <span class=\"date\">3 hours ago</span>
                </div>
                <div class=\"text\">
                    I recommend looking into dynamic batching and model parallelism. They can help distribute the computation load and reduce latency.
                </div>
                <div class=\"actions\">
                    <a class=\"reply\">Reply</a>
                </div>
            </div>
        </div>

        <!-- Add more comments here -->
    </div>

    <!-- Add Reply Form -->
    <form class=\"ui reply form\">
        <div class=\"field\">
            <textarea placeholder=\"Add your reply...\"></textarea>
        </div>
        <button class=\"ui primary button\" type=\"submit\">Post Reply</button>
    </form>
</div>
";
    }

    // line 80
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 81
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
        return "pages/join_discussion.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 81,  129 => 80,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/join_discussion.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/join_discussion.html");
    }
}
