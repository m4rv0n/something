<?php

namespace Framework;

/**
 * Class View
 * @package Framework
 */
class View {
    /**
     * @param       $template
     * @param array $args
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public static function renderTemplate($template, $args = []) {
        static $twig = \null;

        if (\null === $twig) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/App/View');
            $twig   = new \Twig\Environment($loader, array('debug' => TRUE));
            $twig->addExtension(new \Twig\Extension\DebugExtension());
        }

        echo $twig->render($template, $args);
    }
}