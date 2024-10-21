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

/* discussion-board/views/add_discussion.html */
class __TwigTemplate_a9a0cfe2a042c8611e7f84fa980df94f extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "discussion-board/views/add_discussion.html", 1);
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
    <div class=\"active section\">Add Discussion</div>
</div>
<div class=\"ui hidden divider\"></div>

<div class=\"\">
    <h2 class=\"ui header\">Add New Discussion</h2>
    <form class=\"ui form\" action=\"/discussion-board/add\" method=\"POST\">
        <div class=\"field\">
            <label>Category</label>
            <input type=\"text\" name=\"category\" placeholder=\"I.e AI & Machine Learning\">
        </div>
        <div class=\"field\">
            <label>Subject</label>
            <textarea name=\"subject\" rows=\"2\" placeholder=\"I.e How to optimize AI models for real-time applications?\"></textarea>
        </div>
        <div class=\"field\">
            <label>Message</label>
            <textarea name=\"message\" rows=\"5\" placeholder=\"I.e I'm looking for ways to optimize large AI models for real-time performance. Any ideas?\"></textarea>
        </div>
        <div class=\"field\">
            <label>Name</label>
            <input type=\"text\" name=\"name\" placeholder=\"I.e Jane\">
        </div>
        <button class=\"ui primary button\" type=\"submit\">Submit</button>
        <button class=\"ui button\" type=\"reset\">Reset</button>
    </form>
</div>
";
    }

    // line 38
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
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
        return "discussion-board/views/add_discussion.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 39,  87 => 38,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "discussion-board/views/add_discussion.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/discussion-board/views/add_discussion.html");
    }
}
