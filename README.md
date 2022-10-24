McCann tech test.

Hi - here is my contact form built on top of Laravel with an Inertia/vue based front end.

To check the code changes i've made please check the draft PR: (https://github.com/bn-mk/contact-form-mcann/pull/1) 

to install the app you'll need php8 and to set up a database, copy `.env.example` to `.env` and edit the values for your local environment.  I recommend using valet (https://laravel.com/docs/9.x/valet) to host local Laravel projects.  The only things you'll need to edit is the `DB_` block and the `APP_URL`

`php artisan key:generate`
`composer install`
`php artisan migrate`
`npm install`
`npm run dev`

The form can be found at `/contact-us`
submitting the form just takes you to a generic success page.

Form submissions can be found at `/submissions` but you will need to first create an account at `/register`

tests can be run by the command `php artisan test`

In a real life situation there would be more indepth tests, a better front end design and probably a mail queue to send notification emails to various parties.  It seemed like overkill to set up dev mail accounts for this so i left it out.

Thanks!