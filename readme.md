# Prueba tecnica

**Sistema de usuarios simple con laravel y vuejs.**

## Usar

Para clonar y ejecutar este repositorio, necesitará [Git](https://git-scm.com) y [Node.js](https://nodejs.org/en/download/) (que viene con [npm](http://npmjs.com)) instalado en su computadora. Desde tu línea de comando:

```bash
# Clone this repository
git clone https://github.com/AlbertoTorre/pt_exergy.git
# Go into the repository
cd pt_exergy

# Database migration:
Primero debemos crear  la base de datos con el nombre  pt_exergy o cualquier otro, 
este nombre lo ponemos en el archivo .env

php  artisan  migrate --seed  o  php  artisan  migrate 

Para ejecutar vuejs en el proyecto el comando  npm update y luego npm run dev.  