<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// =========================================================================
// Frontend (Public)
// =========================================================================
$route['home']                    = 'Home';
$route['work']                    = 'Home';
$route['about']                   = 'About';
$route['contact']                 = 'Contact';
$route['artwork/view/(:num)']     = 'Artwork/view/$1';

// =========================================================================
// Authentication
// =========================================================================
$route['login']                   = 'Setting/UserAccess/login';
$route['dologin']                 = 'Setting/UserAccess/doLogin';
$route['logout']                  = 'Setting/UserAccess/logout';

// =========================================================================
// Master Data — Carousels
// =========================================================================
$route['master/carousels']                    = 'Master/Carousel';
$route['master/carousels/create']             = 'Master/Carousel/create';
$route['master/carousels/edit/(:num)']        = 'Master/Carousel/edit/$1';
$route['master/carousels/view/(:num)']        = 'Master/Carousel/view/$1';
$route['master/carousels/save']               = 'Master/Carousel/save';
$route['master/carousels/delete/(:num)']      = 'Master/Carousel/delete/$1';
$route['master/carousels/getListIndex']       = 'Master/Carousel/getListIndex';

// =========================================================================
// Master Data — Works
// =========================================================================
$route['master/works']                        = 'Master/Work';
$route['master/works/create']                 = 'Master/Work/create';
$route['master/works/edit/(:num)']            = 'Master/Work/edit/$1';
$route['master/works/view/(:num)']            = 'Master/Work/view/$1';
$route['master/works/upload/(:num)']          = 'Master/Work/upload/$1';
$route['master/works/save']                   = 'Master/Work/save';
$route['master/works/delete/(:num)']          = 'Master/Work/delete/$1';
$route['master/works/uploadArtwork']          = 'Master/Work/uploadArtwork';
$route['master/works/deleteArtwork/(:num)']   = 'Master/Work/deleteArtwork/$1';
$route['master/works/getListIndex']           = 'Master/Work/getListIndex';

// =========================================================================
// Master Data — Clients
// =========================================================================
$route['master/clients']                      = 'Master/Client';
$route['master/clients/create']               = 'Master/Client/create';
$route['master/clients/edit/(:num)']          = 'Master/Client/edit/$1';
$route['master/clients/view/(:num)']          = 'Master/Client/view/$1';
$route['master/clients/save']                 = 'Master/Client/save';
$route['master/clients/delete/(:num)']        = 'Master/Client/delete/$1';
$route['master/clients/getListIndex']         = 'Master/Client/getListIndex';

// =========================================================================
// Master Data — Awards
// =========================================================================
$route['master/awards']                       = 'Master/Awward';
$route['master/awards/create']                = 'Master/Awward/create';
$route['master/awards/edit/(:num)']           = 'Master/Awward/edit/$1';
$route['master/awards/view/(:num)']           = 'Master/Awward/view/$1';
$route['master/awards/save']                  = 'Master/Awward/save';
$route['master/awards/delete/(:num)']         = 'Master/Awward/delete/$1';
$route['master/awards/getListIndex']          = 'Master/Awward/getListIndex';

// =========================================================================
// Master Data — Features
// =========================================================================
$route['master/features']                     = 'Master/Feature';
$route['master/features/create']              = 'Master/Feature/create';
$route['master/features/edit/(:num)']         = 'Master/Feature/edit/$1';
$route['master/features/view/(:num)']         = 'Master/Feature/view/$1';
$route['master/features/save']                = 'Master/Feature/save';
$route['master/features/delete/(:num)']       = 'Master/Feature/delete/$1';
$route['master/features/getListIndex']        = 'Master/Feature/getListIndex';

// =========================================================================
// Setting — User Access
// =========================================================================
$route['setting/user-access']                 = 'Setting/UserAccess';
$route['setting/user-access/create']          = 'Setting/UserAccess/create';
$route['setting/user-access/edit/(:num)']     = 'Setting/UserAccess/edit/$1';
$route['setting/user-access/save']            = 'Setting/UserAccess/save';
$route['setting/user-access/delete/(:num)']   = 'Setting/UserAccess/delete/$1';
$route['setting/user-access/getListIndex']    = 'Setting/UserAccess/getListIndex';

// =========================================================================
// Setting — Profile Business
// =========================================================================
$route['setting/profile-business']            = 'Setting/ProfileBusiness';
$route['setting/profile-business/save']       = 'Setting/ProfileBusiness/save';

// =========================================================================
// Setting — Profile Pengguna (User Profile)
// =========================================================================
$route['profile']                             = 'Setting/ProfilPengguna';
$route['profile/update']                      = 'Setting/ProfilPengguna/update';
