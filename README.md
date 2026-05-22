# ✨ PeerSync ENAA - Plateforme de Tutorat entre Apprenants

**PeerSync ENAA** est une application web interactive d'entraide et de tutorat conçue exclusivement pour les apprenants de l'ENAA. La plateforme permet aux apprenants ayant des difficultés de créer des demandes d'aide (Tickets), et aux tuteurs (autres apprenants maîtrisant les technologies) de prendre en charge ces demandes pour des sessions de tutorat.

---

## 🚀 Fonctionnalités Principales

- **Système d'Authentification Sécurisé :** Inscription et connexion dynamiques différenciant les rôles (APPRENANT / TUTEUR).
- **Gestion des Demandes d'Aide (Tickets) :** Création de tickets avec titre, description détaillée et choix de la technologie (PHP, JavaScript, Tailwind CSS, etc.).
- **Prise en Charge Automatisée (Assignation) :** Les tuteurs peuvent s'assigner des tickets ouverts (avec interdiction métier de s'assigner son propre ticket).
- **Résolution & Évaluation :** Clôture des sessions de tutorat avec possibilité pour l'apprenant de laisser une note et un commentaire (Review).

---

## 🛠️ Stack Technique & Architecture

L'application est développée en respectant les principes de la **Programmation Orientée Objet (POO) Stricte** et un design pattern modulaire :

- **Frontend :** HTML5, Tailwind CSS (via CDN), JavaScript (ES6).
- **Backend :** PHP (POO Strict, Encapsulation, Namespaces).
- **Base de données :** MySQL (PDO pour la sécurité contre les injections SQL).
- **Architecture Logique :**
  - `Entities/` : Classes métiers strictes (`User.php`, `HelpRequest.php`, `Review.php`) avec hydratation et typage fort.
  - `Repositories/` : Couche d'accès aux données (`UserRepository.php`, `TicketRepository.php`).
  - `Enums/` : Gestion des états de manière propre (`Statut.php`).
  - `Views/` : Interfaces utilisateurs propres (`login.php`, `register.php`, `dashboard.php`).

---

## 📦 Structure du Projet

```text
├── config/
│   └── Database.php
├── Entities/
│   ├── User.php
│   ├── HelpRequest.php
│   └── Review.php
├── Repositories/
│   ├── UserRepository.php
│   └── TicketRepository.php
├── Enums/
│   └── Statut.php
└── views/
    ├── login.php
    ├── register.php
    ├── dashboard.php
    └── actions_handler.php

realise par : Jihane Jador