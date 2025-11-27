@echo off
title Metabase - Servidor
cd /d %~dp0

echo Verificando arquivo metabase.jar...

IF NOT EXIST "metabase.jar" (
    echo.
    echo ERRO: Arquivo metabase.jar NAO encontrado!
    echo Certifique-se de que o arquivo esta nesta pasta:
    echo %~dp0
    echo.
    pause
    exit /b
)

echo Arquivo encontrado! Iniciando Metabase...
java -jar metabase.jar

pause
