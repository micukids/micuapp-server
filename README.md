# Abecedario Micukids App
<p align="center"><img alt="logo Micu" src="https://user-images.githubusercontent.com/116796010/227530138-e7495657-2221-4971-9c2c-0784ad0814ab.png"></p>

## Tabla de Contenido

1. [Información General](#información-general)
2. [Detalles Tecnicos del Proyecto](#detalles-tecnicos-del-proyecto)
3. [Tecnologías](#tecnologías)
4. [Herramientas](#herramientas)
5. [Demo](#demo)
6. [Prototipo](#prototipo)
7. [Equipo](#equipo)
8. [Instalación](#instalación)

## :page_facing_up: Información General

Los padres Millennials y Gen-Z que crecieron con alta exposición a Internet, están ávidos de encontrar experiencias híbridas que les permitan emplear estratégicamente la tecnología para estimular el desarrollo de sus hijo(a)s de 2 a 5 años. La oferta de contenido bilingüe de calidad para menores de 5 años integrado con experiencias educativas híbridas (físico - digital), es aún muy reducida.

El cliente necesita desarrollar una experiencia educativa para menores de 5 años. Combinar música, video, personajes ilustrados, materiales didácticos e interacción, para estimular los sentidos y las emociones de los más pequeños. Busca aportar en el desarrollo de su percepción del mundo, a través del aprovechamiento inteligente de la tecnología a su alcance y de la conectividad global multi-cultural / multi-lenguaje propios de internet.
<p align="center"><img width="200" alt=“captura home” src="https://user-images.githubusercontent.com/116796494/227921674-8ea4bb3e-74ba-4e69-acea-534b49feffbd.png"></p>

## :mag: Detalles tecnicos del Proyecto

Hemos utilizado Arquitetura MVC - Estilo cliente/servidor
Tipo API Rest, para conectar el fronted con el backend.
Tenemos un proyecto en gitHub (micukids) con 2 repositorios: micuapp-server y micuapp-client (https://github.com/micukids/micuapp-client)
Para empezar un nuevo proyecto, hay que crear una nueva base de datos y en el archivo (.env) cambiar en DB_DATABASE=nombre del proyecto.
Hay que estar encendido el Xampp o Mamp para que funcione en el navegador. Después el la terminal hay que ejecutar el comando **php artisan serve**


## :computer: Tecnologías

* PHP (v8.1)
* Laravel (v10.0)
* MySQL (v5)
* Composer (v2.5.1)
* Node js (v18.12.1) 
* Laravel/Ui (v4.2.1)

## :hammer: Herramientas

* [Trello](https://trello.com/b/0PCr9sIS/micukids)
* [Figma](https://www.figma.com/file/2Pv4uqNt5yERWkZO1Y2qsj/MicuKids?node-id=26-2&t=LuyHpaBODO5eLfgr-0)
* [Git/GitHub](https://github.com/orgs/micukids/repositories)
* Visual Studio Code
* Xampp/Mamp

## :tv: Demo

* [Demo]()

## :loop: Prototipo

* [Tablet](https://www.figma.com/file/2Pv4uqNt5yERWkZO1Y2qsj/MicuKids?node-id=26-2&t=LuyHpaBODO5eLfgr-0)

## :two_women_holding_hands: Equipo
Somos un equipo de 5 mujeres, apasionadas por el proyecto web MicuKids:

- Karolina Vilarraga, UX/UI Design y desarrolladora
- Elvia Benedith, Desarrolladora
- Gabriela Barajas, Desarrolladora
- Liliana Dalmarco, Scrum Master y desarrolladora
- Isabel Gutiérrez, Desarrolladora


## :link: Instalación
1. Clonar Repositorio de GitHub
2. Ejecutar **npm instal** en la terminal
3. Ejecutar el comando **php artisan migrate**
4. Ejecutar el comando **php artisan migrate:fresh --seed**
