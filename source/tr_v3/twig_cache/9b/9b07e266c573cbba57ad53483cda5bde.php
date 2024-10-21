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

/* framework/admin.html */
class __TwigTemplate_2dd0646b5ae8c6b30962169c6d140e38 extends Template
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
        // line 3
        $context["title"] = "Admin (Paginated Articles)";
        // line 1
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "framework/admin.html", 1);
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
                <p class=\"modal-card-title\">Add new article</p>
                <button @click=\"showModalAdd = false\" class=\"delete\" aria-label=\"close\"></button>
            </header>
            <section class=\"modal-card-body\">
                <!-- FORM -->

                <form name=\"addArticle\" action=\"/framework/admin/article\" method=\"post\" class=\"w-full\">

                    <div class=\"field\">
                        <label class=\"label\">Article Title</label>
                        <div class=\"control\">
                            <input class=\"input\" type=\"text\" name=\"title\" placeholder=\"Text input\">
                        </div>
                    </div>

                    <div class=\"field\">
                        <label class=\"label\">Article Source URL</label>
                        <div class=\"control\">
                            <input class=\"input\" type=\"text\" name=\"source_url\" placeholder=\"Text input\">
                        </div>
                    </div>

                    <div class=\"field\">
                        <label class=\"label\">Markdown Body</label>
                        <div class=\"control\">
                            <textarea class=\"textarea\" name=\"markdown_content\"></textarea>
                        </div>
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
        <div class=\"title is-4\">Table Data</div>
        <!-- TOOLBAR -->
        <div class=\"field is-grouped\">
            <p class=\"control is-expanded\">
                <input x-model=\"search\" type=\"text\" class=\"input\" placeholder=\"Search...\" required />
            </p>
            <p class=\"control\">
                <button @click=\"showModalAdd = true\" class=\"button\">Add Article</button>
            </p>
        </div>

        <!-- TABLE -->
        <table class=\"table is-striped\">
            <thead>

                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Article
                    </th>
                    <th>
                        Tags
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        <span class=\"sr-only\">Actions</span>
                    </th>
                </tr>

            </thead>
            <tbody>
                <template x-for=\"row in filteredList()\">
                    <tr>
                        <td x-text=\"row.id\">
                        </td>
                        <td x-text=\"row.title\">
                        </td>
                        <td>
                            <template x-if=\"row.tags\">
                                <div>
                                    <template x-for=\"tag in row.tags.split(',')\">
                                        <span class=\"badge rounded-pill text-bg-dark me-1\" x-text=\"tag\"></span>
                                    </template>
                                </div>
                            </template>
                        </td>
                        <td x-text=\"row.updated_at\"></td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                <a :href=\"`/framework/article/\${ row.id }/preview`\" class=\"mr-3\">Preview</a>
                                <a :href=\"`/framework/admin/article/\${ row.id }`\" class=\"mr-3\">Edit</a>
                                <a :href=\"`/framework/admin/article/\${ row.id }/files`\" class=\"mr-3\">Files</a>
                                <a :href=\"`/framework/admin/article/\${ row.id }/images`\" class=\"mr-3\">Images</a>
                                <a :href=\"`/framework/admin/article/\${ row.id }/delete`\" class=\"mr-3\">Delete</a>
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

    // line 127
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 128
        echo "<script>
    function submit() {
        document.forms[\"addArticle\"].submit();
    }

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            search: '',
            showModalAdd: false,
            rows: ";
        // line 138
        echo json_encode(($context["rows"] ?? null));
        echo ",
        filteredList() {
        return(this.rows).filter((i) => i.title.toLowerCase().includes(this.search.toLowerCase()))
        }
    }))
})
</script>
";
    }

    public function getTemplateName()
    {
        return "framework/admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 138,  187 => 128,  183 => 127,  64 => 10,  60 => 9,  55 => 6,  51 => 5,  46 => 1,  44 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "framework/admin.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/admin.html");
    }
}
