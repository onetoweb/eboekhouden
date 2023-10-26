.. title:: Index

===========
Basic Usage
===========

Setup Client

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\Eboekhouden\Client;
    
    // param
    $username = '{username}';
    $securityCode1 = '{security_code_1}';
    $securityCode2 = '{security_code_2}';
    
    // setup client
    $client = new Client($username, $securityCode1, $securityCode2);


========
Examples
========

* `Administration <administration.rst>`_
* `Balance <balance.rst>`_
* `Invoices <invoice.rst>`_
* `Mutations <mutation.rst>`_
* `General Ledger <general_ledger.rst>`_
* `Relations <relations.rst>`_
* `Open Posts <open_post.rst>`_
* `Cost Centers <cost_center.rst>`_
* `Articles <article.rst>`_
