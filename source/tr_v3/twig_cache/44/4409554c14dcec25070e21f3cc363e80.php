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

/* framework/file_manager.html */
class __TwigTemplate_792f49652dd5757699d0c3f4eaedba0d extends Template
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
        return "_layout_filemanager.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_filemanager.html", "framework/file_manager.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"/css/bulma/bulma-switch.min.css\">
<script src=\"//unpkg.com/alpinejs\" defer></script>
<script src=\"https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/filesize/9.0.11/filesize.min.js\"></script>

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-html.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-javascript.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-css.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-markdown.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-monokai.min.js\"></script>

<!-- BULMA TOAST -->
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css\" />
<script src=\"https://cdn.jsdelivr.net/npm/bulma-toast@2.4.1/dist/bulma-toast.min.js\"></script>

<style>

    a {
    color: #FB8501;
    }

    #editor {
        width: 100%;
        height: 500px;
    }

    input:checked~.dot {
        transform: translateX(100%);
        background-color: #F59E0C;
    }

    .file-manager-files td:first-child, .file-manager-files th:first-child {
        width: 70%;
    }

    .file-manager-files a:hover {
        text-decoration: underline;
        color: white;
    }

    .file-manager-files td {
        padding: 10px;
        border-bottom: 1px solid #222222;
    }

    .file-manager-files tr:hover {
        background: #242424;
    }

    .folder-item {
        align-items: center;
    }

    .folder-item:hover {
        background: #888888;
    }

    input::placeholder {
        opacity: 0.5;
        color: white !important;
    }

    table {
        table-layout: fixed;
    }

    .modal-search-table tbody tr:hover {
        background: #242424;
    }

    .modal-search-table td {
        padding: 10px;
        border-bottom: 1px solid #222222;
    }

    .modal-search-table td:first-child, .modal-search-table th:first-child {
        width: 80%;
    }

    .modal-search-table tbody a:hover {
        text-decoration: underline;
        color: white;
    }

    .modal-search-table td:first-child .filename {
        white-space: nowrap;
        width: 80%;
        display: inline-block;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    span.file-manager-filename-display {
        white-space: nowrap;
        width: 80%;
        display: inline-block;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    a.rename-this-folder:hover {
        text-decoration: underline;
        color: white;
    }

    a.navigation-item:hover {
        text-decoration: underline;
        color: white;
    }

    .file-upload {
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        position: absolute;
    }

    /* MODAL START */
</style>
";
    }

    // line 130
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 131
        echo "<section x-data=\"main\" x-cloak x-init=\"fetchContext()\" class=\"p-4 has-background-black\" style=\"min-height: 500px;\">

<!-- MODAL: MOVE -->
<div x-show=\"showMoveModal\" x-transition :class=\"showMoveModal?'is-active':''\" class=\"modal\">
    <div class=\"modal-background\"></div>
    <div @click.away=\"showMoveModal = false\" class=\"modal-card\">
      <header class=\"modal-card-head\">
        <p class=\"modal-card-title\">Move \"<span x-text=\"selectedFileToMove\"></span>\" in \"<span x-text=\"getCurrentFolderName()\"></span>\"</p>
        <button @click=\"showMoveModal = false\" class=\"delete\" aria-label=\"close\"></button>
      </header>
      <section class=\"modal-card-body\">

        <div class=\"field\">
            <label class=\"label\">Enter new path</label>
            <div class=\"control\">
              <input x-model=\"newFilePathToMove\" autofocus=\"on\" class=\"input\" type=\"text\" placeholder=\"/new/path\">
            </div>
            <div id=\"modalMoveError\" class=\"help is-invisible has-text-danger\"></div>
        </div>
      </section>
      <footer class=\"modal-card-foot\">
        <button @click=\"moveFile(selectedFileToMove, newFilePathToMove)\" class=\"button is-success\">Move</button>
        <button @click=\"showMoveModal = false\" class=\"button\">Cancel</button>
      </footer>
    </div>
  </div>


<!-- MODAL: SEARCH -->
<div x-show=\"showSearchModal\" x-transition :class=\"showSearchModal?'is-active':''\" class=\"modal\">
    <div class=\"modal-background\"></div>
    <div @click.away=\"showSearchModal = false\" class=\"modal-card\">
      <header class=\"modal-card-head\">
        <p class=\"modal-card-title\">Search folder in \"<span x-text=\"getCurrentFolderName()\"></span>\"</p>
        <button @click=\"showSearchModal = false\" class=\"delete\" aria-label=\"close\"></button>
      </header>
      <section class=\"modal-card-body has-background-black\">

        <div class=\"field has-addons has-addons-centered\">
            <p class=\"control\">
                <a @click=\"searchString = ''\" class=\"button\">
                    Reset
                </a>
            </p>
            <p class=\"control is-expanded has-icons-left\">
                <input x-model=\"searchString\" class=\"input has-text-white is-fullwidth has-background-black-ter is-fullwidth\"
                    style=\"border: none;\" type=\"text\" placeholder=\"Search string\">
                    <span class=\"icon is-small is-left\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"width: 20px; height: 20px;\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"white\" stroke-width=\"2\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z\"></path>
                        </svg>
                    </span>
            </p>
            <p class=\"control\">
                <a @click=\"fileSearch(searchString)\" class=\"button is-primary\">
                    Search
                </a>
            </p>
        </div>

        <table class=\"has-text-white modal-search-table\" width=\"100%\">
            <thead class=\"\">
                <tr>
                    <th scope=\"col\" class=\"p-2 has-text-white\">Filename</th>
                    <th scope=\"col\" class=\"p-2 has-text-white\">Actions</th>
                </tr>
            </thead>
            <tbody
                class=\"\">
                <template x-for=\"i in searchResults\">
                    <tr class=\"\">
                        <td
                            class=\"\">
                            <div class=\"flex items-center\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"width: 20px; height: 20px;\"
                                    fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"white\"
                                    stroke-width=\"2\">
                                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\"
                                        d=\"M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\" />
                                </svg>
                                <span class=\"ml-3 filename\" x-text=\"i\"></span>
                            </div>
                        </td>
                        <td
                            class=\"\">
                            <div class=\"btn-group\" role=\"group\">
                                <a @click=\"goToFile(i), showSearchModal = false\"
                                    class=\"\">Go
                                    to file</a>
                            </div>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
      </section>
      <footer class=\"modal-card-foot\">
        <button @click=\"showSearchModal = false\" class=\"button\">Close</button>
      </footer>
    </div>
  </div>


<!-- MODAL: EDIT -->
<div x-show=\"showEditModal\" x-transition :class=\"showEditModal?'is-active':''\" class=\"modal\">
    <div class=\"modal-background\"></div>
    <div class=\"modal-card\" style=\"width: 100%;\">
      <header class=\"modal-card-head\">
        <p class=\"modal-card-title\">Editing \"<span x-text=\"selectedFileToEdit\"></span>\" in \"<span x-text=\"getCurrentFolderName()\"></span>\"</p>
        <button @click=\"showEditModal = false\" class=\"delete\" aria-label=\"close\"></button>
      </header>
      <section class=\"modal-card-body p-0\" style=\"overflow: hidden;\">
        <div id=\"editor\"></div>
      </section>
      <footer class=\"modal-card-foot\">
        <button @click=\"updateFile(selectedFileToEdit)\" class=\"button is-success\">Submit</button>
        <button @click=\"showEditModal = false\" class=\"button\">Cancel</button>
      </footer>
    </div>
  </div>


    <div class=\"columns\">
        <div class=\"column is-one-quarter\">
            <div class=\"title has-text-white is-5 mb-4\">Folders</div>
            <div class=\"title has-text-white is-6 mb-2\">Current path</div>

            <!-- BREADCRUMBS -->
            <div class=\"is-flex items-center\">
                <div>
                    <a @click=\"navigatePublicRoot()\" class=\"cursor-pointer\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"width: 20px; height: 20px;\" fill=\"none\"
                            viewBox=\"0 0 24 24\" stroke=\"white\" stroke-width=\"2\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\"
                                d=\"M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6\" />
                        </svg>
                    </a>
                </div>
                <span class=\"mx-2 has-text-white\">/</span>
                <template x-for=\"(i, index) in currentPathArray\">
                    <div style=\"display: inline-block; white-space: nowrap;\">
                        <a @click=\"navigateSlice(index)\"
                            class=\"navigation-item\" x-text=\"i\"></a>
                        <span class=\"mx-1\">/</span>
                    </div>
                </template>
            </div>

            <div class=\"my-4 flex flex-col\">
                <div @click=\"navigateUp()\" class=\"is-clickable py-2 px-2 folder-item has-text-white\">
                    ..
                </div>
                <template x-for=\"folder in folders\">
                    <div @click=\"navigateFolder(folder)\"
                        class=\"folder-item is-clickable is-flex items-center py-2 px-2 whitespace-nowrap\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"width: 20px; height: 20px;\" fill=\"none\"
                            viewBox=\"0 0 24 24\" stroke=\"white\" stroke-width=\"2\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\"
                                d=\"M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z\" />
                        </svg>
                        <span class=\"has-text-white ml-3\" x-text=\"folder\"></span>
                    </div>
                </template>
            </div>

            <div class=\"field\">
                <p class=\"control is-expanded has-icons-left\">
                    <input @keyup.enter=\"showSearchModal = true, fileSearch(searchString)\" x-model=\"searchString\"
                        class=\"input has-text-white has-background-black is-fullwidth\" type=\"text\"
                        placeholder=\"Search file containing...\">
                    <span class=\"icon is-small is-left\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"width: 20px; height: 20px;\" fill=\"none\"
                            viewBox=\"0 0 24 24\" stroke=\"white\" stroke-width=\"2\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\"
                                d=\"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z\" />
                        </svg>
                    </span>
                </p>
            </div>

            <div class=\"field has-addons has-addons-centered\">
                <p class=\"control\">
                    <input x-model=\"newFolderName\" class=\"input has-text-white has-background-black-ter is-fullwidth\"
                        style=\"border: none;\" type=\"text\" placeholder=\"Add folder...\">
                </p>
                <p class=\"control\">
                    <a @click=\"addFolder()\" class=\"button is-primary\">
                        +
                    </a>
                </p>
            </div>

            <div class=\"field has-addons has-addons-centered\">
                <p class=\"control\">
                    <input x-model=\"newFileName\" class=\"input has-text-white has-background-black-ter is-fullwidth\"
                        style=\"border: none;\" type=\"text\" placeholder=\"Add file...\">
                </p>
                <p class=\"control\">
                    <a @click=\"addFile()\" class=\"button is-primary\">
                        +
                    </a>
                </p>
            </div>

        </div>

        <!-- MAIN COLUMN -->
        <div class=\"column\">
            <div class=\"title is-5 has-text-white mb-4\">Upload New Files</div>

            <!-- UPLOADER -->
            <div class=\"my-3\">

                <div class=\"flex flex-col flex-grow mb-3\">

                    <div id=\"FileUpload\"
                        class=\"is-relative has-background-black-ter\">

                        <input type=\"file\" multiple
                            class=\"file-upload\"
                            x-on:change=\"files = \$event.target.files; uploadAll(\$event.target.files);\"
                            x-on:dragover=\"\$el.classList.add('active')\" x-on:dragleave=\"\$el.classList.remove('active')\"
                            x-on:drop=\"\$el.classList.remove('active')\">
                        <template x-if=\"files !== null\">
                            <div class=\"flex flex-col space-y-1\">
                                <template x-for=\"(_,index) in Array.from({ length: files.length })\">
                                    <div class=\"flex flex-row items-center space-x-2\">
                                        <template x-if=\"files[index].type.includes('audio/')\"><i
                                                class=\"far fa-file-audio fa-fw\"></i></template>
                                        <template x-if=\"files[index].type.includes('application/')\"><i
                                                class=\"far fa-file-alt fa-fw\"></i></template>
                                        <template x-if=\"files[index].type.includes('image/')\"><i
                                                class=\"far fa-file-image fa-fw\"></i></template>
                                        <template x-if=\"files[index].type.includes('video/')\"><i
                                                class=\"far fa-file-video fa-fw\"></i></template>
                                        <span class=\"font-medium text-gray-900\"
                                            x-text=\"files[index].name\">Uploading</span>
                                        <span class=\"text-xs self-end text-gray-500\"
                                            x-text=\"filesize(files[index].size)\">...</span>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <template x-if=\"files === null\">
                            <div class=\"is-flex is-flex-direction-column space-y-2 items-center justify-center\">
                                <i class=\"fas fa-cloud-upload-alt fa-3x text-currentColor\"></i>
                                <p class=\"has-text-centered my-2 has-text-white\">Drag your files here or click in this
                                    area.</p>
                                <a href=\"javascript:void(0)\" class=\"has-text-centered button is-primary\">Select
                                    a file</a>
                            </div>
                        </template>
                    </div>
                </div>


            </div>

            <div class=\"title is-6 font-bold has-text-white mb-4\">
                Files In This Folder (\"<span class=\"has-text-weight-bold\" x-text=\"getCurrentFolderName()\"></span>\")
                <template x-if=\"getCurrentFolderName() !== 'PUBLIC_ROOT'\">
                    <a @click=\"showRenameFolderInput = true\"
                        class=\"rename-this-folder ml-3\">Rename this folder</a>
                </template>
                <template x-if=\"showRenameFolderInput\">

                    <div class=\"field has-addons has-addons-centered m-5\">
                        <p class=\"control is-expanded\">
                            <input x-model=\"newFolderNameToRename\" class=\"input is-fullwidth has-text-white has-background-black-ter is-fullwidth\"
                                style=\"border: none;\" type=\"text\" placeholder=\"Enter a new folder name\">
                        </p>
                        <p class=\"control\">
                            <a @click=\"renameFolder(newFolderNameToRename)\" class=\"button is-primary\">
                                Save
                            </a>
                        </p>
                    </div>

                </template>
            </div>

            <template x-if=\"items.length == 0\">
                <div class=\"my-3\">
                    <button @click=\"removeFolder()\"
                        class=\"button is-danger\">Remove this
                        folder</button>
                </div>
            </template>

            <!-- TABLE: FILES IN FOLDER-->
            <table class=\"file-manager-files\" width=\"100%;\">
                <thead class=\"\">
                    <tr>
                        <th scope=\"col\"
                            class=\"p-2 has-text-white has-text-left\">
                            Filename </th>
                        <th scope=\"col\" class=\"p-2 has-text-right\">

                            <div class=\"field\">
                                <input x-model=\"deleteMode\"  id=\"switchExample\" type=\"checkbox\" name=\"switchExample\" class=\"switch is-rounded is-success\">
                                <label for=\"switchExample\" class=\"has-text-white\">Toggle Delete</label>
                              </div>

                        </th>
                    </tr>
                </thead>
                <tbody class=\"\">
                    <template x-if=\"items.length == 0\">
                        <tr>
                            <td colspan=2
                                class=\"py-4 px-6\">
                                No file(s) found :(
                            </td>
                        </tr>
                    </template>
                    <template x-for=\"i in items\">
                        <tr class=\"\">
                            <td :class=\"highlightedFile == i?'text-blue-500':'text-gray-500'\"
                                class=\"has-text-white\">
                                <div class=\"flex items-center\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"width: 20px; height: 20px;\"
                                        fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"white\" stroke-width=\"2\">
                                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\"
                                            d=\"M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\" />
                                    </svg>
                                    <span class=\"ml-3 file-manager-filename-display\" x-text=\"i\"></span>
                                </div>
                                <template x-if=\"selectedFileToRename == i\">
                                    <input x-model=\"newFileNameToRename\" autofocus class=\"m-4 input has-background-black-ter\"
                                        placeholder=\"Enter a new filename\" />
                                </template>
                            </td>
                            <td class=\"has-text-right\">
                                <div class=\"btn-group\" role=\"group\">
                                    <template x-if=\"selectedFileToRename !== i\">
                                        <a @click=\"selectedFileToRename = i\"
                                            class=\"mr-3\">Rename</a>
                                    </template>
                                    <template x-if=\"selectedFileToRename == i\">
                                        <span>
                                            <a @click=\"renameFile(selectedFileToRename, newFileNameToRename)\"
                                                class=\"mr-3 has-text-success has-text-weight-bold\">Update</a>
                                            <a @click=\"newFileNameToRename = '', selectedFileToRename = null\"
                                                class=\"mr-3 has-text-white has-text-weight-bold\">Close</a>
                                        </span>
                                    </template>
                                    <a @click=\"showMoveModal = true, selectedFileToMove = i\"
                                        class=\"mr-3\">Move</a>
                                    <a @click=\"showEditModal = true, selectedFileToEdit = i, fetchFileContent(i)\"
                                        class=\"mr-3\">Edit</a>
                                    <template x-if=\"deleteMode\">
                                        <a @click=\"deleteFile(i)\"
                                            class=\"mr-3\">Delete</a>
                                    </template>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

        </div>
    </div>
</section>
";
    }

    // line 497
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 498
        echo "<script defer>

    var aceEditor;

    document.addEventListener('alpine:init', () => {

        aceEditor = ace.edit(\"editor\");
        aceEditor.setTheme(\"ace/theme/monokai\");
        aceEditor.session.setMode(\"ace/mode/html\");
        aceEditor.setOptions({
            maxLines: 25,
            minLines: 20
        });

        Alpine.data('main', () => ({
            files: null, // For uploader
            items: [],
            folders: [],
            deleteMode: false,
            currentPathArray: [],
            newFolderName: '',
            newFileName: '',
            showEditModal: false,
            selectedFileToRename: null,
            newFileNameToRename: '',
            showRenameFolderInput: false,
            newFolderNameToRename: '',
            selectedFileToEdit: null,
            showSearchModal: false,
            searchString: '',
            searchResults: [],
            highlightedFile: null, // For search
            showMoveModal: false,
            selectedFileToMove: null,
            newFilePathToMove: '',
            getCurrentFolderName() {
                if (this.currentPathArray.length > 0) {
                    return this.currentPathArray[this.currentPathArray.length - 1]
                } else {
                    return 'PUBLIC_ROOT'
                }
            },
            /* SUPPORT FOR GET PARAMS USAGE */ 
            init() {
                let queryString = window.location.search;
                let urlParams = new URLSearchParams(queryString);

                let path = urlParams.get('path') // views/templates/email
                if(path) {
                    this.currentPathArray = path.split('/');
                    this.fetchContext();
                }

                let filename = urlParams.get('filename') // sample.html
                if(filename) {
                    this.showEditModal = true
                    this.selectedFileToEdit = filename;
                    this.fetchFileContent(filename);
                }
                
            },
            /*
            - Used in breadcrumbs
            */
            async navigateSlice(index) {
                this.currentPathArray = this.currentPathArray.slice(0, index + 1)
                this.fetchContext()
            },
            async navigatePublicRoot() {
                this.currentPathArray = []
                this.fetchContext()
            },
            async navigateUp() {
                this.currentPathArray.pop()
                this.fetchContext()
            },
            async navigateFolder(folder) {
                this.currentPathArray.push(folder)
                this.fetchContext()
            },
            async fetchContext() {
                let path = '/' + this.currentPathArray.join('/')
                let r = await axios.get('/framework/admin/file-manager/scan', {
                    params: {
                        path: path
                    }
                })
                this.items = r.data.files
                this.folders = r.data.folders
            },
            /*
            - For editing
            */
            async fetchFileContent(filename) {
                let path = '/' + this.currentPathArray.join('/') + '/' + filename
                let r = await axios.get('/framework/admin/file-manager/content', {
                    params: {
                        path: path
                    }
                })

                /* OPTIONALLY CHANGE ACE EDITOR MODE */
                let fileExt = filename.substring(filename.lastIndexOf('.') + 1, filename.length) || filename;
                switch (fileExt) {
                    case 'html':
                        aceEditor.session.setMode(\"ace/mode/html\");
                        break;
                    case 'js':
                        aceEditor.session.setMode(\"ace/mode/javascript\");
                        break;
                    case 'css':
                        aceEditor.session.setMode(\"ace/mode/css\");
                        break;
                    case 'md':
                        aceEditor.session.setMode(\"ace/mode/markdown\");
                        break;
                    default:
                        aceEditor.session.setMode(\"ace/mode/html\");
                }

                aceEditor.setValue(r.data.content)
            },
            async renameFile(oldFilename, newFilename) {
                let path_old = '/' + this.currentPathArray.join('/') + '/' + oldFilename
                let path_new = '/' + this.currentPathArray.join('/') + '/' + newFilename

                let formData = new FormData()
                formData.append('path_old', path_old)
                formData.append('path_new', path_new)
                let r = await axios.post('/framework/admin/file-manager/rename', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    let indexItem = this.items.indexOf(oldFilename)
                    this.items[indexItem] = newFilename
                    this.newFileNameToRename = ''
                    this.selectedFileToRename = null
                    // toaster.pop({ message: `File renamed: \${newFilename}`, class: 'green' })
                    bulmaToast.toast({ message: `File renamed: \${newFilename}` })
                }
            },
            async addFile() {
                let path = '/' + this.currentPathArray.join('/') + '/' + this.newFileName
                let formData = new FormData()
                formData.append('path', path)
                let r = await axios.post('/framework/admin/file-manager/file/new', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    this.items.push(this.newFileName)
                    // toaster.pop({ message: `New file added successfully: \${this.newFileName}`, class: 'green' })
                    bulmaToast.toast({ message: `New file added successfully: \${this.newFileName}` })
                    this.newFileName = ''
                }
            },
            async updateFile(filename) {
                let path = '/' + this.currentPathArray.join('/') + '/' + filename
                let formData = new FormData()
                formData.append('path', path)
                formData.append('content', aceEditor.getValue())
                let r = await axios.post('/framework/admin/file-manager/file/update', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    this.selectedFileToEdit = null
                    this.showEditModal = false
                    // toaster.pop({ message: `File updated successfully: \${filename}`, class: 'green' })
                    bulmaToast.toast({ message: `File updated successfully: \${filename}` })
                }
            },
            async renameFolder(newFoldername) {
                let path_old = '/' + this.currentPathArray.join('/')
                let mutableCurrentPathArray = [...this.currentPathArray]
                let oldFoldername = mutableCurrentPathArray.pop()
                if (oldFoldername == undefined) {
                    return
                }

                let path_new = '/' + mutableCurrentPathArray.join('/') + '/' + newFoldername

                let formData = new FormData()
                formData.append('path_old', path_old)
                formData.append('path_new', path_new)
                let r = await axios.post('/framework/admin/file-manager/rename', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    this.currentPathArray.pop()
                    this.currentPathArray.push(newFoldername)
                    this.newFolderNameToRename = ''
                    this.showRenameFolderInput = false
                    // toaster.pop({ message: `Folder renamed from \${oldFoldername} to \${newFoldername}`, class: 'green' })
                    bulmaToast.toast({ message: `Folder renamed from \${oldFoldername} to \${newFoldername}` })
                }
            },
            async addFolder() {
                let path = '/' + this.currentPathArray.join('/') + '/' + this.newFolderName
                let formData = new FormData()
                formData.append('path', path)
                let r = await axios.post('/framework/admin/file-manager/folder/new', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    this.folders.push(this.newFolderName)
                    // toaster.pop({ message: `Folder added successfully: \${this.newFolderName}`, class: 'green' })
                    bulmaToast.toast({ message: `Folder added successfully: \${this.newFolderName}` })
                    this.newFolderName = ''
                }
            },
            /*
            - Removes folder at current location in navigator
            */
            async removeFolder() {
                let path = '/' + this.currentPathArray.join('/')
                let formData = new FormData()
                formData.append('path', path)
                let r = await axios.post('/framework/admin/file-manager/folder/remove', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }

                if (r.data.message == 'ok') {
                    this.navigateUp()
                    // toaster.pop({ message: 'Folder removed!', class: 'green' })
                    bulmaToast.toast({ message: 'Folder removed!' })
                }
            },
            async deleteFile(filename) {
                let path = '/' + this.currentPathArray.join('/') + '/' + filename
                let r = await axios.delete('/framework/admin/file-manager', { data: { path: path } })
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    this.items.splice(this.items.indexOf(filename), 1)
                    // toaster.pop({ message: `\"\${filename}\" removed!`, class: 'green' })
                    bulmaToast.toast({ message: `\"\${filename}\" removed!` })
                }
            },
            /* Uploads multiple files determined by PHP Max Upload Size Per Post */
            async uploadAll(files) {

                let filesArray = Array.from(files);
                filesArray.forEach((file) => {
                    // toaster.pop({ message: `Uploading \${file.name} ..`, class: 'blue' })
                    bulmaToast.toast({ message: `Uploading \${file.name} ..` })
                })

                let path = '/' + this.currentPathArray.join('/')

                let formData = new FormData()
                formData.append('path', path)

                filesArray.forEach((file, index) => {
                    formData.append('file[]', file, file.name)
                })

                let r = await axios.post('/framework/admin/file-manager/upload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })

                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }

                if ('files' in r.data) {
                    r.data.files.forEach(i => {

                        this.items.push(i)
                    })
                }
            },
            /*
            - Search file with file_searcher.php
            */
            async fileSearch(str) {
                let path = '/' + this.currentPathArray.join('/')
                let r = await axios.get(`/file_searcher.php?path=\${path}&query=\${str}`)
                this.searchResults = r.data.rows
            },
            /*
            - Used by search, splits file path and navigate to path
            */
            async goToFile(path) {
                path = path.substring(1); // Removes first slash
                let pathArray = path.split('/')
                let filename = pathArray.pop()
                this.highlightedFile = filename
                this.currentPathArray = pathArray
                await this.fetchContext()
            },
            async moveFile(filename, newFoldername) {

                let el = document.getElementById('modalMoveError')

                if (newFoldername[0] !== '/') {
                    el.innerText = 'New path must begin with a / !'
                    el.classList.remove('is-invisible')
                    window.setTimeout(() => {
                        el.innerText = ''
                        el.classList.add('is-invisible')
                    }, 3000)
                    return
                }

                let path_old = '/' + this.currentPathArray.join('/') + '/' + filename
                let path_new = newFoldername + '/' + filename

                let formData = new FormData()
                formData.append('path_old', path_old)
                formData.append('path_new', path_new)
                let r = await axios.post('/framework/admin/file-manager/rename', formData)
                if (r.data.error) {
                    // toaster.pop({ message: r.data.message, class: 'red' })
                    bulmaToast.toast({ message: r.data.message })
                }
                if (r.data.message == 'ok') {
                    let indexItem = this.items.indexOf(filename)
                    this.items.splice(indexItem, 1)
                    this.newFilePathToMove = ''
                    this.selectedFileToMove = null
                    this.showMoveModal = false
                    // toaster.pop({ message: `File \"\${filename}\" moved to \"\${newFoldername}\"`, class: 'green' })
                    bulmaToast.toast({ message: `File \"\${filename}\" moved to \"\${newFoldername}\"` })
                }
            }
        }))
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "framework/file_manager.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  556 => 498,  552 => 497,  184 => 131,  180 => 130,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "framework/file_manager.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/framework/file_manager.html");
    }
}
