.. _top:
.. title:: General Ledger

`Back to index <index.rst>`_

==============
General Ledger
==============

.. contents::
    :local:


List General Ledger Accounts
````````````````````````````

.. code-block:: php
    
    $result = $client->generalLedger->list([
        'ID' => '',
        'Code' => '',
        'Categorie' => ''
    ]);


Create General Ledger Account
`````````````````````````````

.. code-block:: php
    
    $result = $client->generalLedger->create([
        'ID' => '',
        'Code' => '800001',
        'Omschrijving' => 'Foo Bar 1',
        'Categorie' => 'BAR',
        'Groep' => ''
    ]);


Update General Ledger Account
`````````````````````````````

.. code-block:: php
    
    $result = $client->generalLedger->update([
        'ID' => '10000000',
        'Code' => '800002',
        'Omschrijving' => 'Foo Bar 2',
        'Categorie' => 'FOO',
        'Groep' => ''
    ]);


`Back to top <#top>`_