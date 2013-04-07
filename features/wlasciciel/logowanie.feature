# language: pl

Właściwość: Jako właściciel strony
    chciałbym zalogować się do systemu
    aby móc zarządać produktami

Scenariusz: Logowanie jako właściciel
    Zakładając że jestem na stronie produktów
    I nie jestem zalogowany
    Gdy wypełniam pole "Login" wartością "Admin"
    I wypełniam pole "Hasło" wartością "Foo"
    Oraz wysyłam formularz
    Wtedy powinna pojawić się lista produktów które moge edytować
    
Scenariusz: Nieudane logowanie
    Zakładając że jestem na stronie produktów
    I nie jestem zalogowany
    Gdy wypełniam pole "Login" wartością "Admin"
    I wypełniam pole "Hasło" wartością "Jakieś Złe Hasło"
    Oraz wysyłam formularz
    Wtedy nie powinna pojawić się lista produktów które moge edytować
    Oraz powinen pojawić się błąd "Podałeś zły login lub hasło"
