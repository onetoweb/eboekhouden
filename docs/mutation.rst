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
        'Datum' => '2023-10-30',
        'Rekening' => '800001',
        'RelatieCode' => '',
        'Factuurnummer' => '',
        'Boekstuk' => '',
        'Omschrijving' => 'Mutatie',
        'Betalingstermijn' => '',
        'Betalingskenmerk' => '',
        'InExBTW' => 'IN',
        'MutatieRegels' => [
            [
                'BedragInvoer' => 0,
                'BedragExclBTW' => 0,
                'BedragBTW' => 0,
                'BedragInclBTW' => 0,
                'BTWCode' => '',
                'BTWPercentage' => 21,
                'TegenrekeningCode' => '800002',
                'KostenplaatsID' => 0
            ], [
                'BedragInvoer' => 0,
                'BedragExclBTW' => 0,
                'BedragBTW' => 0,
                'BedragInclBTW' => 0,
                'BTWCode' => '',
                'BTWPercentage' => 21,
                'TegenrekeningCode' => '800003',
                'KostenplaatsID' => 0
            ]
        ]
    ]);


`Back to top <#top>`_