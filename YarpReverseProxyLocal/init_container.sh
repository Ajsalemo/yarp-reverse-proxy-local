#!/bin/sh

echo "Starting SSH ..."
service ssh start

# Run the application
dotnet YarpReverseProxyLocal.dll