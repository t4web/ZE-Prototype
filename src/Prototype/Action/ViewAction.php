<?php

namespace T4web\Prototype\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

class ViewAction
{
    private $template;

    public function __construct(Template\TemplateRendererInterface $template)
    {
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        if (!isset($request->getQueryParams()['t'])) {
            return $next($request, $response->withStatus(400), 'Invalid parameter "t" - template name');
        }

        $data = [];
        if (isset($request->getQueryParams()['l'])) {
            $data['layout'] = 'proto-layout::' . $request->getQueryParams()['l'];
        }

        return new HtmlResponse($this->template->render('proto::' . $request->getQueryParams()['t'], $data));
    }
}
