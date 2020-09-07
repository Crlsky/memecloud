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

/* modal.html.twig */
class __TwigTemplate_9b447f6e5e1390b7fc15b6cd116f477c2b6e907ef1a94f0fc68f22ade5c5e3c3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'modal' => [$this, 'block_modal'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modal.html.twig"));

        // line 1
        echo " ";
        $this->displayBlock('modal', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_modal($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "modal"));

        // line 2
        echo "    <!-- Modal create new directory -->
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">New directory</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <input id=\"directoryName\" name=\"directoryName\" type=\"text\" class=\"form-control\" value=\"new_directory\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnAddDirectory\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->

    <!-- Modal add meme -->
    <div class=\"modal fade\" id=\"addMemeModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"addMemeModal\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"addMemeModal\">Add new meme</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <div class=\"mb-3\">
                        <input id=\"memeNameInput\" type=\"text\" class=\"form-control\" value=\"new_meme\" />
                    </div>
                    <div class=\"custom-file\">
                        <input type=\"file\" class=\"custom-file-input\" id=\"customFileLang\" lang=\"en\">
                        <label class=\"custom-file-label\" for=\"customFileLang\">Select meme</label>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnAddMeme\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->

    <!-- Modal rename directory -->
    <div class=\"modal fade\" id=\"renameModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"renameModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Rename directory</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <input id=\"renameName\" name=\"directoryName\" type=\"text\" class=\"form-control\" value=\"\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnRename\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Rename</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->

    <!-- Modal rename image -->
    <div class=\"modal fade\" id=\"renameImgModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"renameImgModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Rename image</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <input id=\"renameImageName\" name=\"directoryName\" type=\"text\" class=\"form-control\" value=\"\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnImgRename\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Rename</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->
    <!-- Popup info  -->
    <div class=\"popupInfo rounded pt-4 pb-4 pl-3 pr-3\">
        <span id=\"popupSpan\"></span>
    </div>
    <!-- Popup info END  -->
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "modal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  55 => 2,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source(" {% block modal %}
    <!-- Modal create new directory -->
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">New directory</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <input id=\"directoryName\" name=\"directoryName\" type=\"text\" class=\"form-control\" value=\"new_directory\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnAddDirectory\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->

    <!-- Modal add meme -->
    <div class=\"modal fade\" id=\"addMemeModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"addMemeModal\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"addMemeModal\">Add new meme</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <div class=\"mb-3\">
                        <input id=\"memeNameInput\" type=\"text\" class=\"form-control\" value=\"new_meme\" />
                    </div>
                    <div class=\"custom-file\">
                        <input type=\"file\" class=\"custom-file-input\" id=\"customFileLang\" lang=\"en\">
                        <label class=\"custom-file-label\" for=\"customFileLang\">Select meme</label>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnAddMeme\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->

    <!-- Modal rename directory -->
    <div class=\"modal fade\" id=\"renameModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"renameModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Rename directory</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <input id=\"renameName\" name=\"directoryName\" type=\"text\" class=\"form-control\" value=\"\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnRename\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Rename</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->

    <!-- Modal rename image -->
    <div class=\"modal fade\" id=\"renameImgModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"renameImgModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Rename image</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <input id=\"renameImageName\" name=\"directoryName\" type=\"text\" class=\"form-control\" value=\"\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                    <button id=\"btnImgRename\" type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Rename</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->
    <!-- Popup info  -->
    <div class=\"popupInfo rounded pt-4 pb-4 pl-3 pr-3\">
        <span id=\"popupSpan\"></span>
    </div>
    <!-- Popup info END  -->
{% endblock %}", "modal.html.twig", "/var/www/html/memonator_site/templates/modal.html.twig");
    }
}
