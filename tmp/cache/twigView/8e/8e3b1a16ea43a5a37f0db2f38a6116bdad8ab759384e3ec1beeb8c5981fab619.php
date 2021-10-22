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

/* /var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake//policy.twig */
class __TwigTemplate_4c9faa4f34863f1cee2b3f0d85c9b94298055812b625a6fc7c5fb2761f2882b6 extends \Twig\Template
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
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->enter($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake//policy.twig"));

        // line 16
        echo "<?php
namespace ";
        // line 17
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\Policy;

";
        // line 19
        $context["imports"] = [0 => "Authorization\\IdentityInterface", 1 =>         // line 21
($context["classname"] ?? null)];
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter(($context["imports"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["import"]) {
            // line 24
            echo "use ";
            echo twig_escape_filter($this->env, $context["import"], "html", null, true);
            echo ";
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['import'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "
/**
 * ";
        // line 28
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " policy
 */
class ";
        // line 30
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo twig_escape_filter($this->env, ($context["suffix"] ?? null), "html", null, true);
        echo "Policy
{
";
        // line 32
        if ((($context["type"] ?? null) == "entity")) {
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute(($context["_view"] ?? null), "element", [0 => "Authorization.entity_methods"], "method"), "html", null, true);
        }
        // line 35
        echo "}
";
        
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->leave($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof);

    }

    public function getTemplateName()
    {
        return "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake//policy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 35,  74 => 33,  72 => 32,  66 => 30,  61 => 28,  57 => 26,  48 => 24,  44 => 23,  42 => 21,  41 => 19,  36 => 17,  33 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         1.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
<?php
namespace {{ namespace }}\\Policy;

{% set imports = [
    'Authorization\\\\IdentityInterface',
    classname,
] %}
{% for import in imports|sort %}
use {{ import }};
{% endfor %}

/**
 * {{ name }} policy
 */
class {{ name }}{{ suffix }}Policy
{
{% if type == 'entity' %}
    {{- _view.element('Authorization.entity_methods') -}}
{% endif %}
}
", "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake//policy.twig", "/var/www/html/riafo/vendor/cakephp/authorization/src/Template/Bake//policy.twig");
    }
}
