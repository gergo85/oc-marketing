<?php

return [
    'plugin' => [
        'name' => 'Marketing menedzser',
        'description' => 'Hirdetések, posztok, projektek és ügyfelek kezelése.',
        'author' => 'Szabó Gergő'
    ],
    'menu' => [
        'marketing' => 'Marketing',
        'ads' => 'Hirdetések',
        'posts' => 'Bejegyzések',
        'projects' => 'Projektek',
        'clients' => 'Ügyfelek',
        'tasks' => 'Teendők'
    ],
    'title' => [
        'ads' => 'hirdetés',
        'posts' => 'bejegyzés',
        'projects' => 'projekt',
        'clients' => 'ügyfél',
        'tasks' => 'teendő'
    ],
    'label' => [
        'ads' => 'Marketing - Hirdetések',
        'posts' => 'Marketing - Bejegyzések',
        'projects' => 'Marketing - Projektek',
        'clients' => 'Marketing - Ügyfelek',
        'tasks' => 'Marketing - Teendők'
    ],
    'new' => [
        'ads' => 'Új hirdetés',
        'posts' => 'Új bejegyzés',
        'projects' => 'Új projekt',
        'clients' => 'Új ügyfél',
        'tasks' => 'Új teendő'
    ],
    'form' => [
        // Általános
        'name' => 'Név',
        'project' => 'Projekt',
        'start' => 'Kezdete',
        'end' => 'Vége',
        'status' => 'Státusz',
        'user' => 'Munkatárs',
        'common' => 'Megjegyzés',
        'created' => 'Létrehozva',
        'updated' => 'Módosítva',
        // Hirdetés
        'type' => 'Típus',
        'online' => 'Online',
        'offline' => 'Offline',
        'location' => 'Helye',
        'text' => 'Szöveg',
        // Ügyfél
        'address' => 'Cím',
        'contact' => 'Kapcsolattartó',
        'contact_name' => 'Név',
        'contact_assignment' => 'Beosztás',
        'contact_tel' => 'Telefon',
        'contact_email' => 'E-mail',
        'logo' => 'Logó',
        'pieces' => 'darab',
        // Bejegyzés
        'title' => 'Cím',
        'url' => 'Webcím',
        'lang' => 'Nyelv',
        'feedback' => 'Visszajelzés',
        'comment' => 'Bejegyzés',
        // Projekt
        'client' => 'Ügyfél',
        'task' => 'Feladat',
        'goal' => 'Cél',
        'income' => 'Bevétel',
        'cost' => 'Kiadás',
        // Teendő
        'description' => 'Leírás',
        'priority' => 'Fontosság',
        'deadline' => 'Határidő'
    ],
    'button' => [
        'activate' => 'Aktíválás',
        'deactivate' => 'Deaktiválás',
        'active' => 'Aktív',
        'inactive' => 'Inaktív',
        'report' => 'Jelentés küldése',
        'completed' => 'Elvégezve',
        'uncompleted' => 'Befejezettlen',
        'return' => 'Vissza'
    ],
    'widget' => [
        'show_total' => 'Összes mutatása',
        'show_higt' => 'Sürgősek mutatása',
        'show_normal' => 'Normálok mutatása',
        'show_low' => 'Ráérősek mutatása',
        'total' => 'Összes'
    ],
    'flash' => [
        'activate' => 'A tételek sikeresen aktiválva lettek.',
        'deactivate' => 'A tételek sikeresen deaktiválva lettek.',
        'completed' => 'A tételek sikeresen el lettek végezve.',
        'uncompleted' => 'A tételek nem lettek befejezve.',
        'report' => 'A jelentés sikeresen el lett küldve az ügyfélnek.',
        'priority' => 'A fontosság sikeresen módosítva lett.',
        'delete' => 'Valóban törölni akarja?',
        'remove' => 'Az eltávolítás sikeres volt.'
    ],
    'feedback' => [
        'none' => 'Nincs',
        'neutral' => 'Semleges',
        'positive' => 'Pozitív',
        'negative' => 'Negatív'
    ],
    'priority' => [
        'higt' => 'Sürgős',
        'normal' => 'Normál',
        'low' => 'Ráér'
    ],
    'permission' => [
        'ads' => 'Hirdetések kezelése',
        'posts' => 'Bejegyzések kezelése',
        'projects' => 'Projektek kezelése',
        'clients' => 'Ügyfelek kezelése',
        'tasks' => 'Teendők kezelése'
    ]
];
