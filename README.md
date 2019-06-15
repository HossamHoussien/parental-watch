# parental-watch

* Make sure to configure virtual host in order to run this app as it works on subdoamins.

* Create DB manually using phpmyadmin only DB, tables will be generated automatically

* Generate app key ```php artisan key:generate```

* Open```.env``` file in the root directory and change DB credentials 

* Open```.env``` file in the root directory and change APP_NAME, APP_URL to match the virtualhost

* Run npm install ```npm install```

* Run composer install ```composer install```

* Run DB migration with seed ```php artisan migrate:fresh --seed```

* Open browser and enter "domain name"

### Work Flow
* Three subdomains exist, 'parent', 'nanny', 'tutor'
* Parents can register/login
* Paraents can publish posts
* Parents can hire nanny/tutor
* Parents can search to see all nannies and tutors on system
* Nannies/tutors can create posts
* Nannies/tutors can apply for jobs when a parent publish a post 
* All users can see/edt/delete thier accounts
* Parent request nanny/tutor services by clicking request services button on nanny's/tutor's post
* Nanny/tutor has the option to accept or decline the request (in case that the parent who asked to hire them)
* Nanny/tutor can apply when clicking on Apply on any parent posts
* Parent can accept/decline nanny's / tutor's requests
* Homepage Added


### TODO
* Parent can search for vaccations in neaby hospitals

