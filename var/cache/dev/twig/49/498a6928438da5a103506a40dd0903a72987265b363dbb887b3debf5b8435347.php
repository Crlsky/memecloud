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

/* base.html.twig */
class __TwigTemplate_0aa6d17ca90a904fc8e3b5c40a91246db78ac5ff581f0ffc13fca97237351fb4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'javascript' => [$this, 'block_javascript'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'nav' => [$this, 'block_nav'],
            'loginNav' => [$this, 'block_loginNav'],
            'registerNav' => [$this, 'block_registerNav'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1\">
        <link rel=\"icon\" href=\"/assets/img/favico.png\" sizes=\"192x192\" type=\"image/png\">
        <meta name=\"robots\" content=\"noindex, nofollow\" />
        ";
        // line 8
        $this->displayBlock('javascript', $context, $blocks);
        // line 15
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 24
        echo "    </head>
    <body>

    ";
        // line 27
        $this->displayBlock('nav', $context, $blocks);
        // line 113
        echo "
    <header class=\"masthead\">
        <div class=\"bgImage\"></div> 
        <div class=\"container d-flex h-100 align-items-center\">
            
            ";
        // line 119
        echo "            ";
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 119, $this->source); })()), "request", [], "any", false, false, false, 119), "get", [0 => "_route"], "method", false, false, false, 119), "app_login"))) {
            // line 120
            echo "                ";
            $this->displayBlock('loginNav', $context, $blocks);
            // line 124
            echo "            ";
        } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 124, $this->source); })()), "request", [], "any", false, false, false, 124), "get", [0 => "_route"], "method", false, false, false, 124), "app_register"))) {
            // line 125
            echo "                ";
            $this->displayBlock('registerNav', $context, $blocks);
            // line 129
            echo "            ";
        } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 129, $this->source); })()), "request", [], "any", false, false, false, 129), "get", [0 => "_route"], "method", false, false, false, 129), "meme_panel"))) {
            echo " 
                <div class=\"pathsTree text-uppercase\">
                    <a href=\"";
            // line 131
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("meme_panel");
            echo "\">
                            ";
            // line 132
            echo twig_escape_filter($this->env, (isset($context["pathTreeName"]) || array_key_exists("pathTreeName", $context) ? $context["pathTreeName"] : (function () { throw new RuntimeError('Variable "pathTreeName" does not exist.', 132, $this->source); })()), "html", null, true);
            echo "   
                    </a>   
                </div>    
            ";
        } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 135
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 135, $this->source); })()), "request", [], "any", false, false, false, 135), "get", [0 => "_route"], "method", false, false, false, 135), "directory"))) {
            echo "        
                ";
            // line 136
            if (twig_get_attribute($this->env, $this->source, ($context["pathsTree"] ?? null), "main_path", [], "array", true, true, false, 136)) {
                // line 137
                echo "                    <div class=\"pathsTree text-uppercase\">
                        <a href=\"";
                // line 138
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("meme_panel");
                echo "\">
                                ";
                // line 139
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 139, $this->source); })()), "main_path", [], "array", false, false, false, 139), "html", null, true);
                echo "    
                        </a>   
                        <i class=\"fas fa-angle-right\"></i>
                        <a href=\"/meme/";
                // line 142
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 142, $this->source); })()), "current_path_id", [], "array", false, false, false, 142), "html", null, true);
                echo "\">
                            <u>";
                // line 143
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 143, $this->source); })()), "current_path_name", [], "array", false, false, false, 143), "html", null, true);
                echo "</u> 
                        </a>
                    </div>    
                ";
            } else {
                // line 147
                echo "                    <div class=\"pathsTree text-uppercase\">
                        <a href=\"";
                // line 148
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("meme_panel");
                echo "\">
                                Main directory     
                        </a>
                        <i class=\"fas fa-angle-right\"></i>
                        <a href=\"/meme/";
                // line 152
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 152, $this->source); })()), "previous_path_id", [], "array", false, false, false, 152), "html", null, true);
                echo "\">
                            ";
                // line 153
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 153, $this->source); })()), "previous_path_name", [], "array", false, false, false, 153), "html", null, true);
                echo "  
                        </a> 
                        <i class=\"fas fa-angle-right\"></i>
                        <a href=\"/meme/";
                // line 156
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 156, $this->source); })()), "current_path_id", [], "array", false, false, false, 156), "html", null, true);
                echo "\">
                            <u>";
                // line 157
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pathsTree"]) || array_key_exists("pathsTree", $context) ? $context["pathsTree"] : (function () { throw new RuntimeError('Variable "pathsTree" does not exist.', 157, $this->source); })()), "current_path_name", [], "array", false, false, false, 157), "html", null, true);
                echo "</u>
                        </a>
                    </div>  
                ";
            }
            // line 160
            echo "                 
            ";
        }
        // line 162
        echo "            
            ";
        // line 164
        echo "            ";
        $this->displayBlock('body', $context, $blocks);
        // line 165
        echo "            
            ";
        // line 167
        echo "                ";
        $this->displayBlock('footer', $context, $blocks);
        // line 186
        echo "        </div>
    </header>
    <div id=\"overlay\" class=\"overlay\"></div>
    ";
        // line 189
        if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 189, $this->source); })()), "request", [], "any", false, false, false, 189), "get", [0 => "_route"], "method", false, false, false, 189), "meme_panel")) || (0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 189, $this->source); })()), "request", [], "any", false, false, false, 189), "get", [0 => "_route"], "method", false, false, false, 189), "directory")))) {
            // line 190
            echo "        ";
            $this->loadTemplate("modal.html.twig", "base.html.twig", 190)->displayBlock("modal", $context);
            echo "
    ";
        }
        // line 192
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 206
        echo "    </body>
