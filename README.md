# parental-watch

1. Make sure to configure virtual host in order to run this app as it works on subdoamins.

2. Run DB migration with seed

3. Run composer install

4. Run npm install


### Work Flow
* Three subdomains exist, 'parent', 'nanny', 'tutor'
* Parents can register/login
* Paraents can publish posts
* Parents can hire nanny/tutor
* Parents can search to see all nannies and tutors on system
* Nannies/tutors can create posts
* Nannies/tutors can apply for jobs when a parent publish a post 
* All users can see/edt/delete thier accounts

### TODO

* Parent request nanny/tutor services by clicking request services button on nanny's/tutor's post
* Nanny/tutor can apply when clicking on Apply on any parent posts
* Nanny/tutor has the option to accept or decline the request (in case that the parent who asked to hire them)
* Parent can select among applicants (nannies/tutors)

