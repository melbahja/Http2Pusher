# Http2Pusher
PHP Http2 Server Pusher

## About Http2 Server Push :

> HTTP/2 Push allows a web server to send resources to a web browser before the browser gets to request them. It is, for the most part, a performance technique that can help some websites load faster. - [wikipedia](https://en.wikipedia.org/wiki/HTTP/2_Server_Push)

![http2](https://blog.cloudflare.com/content/images/2015/12/http-2-multiplexing.png)
<small>image by cloudflare</small>

## Installation :

using composer: ```bash composer require melbahja/http2-pusher ```

## Usage :

get the instance:
```php

require 'vendore/autoload.php';

use Melbahja\Http2\Pusher;

$pusher = Pusher::getInstance();

``` 

examples:

```php

// set css file
$pusher->link('/assets/css/style.css');

// set css and image and src
$pusher->link('/asstes/css/main.css')
	->src('/assets/js/scripts.js')
	->img('/assets/img/logo.png')
	-set(Pusher::IMG, '/assets/img/logo2.png');


// set link with options
$pusher->link('https://fonts.gstatic.com', [
	'as' => false,
	'rel' => 'preconnect' 
]);	

// rel by default is preload
// as by default is the link type 


// push header
$pusher->push();

```

## Public methods :

```
Pusher::getInstance(): PusherInterface

Pusher::link(string $link, array $opts = []): PusherInterface

Pusher::src(string $link, array $opts = []): PusherInterface

Pusher::img(string $link, array $opts = []): PusherInterface

Pusher::set(string $type, string $link, array $opts = []): PusherInterface

Pusher::getHeader(string $type = null): string

Pusher::push(string $type = null): void

Pusher::public function toHeader(string $type, array $urls): null|string
```

## License :

[MIT](https://github.com/melbahja/Http2Pusher/blob/master/LICENSE) Copyright (c) 2017 Mohamed Elbahja
