Contact Bundle
==============

This [Symfony](http://symfony.com/) bundle providing base for manage contact form.

The aim is to factorise website contact form.


## Installation

`php composer.phar require th3mouk/contact-bundle ^1.0@dev`

Add to the `appKernel.php`:

```php
new Th3Mouk\ContactBundle\Th3MoukContactBundle(),
```

Update your `routing.yml` application's file.

```yml
th3mouk_contact:
    resource: "@Th3MoukContactBundle/Resources/config/routing.yml"
    prefix:   /contact
```

Configure entities and templates in `config.yml`

```yml
th3mouk_contact:
    class:
        entity: AppBundle\Entity\Contact
        formType: AppBundle\Form\ContactType

    templates:
        application: AppBundle:Contact:contact.html.twig
        mailer: AppBundle:Contact:mail.html.twig
```

Full configuration is in writing.

## Please

Feel free to improve this bundle.
