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

/* meme_panel/index.html.twig */
class __TwigTemplate_c8a41e08d967df3d7cba42b2fc6727a5a84067e3eb0cf9a5cd206e50665a8f29 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "meme_panel/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "meme_panel/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, (isset($context["pageName"]) || array_key_exists("pageName", $context) ? $context["pageName"] : (function () { throw new RuntimeError('Variable "pageName" does not exist.', 3, $this->source); })()), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["brand"]) || array_key_exists("brand", $context) ? $context["brand"] : (function () { throw new RuntimeError('Variable "brand" does not exist.', 3, $this->source); })()), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<div class=\"siteContent w-100 h-100 mx-auto text-center\">
    <div class=\"memePanelDiv h-100 d-flex justify-content-center\">
        <div class=\"memePanelMainDiv rounded\">
            ";
        // line 9
        if (twig_test_empty((isset($context["paths"]) || array_key_exists("paths", $context) ? $context["paths"] : (function () { throw new RuntimeError('Variable "paths" does not exist.', 9, $this->source); })()))) {
            // line 10
            echo "            <div class=\"flexItemParentPaths flexItemsParent justify-content-start flex-wrap\"></div>
            ";
        } else {
            // line 12
            echo "                <span class=\"memeSectionTitleDir mb-3 ml-2\">Directories</span>
                <div class=\"flexItemParentPaths flexItemsParent justify-content-start flex-wrap\">
                    ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paths"]) || array_key_exists("paths", $context) ? $context["paths"] : (function () { throw new RuntimeError('Variable "paths" does not exist.', 14, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["path"]) {
                // line 15
                echo "                        <div class=\"pathItemsContext pathItem rounded flex-item ml-2 mr-2 mb-3\" data-path-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["path"], 0, [], "array", false, false, false, 15), "html", null, true);
                echo "\">
                            <a class=\"directoryRoute\" href=\"";
                // line 16
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("directory", ["slug" => twig_get_attribute($this->env, $this->source, $context["path"], 0, [], "array", false, false, false, 16)]), "html", null, true);
                echo "\">
                                <div class=\"directoryImgDiv h-100\">
                                    <i class=\"fas fa-folder directoryImg fa-2x\"></i>
                                </div>
                                <div class=\"directoryPathNameDiv h-100\">
                                    <span data-path-id=\"";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["path"], 0, [], "array", false, false, false, 21), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["path"], 1, [], "array", false, false, false, 21), "html", null, true);
                echo "</span>
                                </div>
                            </a>
                        </div>        
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['path'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "                </div>
            ";
        }
        // line 28
        echo "
            ";
        // line 29
        if (twig_test_empty((isset($context["memes"]) || array_key_exists("memes", $context) ? $context["memes"] : (function () { throw new RuntimeError('Variable "memes" does not exist.', 29, $this->source); })()))) {
            // line 30
            echo "            <div class=\"flexItemParentMemes flexItemsParent justify-content-start flex-wrap\"></div>
            ";
        } else {
            // line 32
            echo "                <span class=\"memeSectionTitle mt-5 mb-3 ml-2\"><span>Memes</span></span>
                <div class=\"flexItemParentMemes flexItemsParent justify-content-start flex-wrap\">
                    ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["memes"]) || array_key_exists("memes", $context) ? $context["memes"] : (function () { throw new RuntimeError('Variable "memes" does not exist.', 34, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["meme"]) {
                // line 35
                echo "                        <div class=\"pathItemMeme rounded flex-item ml-2 mr-2 mb-3\" data-meme-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meme"], 0, [], "array", false, false, false, 35), "html", null, true);
                echo "\">
                        <div class=\"pathItemMemeDiv rounded-top w-100\">
                            <a href=\"../imgs/";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meme"], 1, [], "array", false, false, false, 37), "html", null, true);
                echo "\" rel=\"lytebox\">
                                <img class=\"singleMemeImg rounded-top\" rel=\"lytebox\" src=\"/imgs/";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meme"], 1, [], "array", false, false, false, 38), "html", null, true);
                echo "\" />
                            </a>    
                        </div>    
                            <div class=\"directoryMemeNameDiv rounded-bottom\">
                                <span data-meme-id=\"";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meme"], 0, [], "array", false, false, false, 42), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meme"], 2, [], "array", false, false, false, 42), "html", null, true);
                echo "</span>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                </div>
            ";
        }
        // line 48
        echo "        </div>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "meme_panel/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 48,  170 => 46,  158 => 42,  151 => 38,  147 => 37,  141 => 35,  137 => 34,  133 => 32,  129 => 30,  127 => 29,  124 => 28,  120 => 26,  107 => 21,  99 => 16,  94 => 15,  90 => 14,  86 => 12,  82 => 10,  80 => 9,  75 => 6,  68 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}{{ pageName }} - {{ brand }}{% endblock %}

{% block body %}
<div class=\"siteContent w-100 h-100 mx-auto text-center\">
    <div class=\"memePanelDiv h-100 d-flex justify-content-center\">
        <div class=\"memePanelMainDiv rounded\">
            {% if paths is empty %}
            <div class=\"flexItemParentPaths flexItemsParent justify-content-start flex-wrap\"></div>
            {% else %}
                <span class=\"memeSectionTitleDir mb-3 ml-2\">Directories</span>
                <div class=\"flexItemParentPaths flexItemsParent justify-content-start flex-wrap\">
                    {% for path in paths %}
                        <div class=\"pathItemsContext pathItem rounded flex-item ml-2 mr-2 mb-3\" data-path-id=\"{{ path[0] }}\">
                            <a class=\"directoryRoute\" href=\"{{ path('directory', { 'slug': path[0] }) }}\">
                                <div class=\"directoryImgDiv h-100\">
                                    <i class=\"fas fa-folder directoryImg fa-2x\"></i>
                                </div>
                                <div class=\"directoryPathNameDiv h-100\">
                                    <span data-path-id=\"{{ path[0] }}\">{{ path[1] }}</span>
                                </div>
                            </a>
                        </div>        
                    {% endfor %}
                </div>
            {% endif %}

            {% if memes is empty %}
            <div class=\"flexItemParentMemes flexItemsParent justify-content-start flex-wrap\"></div>
            {% else %}
                <span class=\"memeSectionTitle mt-5 mb-3 ml-2\"><span>Memes</span></span>
                <div class=\"flexItemParentMemes flexItemsParent justify-content-start flex-wrap\">
                    {% for meme in memes %}
                        <div class=\"pathItemMeme rounded flex-item ml-2 mr-2 mb-3\" data-meme-id=\"{{ meme[0] }}\">
                        <div class=\"pathItemMemeDiv rounded-top w-100\">
                            <a href=\"../imgs/{{ meme[1] }}\" rel=\"lytebox\">
                                <img class=\"singleMemeImg rounded-top\" rel=\"lytebox\" src=\"/imgs/{{ meme[1] }}\" />
                            </a>    
                        </div>    
                            <div class=\"directoryMemeNameDiv rounded-bottom\">
                                <span data-meme-id=\"{{ meme[0] }}\">{{ meme[2] }}</span>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}", "meme_panel/index.html.twig", "/var/www/html/memonator_site/templates/meme_panel/index.html.twig");
    }
}
