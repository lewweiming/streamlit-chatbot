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

/* admin/pages/admin.html */
class __TwigTemplate_76f89e45b09309e6cc52b0ea0275ed6b extends Template
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
        return "_layout_admin.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["title"] = "Pages Admin (Paginated Articles)";
        // line 1
        $this->parent = $this->loadTemplate("_layout_admin.html", "admin/pages/admin.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<script src=\"https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<section x-data=\"main\" x-cloak>

    <!-- MODAL -->
    <div class=\"modal\" :class=\"showModalAdd?'is-active':''\">
        <div class=\"modal-background\"></div>
        <div class=\"modal-card\">
            <header class=\"modal-card-head\">
                <p class=\"modal-card-title\">Add new page</p>
                <button @click=\"showModalAdd = false\" class=\"delete\" aria-label=\"close\"></button>
            </header>
            <section class=\"modal-card-body\">
                <!-- FORM -->

                <form name=\"addArticle\" action=\"/framework/admin/pages/add\" method=\"post\" class=\"w-full\">

                    <div class=\"field\">
                        <label class=\"label\">Page Filename</label>
                        <div class=\"control\">
                            <input class=\"input\" type=\"text\" name=\"filename\" placeholder=\"Text input\">
                        </div>
                        <p class=\"help\">E.g _example.html</p>
                    </div>
                </form>
            </section>
            <footer class=\"modal-card-foot\">
                <button onclick=\"submit()\" type=\"button\" class=\"button is-success\">Submit</button>
                <button @click=\"showModalAdd = false\" class=\"button\">Cancel</button>
            </footer>
        </div>
    </div>


    <div class=\"box\">
        <div class=\"title is-4\">Table Data - <span x-text=\"rows.length\"></span> page(s) found.</div>
        <!-- TOOLBAR -->
        <div class=\"field is-grouped\">
            <p class=\"control is-expanded\">
                <input x-model=\"search\" type=\"text\" class=\"input\" placeholder=\"Search...\" required />
            </p>
            <p class=\"control\">
                <button @click=\"showModalAdd = true\" class=\"button\">Add Page</button>
            </p>
        </div>

        <!-- TABLE -->
        <table class=\"table is-striped\">
            <thead>

                <tr>
                    <th>
                        Page
                    </th>
                    <th>
                        <span class=\"sr-only\">Actions</span>
                    </th>
                </tr>

            </thead>
            <tbody>
                <template x-for=\"row in filteredList()\">
                    <tr>
                        <td x-text=\"row\">
                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                <a :href=\"`/framework/admin/pages/edit?page=\${ row }`\" class=\"mr-3\">Edit</a>
                                <a :href=\"`/framework/admin/pages/delete?page=\${ row }`\" class=\"mr-3\">Delete</a>
                            </div>
                        </td>

                    </tr>
                </template>
            </tbody>
        </table>

    </div>

</section>
";
    }

    // line 90
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 91
        echo "<script>
    function submit() {
        document.forms[\"addArticle\"].submit();
    }

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            search: '',
            showModalAdd: false,
            rows: ";
        // line 101
        echo json_encode(($context["rows"] ?? null));
        echo ",
        filteredList() {
        return(this.rows).filter((i) => i.toLowerCase().includes(this.search.toLowerCase()))
        }
    }))
})
</script>
";
    }

    public function getTemplateName()
    {
        return "admin/pages/admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 101,  150 => 91,  146 => 90,  64 => 10,  60 => 9,  55 => 6,  51 => 5,  46 => 1,  44 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/pages/admin.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/admin/pages/admin.html");
    }
}
