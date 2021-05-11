<?php

// THANKS: https://stackoverflow.com/a/2050965/9881278
function xcopy($src, $dest)
{
    if (!is_dir($dest)) {
        mkdir($dest);
    }

    foreach (scandir($src) as $file) {
        $srcfile = rtrim($src, DIRECTORY_SEPARATOR) .DIRECTORY_SEPARATOR. $file;
        $destfile = rtrim($dest, DIRECTORY_SEPARATOR) .DIRECTORY_SEPARATOR. $file;

        if (!is_readable($srcfile)) {
            continue;
        }
        if ($file === '.' || $file === '..') {
            continue;
        }

        if (is_dir($srcfile)) {
            if (!file_exists($destfile)) {
                mkdir($destfile);
            }
            xcopy($srcfile, $destfile);
        } else {
            copy($srcfile, $destfile);
        }
    }
}

function copiaDiretorioPublic() : string
{
    $publicDir = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'public']);
    $prevprodDir = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'prevprodFrontend']);

    xcopy($publicDir, $prevprodDir);

    return $prevprodDir;
}

function criaIndexHtml(string $path)
{
    file_put_contents (
        $path . DIRECTORY_SEPARATOR . 'index.html',
        <<<EOD
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/app.css">
        <title>Preview de interface</title>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
EOD);
}

function main(){
    echo shell_exec('npm run prevprod');
    $path = copiaDiretorioPublic();
    criaIndexHtml($path);
}

main();

