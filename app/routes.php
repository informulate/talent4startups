<?php

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

/**
 * Registration!
 */
Route::get('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'
]);

Route::post('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'
]);

Route::get('register/linked_in', [
	'as' => 'register_linked_in',
	'uses' => 'RegistrationController@registerWithLinkedin'
]);

/**
 * Sessions!
 */
Route::get('login', [
	'as' => 'login_path',
	'uses' => 'SessionsController@create'
]);

Route::post('login', [
	'as' => 'login_path',
	'uses' => 'SessionsController@store'
]);

Route::get('login/linkedIn', [
	'as' => 'login_linked_in',
	'uses' => 'SessionsController@loginWithLinkedIn'
]);

Route::get('logout', [
	'as' => 'logout_path',
	'uses' => 'SessionsController@destroy'
]);

Route::get('session/type', [
	'as' => 'store_type_path',
	'uses' => 'SessionsController@storeUserType'
]);

/**
 * Startups!
 */
Route::resource('startups', 'StartupController');
Route::get('startups/{id}/membership', [
	'as' => 'startup_membership_request',
	'uses' => 'MembershipController@request'
]);
Route::get('startups/{startup}/membership/{user}/{action}', [
	'as' => 'startup_membership_update',
	'uses' => 'MembershipController@update'
]);
Route::get('startups/{id}/membership/cancel', [
	'as' => 'startup_membership_request_cancel',
	'uses' => 'MembershipController@destroy'
]);

/**
 * Talents!
 */
Route::resource('talents', 'TalentController');
/**
 * Profile!
 */
Route::get('profile', [
	'as' => 'edit_profile',
	'uses' => 'ProfileController@edit'
]);
Route::get('@{username}', [
	'as' => 'profile_path',
	'uses' => 'ProfileController@show'
]);
Route::post('profile', [
	'as' => 'edit_profile',
	'uses' => 'ProfileController@store'
]);


/**
* Reset password
*/

Route::get('reset_password', [
	'as' => 'reset_password',
	'uses' => 'ProfileController@resetPasswordForm'
]);


Route::post('reset_password', [
	'as' => 'reset_password',
	'uses' => 'ProfileController@resetPassword'
]);


/**
* Forgot password
*/
Route::get('password/reset', array(
  'uses' => 'PasswordController@remind',
  'as' => 'password.remind'
));
Route::post('password/reset', array(
  'uses' => 'PasswordController@request',
  'as' => 'password.request'
));
Route::get('password/reset/{token}', array(
  'uses' => 'PasswordController@reset',
  'as' => 'password.reset'
));
Route::post('password/reset/{token}', array(
  'uses' => 'PasswordController@update',
  'as' => 'password.update'
));


/**
 * Static Pages
 */
Route::get('about', array(
    'uses' => 'StaticController@about',
    'as' => 'about'
));
Route::get('contact', array(
    'uses' => 'StaticController@contact',
    'as' => 'contact'
));
Route::get('faq', array(
    'uses' => 'StaticController@faq',
    'as' => 'faq'
));
Route::get('sponsors', array(
    'uses' => 'StaticController@sponsors',
    'as' => 'sponsors'
));
Route::get('knowledge-base', array(
    'uses' => 'StaticController@knowledgebase',
    'as' => 'knowledgebase'
));