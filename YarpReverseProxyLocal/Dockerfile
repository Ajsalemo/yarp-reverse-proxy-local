FROM mcr.microsoft.com/dotnet/sdk:6.0 AS build
WORKDIR /app

COPY *.csproj ./
RUN dotnet restore

COPY . ./
RUN dotnet publish -c Release -o out

# Final layer
FROM mcr.microsoft.com/dotnet/aspnet:6.0
ENV ASPNETCORE_URLS=http://+:5000
WORKDIR /app
COPY --from=build /app/out .

COPY sshd_config /etc/ssh/
COPY init_container.sh /opt/

# Start and enable SSH
ENV SSH_PASSWD "root:Docker!"
RUN apt-get update \
    && apt-get install -y --no-install-recommends dialog \
    && apt-get update \
    && apt-get install -y --no-install-recommends openssh-server \
    && echo "$SSH_PASSWD" | chpasswd \
    && chmod u+x /opt/init_container.sh

EXPOSE 8080 2222
ENTRYPOINT ["/opt/init_container.sh"]

EXPOSE 5000 2222

CMD [ "dotnet", "YarpReverseProxyLocal.dll" ]