ARG NGINX_VERSION=1.25

FROM nginx:${NGINX_VERSION}-alpine

ENV fastcgi_pass "php:9000"
ENV root "/srv/public"
ENV index "index.php"
ENV index_regex "index\.php"

ADD ./default.conf /etc/nginx/conf.d/default.template

CMD sh -c "envsubst \"`env | awk -F = '{printf \" \\\\$%s\", $1}'`\" < /etc/nginx/conf.d/default.template > /etc/nginx/conf.d/default.conf && nginx -g 'daemon off;'"