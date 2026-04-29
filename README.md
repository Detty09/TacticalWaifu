
<a id="readme-top"></a>


<br />
<div align="center">
  <a href="https://github.com/Detty09/TacticalWaifu">
    <img src="tw/public/images/twlogo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Tactical Waifu 
Character Creator</h3>

  <p align="center">
 A Laravel-based web application for creating, storing, viewing, and exporting Tactical Waifu RPG characters.
    <br />
    <a href="https://github.com/Detty09/TacticalWaifu"><strong>Explore the docs »</strong></a>
    <br />
    <br />
  </p>
</div>



<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



## About The Project

[![Product Name Screen Shot][product-screenshot]](example.com)

Create a character via a browser form to the free Tactical Waifu RPG game.
<ul>
<li>
Protect characters with an optional password
<li>
Retrieve characters by UUID
<li>
View character sheets online
<li>
Export character sheets as PDF
<li>
Automatically receive preset items
<li>
Add custom weapons, goals, and items
</ul>


<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* [![Laravel][Laravel.com]][Laravel-url]
* [![Blade][Blade.com]][Laravel-url]
* [![MySQL][mysql.com]][MySQL-url]
* [![Tailwind][Tailwind.com]][Tailwind-url]


PDF Generation: barryvdh/laravel-dompdf

<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Getting Started


You can run the project with docker.

### Installation


1. Clone the repo
   ```sh
   git clone https://github.com/Detty09/TacticalWaifu
   ```
2. Create the environment file
    ```sh
    cp .env.example .env
   ```
3. Build the Docker containers
   ```sh
   docker compose build
   ```
4. Start the containers in detached mode.
   ```sh
   docker compose up -d
   ```
5. Access the application container.
   ```sh
   docker exec -it tw_app bash
   ```
6. Install Composer packages.
   ```sh
   composer install
   ```
7. Generate the application key
   ```sh
   php artisan key:generate
   ```
8. Run the database migrations
   ```sh
   php artisan migrate --seed
   ```
9. Open the application in your browser
   [http://localhost:8000](http://localhost:8000)


<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Contact

* Bernadett Kiss - bernadett@gmail.com

Project Link: [https://github.com/Detty09/TacticalWaifu](https://github.com/github_username/repo_name)

<p align="right">(<a href="#readme-top">back to top</a>)</p>




## Acknowledgments
<p>

* Inspired by the Tactical Waifu tabletop RPG. https://www.drivethrurpg.com/en/product/157352/tactical-waifu

* Built as a learning and passion project using Laravel.
</p>
<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo_name.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo_name/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo_name.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo_name/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo_name.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo_name/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo_name.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo_name/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo_name.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo_name/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/linkedin_username
[product-screenshot]: tw/public/images/twupfront.png
<!-- Shields.io badges. You can a comprehensive list with many more badges at: https://github.com/inttter/md-badges -->
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[mysql.com]: https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white
[MySQL-url]: https://www.mysql.com/
[Blade.com]: https://img.shields.io/badge/Blade-FF7A00?style=for-the-badge&logo=laravel&logoColor=white
[Tailwind.com]: https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white
[Tailwind-url]: https://tailwindcss.com/

