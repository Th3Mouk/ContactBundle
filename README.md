Contact Bundle
==============

This [Symfony](http://symfony.com/) bundle providing base for manage contact form.

The aim is to factorise website contact form.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8b9d7aff-9d73-4a54-8c57-edc2257a24ab/mini.png)](https://insight.sensiolabs.com/projects/8b9d7aff-9d73-4a54-8c57-edc2257a24ab) [![Latest Stable Version](https://poser.pugx.org/th3mouk/contact-bundle/v/stable)](https://packagist.org/packages/th3mouk/contact-bundle) [![Total Downloads](https://poser.pugx.org/th3mouk/contact-bundle/downloads)](https://packagist.org/packages/th3mouk/contact-bundle) [![Latest Unstable Version](https://poser.pugx.org/th3mouk/contact-bundle/v/unstable)](https://packagist.org/packages/th3mouk/contact-bundle) [![License](https://poser.pugx.org/th3mouk/contact-bundle/license)](https://packagist.org/packages/th3mouk/contact-bundle)


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
