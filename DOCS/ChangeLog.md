---
title: "ChangeLog for project Cours-php"
authors: "Denis CHANET & Christophe GOURMAND"
output:
  html_document:
    css: ./style_for_md_files.css
    self_contained: no
---

<link rel="stylesheet" href="./style_for_md_files.css">

# Changelogs

    (recents firsts)

## CHRISTOPHE - branch christophe (commit 8dec2020 15h19 )

- added file `nommage des fichiers.txt` . Let's remove it when done.
- reactivated the old navbar for now.

## CHRISTOPHE - branch christophe (commit 25nov2020 20h13)

- created a `navbar_top.php`
- de-activated Axentix (css in `head.php` and js in `footer.php`)
- correction de la balise `</header>` non ouverte dans `connexion.php`
- created  `src/Views/common/scripts_loader.html` AND included in all pages files.
- created a `navbar_side.php` (not filled)

## DENIS - branch master (commit 24nov20 16h00)

- add UPDATE profil(speudo & email)
- modif `profil.php` / `editProfil.php`
- Test : Create a user, connexion, in profil(click on editer mon profil)

## CHRISTOPHE - branch christophe (commit 21nov20 17h52)

- corrected error line 66 in `functions.php`

## CHRISTOPHE - branch christophe  (commit 21nov20 14h08)

- added folder `DOCS` + files `AUTHORS.md` , `BUGS.md` , `Changelog.md` , `INSTALL.md` , `NEWS.md` , `README.md` , `TODO.md`
- filled these files with informations
- added informations and re-organised the `README.md` file written by Denis.
- modifications on `__.sql` files
  - rename 2 files :  `aaaammdd_database_installation.sql`
  - move them in folder `./database_installation`

## CHRISTOPHE - branch newdesign (commit 16janv2021 21h53)

- moved every pages files into `./old_pages/`
- renamed folders :
  - in `./`
    - `/src/`      -> become `/old_src/`
    `/pages/`      -> become `/old_pages/`
  - in `./assets/`
    - `/css/`             -> become `/old_css/`
    - `/js/`              -> become `/old_js/`
- imported from  my `prepa_frontend` project into this project :
  - in `./assets/`    -> added folders `js` and `scss`
  - in `./`           -> added `index.php`
  - in `./`           -> added `/views/`  folder  and his content.
- in `./views/`       -> created `/pages/`
- in `./views/pages`  -> created `/pages/home.php`
- in `./views/`       -> changed the paths in every `include(.....)`

## CHRISTOPHE - branch newdesign (commit 17janv2021 13h00)

- in `./views/pages`  -> created `phpinfos.php`  (no link from navbar, you must access by URL)
- in `./views/pages`  -> created `debug.php`  (no link from navbar, you must access by URL)
  - please use this page to visualise some variables of your choice using `var_dump();`
- in `./`             -> created `variables_project.php`
- in `./`             -> created `debug_functions.php`
- in `debug_functions.php` -> created function `showme("chooseATitle", $variableToVarDump);`
- in `./views/common/` -> created `footer_dev_mode.php`
    (  actually working on variables `$pathToRootInUrl` and `$pathToRootInFiles`  )

## CHRISTOPHE - branch newdesign (commit 20janv2021 09h49)

problem when `home.php` load `footer_dev_mode.php` :
    each `<a>` links  load 2 times the `/localhost/........localhost/........`  

- in `./views/pages`    -> created `uri_not_found.php`
- in `./views/pages`    -> created : `/test/de/chemin/pagetest.php`
  - contain a function `calculatePathToRootFolder();`

## CHRISTOPHE - branch newdesign (commit 20janv2021 12h15 )

- for all pages, added `$pathToRootFolder`
- in `footer_dev_mode.php`  -> solved all link 
- in `footer_dev_mode.php`  -> created a `<link>` tag to make it look better
- integrated `footer_dev_mode.php`  in all web pages of the project.

## CHRISTOPHE - branch newdesign (commit 24janv2021 00h13 )

- in `./views/pages/`  -> created : `article_all.php`
  
## CHRISTOPHE - branch newdesign (commit 24janv2021 02h14 )

- in `article_all.php` -> created `aside` bar and articles (bootstrap adjustment not finished yet)

## DENIS - branch newdesign (commit 25janv2021 23h14 )

