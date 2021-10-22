<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake/Element/entity_methods.twig */
class __TwigTemplate_80892092ce6cbf12bcd2ae0afc1854e308fd7e92883e4fb28f4ea3b6ba48fef9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->enter($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake/Element/entity_methods.twig"));

        // line 1
        echo "    /**
     * Check if \$user can create ";
        // line 2
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param ";
        // line 5
        echo twig_escape_filter($this->env, ($context["classname"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo "
     * @return bool
     */
    public function canCreate(IdentityInterface \$user, ";
        // line 8
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo ")
    {
    }

    /**
     * Check if \$user can update ";
        // line 13
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param ";
        // line 16
        echo twig_escape_filter($this->env, ($context["classname"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo "
     * @return bool
     */
    public function canUpdate(IdentityInterface \$user, ";
        // line 19
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo ")
    {
    }

    /**
     * Check if \$user can delete ";
        // line 24
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param ";
        // line 27
        echo twig_escape_filter($this->env, ($context["classname"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo "
     * @return bool
     */
    public function canDelete(IdentityInterface \$user, ";
        // line 30
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo ")
    {
    }

    /**
     * Check if \$user can view ";
        // line 35
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param ";
        // line 38
        echo twig_escape_filter($this->env, ($context["classname"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo "
     * @return bool
     */
    public function canView(IdentityInterface \$user, ";
        // line 41
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["variable_name"] ?? null), "html", null, true);
        echo ")
    {
    }
";
        
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->leave($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof);

    }

    public function getTemplateName()
    {
        return "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake/Element/entity_methods.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 41,  114 => 38,  108 => 35,  98 => 30,  90 => 27,  84 => 24,  74 => 19,  66 => 16,  60 => 13,  50 => 8,  42 => 5,  36 => 2,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("    /**
     * Check if \$user can create {{ name }}
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param {{ classname }} \${{ variable_name }}
     * @return bool
     */
    public function canCreate(IdentityInterface \$user, {{ name }} \${{ variable_name }})
    {
    }

    /**
     * Check if \$user can update {{ name }}
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param {{ classname }} \${{ variable_name }}
     * @return bool
     */
    public function canUpdate(IdentityInterface \$user, {{ name }} \${{ variable_name }})
    {
    }

    /**
     * Check if \$user can delete {{ name }}
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param {{ classname }} \${{ variable_name }}
     * @return bool
     */
    public function canDelete(IdentityInterface \$user, {{ name }} \${{ variable_name }})
    {
    }

    /**
     * Check if \$user can view {{ name }}
     *
     * @param Authorization\\IdentityInterface \$user The user.
     * @param {{ classname }} \${{ variable_name }}
     * @return bool
     */
    public function canView(IdentityInterface \$user, {{ name }} \${{ variable_name }})
    {
    }
", "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake/Element/entity_methods.twig", "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake/Element/entity_methods.twig");
    }
}
