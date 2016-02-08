# ZE-Prototype
Zend-Expressive middleware. Prototyping tool - for fast and simple create static html pages

Just add Prototype module to your app like [this](https://zendframework.github.io/zend-expressive/cookbook/modular-layout).
Then, make sure you create a template for the page. In the above example,
I'd likely create the file in `templates/app/prototype/about.phtml`.

After this you may go to page <code>http://your.host/proto?t=about</code> or

- `http://your.host/proto?t=about/first` - and will be shown template `templates/app/prototype/about/first.phtml`
- `http://your.host/proto?t=about/second` - and will be shown template `templates/app/prototype/about/second.phtml`
- `http://your.host/proto?t=about/second&l=layout/empty` - and will be shown template `templates/app/prototype/about/second.phtml` 
and layout `templates/layout/empty.phtml`

## Configure

You may override config for your application. In `config/autoload/templates.global.php` just add `proto` and `proto-layout` namespace:
 
```php
'templates' => [
    // ...
    'paths' => [
        // ...
        'proto'  => ['templates/app/proto'],
        'proto-layout'  => ['templates/app/proto/layout'],
    ],
],
```

And create folder `proto` in `templates/app/`.
