<?php

namespace T4web\Prototype\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class ViewAction
{
    /**
     * @var Template\TemplateRendererInterface
     */
    private $template;

    private $defaultTemplateName;
    private $defaultLayoutName;

    /**
     * @param Template\TemplateRendererInterface $template
     * @param string $defaultTemplateName
     * @param string $defaultLayoutName
     */
    public function __construct(
        Template\TemplateRendererInterface $template,
        $defaultTemplateName = 'index',
        $defaultLayoutName = 'prototype'
    )
    {
        $this->template = $template;
        $this->defaultTemplateName = $defaultTemplateName;
        $this->defaultLayoutName = $defaultLayoutName;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * @return HtmlResponse
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $templateName = $this->defaultTemplateName;
        $layoutName = $this->defaultLayoutName;

        if (isset($request->getQueryParams()['t'])) {
            $templateName = $request->getQueryParams()['t'];
        }

        if (isset($request->getQueryParams()['l'])) {
            $layoutName = $request->getQueryParams()['l'];
        }

        return new HtmlResponse(
            $this->template->render(
                'proto::' . $templateName,
                ['layout' => 'proto-layout::' . $layoutName]
            )
        );
    }
}
