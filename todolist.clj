- creation des repertoires :
    - pages
    - inc
    - assets
        - css
        - js
        - image (optionnal)

- manipulation base :
    - creation des views (processing)

- index.php :
    - header -> pages/index.php

---- inc -------

- connect.php (Connexion base employees)
- function.php :
    - getDepartements() (FROM view miaraka amin'ilay colonne ajoutee)
    - getEmployees(id_dept)

---- pages -----

- modal.php :
    - include $_GET['page']

- index.php :
    - layout :
        - div.container (1)
            
    - content :
        (1) :
            - section > table