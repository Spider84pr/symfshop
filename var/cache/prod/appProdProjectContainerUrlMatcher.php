<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // buyproduct
        if (0 === strpos($pathinfo, '/buyproduct') && preg_match('#^/buyproduct/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'buyproduct')), array (  '_controller' => 'AppBundle\\Controller\\BuyProductController::newAction',));
        }

        if (0 === strpos($pathinfo, '/c')) {
            // cart
            if ($pathinfo === '/cart') {
                return array (  '_controller' => 'AppBundle\\Controller\\CartController::showAction',  '_route' => 'cart',);
            }

            // clean
            if ($pathinfo === '/cleancart') {
                return array (  '_controller' => 'AppBundle\\Controller\\CleanCartController::showAction',  '_route' => 'clean',);
            }

            // createproduct
            if ($pathinfo === '/createproduct') {
                return array (  '_controller' => 'AppBundle\\Controller\\CreateProductController::newAction',  '_route' => 'createproduct',);
            }

        }

        // welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'welcome');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ListController::showAction',  '_route' => 'welcome',);
        }

        // filter
        if (0 === strpos($pathinfo, '/filter') && preg_match('#^/filter/(?P<cat>[^/]++)/(?P<amfrom>[^/]++)/(?P<amto>[^/]++)/(?P<pfrom>[^/]++)/(?P<pto>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'filter')), array (  '_controller' => 'AppBundle\\Controller\\ListController::filterAction',));
        }

        if (0 === strpos($pathinfo, '/re')) {
            // register
            if ($pathinfo === '/register') {
                return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'register',);
            }

            // removefromcart
            if (0 === strpos($pathinfo, '/removefromcart') && preg_match('#^/removefromcart/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'removefromcart')), array (  '_controller' => 'AppBundle\\Controller\\RemoveFromCartController::newAction',));
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // security_login_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginCheckAction',  '_route' => 'security_login_check',);
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'logout',);
            }

        }

        if (0 === strpos($pathinfo, '/storage')) {
            // storage
            if ($pathinfo === '/storage') {
                return array (  '_controller' => 'AppBundle\\Controller\\StorageController::newAction',  '_route' => 'storage',);
            }

            // storagedecr
            if (0 === strpos($pathinfo, '/storagedecr') && preg_match('#^/storagedecr/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'storagedecr')), array (  '_controller' => 'AppBundle\\Controller\\StorageDecrController::newAction',));
            }

            // storagenew
            if ($pathinfo === '/storagenew') {
                return array (  '_controller' => 'AppBundle\\Controller\\StorageNewController::newAction',  '_route' => 'storagenew',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
