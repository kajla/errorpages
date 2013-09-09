# Nice HTML error pages for your webserver

## Apache HTTPd

    Alias /http-errors /your/http/errors/directory
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
        root  /your/http/errors/directory;
        allow all;
    }