</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 8
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        // line 9
        echo "            <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
            <script src=\"/dist/jquery.contextMenu.js\"></script>
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.ui.position.js\"></script>
            <script src=\"https://use.fontawesome.com/releases/v5.13.0/js/all.js\" crossorigin=\"anonymous\"></script>
            <script type=\"text/javascript\" language=\"javascript\" src=\"/lytebox/lytebox.js\"></script>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 15
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 16
        echo "            <link rel=\"stylesheet\" href=\"/css/styles.css\" />
            <link rel=\"stylesheet\" href=\"/css/sidebar.css\" />
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css\" integrity=\"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk\" crossorigin=\"anonymous\">
            <link href=\"https://fonts.googleapis.com/css?family=Varela+Round\" rel=\"stylesheet\" />
            <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i\" rel=\"stylesheet\" />
            <link rel=\"stylesheet\" href=\"/lytebox/lytebox.css\" type=\"text/css\" media=\"screen\" />
            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css\">
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 27
    public function block_nav($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "nav"));

        // line 28
        echo "        ";
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "request", [], "any", false, false, false, 28), "get", [0 => "_route"], "method", false, false, false, 28), "main"))) {
            // line 29
            echo "                <nav class=\"navbar navbar-expand-lg navbar-light fixed-top\" id=\"mainNav\">
                    <div class=\"container-fluid\">
                        <a class=\"navbar-brand js-scroll-trigger\" href=\"";
            // line 31
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("main");
            echo "\"><img src=\"/assets/img/logo.png\" width=\"80px\"/></a>
                        <ul class=\"navbar-nav ml-auto\">
                            ";
            // line 33
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
                // line 34
                echo "                            <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("meme_panel");
                echo "\">Memes</a></li>
                                <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"";
                // line 35
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
                echo "\">Logout</a></li>
                            ";
            } else {
                // line 36
                echo " 
                                <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"";
                // line 37
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
                echo "\">Login</a></li>
                                <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"";
                // line 38
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
                echo "\">Register</a></li>   
                            ";
            }
            // line 40
            echo "                        </ul>
                    </div>
                </nav>   
        ";
        } else {
            // line 43
            echo " 
            ";
            // line 44
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
                // line 45
                echo "                <nav id=\"sidebar\">
                    <div class=\"sidebar-header pr-3 pl-3 pt-3 pb-3\">
                        <a class=\"navbar-brand js-scroll-trigger logoText\" href=\"";
                // line 47
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("main");
                echo "\"><img src=\"/assets/img/logo_text.png\" width=\"180px\" /></a>
                    </div>
                    <ul class=\"sidebarMenu m-0 p-0 pt-2 pb-2\">
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"";
                // line 51
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("meme_panel");
                echo "\">
                                <span>
                                    <i class=\"fas fa-home sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Memes</span>
                            </a>
                        </li>
                    </ul>    
                    <ul class=\"sidebarMenu m-0 p-0 pt-2 pb-2\">    
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"#\">
                                <span>
                                    <i class=\"fas fa-cog sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Settings</span>
                            </a>
                        </li>
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"";
                // line 69
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
                echo "\">
                                <span>
                                    <i class=\"fas fa-envelope-square sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Contact</span>
                            </a>
                        </li>
                    </ul>
                    <ul class=\"sidebarMenu m-0 p-0 pt-2 pb-2\"> 
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"";
                // line 79
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
                echo "\">
                                <span>
                                    <i class=\"fas fa-sign-out-alt sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <div class=\"sidebarInfoLinks\">
                        <ul class=\"sidebarInfoLinkList p-0 m-0\">
                            <li><a href=\"#\">Help</a></li>
                            <li><a href=\"#\">Regulations</a></li>
                            <li><a href=\"#\">Informations</a></li>
                            <li><a href=\"#\">Rankings</a></li>
                            <li><a href=\"#\">API</a></li>
                        </ul>   
                    </div>
                    <div class=\"sidebarCredentials\">
                        <span class=\"rounded pt-1 pb-1 pl-2 pr-2\">Created by <a class=\"githubName\" href=\"https://github.com/sqbany122\">Sqbany122</a> & <a class=\"githubName\" href=\"https://github.com/Crlsky\">Crlsky</a></span>
                    </div>
                    <div class=\"sidebarSocial\">
                        <a class=\"\" href=\"https://www.facebook.com/\"><i class=\"fab fa-facebook-square fa-2x\"></i></a>
                        <a class=\"\" href=\"https://www.instagram.com/\"><i class=\"fab fa-instagram fa-2x\"></i></a>
                        <a class=\"\" href=\"#\"><i class=\"fas fa-plus-square fa-2x\"></i></a>
                        <a class=\"\" href=\"https://www.paypal.com/paypalme/wiadro50zl\"><i class=\"fab fa-paypal fa-2x\"></i></a>
                        <a class=\"\" href=\"";
                // line 104
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
                echo "\"><i class=\"fas fa-envelope-square fa-2x\"></i></a>
                    </div>
                    <div id=\"dismiss\">
                        <i class=\"fas fa-bars\"></i>
                    </div>
                </nav>
            ";
            }
            // line 111
            echo "        ";
        }
        echo "    
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 120
    public function block_loginNav($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "loginNav"));

        // line 121
        echo "                    <a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("main");
        echo "\" class=\"btn btnBack\"><i class=\"fas fa-arrow-left\"></i><span>Main site</span></a>
                    <a href=\"";
        // line 122
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        echo "\" class=\"btn btnForward\"><span>Register</span><i class=\"fas fa-arrow-right\"></i></a>
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 125
    public function block_registerNav($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "registerNav"));

        // line 126
        echo "                    <a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("main");
        echo "\" class=\"btn btnBack\"><i class=\"fas fa-arrow-left\"></i><span>Main site</span></a>
                    <a href=\"";
        // line 127
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        echo "\" class=\"btn btnForward\"><span>Sign in</span><i class=\"fas fa-arrow-right\"></i></a>
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 164
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 167
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        echo " 
                    ";
        // line 168
        if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 168, $this->source); })()), "request", [], "any", false, false, false, 168), "get", [0 => "_route"], "method", false, false, false, 168), "meme_panel")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 168, $this->source); })()), "request", [], "any", false, false, false, 168), "get", [0 => "_route"], "method", false, false, false, 168), "directory")))) {
            // line 169
            echo "                        <div class=\"siteFooter\">
                            <a class=\"\" href=\"https://www.facebook.com/\"><i class=\"fab fa-facebook-square fa-2x\"></i></a>
                            <a class=\"\" href=\"https://www.instagram.com/\"><i class=\"fab fa-instagram fa-2x\"></i></a>
                            <a class=\"\" href=\"#\"><i class=\"fas fa-plus-square fa-2x\"></i></a>
                            <a class=\"\" href=\"https://www.paypal.com/paypalme/wiadro50zl\"><i class=\"fab fa-paypal fa-2x\"></i></a>
                            <a class=\"\" href=\"";
            // line 174
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
            echo "\"><i class=\"fas fa-envelope-square fa-2x\"></i></a>   
                            <div class=\"credentials mt-1\">
                                <span class=\"rounded pt-1 pb-1 pl-2 pr-2\">Created by Sqbany122 & Crlsky</span>
                            </div>
                        </div>
                    ";
        }
        // line 179
        echo "     
                    ";
        // line 180
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_REMEMBERED") && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 180, $this->source); })()), "request", [], "any", false, false, false, 180), "get", [0 => "_route"], "method", false, false, false, 180), "main")))) {
            // line 181
            echo "                        <div id=\"sidebarExpandBtn\" class=\"sidebarExpandBtn\">
                            <i class=\"fas fa-bars\"></i>
                        </div>
                    ";
        }
        // line 184
        echo " 
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 192
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 193
        echo "        <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
        <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js\" integrity=\"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI\" crossorigin=\"anonymous\"></script>
        ";
        // line 195
        if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 195, $this->source); })()), "request", [], "any", false, false, false, 195), "get", [0 => "_route"], "method", false, false, false, 195), "meme_panel")) || (0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 195, $this->source); })()), "request", [], "any", false, false, false, 195), "get", [0 => "_route"], "method", false, false, false, 195), "directory")))) {
            // line 196
            echo "            <script src=\"/js/addDirectory.js\"></script>
            <script src=\"/js/addMeme.js\"></script>
            <script src=\"/js/contextMenu.js\"></script>
            <script src=\"/js/rename.js\"></script>
            <script src=\"/js/popup.js\"></script>   
        ";
        }
        // line 202
        echo "        ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 202, $this->source); })()), "request", [], "any", false, false, false, 202), "get", [0 => "_route"], "method", false, false, false, 202), "main"))) {
            // line 203
            echo "            <script src=\"/js/sidebar.js\"></script>
        ";
        }
        // line 205
        echo "    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  536 => 205,  532 => 203,  529 => 202,  521 => 196,  519 => 195,  515 => 193,  508 => 192,  500 => 184,  494 => 181,  492 => 180,  489 => 179,  480 => 174,  473 => 169,  471 => 168,  462 => 167,  450 => 164,  441 => 127,  436 => 126,  429 => 125,  420 => 122,  415 => 121,  408 => 120,  398 => 111,  388 => 104,  360 => 79,  347 => 69,  326 => 51,  319 => 47,  315 => 45,  313 => 44,  310 => 43,  304 => 40,  299 => 38,  295 => 37,  292 => 36,  287 => 35,  282 => 34,  280 => 33,  275 => 31,  271 => 29,  268 => 28,  261 => 27,  247 => 16,  240 => 15,  228 => 9,  221 => 8,  209 => 4,  201 => 206,  198 => 192,  192 => 190,  190 => 189,  185 => 186,  182 => 167,  179 => 165,  176 => 164,  173 => 162,  169 => 160,  162 => 157,  158 => 156,  152 => 153,  148 => 152,  141 => 148,  138 => 147,  131 => 143,  127 => 142,  121 => 139,  117 => 138,  114 => 137,  112 => 136,  108 => 135,  102 => 132,  98 => 131,  92 => 129,  89 => 125,  86 => 124,  83 => 120,  80 => 119,  73 => 113,  71 => 27,  66 => 24,  63 => 15,  61 => 8,  54 => 4,  49 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <title>{% block title %}{% endblock %}</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1\">
        <link rel=\"icon\" href=\"/assets/img/favico.png\" sizes=\"192x192\" type=\"image/png\">
        <meta name=\"robots\" content=\"noindex, nofollow\" />
        {% block javascript %}
            <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
            <script src=\"/dist/jquery.contextMenu.js\"></script>
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.ui.position.js\"></script>
            <script src=\"https://use.fontawesome.com/releases/v5.13.0/js/all.js\" crossorigin=\"anonymous\"></script>
            <script type=\"text/javascript\" language=\"javascript\" src=\"/lytebox/lytebox.js\"></script>
        {% endblock %}
        {% block stylesheets %}
            <link rel=\"stylesheet\" href=\"/css/styles.css\" />
            <link rel=\"stylesheet\" href=\"/css/sidebar.css\" />
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css\" integrity=\"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk\" crossorigin=\"anonymous\">
            <link href=\"https://fonts.googleapis.com/css?family=Varela+Round\" rel=\"stylesheet\" />
            <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i\" rel=\"stylesheet\" />
            <link rel=\"stylesheet\" href=\"/lytebox/lytebox.css\" type=\"text/css\" media=\"screen\" />
            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css\">
        {% endblock %}
    </head>
    <body>

    {% block nav %}
        {% if app.request.get('_route') == 'main' %}
                <nav class=\"navbar navbar-expand-lg navbar-light fixed-top\" id=\"mainNav\">
                    <div class=\"container-fluid\">
                        <a class=\"navbar-brand js-scroll-trigger\" href=\"{{ path('main') }}\"><img src=\"/assets/img/logo.png\" width=\"80px\"/></a>
                        <ul class=\"navbar-nav ml-auto\">
                            {% if is_granted('IS_AUTHENTICATED_REMEMBERED') %}
                            <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"{{ path('meme_panel') }}\">Memes</a></li>
                                <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"{{ path('app_logout') }}\">Logout</a></li>
                            {% else %} 
                                <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"{{ path('app_login') }}\">Login</a></li>
                                <li class=\"nav-item\"><a class=\"nav-link text-uppercase\" href=\"{{ path('app_register') }}\">Register</a></li>   
                            {% endif %}
                        </ul>
                    </div>
                </nav>   
        {% else %} 
            {% if is_granted('IS_AUTHENTICATED_REMEMBERED') %}
                <nav id=\"sidebar\">
                    <div class=\"sidebar-header pr-3 pl-3 pt-3 pb-3\">
                        <a class=\"navbar-brand js-scroll-trigger logoText\" href=\"{{ path('main') }}\"><img src=\"/assets/img/logo_text.png\" width=\"180px\" /></a>
                    </div>
                    <ul class=\"sidebarMenu m-0 p-0 pt-2 pb-2\">
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"{{ path('meme_panel') }}\">
                                <span>
                                    <i class=\"fas fa-home sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Memes</span>
                            </a>
                        </li>
                    </ul>    
                    <ul class=\"sidebarMenu m-0 p-0 pt-2 pb-2\">    
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"#\">
                                <span>
                                    <i class=\"fas fa-cog sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Settings</span>
                            </a>
                        </li>
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"{{ path('contact') }}\">
                                <span>
                                    <i class=\"fas fa-envelope-square sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Contact</span>
                            </a>
                        </li>
                    </ul>
                    <ul class=\"sidebarMenu m-0 p-0 pt-2 pb-2\"> 
                        <li class=\"nav-item sidebarItem\">
                            <a class=\"nav-link\" href=\"{{ path('app_logout') }}\">
                                <span>
                                    <i class=\"fas fa-sign-out-alt sidebarIco\"></i>
                                </span>
                                <span class=\"sidebarItemText\">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <div class=\"sidebarInfoLinks\">
                        <ul class=\"sidebarInfoLinkList p-0 m-0\">
                            <li><a href=\"#\">Help</a></li>
                            <li><a href=\"#\">Regulations</a></li>
                            <li><a href=\"#\">Informations</a></li>
                            <li><a href=\"#\">Rankings</a></li>
                            <li><a href=\"#\">API</a></li>
                        </ul>   
                    </div>
                    <div class=\"sidebarCredentials\">
                        <span class=\"rounded pt-1 pb-1 pl-2 pr-2\">Created by <a class=\"githubName\" href=\"https://github.com/sqbany122\">Sqbany122</a> & <a class=\"githubName\" href=\"https://github.com/Crlsky\">Crlsky</a></span>
                    </div>
                    <div class=\"sidebarSocial\">
                        <a class=\"\" href=\"https://www.facebook.com/\"><i class=\"fab fa-facebook-square fa-2x\"></i></a>
                        <a class=\"\" href=\"https://www.instagram.com/\"><i class=\"fab fa-instagram fa-2x\"></i></a>
                        <a class=\"\" href=\"#\"><i class=\"fas fa-plus-square fa-2x\"></i></a>
                        <a class=\"\" href=\"https://www.paypal.com/paypalme/wiadro50zl\"><i class=\"fab fa-paypal fa-2x\"></i></a>
                        <a class=\"\" href=\"{{ path('contact') }}\"><i class=\"fas fa-envelope-square fa-2x\"></i></a>
                    </div>
                    <div id=\"dismiss\">
                        <i class=\"fas fa-bars\"></i>
                    </div>
                </nav>
            {% endif %}
        {% endif %}    
    {% endblock %}

    <header class=\"masthead\">
        <div class=\"bgImage\"></div> 
        <div class=\"container d-flex h-100 align-items-center\">
            
            {# Nawigacja dla podstron logowania i rejestracji #}
            {% if app.request.get('_route') == 'app_login' %}
                {% block loginNav %}
                    <a href=\"{{ path('main') }}\" class=\"btn btnBack\"><i class=\"fas fa-arrow-left\"></i><span>Main site</span></a>
                    <a href=\"{{ path('app_register') }}\" class=\"btn btnForward\"><span>Register</span><i class=\"fas fa-arrow-right\"></i></a>
                {% endblock %}
            {% elseif app.request.get('_route') == 'app_register' %}
                {% block registerNav %}
                    <a href=\"{{ path('main') }}\" class=\"btn btnBack\"><i class=\"fas fa-arrow-left\"></i><span>Main site</span></a>
                    <a href=\"{{ path('app_login') }}\" class=\"btn btnForward\"><span>Sign in</span><i class=\"fas fa-arrow-right\"></i></a>
                {% endblock %}
            {% elseif app.request.get('_route') == 'meme_panel' %} 
                <div class=\"pathsTree text-uppercase\">
                    <a href=\"{{ path('meme_panel') }}\">
                            {{ pathTreeName }}   
                    </a>   
                </div>    
            {% elseif app.request.get('_route') == 'directory' %}        
                {% if pathsTree['main_path'] is defined %}
                    <div class=\"pathsTree text-uppercase\">
                        <a href=\"{{ path('meme_panel') }}\">
                                {{ pathsTree['main_path'] }}    
                        </a>   
                        <i class=\"fas fa-angle-right\"></i>
                        <a href=\"/meme/{{pathsTree['current_path_id']}}\">
                            <u>{{ pathsTree['current_path_name'] }}</u> 
                        </a>
                    </div>    
                {% else %}
                    <div class=\"pathsTree text-uppercase\">
                        <a href=\"{{ path('meme_panel') }}\">
                                Main directory     
                        </a>
                        <i class=\"fas fa-angle-right\"></i>
                        <a href=\"/meme/{{pathsTree['previous_path_id']}}\">
                            {{ pathsTree['previous_path_name'] }}  
                        </a> 
                        <i class=\"fas fa-angle-right\"></i>
                        <a href=\"/meme/{{pathsTree['current_path_id']}}\">
                            <u>{{ pathsTree['current_path_name'] }}</u>
                        </a>
                    </div>  
                {% endif %}                 
            {% endif %}
            
            {# Główny content każdej strony #}
            {% block body %}{% endblock %}
            
            {# Blok stopki #}
                {% block footer %} 
                    {% if app.request.get('_route') != 'meme_panel' and app.request.get('_route') != 'directory' %}
                        <div class=\"siteFooter\">
                            <a class=\"\" href=\"https://www.facebook.com/\"><i class=\"fab fa-facebook-square fa-2x\"></i></a>
                            <a class=\"\" href=\"https://www.instagram.com/\"><i class=\"fab fa-instagram fa-2x\"></i></a>
                            <a class=\"\" href=\"#\"><i class=\"fas fa-plus-square fa-2x\"></i></a>
                            <a class=\"\" href=\"https://www.paypal.com/paypalme/wiadro50zl\"><i class=\"fab fa-paypal fa-2x\"></i></a>
                            <a class=\"\" href=\"{{ path('contact') }}\"><i class=\"fas fa-envelope-square fa-2x\"></i></a>   
                            <div class=\"credentials mt-1\">
                                <span class=\"rounded pt-1 pb-1 pl-2 pr-2\">Created by Sqbany122 & Crlsky</span>
                            </div>
                        </div>
                    {% endif %}     
                    {% if is_granted('IS_AUTHENTICATED_REMEMBERED') and app.request.get('_route') != 'main' %}
                        <div id=\"sidebarExpandBtn\" class=\"sidebarExpandBtn\">
                            <i class=\"fas fa-bars\"></i>
                        </div>
                    {% endif %} 
                {% endblock %}
        </div>
    </header>
    <div id=\"overlay\" class=\"overlay\"></div>
    {% if app.request.get('_route') == 'meme_panel' or app.request.get('_route') == 'directory' %}
        {{ block(\"modal\", \"modal.html.twig\") }}
    {% endif %}
    {% block javascripts %}
        <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
        <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js\" integrity=\"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI\" crossorigin=\"anonymous\"></script>
        {% if app.request.get('_route') == 'meme_panel' or app.request.get('_route') == 'directory' %}
            <script src=\"/js/addDirectory.js\"></script>
            <script src=\"/js/addMeme.js\"></script>
            <script src=\"/js/contextMenu.js\"></script>
            <script src=\"/js/rename.js\"></script>
            <script src=\"/js/popup.js\"></script>   
        {% endif %}
        {% if app.request.get('_route') != 'main' %}
            <script src=\"/js/sidebar.js\"></script>
        {% endif %}
    {% endblock %}
    </body>
</html>", "base.html.twig", "/var/www/html/memonator_site/templates/base.html.twig");
    }
}
