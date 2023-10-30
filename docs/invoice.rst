.. _top:
.. title:: Invoice

`Back to index <index.rst>`_

=======
Invoice
=======

.. contents::
    :local:


List Invoices
`````````````

.. code-block:: php
    
    $result = $client->invoice->list([
        'Factuurnummer' => 'F00001',
        'Relatiecode' => 'REL',
        'DatumVan' => '2022-01-01',
        'DatumTm' => '2023-12-31'
    ]);


Create Invoice
``````````````

.. code-block:: php
    
    $result = $client->invoice->create([
        'Factuurnummer' => '',
        'Relatiecode' => 'BV42',
        'Datum' => '2023-10-26',
        'Betalingstermijn' => 14,
        'Factuursjabloon' => '',
        'PerEmailVerzenden' => true,
        'EmailOnderwerp' => '',
        'EmailBericht' => '',
        'EmailVanAdres' => '',
        'EmailVanNaam' => '',
        'AutomatischeIncasso' => true,
        'IncassoIBAN' => '',
        'IncassoMachtigingSoort' => '',
        'IncassoMachtigingID' => '',
        'IncassoMachtigingDatumOndertekening' => '2023-10-26',
        'IncassoMachtigingFirst' => true,
        'IncassoRekeningNummer' => '',
        'IncassoTnv' => '',
        'IncassoPlaats' => '',
        'IncassoOmschrijvingRegel1' => '',
        'IncassoOmschrijvingRegel2' => '',
        'IncassoOmschrijvingRegel3' => '',
        'InBoekhoudingPlaatsen' => true,
        'Regels' => [
            [
                'Aantal' => 1.0,
                'Eenheid' => '',
                'Code' => '',
                'Omschrijving' => '',
                'PrijsPerEenheid' => 0.0,
                'BTWCode' => '',
                'TegenrekeningCode' => '',
                'KostenplaatsID' => 0
            ], [
                'Aantal' => 1.0,
                'Eenheid' => '',
                'Code' => '',
                'Omschrijving' => '',
                'PrijsPerEenheid' => 0.0,
                'BTWCode' => '',
                'TegenrekeningCode' => '',
                'KostenplaatsID' => 0
            ]
        ],
    ]);


`Back to top <#top>`_