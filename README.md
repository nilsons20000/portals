# d42-NilsArtursBusalovs-ZinuPortals

# Ziņu portāls  

# Projekta apraksts

Ziņu portāls, kur būs iespēja publicēt vissjaunākā  unikālas ziņās, kuri netiek publicēti citus ziņu portālus, tāpēc cilvēki dažreiz vissinteresantākas ziņas nolasa tikai no sociāliem tīkliem , tāpēc mērķis izveidot ziņu portālu, lai cilvēki varētu publicēt ziņas kuri nekur iepriekš nebija minēti. Paredzēt iespēju, reģistrēties, autorizēties, lietotāja lomu sadalīšanu (admin, user utt),pievienot ziņas, rediģēt, dzēst (lietotājus, rakstus utl), lietotāju manuāla pievienošana, Kategoriju un zem kategorijas pievienošana un dod iepēju pievienot ziņu zem tam. Datu rediģēšana caur admin paneli. Reģistrācijas laika īsziņas atsūtīšana uz epastu ar apliecinājumu. Paredzēt lietotāju komentēšanu  zem ziņam , kā arī atbildi uz tiem (reply). utt. Autorizācija caur soc. tīkliem un dalīšana ar rakstim.

### Izmantotās tehnoloģijas

HTML5

CSS3  ( SCSS / SASS )

JS  ( jQuery / AJAX / Vue.js )

Webpack

PHP7 un Laravel framework

Mysql


### Izmantoti avoti

Šis  projekts izmanto vairākus atvērtā koda projektus, lai pareizi veikt savu darbību:

* [W3School](https://www.w3schools.com/) - tika ņemts example html kods,
* [Laravel.com](https://laravel.com/docs/5.7) - skatījos dokumentāciju par framework,
* [Youtube](https://www.youtube.com/watch?v=EU7PRmCpx-0) - noskatījos kursus, kā pareizi izmantot framework Laravel,
* [Slick Slider](https://kenwheeler.github.io/slick/) - tiek paņēmts plugins priekš slaideram,
* [Stackoverflow](https://stackoverflow.com/) - meklēju atbildes uz neskaidrības jautājumiem,
* [Cyberforum](https://cyberforum.ru/ ) - meklēju atbildes uz neskaidrības jautājumiem,
* [Ckeditor plugin](https://github.com/ckeditor) - spraudnis priekš editora,
* [namedays.php](https://github.com/arneefreeman/varda-dienas/blob/master/namedays.php) - priekš varda dienas izvadīšanas,
* [News api](https://newsapi.org/s/latvia-news-api) - tiek izmantots Api, lai varētu saņēmt ziņas no citiem Latvijas ziņu portāliem,
* [Darksky](https://darksky.net/dev) - tiek izmantots Api, lai varētu saņēmt laikaapstakļu info,
* [Informācija par ER diagrammam](https://ru.wikipedia.org/wiki/ER-%D0%BC%D0%BE%D0%B4%D0%B5%D0%BB%D1%8C) - skatījos informāciju par ER diagrammam,
* [Laravel GDPR cookie consent](https://github.com/spatie/laravel-cookie-consent) - tika ņēmts spraudnis priekš sīkdatņu paziņojumiem,
* [Kas ir rokasgrāmatā](https://en.wikipedia.org/wiki/User_guide) - tika ņēmta informācija priekš rokasgrāmatas,
* [Padomi lietotāja rokasgrāmatu rakstīšanai](https://www.userfocus.co.uk/articles/usermanuals.html) - padomi lietotāja rokasgrāmatu rakstīšanai,
* [Skices zimēšanas vieta](https://balsamiq.com/)  - šeit tika zimēta skice,
* [ER diagrammas zimēšanas veids](https://creately.com/blog/diagrams/er-diagrams-tutorial/) - tika ņemta informācija par ER diagrammas zimēšanas veidiem,
* [Composer](https://getcomposer.org/download/) - composer,
* [Bezmaksas attēli](https://stock.adobe.com/) - tika ņēmti bezmaksas attēli,
* [HTML/CSS elementi](https://codepen.io/) - tika ņēmti html/css elementi,
* [PHP valodas dokumentācija](https://www.php.net/docs.php) - tika lasīta dokumentācija par PHP  programmēšanas valodu,
* [Ajax search](https://shareurcodes.com/blog/ajax%20live%20search%20table%20generation%20in%20laravel) - tika ņēmts koda gabals priekš ajax meklēšanas,
* [Modal logs boostrap](https://getbootstrap.com/) - tika ņemts boostrap logs.




### Uzstādīšanas instrukcijas

1. Lai lietotu git lejupielādējam Git for windows
2. Instalējam git.
3. Izveidojam mapīti, kur vēlāmies ievietot projektu
4. Veicam labo klikšķi un izvēlamies opciju "git bash here" un izpildam zemāk raksīto komandu.
    *git clone https://github.com/*
5. Aizējam pārlūka un pārējam pa zemāk raksīto linki. Uzzinstalējam composer priekš Windows 
    *https://getcomposer.org/download/* 
6. Atvēram cmd un palaižam komandu  
      *php composer install*
7. Kad composer beigs instalāciju pārējam caur cmd projekta root mapē un izpildam zemāk rakstīto komandu, lai palaist Webpack
    *npm install*
8. Pēc tam izpildam zemāk rakstīto komandu, lai izveidot tabulas datubāze. 
    *php artisan migrate*
9. Pēc tam  izpildam zemāk rakstīto komandu, lai izveidot atslēgu 
    *php artisan key:generate*
10. Pēc tam izpildam zemāk raksītot komandu, lai palaist projektu uz Laravel http://127.0.0.1:8000/
    *php artisan serve*  

11. Pēc tam vajag pārjiet boostrap/cache un config failu vai nu nodzēst vai nu rediģēt uz *config.php.old*


