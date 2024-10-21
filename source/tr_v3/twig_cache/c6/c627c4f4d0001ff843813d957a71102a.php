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

/* admin/debugger/admin.html */
class __TwigTemplate_78d135fb15ef86d266ae43006d233dba extends Template
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
        return "_layout_admin.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["title"] = "Debugger Messages";
        // line 1
        $this->parent = $this->loadTemplate("_layout_admin.html", "admin/debugger/admin.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<section x-data=\"main\" data-rows=\"";
        echo twig_escape_filter($this->env, json_encode(($context["rows"] ?? null)));
        echo "\" x-cloak>


    <!-- THE MODAL -->
    <template x-if=\"selectedItem\">
        <div x-show=\"showModal\" x-transition :class=\"showModal?'is-active':''\" class=\"modal\">
            <div class=\"modal-background\"></div>
            <div class=\"modal-card\" style=\"width: 70vw; height: 70vh;\">
                <header class=\"modal-card-head\">
                    <p class=\"modal-card-title\">Debug Info</p>
                    <button @click=\"showModal = false\" class=\"delete\" aria-label=\"close\"></button>
                </header>
                <section class=\"modal-card-body\">
                    <!-- Content ... -->
                    <code>
<pre x-text=\"JSON.stringify(JSON.parse(selectedItem.debug_info),null, 2)\"></pre>
</code>
                </section>
                <footer class=\"modal-card-foot\">
                    <button @click=\"showModal = false\" class=\"button\">Close</button>
                </footer>
            </div>
        </div>
    </template>

    <!-- TOOLBAR -->
    <div class=\"field is-grouped\">
        <p class=\"control is-expanded\">
            <input x-model=\"search\" type=\"text\" class=\"input\" placeholder=\"Search...\" required />
        </p>
    </div>

    <!-- TABLE -->
    <table class=\"table\">
        <thead>

            <tr>
                <th>
                    Id
                </th>
                <th>
                    Source
                </th>
                <th>
                    Title
                </th>
                <th>
                    Is read?
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
                    <td x-text=\"row.source\">
                    </td>
                    <td x-text=\"row.title\">
                    </td>
                    <td>
                        <span x-show=\"row.is_read == 1\" class=\"tag is-light\">Is read</span>
                        <span x-show=\"row.is_read == null || row.is_read == '0'\" class=\"tag is-danger\">Is unread</span>
                    </td>
                    <td x-text=\"row.created_at\"></td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">

                            <a @click=\"selectedItem = row, showModal = true\" class=\"is-clickable mr-3\">View debug
                                info</a>
                            <a :href=\"`/framework/admin/debugger/message/\${ row.id }/delete`\" class=\"mr-3\">Delete</a>
                        </div>
                    </td>

                </tr>
            </template>
        </tbody>
    </table>

</section>
";
    }

    // line 95
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 96
        echo "<script>
    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            search: '',
            selectedItem: null,
            showModal: false,
            rows: [],
            filteredList() {
                return (this.rows).filter((i) => i.title.toLowerCase().includes(this.search.toLowerCase()))
            },
            loadRows() {
                let r = document.querySelector('[data-rows]');
                this.rows = JSON.parse(r.dataset.rows)
            },
            async markMessageAsRead(m) {

                let r = await axios.get(`/framework/admin/debugger/message/\${m.id}/read`)
                bulmaToast.toast({ message: 'Marked as read!' })

                // Update state
                m.is_read = '1';

            },
            init() {
                this.\$nextTick(() => {
                    this.loadRows()
                });

                this.\$watch('selectedItem', (val) => {
                    if (val.is_read == '0' || val.is_read == null) {
                        // then mark as read
                        this.markMessageAsRead(val)
                    }
                })
            }
        }))
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "admin/debugger/admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 96,  147 => 95,  54 => 6,  50 => 5,  45 => 1,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/debugger/admin.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/admin/debugger/admin.html");
    }
}