- created -> newdesign `session_login`
- created -> newdesign `session_logout`
- created -> newdesign `session_register`
- created -> newdesign `session.php` (page msg success auth)
- created -> newdesign `recover_password.php` (page récupération de mot de passe)
- created -> newdesign `redirect_mailto.php` (page tunnel)
- created -> newdesign `profil.php` (page designed)
- created -> newdesign `contact.php` (form contact)
- created -> newdesign `contact_post.php` (traitement du form contact)
- created -> newdesign `article_all.php` (page de tout les articles)
- modified -> newdesign `article_read.php` (page article)
- modified -> newdesign `termofservice.php`
- modified -> newdesign `privacy.php`
- modified -> newdesign `article_read.php` (page article)
- modified -> newdesign folder `team` > page `team.php` : (GOAL : introduction + to hide portfolio)

## DENIS - branch newdesign (commit 26janv2021 10h30 )

- in article_all.php -> created aside

## CHRISTOPHE - branch newdesign (commit 26janv2021 15h42 )

- in `./database/installation`  -> created `sql_connect_and_create_database.md` containing instructions to connect and re-create the database.
- in `DOCS/ChangeLog.md` (this actual file)
  - -> formatted to a more conventional MarkDown format + 
  - -> added backtilts arround paths and filename for better readability.

## CHRISTOPHE - branch newdesign (commit 26janv2021 17h59 )

- in `home.php` remove the `@` before `$theme`
- in `config/functions.php` 
  - -> added `$pathToRootFolder` at file beginning.
  - -> for every `require`, I used `$pathToRootFolder`.
- in `config/connect.php` -> corrected $pathToRootFolder : should be `../` and not `../../`
- added `$pathToRootFolder` in every files in `/config/`
- in `home.php` : loaded `$articles` using its function.
- in `home.php` : changed the loop `for` into a `foreach` to load `$article` each iteration.
- NOTICE BUG : articles in array `$articles` are loaded in reverse-id :
  - `1`:id_4 `2`:id_3 `3`:id_4 `4`:id_1
  - FIXED : in `config/functions.php` > `getArticles` > changed `DESC` by `ASC` .

## CHRISTOPHE - branch newdesign (commit 26janv2021 18h38 )

- fixed Denis's idea of using a $alert :
  - created the file `views/common/alertMessageIfExist.php` containing a html/bootstrap alert.
  - in every pages, added an include of the pre-cited file.
- in `session_login.php` , the bootstrap class `container-fluid` had a `container` directly inside, which i deleted.

## CHRISTOPHE - branch newdesign (commit 29janv2021 14h47 )

- for `footer_dev_mode.php` moved css rules in a file `_footerDevMode.scss` (imported in `mainStyle.css`)
- reactivated `footer_dev_mode.php` in all pages (temporarly)
- in `mainStyle.scss` : turned off the import of `themeClair` and `themeSombre`
- in `footer_dev_mode.php` : currently trying to get the file list in `/pages/`  (NOT FINISHED)

## CHRISTOPHE - branch newdesign (commit 29janv 23h30 )

- `changelogdenis.md` : file renamed + integrated in `ChangeLog.md`.
- created `DOCS/style_for_md_files.css`.
- in `ChangeLog.md` -> added link to stylesheet.
- in `home.php` -> fixed the link loading `autoload.php`
- in `navbar.php` -> reorganized the `echo` containing `buttons` (to improve readability and edit easier)
- in `session_register.php` -> changed bootstrap layout for elements of the form.

## CHRISTOPHE - branch newdesign (commit 29to30 janv 03h16 )
- create a folder `/pages2/` to restart all pages, in front-end only.
- in `/pages2/`  ->  recreated pages `home.php`
- in `/pages2/`  ->  recreated pages `session_register.php`
- in `/pages2/`  ->  recreated pages `session_login.php`
- in `/pages2/`  ->  recreated pages `session_logout.php`
- in `/pages2/`  ->  recreated pages `article_all.php`
- in `/pages2/`  ->  recreated pages `article_read.php`
- in `scss/modules/`  -> created `_avatar.scss`
- in `scss/modules/`  -> created `_comment.scss`
- in `/pages2/`  -> created `user_board.php`
- in `views/pages/common/`  -> created `sidebar_user.php`  (used in `user_board.php`)
- created `views/common/navbar_part_notConnected.php`
  - AND placed 'inscription' and 'connection' buttons inside.
  - AND in `navbar.php` ->  replaced the `echo`  by an include( ... ) for the buttons if not connected.
- created `views/common/navbar_part_profil.php`
