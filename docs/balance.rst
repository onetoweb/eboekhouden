.. _top:
.. title:: Balance

`Back to index <index.rst>`_

=======
Balance
=======

.. contents::
    :local:


List Balance
````````````

.. code-block:: php
    
    $result = $client->balance->list([
        'KostenPlaatsId' => 0,
        'DatumVan' => '2022-01-01',
        'DatumTot' => '2023-12-31',
        'Categorie' => 'DEB'
    ]);


Get Balance
```````````

.. code-block:: php
    
    $result = $client->balance->get([
        'KostenPlaatsId' => 0,
        'DatumVan' => '2022-01-01',
        'DatumTot' => '2023-12-31',
        'GbCode' => '12000'
    ]);


`Back to top <#top>`_