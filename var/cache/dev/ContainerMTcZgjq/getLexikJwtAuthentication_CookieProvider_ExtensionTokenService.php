<?php

namespace ContainerMTcZgjq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLexikJwtAuthentication_CookieProvider_ExtensionTokenService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'lexik_jwt_authentication.cookie_provider.extension_token' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Cookie\JWTCookieProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/Security/Http/Cookie/JWTCookieProvider.php';

        return $container->privates['lexik_jwt_authentication.cookie_provider.extension_token'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Cookie\JWTCookieProvider('extension_token', 259200, 'lax', '/', NULL);
    }
}
