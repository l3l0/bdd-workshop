# language: pl

Właściwość: Jako właściciel strony
    chciałbym zarządzać produktami  
    które się na niej pojawiają

Założenia:
    Zakładając że jestem zalogowany jako właściciel strony
    Oraz istnieją następujące produkty:
     | nazwa   | opis                                                                                                 | cena    |
     | DTX450k | Elektroniczny zestaw perkusyjny Yamaha DTX450 to idealny zestaw na początek przygody z perkusją.     | 2399    |
     | DTX950k | Ten rewolucyjny, flagowy model perkusji elektronicznej jest wyposażony w pełen zestaw padów DTX-PAD. | 14499.5 |

Scenariusz: Wyświetlanie listy produktów
    Zakładając że jestem na stronie zarządzania produktami
    Wtedy produkt "DTX450k" powinnen być widoczny
    Oraz produkt "DTX950k" powinnen być widoczny

@wip
Scenariusz: Dodawanie nowego produktu
    Zakładając że jestem na stronie zarządzania produktami
    I kliklam w link "Dodaj Produkt"
    Gdy wypełniam pole "Nazwa" wartością "DM6 Kit"
    Oraz wypełniam pole "Opis" wartością "Alesis DM6 wyposażony został w zupełnie nowy moduł z 108 brzmieniami bębnów, talerzy i zestawów perkusyjnych."
    Oraz wypełniam pole "Cena" wartością "2379,50"
    I klikam przycisk "Zapisz"
    Wtedy powinna pojawić się lista z produktem "DM6 Kit" na czele

Scenariusz: Usuwanie istniejącego produktu
Scenariusz: Wyświetlanie produktu

Scenariusz: Edycja produkt
