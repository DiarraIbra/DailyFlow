# 📝 DailyFlow - Gestion des Tâches 🚀

DailyFlow est une application Laravel permettant de gérer efficacement ses tâches quotidiennes avec **authentification**, **pagination** et une **interface responsive** en Bootstrap.

---

## 📌 Fonctionnalités

✅ **Inscription et connexion des utilisateurs** (Laravel Breeze)  
✅ **Création, mise à jour et suppression** des tâches  
✅ **Pagination** (1 tâche par page)  
✅ **Interface responsive** avec Bootstrap 5  
✅ **Sécurisation** des actions avec authentification  
✅ **Boîte de confirmation stylée (Bootstrap Modal)** avant suppression  

---

## 📌 Installation et Configuration

### 1️⃣ **Cloner le projet**
```bash
git clone https://github.com/ton_nom_utilisateur/DailyFlow.git
cd DailyFlow
2️⃣ Installer les dépendances
bash
Copier
Modifier
composer install
npm install && npm run build
3️⃣ Configurer l'environnement
bash
Copier
Modifier
cp .env.example .env
Modifier .env avec les informations de ta base de données :

env
Copier
Modifier
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dailyflow
DB_USERNAME=root
DB_PASSWORD=
4️⃣ Générer la clé de l'application
bash
Copier
Modifier
php artisan key:generate
5️⃣ Exécuter les migrations et seeders
bash
Copier
Modifier
php artisan migrate --seed
6️⃣ Lancer le serveur
bash
Copier
Modifier
php artisan serve
L'application est accessible sur :
📌 http://127.0.0.1:8000/
