ApiSf2
======

A Symfony project created on November 3, 2015, 10:11 am.
http://welcometothebundle.com/symfony2-rest-api-the-best-2013-way/

#for debug
php composer.phar require "elao/web-profiler-extra-bundle" "~2.3@dev"
php composer.phar require "doctrine/doctrine-fixtures-bundle" "dev-master"
php composer.phar require "raulfraile/ladybug-bundle" "~1.0"
php composer.phar require "fzaninotto/faker" "1.4"


# st api bundles
php composer.phar require "friendsofsymfony/rest-bundle" "1.7.2"

php composer.phar require "jms/serializer-bundle" "1.0.0"

php composer.phar require "nelmio/api-doc-bundle" "2.10.3"

# note can not install
php composer.phar require "liip/hello-bundle" "dev-master"
# ed api bundles

#slug
php composer.phar require "cocur/slugify" "dev-master"

#resize image
php composer.phar require "liip/imagine-bundle" "dev-master"

#st easy admin
php composer.phar require "stof/doctrine-extensions-bundle" "~1.1@dev"
#upload file
php composer.phar require "vich/uploader-bundle" "^0.14.0"
#userbundle
php composer.phar require "friendsofsymfony/user-bundle" "~2.0@dev"
#easyadmin
php composer.phar require "javiereguiluz/easyadmin-bundle" "~1.0"
#ed easy admin

#call api
php composer.phar require "leaseweb/api-caller-bundle" "*"



http://symfony.com/doc/master/bundles/FOSRestBundle/index.html
http://symfony.com/doc/current/bundles/FOSRestBundle/7-manual-route-definition.html
https://github.com/nelmio/NelmioApiDocBundle/blob/master/Resources/doc/index.md


php app/console doctrine:generate:entity --entity=DaoApiBundle:Page --format=annotation --fields="title:string(255) body:text" --no-interaction
php app/console doctrine:schema:update --force
php app/console doctrine:generate:form DaoApiBundle:Page --no-interaction
