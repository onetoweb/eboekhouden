.. _top:
.. title:: Relations

`Back to index <index.rst>`_

=========
Relations
=========

.. contents::
    :local:


List Relations
``````````````

.. code-block:: php
    
    $result = $client->relation->list([
        'Trefwoord' => '',
        'Code' => '',
        'ID' => ''
    ]);


Create Relation
```````````````

.. code-block:: php
    
    $result = $client->relation->create([
        'ID' => '',
        'AddDatum' => '2023-10-26',
        'Code' => 'BV42',
        'Bedrijf' => 'Bedrijf B.V.',
        'Contactpersoon' => '',
        'Geslacht' => '',
        'Adres' => '',
        'Postcode' => '',
        'Plaats' => '',
        'Land' => '',
        'Adres2' => '',
        'Postcode2' => '',
        'Plaats2' => '',
        'Land2' => '',
        'Telefoon' => '',
        'GSM' => '',
        'FAX' => '',
        'Email' => '',
        'Site' => '',
        'Notitie' => '',
        'Bankrekening' => '',
        'Girorekening' => '',
        'BTWNummer' => '',
        'KvkNummer' => '',
        'Aanhef' => '',
        'IBAN' => '',
        'BIC' => '',
        'BP' => '',
        'Def1' => '',
        'Def2' => '',
        'Def3' => '',
        'Def4' => '',
        'Def5' => '',
        'Def6' => '',
        'Def7' => '',
        'Def8' => '',
        'Def9' => '',
        'Def10' => '',
        'LA' => '',
        'Gb_ID' => '',
        'GeenEmail' => '',
        'NieuwsbriefgroepenCount' => ''
    ]);


Update Relation
```````````````

.. code-block:: php
    
    $result = $client->relation->update([
        'ID' => '10000000',
        'AddDatum' => '2023-10-26',
        'Code' => 'BV42',
        'Bedrijf' => 'Bedrijf B.V.',
        'Contactpersoon' => '',
        'Geslacht' => '',
        'Adres' => '',
        'Postcode' => '',
        'Plaats' => '',
        'Land' => '',
        'Adres2' => '',
        'Postcode2' => '',
        'Plaats2' => '',
        'Land2' => '',
        'Telefoon' => '',
        'GSM' => '',
        'FAX' => '',
        'Email' => '',
        'Site' => '',
        'Notitie' => '',
        'Bankrekening' => '',
        'Girorekening' => '',
        'BTWNummer' => '',
        'KvkNummer' => '',
        'Aanhef' => '',
        'IBAN' => '',
        'BIC' => '',
        'BP' => '',
        'Def1' => '',
        'Def2' => '',
        'Def3' => '',
        'Def4' => '',
        'Def5' => '',
        'Def6' => '',
        'Def7' => '',
        'Def8' => '',
        'Def9' => '',
        'Def10' => '',
        'LA' => '',
        'Gb_ID' => '',
        'GeenEmail' => '',
        'NieuwsbriefgroepenCount' => ''
    ]);


`Back to top <#top>`_