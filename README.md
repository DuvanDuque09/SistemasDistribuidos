# ScotiaApp

Este proyecto fue desarrollado con el framework [Laravel](https://laravel.com/) version 11.

El objetivo principal de este proyecto es mejorar significativamente la eficiencia y efectividad del equipo de servicio al cliente mediante el acceso rápido y fácil a la información necesaria para resolver las consultas de los clientes. Esto se traduce en una mejor experiencia del cliente, mayor satisfacción y lealtad, así como en una mejora en la productividad del equipo de servicio al cliente.

![Scotia](/Documents/Scotia.png)

## Tabla de Contenido

- [Introducción](#id1)
- [Base de Datos](#id2)
  - [Diagrama MR](#id3)
- [Arquitectura](#id4)
- [Correr aplicación](#id5)
- [Pasos de Instalación 🚀](#id1)
- [Construido con 🛠️](#id3)
- [Autores ✒️](#id3)

## Introducción

El aplicativo es una plataforma centralizada que permite a los agentes de servicio al cliente acceder a información relevante y oportuna de manera inmediata. La solución tecnológica integra diversas fuentes de datos, herramientas de búsqueda avanzada y un sistema de actualización en tiempo real para garantizar que la información esté siempre actualizada y disponible.

## Base de Datos

La base de datos es el corazón del aplicativo. Nuestra solución utiliza _MySQL_, uno de los sistemas de gestión de bases de datos relacionales más populares y robustos del mercado, conocido por su rendimiento, escalabilidad y facilidad de uso.

Utilizamos las funcionalidades de seguridad avanzadas de Laravel, como Hash y Encryption, para proteger los datos sensibles. Laravel Hash proporciona una forma segura de almacenar contraseñas, mientras que Laravel Encryption asegura que los datos confidenciales estén cifrados y solo accesibles para usuarios autorizados.

### Diagrama MR

![Modelo relacional de la base de datos](/Documents/MR.png)

## Arquitectura

El desarrollo de nuestro aplicativo se basa en la arquitectura del framework Laravel.

Laravel sigue el patrón de diseño MVC, que separa la lógica de la aplicación en tres componentes principales: Modelo, Vista y Controlador. Esto permite una mejor organización del código, facilita el mantenimiento y mejora la escalabilidad del aplicativo.

## Correr aplicación

Para ejecutar el proyecto, primero debe navegar al directorio raíz del mismo desde la terminal. Una vez en el directorio raíz, puede iniciar el servidor ejecutando el siguiente comando:

```js
npm run dev
```

Este comando iniciará el servidor y ejecutará la aplicación en modo de desarrollo. Asegúrese de que todas las dependencias estén instaladas correctamente antes de ejecutar este comando.

## Pasos de Instalación 🚀<a name="id1"></a>

1. `Clone` el respositorio.
2. Abra el proyecto en VSCode
3. Ejecuta la aplicacion y disfrútala.

## Construido con 🛠️<a name="id2"></a>

Tecnologias usadas en el proyecto.

- [Laravel 11](https://laravel.com/) - Framework fácil de aprender
- [Livewire 3.3.4](https://livewire.laravel.com/) - Interfaz de usuario potente y dinámica sin salir de PHP.
- [Tailwind CSS 3.0.2](https://tailwindcss.com/) - Crea rápidamente sitios web.

## Despliegue 📦

Para el despliegue hemos planificado un despliegue robusto y seguro utilizando un servicio de hosting confiable que garantiza alta disponibilidad y rendimiento.

### Configuración del Entorno

- Se configura un entorno de servidor optimizado para Laravel, incluyendo la instalación de PHP, MySQL, y todas las extensiones y dependencias necesarias.
- Usamos el servidor web Apache, configurado para manejar solicitudes HTTP de manera eficiente y segura.

### Base de Datos y Migraciones

- La base de datos MySQL se configura en el servidor de hosting, asegurando que esté optimizada para el rendimiento y la seguridad.

- Se ejecutan migraciones de Laravel para crear y actualizar la estructura de la base de datos de acuerdo con las necesidades de la aplicación. Los seeders también se utilizan para poblar la base de datos con datos iniciales necesarios para el funcionamiento del sistema.

## Repositorio

### [Repositorio](https://github.com/DuvanDuque09/SistemasDistribuidos)

En este repositorio encontrara el codigo fuente del proyecto.

## Trello

### [Tablero de sprints](https://trello.com/b/JtTxnsyf/sistemas-distribuidos)

Aqui encontrara los sprints detallados para el desarrollo de la aplicacion.

## Actas 📄

### [Actas](https://drive.google.com/drive/folders/16LFqFR7dFBl6mKeS5JatKVd0oJLbeATC?usp=drive_link)

Aqui encontrara las actas del avance de los resultados de cada sprint que se ha llevado a cabo.

## Autores ✒️<a name="id3"></a>

- **Duvan Smith Duque Rodriguez**
- **Alejandro Palencia Castro**
