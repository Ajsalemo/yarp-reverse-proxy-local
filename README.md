# yarp-reverse-proxy-local

A small sample using [Yarp](https://microsoft.github.io/reverse-proxy/). This proxies from the Yarp application (.NET 6) running on localhost:5000 to a PHP 8 Docker Container that would run on localhost:8080.

Tested using concepts:

[Configuration File](https://microsoft.github.io/reverse-proxy/articles/config-files.html)

[Response Header removal](https://microsoft.github.io/reverse-proxy/articles/transforms.html#response-and-response-trailers)

