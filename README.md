[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

<br />
<p align="center">
  <a href="https://github.com/armysarge/AmbientWeatherPWS">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Personal Weather Station</h3>

  <p align="center">
    A local personal weather station database and dashboard for ambient weather devices!
    <br />
    <a href="https://github.com/armysarge/AmbientWeatherPWS"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <!--<a href="https://github.com/armysarge/AmbientWeatherPWS">View Demo</a>
    ·-->
    <a href="https://github.com/armysarge/AmbientWeatherPWS/issues">Report Bug</a>
    ·
    <a href="https://github.com/armysarge/AmbientWeatherPWS/issues">Request Feature</a>
  </p>
</p>

<details open="open">
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
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://github.com/armysarge/AmbientWeatherPWS)

With the recent release of the Ambient Weather android app (AWNET), it now allows a custom server setup without intercepting network traffic.
I needed a way to create a local database of the weather data coming from my Ambient Weather station, so I decided to look into a way of getting
the data to my local server, luckily just recently Ambient Weather released a way of doing just this by posting the data to a local server.

I created this dashboard and some history graphs to look at the available data in the DB.
You would need an already setup web server and MariaDB, the program should handle the rest perfectly fine.
Please note that this project is still in development and would probably contain bugs.
This has only been tested with the Ambient Weather WS-2902c, but it should work with other devices aswell.

A list of commonly used resources that I find helpful are listed in the acknowledgements.

### Built With

This section should list any major frameworks that you built your project using.
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [MariaDB](https://mariadb.org)
* [XAMPP/PHP](https://www.apachefriends.org/index.html)


<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

Please ensure that you already have the following on your server:
* PHP web server
* [MariaDB](https://mariadb.org)

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/armysarge/AmbientWeatherPWS
   ```
3. Copy all the files in the 'Dist' directory to your web server
4. Enter your server & other details in `config.php`
   ```PHP
    $servername = "servername";
    $username = "user";
    $password = "pass";
    $dbname = "DB";
    $dbtable = "Weather";
    $timezone = 2;
    $hemisphere = "south"; // 'north' or 'south'
   ```
5. Download the AWNET app on your phone and connect to your Ambient Weather device 
6. Enter the server details and path exactly like below:
  [![Awnet][awnet-screenshot]]
7. If you did everything right, it should start posting and show the information on the dashboard


<!-- USAGE EXAMPLES -->
## Usage

Its pretty simple just view the index.php on your server

<!-- ROADMAP -->
## Roadmap

1. Need to add a rain gauge
2. Optimize code
3. Maybe add some code to predict forecasts

See the [open issues](https://github.com/armysarge/AmbientWeatherPWS/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Shaun Scholtz - armysarge.ss@gmail.com

Project Link: [https://github.com/armysarge/AmbientWeatherPWS](https://github.com/armysarge/AmbientWeatherPWS)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements
* [Font Awesome](https://fontawesome.com)
* [HighCharts](https://www.highcharts.com)





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/armysarge/AmbientWeatherPWS.svg?style=for-the-badge
[contributors-url]: https://github.com/armysarge/AmbientWeatherPWS/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/armysarge/AmbientWeatherPWS.svg?style=for-the-badge
[forks-url]: https://github.com/armysarge/AmbientWeatherPWS/network/members
[stars-shield]: https://img.shields.io/github/stars/armysarge/AmbientWeatherPWS.svg?style=for-the-badge
[stars-url]: https://github.com/armysarge/AmbientWeatherPWS/stargazers
[issues-shield]: https://img.shields.io/github/issues/armysarge/AmbientWeatherPWS.svg?style=for-the-badge
[issues-url]: https://github.com/armysarge/AmbientWeatherPWS/issues
[license-shield]: https://img.shields.io/github/license/armysarge/AmbientWeatherPWS.svg?style=for-the-badge
[license-url]: https://github.com/armysarge/AmbientWeatherPWS/blob/main/LICENSE
[product-screenshot]: images/screenshot.PNG
[awnet-screenshot]: images/awnet.jpeg
