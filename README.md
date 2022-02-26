# yarp-reverse-proxy-local

A small sample using [Yarp](https://microsoft.github.io/reverse-proxy/). This proxies from the Yarp application (.NET 6) running on localhost:5000 to a PHP 8 Docker Container that would run on localhost:80.

This can be used with docker-compose or running as separate 'single' contains with the use of a user-created network so Yarp can call the upstream service by container name, such as below:

`docker network create <networkname>`

`docker run -d -p <hostport>:<containerport> --net=<networkname> --name <containername> <image>:<tag>`

Tested using concepts:

[Configuration File](https://microsoft.github.io/reverse-proxy/articles/config-files.html)

[Response Header removal](https://microsoft.github.io/reverse-proxy/articles/transforms.html#response-and-response-trailers)

[Health Checks](https://microsoft.github.io/reverse-proxy/articles/dests-health-checks.html#:~:text=Active%20health%20checks%20YARP%20can%20proactively%20monitor%20destination,the%20calculation%20of%20the%20new%20destination%20health%20states.)

