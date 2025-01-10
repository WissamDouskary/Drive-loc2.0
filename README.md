# 🚗 Location de Véhicules - Plateforme de Location en Ligne

Une plateforme moderne de location de véhicules permettant aux clients de parcourir, réserver et gérer leurs locations de véhicules en toute simplicité.

---

## Table of Contents
- [Fonctionnalités Principales](#-fonctionnalités-principales)
  - [Pour les Clients](#pour-les-clients)
  - [Pour les Administrateurs](#pour-les-administrateurs)
- [Technologies Utilisées](#-technologies-utilisées)
- [Fonctionnalités Techniques](#-fonctionnalités-techniques)
- [Getting Started](#getting-started)
  - [Installation](#installation)
  - [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

---

## 📋 Fonctionnalités Principales

### Pour les Clients
- **Authentification sécurisée** pour accéder à la plateforme
- **Exploration des véhicules** par catégories
- **Affichage détaillé des véhicules** (modèle, prix, disponibilité)
- **Système de réservation** avec sélection des dates et lieux
- **Recherche avancée de véhicules**
- **Filtrage dynamique** sans rechargement de page
- **Système d'avis et d'évaluation**
- **Pagination des listings de véhicules**
  - **Version standard** : Pagination PHP
  - **Version avancée** : Intégration de DataTable
- **Gestion des avis personnels** (modification/suppression avec Soft Delete)

### Pour les Administrateurs
- **Insertion en masse** de véhicules et catégories
- **Dashboard administratif complet** avec statistiques
- **Gestion complète des :**
  - Réservations
  - Véhicules
  - Avis
  - Catégories

---

## 🛠 Technologies Utilisées

- **Frontend** : HTML, CSS, JavaScript
- **Backend** : PHP
- **Base de données** : MySQL

---

## 🧑‍💻 Fonctionnalités Techniques

- **Vue SQL "ListeVehicules"** pour l'affichage optimisé des véhicules
- **Procédure stockée "AjouterReservation"** pour la gestion des réservations

---

## Getting Started

### Installation
1. Clone the repository: `git clone https://github.com/WissamDouskary/Drive-loc2.0.git`
2. Navigate to the project directory: `cd Drive-loc2.0`
3. Install dependencies: `composer install` (for PHP dependencies)
4. Set up the database:
   - Create a new MySQL database
   - Import the provided SQL file: `mysql -u username -p database_name < database.sql`

### Usage
1. Start the development server: `php -S localhost:8000`
2. Open your browser and navigate to `http://localhost:8000`

## Contributing
1. Fork the repository
2. Create a new branch: `git checkout -b feature-branch`
3. Make your changes
4. Commit your changes: `git commit -m 'Add new feature'`
5. Push to the branch: `git push origin feature-branch`
6. Open a pull request

## Lien de Diagram UML Use Case
`https://lucid.app/lucidchart/621ec3f2-3f53-42e5-8c8d-b7573019bbbc/edit?viewport_loc=699%2C1573%2C2961%2C1381%2C.Q4MUjXso07N&invitationId=inv_fae3c773-b6bc-4c8d-93d9-d557a11556e4`

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
