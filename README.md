# ESGI-TP-Symfony :

## Installation

```bash
first : 
$ make up
then :
$ make install
$ make fixtures
$ make assets-install
$ make assets-build

```

## Usage

```bash
$ make help
```
---

## Fixtures 

### User :
- **Super Admin** :
    - Username : Super Admin
    - email : super.admin@eureka.fr
    - Password : super_admin_eureka
- **Admin** :
    - Username : Admin
    - email : admin@eureka.fr
    - Password : admin_eureka
- **Teacher** :
    - Username : Teacher
    - email : teacher@eureka.fr
    - Password : teacher_eureka
- **Student** :
    - Username : Student
    - email : student@eureka.fr
    - Password : student_eureka
- **Banned User** :
    - Username : Banned User
    - email : banned@eureka.fr
    - Password : banned_eureka

---

## Brief 
### Thème N°8 Exercices -> Matières, Chapitres, Exercices, Commentaires

Vous devez travailler sur le thème imposé. **Si vous ne respectez pas le thème, ce sera 0.**

---

### Features à faire sur les projets :

- **Créer les entités et faire les relations** (minimum 4 entités).
- **Créer des fixtures** (PHP ou YAML).
- **Faire l'authentification :**
    - Login.
    - Mot de passe oublié, reset du mot de passe.
    - Avoir **3 rôles différents** :
        - `ADMIN`
        - `USER`
        - `BANNED`
- **Afficher du contenu dynamiquement** en fonction de l'état de connexion de l'utilisateur :
    - **Si connecté** :
        - Afficher son nom et prénom.
        - Afficher un bouton pour se déconnecter.
    - **Si non connecté** :
        - Afficher un bouton pour se connecter.
- **Afficher du contenu dynamiquement** en fonction des rôles de l'utilisateur :
    - **Si `ADMIN`** :
        - Afficher un bouton pour accéder à l'administration.
    - **Si `USER`** :
        - Afficher un bouton pour accéder à son profil.
    - **Si `BANNED`** :
        - Afficher un message pour indiquer qu'il est banni et ne pas lui afficher les pages.
- **Créer les pages pour** :
    - Lire.
    - Créer.
    - Modifier.
    - Supprimer.
    - ...les différentes entités.
- **Pensez à sécuriser les formulaires et les routes.**

---

### Autres informations :

- Toute chose qui n'est pas demandée peut rapporter des points supplémentaires :
    - Plus d'entités = **Points en +**.
    - Features non demandées = **Points en +**.
    - Technologies supplémentaires = **Points en +**.
    - Etc.

