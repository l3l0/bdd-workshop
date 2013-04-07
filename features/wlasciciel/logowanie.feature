# language: pl

Właściwość: Jako właściciel strony
    chciałbym zalogować się do systemu
    aby móc zarządać produktami

Scenariusz: Logowanie jako właściciel
    Zakładając że jestem na stronie zarządzania produktami
    I nie jestem zalogowany
    Gdy wypełniam pole "Login" wartością "Admin"
    I wypełniam pole "Hasło" wartością "Foo"
    Oraz klikam przycisk "Zaloguj"
    Wtedy powinna pojawić się lista produktów które moge edytować
    
Scenariusz: Nieudane logowanie
    Zakładając że jestem na stronie zarządzania produktami
    I nie jestem zalogowany
    Gdy wypełniam pole "Login" wartością "Admin"
    I wypełniam pole "Hasło" wartością "Jakieś Złe Hasło"
    Oraz klikam przycisk "Zaloguj"
    Wtedy nie powinna pojawić się lista produktów które moge edytować
    Oraz powinen pojawić się błąd "Podałeś zły login lub hasło"
