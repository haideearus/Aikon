
No.1
+-----------------------------------------------------+
|                       Aikon2 App                    |
+-----------------------------------------------------+
|                                                     |
| +---------------------+       +-------------------+ |
| | Pagina de           |       |   Bază de date    | |
| | autentificare (Sign |       |   (DBMS - SQL)    | |
| | In)                 |       |                   | |
| +---------------------+       +-------------------+ |
|               |                            |        |
|               |        Formular de         |        |
|               |      autentificare         |        |
|               v                            v        |
| +------------------------+   +------------------+   |
| | Validare și verificare |   | Verificare       |   |
| | credențiale            |   | existență        |   |
| |                        |   | utilizator       |   |
| +------------------------+   +------------------+   |
|               |                            |        |
|               |       Răspuns cu           |        |
|               |   succes sau eroare        |        |
|               v                            v        |
| +------------------------+ +--------------------+   |
| | Pagina de înregistrare | | Baza de date       |   |
| | (Register)             | | (Tabel utilizatori)|   |
| +------------------------+ +--------------------+   |
|               |                            |        |
|               |         Formular de        |        |
|               |       înregistrare         |        |
|               v                            v        |
| +---------------------------+ +------------------+  |
| | Validare și verificare    | | Salvare date     |  |
| | date înregistrare         | | utilizator în    |  |
| |                           | | baza de date     |  |
| +---------------------------+ +------------------+  |
|               |                            |        |
|               |         Răspuns cu         |        |
|               |     succes sau eroare      |        |
|               v                            v        |
| +----------------------------+ +-----------------+  |
| | Pagina de recuperare a     | | Actualizare     |  |
| | parolei (Forgot Password)  | | parolă în baza  |  |
| +----------------------------+ | de date         |  |
|                                +-----------------+  |
|                                                     |
+-----------------------------------------------------+

No.2
+-----------------------------------------------------+
|                          Aikon2 App                 |
+-----------------------------------------------------+
|                       +-------------+               |
|                       |  Componente |               |
|                       +-------------+               |
|                             |                       |
|               +------------------------+            |
|               |    Rutare (Routing)    |            |
|               +------------------------+            |
|                             |                       |
|       +-----------------------------------+         |
|       |         Cereri către API          |         |
|       +-----------------------------------+         |
|                             |                       |
|       +-----------------------------------+         |
|       |    Stilizare și aspect vizual     |         |
|       +-----------------------------------+         |
|                             |                       |
|       +-----------------------------------+         |
|       |           Componente UI           |         |
|       +-----------------------------------+         |
|                             |                       |
|       +-----------------------------------+         |
|       |    Manipularea evenimentelor      |         |
|       +-----------------------------------+         |
|                             |                       |
| +-------------------------------------------------+ |
| | Gestionarea stării globale (Context API, Redux) | | 
| +-------------------------------------------------+ |
|                             |                       |
|       +-----------------------------------+         |
|       |   Validare și verificare date     |         |
|       |               formular            |         |
|       +-----------------------------------+         |
|                             |                       |
|       +-----------------------------------+         |
|       |     Manipularea datelor (CRUD)    |         |
|       +-----------------------------------+         |
|                             |                       |
|       +-----------------------------------+         |
|       |    Gestionarea autentificării     |         |
|       +-----------------------------------+         |
|                             |                       |
+-----------------------------------------------------+
 
 No.3
+----------------------------------------+
|              Frontend                  |
|                                        |
|  Login                                 |
|  Register                              |
|  Forgot Password                       |
|  Profile                               |
|  Settings                              |
|  Notifications                         |
|  ...                                   |
|                                        |
+----------------+-----------------------+
                 |
                 |
                 v
+----------------------------------------+
|              Backend                   |
|                                        |
|    +--------------------------+        |
|    |        API Layer         |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |   Middleware             |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |   Authentication         |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |   Authorization          |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |   Database Connection    |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |      SQL Database        |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |         Queries          |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |       Permissions        |        |
|    +--------------------------+        |
|                 |                      |
|    +--------------------------+        |
|    |         Groups            |       |
|    +--------------------------+        |
|                                        |
+----------------------------------------+

No.4
 1. Frontend
 2. Backend
    2.1 API Layer
    2.2 Middleware
    2.3 Authentication
    2.4 Authorization
    2.5 Database Connection
    2.6 SQL Database
    2.7 Queries
    2.8 Permissions
    2.9 Groups
    
 3. Frontend Components
    3.1 Login
    3.2 Register
    3.3 Forgot Password
    3.4 Profile
    3.5 Settings
    3.6 Notifications
    ...