# Nice error pages for your webserver

The goal of this project is to give you (the server operator) a drop in solution for user friendly error pages. No more
excuses for lame black and white error pages.

## Demo

* http://github.janoszen.com/errorpages/http-errors/

## Apache HTTPd

    Alias /http-errors /your/errorpages/repo/root/http-errors
    ErrorDocument 400 /http-errors/400.html
    ErrorDocument 401 /http-errors/401.html
    ErrorDocument 403 /http-errors/403.html
    ErrorDocument 404 /http-errors/404.html
    ErrorDocument 405 /http-errors/405.html
    ErrorDocument 406 /http-errors/406.html
    ErrorDocument 408 /http-errors/408.html
    ErrorDocument 413 /http-errors/413.html
    ErrorDocument 414 /http-errors/414.html
    ErrorDocument 417 /http-errors/417.html
    ErrorDocument 500 /http-errors/500.html

## nginx

    error_page 400 /http-errors/400.html;
    error_page 401 /http-errors/401.html;
    error_page 403 /http-errors/403.html;
    error_page 404 /http-errors/404.html;
    error_page 405 /http-errors/405.html;
    error_page 406 /http-errors/406.html;
    error_page 408 /http-errors/408.html;
    error_page 413 /http-errors/413.html;
    error_page 414 /http-errors/414.html;
    error_page 417 /http-errors/417.html;
    error_page 500 /http-errors/500.html;
    location ^~ /http-errors/ {
        internal;
        root  /your/errorpages/repo/root;
    }

## LigHTTPd

    server.errorfile-prefix = "/your/errorpages/repo/root/http-errors/"

## Help us out

We need your help! If you have a few minutes and do speak languages, please add some translations here:

https://docs.google.com/spreadsheet/ccc?key=0Ajx7jZMYOdDHdHQzWjJ4dmNSTmhfWWRRWWVkOFFzeHc#gid=0

## License

Public domain. For the countries/legislations where there's no public domain, an appropriate license is provided.

## Credits

### Code

* Janos Pasztor

### Hungarian, German and English texts

* Janos Pasztor

### Russian texts

* D. Solomatina