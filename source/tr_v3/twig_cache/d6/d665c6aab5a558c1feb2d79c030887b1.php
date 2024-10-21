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

/* discussion-board/views/admin/categories.html */
class __TwigTemplate_4d44090b39ea9c1a0143e9e4c6c729e8 extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "discussion-board/views/admin/categories.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main\">
  <div class=\"ui container\">
    <h1>Discussion Board Categories</h1>
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
    </div>

    <!-- FORM ADD -->
    <div class=\"ui blue segment\">
      <div class=\"ui large header\">Add New Category</div>
      <form class=\"ui form\">
        <div class=\"field\">
          <label>Category Name</label>
          <input x-model=\"input.name\" type=\"text\" name=\"category-name\" placeholder=\"Category Name\">
        </div>
        <button @click=\"submitAdd()\" type=\"button\" class=\"ui button\">Submit</button>
      </form>
    </div>

    <!-- FORM EDIT -->
    <template x-if=\"selected\">
      <div class=\"ui blue segment\">
        <div class=\"ui large header\">Edit Category</div>
        <form class=\"ui form\">
          <div class=\"field\">
            <label>Category Name</label>
            <input x-model=\"selected.name\" type=\"text\" name=\"category-name\" placeholder=\"Category Name\">
          </div>
          <button @click=\"submitEdit()\" type=\"button\" class=\"ui button\">Update</button>
        </form>
      </div>
    </template>

    <!-- TABLE -->
    <table class=\"ui celled table\">
      <thead>
        <tr>
          <th>Name</th>
          <th>Action(s)</th>
        </tr>
      </thead>
      <tbody>
        <template x-for=\"i in rows\">
          <tr>
            <td data-label=\"Name\" x-text=\"i.name\"></td>
            <td data-label=\"Actions\">
              <a @click=\"selected = {...i}\" class=\"ui small button\">
                <i class=\"edit icon\"></i> Edit
              </a>
              <a x-show=\"deleteMode\" @click=\"submitDelete(i.id)\" class=\"ui small button\">
                <i class=\"delete icon\"></i> Delete
              </a>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</main>
";
    }

    // line 79
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 80
        echo "<script defer>
  const API_LIST = '/modules/discussion-board/api/admin/categories.php'
  const API_CREATE = '/modules/discussion-board/api/admin/categories.php'
  const API_UPDATE = '/modules/discussion-board/api/admin/categories.php'
  const API_DELETE = '/modules/discussion-board/api/admin/categories.php'

  document.addEventListener('alpine:init', () => {
    Alpine.data('main', () => ({
      rows: [],
      deleteMode: false,
      input: {
        name: ''
      },
      selected: null,
      init() {
        this.list()
      },
      async list() {
        \$.toast({ message: 'Fetching list..' });

        let r = await axios.get(API_LIST)

        if (r.data.message == 'success') {
          this.rows = r.data.rows
          \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
        }
      },
      clearInput() {
        this.input.name = ''
      },
      async submitAdd() {

        let fd = new FormData();
        fd.append('name', this.input.name);
        let r = await axios.post(API_CREATE, fd)

        if (r.data.error == true) {
          \$.toast({ class: 'error', message: r.data.message });
          return;
        }

        if (r.data.message == 'success') {
          \$.toast({ class: 'success', message: 'New category added successfully' });
          this.rows.push({
            id: r.data.lastId,
            name: this.input.name
          })
          this.clearInput();
        }
      },
      async submitEdit() {
        
        let jsonData = {
            id: this.selected.id,
            name: this.selected.name
        }

        let r = await axios.put(API_UPDATE, jsonData)
        
        if (r.data.error == true) {
          \$.toast({ class: 'error', message: r.data.message });
          return;
        }

        if (r.data.message == 'success') {
          \$.toast({ class: 'success', message: 'Category updated successfully' });
          this.rows.splice(this.rows.findIndex((i) => i.id == this.selected.id), 1, this.selected);
          this.selected = null;
        }
      },
      async submitDelete(id) {

        let r = await axios.delete(API_DELETE, { params: { id: id } })

        if (r.data.message == 'success') {
          this.rows.splice(this.rows.findIndex((i) => i.id == id), 1)
          \$.toast({ class: 'success', message: 'Category removed!' });
        }
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "discussion-board/views/admin/categories.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 80,  128 => 79,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "discussion-board/views/admin/categories.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/discussion-board/views/admin/categories.html");
    }
}
