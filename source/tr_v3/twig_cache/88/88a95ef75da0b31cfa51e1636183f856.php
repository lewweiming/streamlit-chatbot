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

/* framework/dashboard/articles/index.html */
class __TwigTemplate_143c23198d3631707e98604f8f424c95 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "framework/dashboard/articles/index.html", 1);
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
    <h1>Manage Awesome Articles</h1>
    <p>This page application is based on CRUD Paginated.</p>

    <!-- TOOLBAR -->
    <div class=\"ui secondary menu\">
      <div class=\"item\">
        <div class=\"ui toggle checkbox\">
          <input @click=\"deleteMode = !deleteMode\" type=\"checkbox\">
          <label>Toggle delete mode</label>
        </div>
      </div>

      <div class=\"item\">
        <a @click=\"list()\" class=\"ui small button\">
          <i class=\"refresh icon\"></i> Refresh
        </a>
      </div>

      <div class=\"item\">
        <div class=\"ui input\">
          <input @keyup.enter=\"performSearch()\" x-model=\"filterInput.title\" type=\"text\" placeholder=\"Search by title\">
        </div>
      </div>

      <div class=\"item\">
        <div class=\"ui labeled input\">
          <div class=\"ui label\">Find articles tagged with</div>
          <select @change=\"performSearch()\" x-model=\"filterInput.tags\" class=\"ui selection dropdown\">
            <option value=\"\">Any</option>
            <option>People</option>
            <option>Climate Change</option>
          </select>
        </div>
      </div>

      <div class=\"item\">
        <a href=\"/framework/admin/articles/create\" class=\"ui small primary button\">
          <i class=\"add icon\"></i> Add new
        </a>
      </div>
    </div>

    <!-- ITEMS -->
    <div class=\"ui divided items\">
      <template x-for=\"i in rows\">
        <div class=\"item\">
          <div class=\"image\">
            <img :src=\"i.thumbnail_path?i.thumbnail_path:'http://via.placeholder.com/300x300'\">
          </div>
          <div class=\"content\">
            <a class=\"header\" x-text=\"i.title\"></a>
            <div class=\"meta\">
              <div class=\"\">Updated on <span x-text=\"convertDate(i.updated_at)\"></span>, ID: <span x-text=\"i.id\"></span>
              </div>
            </div>
            <div class=\"description\">
              <template x-if=\"i.tags\">
                <template x-for=\"tag in i.tags.split(',')\">
                  <div class=\"ui label\" x-text=\"tag\"></div>
                </template>
              </template>
            </div>
            <div class=\"extra\">
              <a :href=\"i.source_url\" target=\"blank\" class=\"ui small primary button\">
                Link
              </a>
              <a :href=\"`/framework/admin/article/\${i.id}/comments`\" class=\"ui small primary button\">
                Comments
              </a>
              <a :href=\"`/framework/admin/article/\${i.id}`\" class=\"ui small button\">
                <i class=\"edit icon\"></i> Edit
              </a>
              <a :href=\"`/framework/admin/article/\${i.id}/images`\" class=\"ui small button\">
                <i class=\"image icon\"></i> Photos
              </a>
              <a x-show=\"deleteMode\" @click=\"submitDelete(i.id)\" class=\"ui small button\">
                <i class=\"delete icon\"></i> Delete
              </a>
            </div>
          </div>
        </div>
      </template>
    </div>

    <!-- PAGINATION -->
    <div class=\"ui pagination menu\">
      <a @click=\"getPrevious()\" class=\"icon item\">
        <i class=\"left chevron icon\"></i>
      </a>
      <template x-for=\"i in maxPage\">
        <a @click=\"currentPage = i, listPaginated(currentPage)\" :class=\"i == currentPage?'active':''\" class=\"item\"
          x-text=\"i\"></a>
      </template>
      <a @click=\"getNext()\" class=\"icon item\">
        <i class=\"right chevron icon\"></i>
      </a>
    </div>

  </div>

</main>
";
    }

    // line 115
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 116
        echo "
<script defer>

  const ITEMS_PER_PAGE = 12 // DEFAULT 12

  const API_LIST = '/api/x2-framework/articles/list.php'
  const API_LIST_PAGINATED = '/api/x2-framework/articles/list_paginated.php'
  const API_UPDATE = '/api/x2-framework/articles/update.php'
  const API_DELETE = '/api/x2-framework/articles/delete.php'

  document.addEventListener('alpine:init', () => {

    Alpine.data('main', () => ({
      rows: [],
      deleteMode: false,
      selected: null,
      init() {
        this.listPaginated(this.currentPage)
      },
      async list() {
        \$.toast({ message: 'Fetching list..' });

        let r = await axios.get(API_LIST)

        if (r.data.message == 'success') {
          this.rows = r.data.rows
          \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
        }
      },
      async submitDelete(id) {
        let fd = new FormData();
        fd.append('id', id);
        let r = await axios.post(API_DELETE, fd)

        if (r.data.message == 'success') {
          this.rows.splice(this.rows.findIndex((i) => i.id == id), 1)
          \$.toast({ class: 'success', message: 'Entry removed!' });
        }
      },
      convertDate(mysqlTimestamp) {
        // Assuming your MySQL timestamp is in the format 'YYYY-MM-DD HH:MM:SS'
        const date = new Date(mysqlTimestamp);
        const options = { day: 'numeric', month: 'short', year: '2-digit' };
        const formattedDate = date.toLocaleDateString('en-GB', options);
        return formattedDate;
      },
      /* FILTER SUPPORT */
      filterInput: {
        name: '',
        tags: ''
      },
      /* PAGINATION SUPPORT */
      currentPage: 1,
      maxPage: null,
      performSearch() {
        \$.toast({ message: 'Performig filter search..' });
        this.resetCurrentPage()
        this.listPaginated(this.currentPage)
      },
      setMaxPage(count) {
        count = parseInt(count)
        this.maxPage = Math.ceil(count / ITEMS_PER_PAGE)
      },
      async listPaginated(page) {

        \$.toast({ message: 'Fetching list..' });

        let r = await axios.get(API_LIST_PAGINATED, {
          params: {
            page: page,
            filters: JSON.stringify(this.filterInput)
          }
        })

        if (r.data.message == 'success') {
          this.rows = r.data.rows
          \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
          this.setMaxPage(r.data.count)
        }
      },
      getNext() {
        if (this.currentPage < this.maxPage) {
          this.currentPage++
          this.listPaginated(this.currentPage)
        }
      },
      getPrevious() {
        if (this.currentPage > 1) {
          this.currentPage--
          this.listPaginated(this.currentPage)
        }
      },
      resetCurrentPage() {
        this.currentPage = 1
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "framework/dashboard/articles/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 116,  170 => 115,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "framework/dashboard/articles/index.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/dashboard/articles/index.html");
    }
}
