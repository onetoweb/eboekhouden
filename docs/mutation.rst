.. _top:
.. title:: Mutations

`Back to index <index.rst>`_

=========
Mutations
=========

.. contents::
    :local:


List Mutations
``````````````

.. code-block:: php
    
    $result = $client->mutation->list([
        'MutatieNr' => '',
        'MutatieNrVan' => '',
        'MutatieNrTm' => '',
        'Factuurnummer' => '',
        'DatumVan' => '2022-01-01',
        'DatumTm' => '2023-12-31'
    ]);


Create Mutation
```````````````

.. code-block:: php
    
    $result = $client->mutation->create([
        'MutatieNr' => '',
        'Soort' => 'Memoriaal',
        'Datum' => '2023-10-26',
        'Rekening' => '',
        'RelatieCode' => '',
        'Factuurnummer' => '',
        'Boekstuk' => '',
        'Omschrijving' => 'Mutatie',
        'Betalingstermijn' => '',
        'Betalingskenmerk' => '',
        'InExBTW' => 'IN'
    ]);


`Back to top <#top>`_