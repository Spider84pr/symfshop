<?php

/* default/index.html.twig */
class __TwigTemplate_09cb1600f8bbc03dab13309df8970ff71413019a699a381a77736800a6096682 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'flash_messages' => array($this, 'block_flash_messages'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\">
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-10 col-md-offset-1\">
";
        // line 7
        $this->displayBlock('flash_messages', $context, $blocks);
        // line 16
        echo "            <div class=\"panel panel-success\">
\t\t\t<h1>МегаСтолярка</h1>
            </div>
\t\t\t<table>
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Наименование</th>
\t\t\t\t\t\t<th>На складе</th>
\t\t\t\t\t\t<th>Цена</th>
\t\t\t\t\t</tr>
\t\t\t\t\t";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prod"]) ? $context["prod"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 27
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "amount", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "price", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t";
            // line 31
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) != null)) {
                // line 32
                echo "\t\t\t\t\t\t<td><a href=\"/buyproduct/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\">Купить</a></td>
\t\t\t\t\t";
            }
            // line 34
            echo "\t\t\t\t\t</tr>
\t\t\t\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t\t<div>
\t\t\t";
        // line 39
        echo         $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock((isset($context["filter"]) ? $context["filter"] : null), 'form_start');
        echo "
\t\t\t";
        // line 40
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock((isset($context["filter"]) ? $context["filter"] : null), 'widget');
        echo "
\t\t\t";
        // line 41
        echo         $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock((isset($context["filter"]) ? $context["filter"] : null), 'form_end');
        echo "
\t\t\t<button onclick=\"document.location='/'\">Сбросить</button>
\t\t\t</div>
            ";
        // line 44
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) == null)) {
            // line 45
            echo "              <a href=\"/login\" class=\"btn btn-info\"> Войти  >></a>
              <a href=\"/register\" class=\"btn btn-info\"> Регистрация  >></a>
            ";
        }
        // line 48
        echo "            ";
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "role", array()) == "ROLE_ADMIN")) {
            // line 49
            echo "            <h2>Панель администратора</h2>
           <div class=\"stor\">
\t\t\t<h3>Запасы материалов на складах</h3>
\t\t\t<table>
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Наименование</th>
\t\t\t\t\t\t<th>На складе</th>
\t\t\t\t\t\t<th></th>
\t\t\t\t\t</tr>
\t\t\t\t\t";
            // line 59
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["starr"]) ? $context["starr"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 60
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td>";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "amount", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t\t<p><a href=\"/storageadd\">Приход материала</a></p>
\t\t\t<p><a href=\"/storagedecr\">Списание материала</a></p>
\t\t\t</div>
\t\t\t";
        }
        // line 72
        echo "            
            ";
        // line 73
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) != null)) {
            // line 74
            echo "              <p>В вашей <a href=\"/cart\">корзине</a> ";
            echo twig_escape_filter($this->env, (isset($context["cartamount"]) ? $context["cartamount"] : null), "html", null, true);
            echo " товаров на сумму ";
            echo twig_escape_filter($this->env, (isset($context["cartsum"]) ? $context["cartsum"] : null), "html", null, true);
            echo " рублей</p>
              <a href=\"/logout\" class=\"btn btn-info\"> Выйти из системы  >></a>
            ";
        }
        // line 77
        echo "        </div>
    </div>
</div>
";
    }

    // line 7
    public function block_flash_messages($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 9
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 10
                echo "            <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo " alert-dismissible\" role=\"alert\">
                ";
                // line 11
                echo $context["message"];
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 14,  195 => 11,  190 => 10,  185 => 9,  180 => 8,  177 => 7,  170 => 77,  161 => 74,  159 => 73,  156 => 72,  148 => 66,  138 => 62,  134 => 61,  131 => 60,  127 => 59,  115 => 49,  112 => 48,  107 => 45,  105 => 44,  99 => 41,  95 => 40,  91 => 39,  86 => 36,  79 => 34,  73 => 32,  71 => 31,  67 => 30,  63 => 29,  59 => 28,  56 => 27,  52 => 26,  40 => 16,  38 => 7,  32 => 3,  29 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "default/index.html.twig", "/home/i/ivcheng7/compoinfo.ru/public_html/nn/app/Resources/views/default/index.html.twig");
    }
}
