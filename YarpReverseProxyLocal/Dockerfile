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

EXPOSE 5000 2222

CMD [ "dotnet", "YarpReverseProxyLocal.dll" ]