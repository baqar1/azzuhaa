<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('upload', 'StorageController@file');


Route::post('upload', 'StorageController@upload_to_dropbox');




/*
 *  All routes for Web Visitors
 */


Route::get('/', function(){

    return view('users.home');

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/yearlyPlanner', [
    'uses' => 'YearlyPlannerController@display',
    'as' => 'yearlyPlanner.display'
]);

Route::get('/announcementsList', [
    'uses' => 'AnnouncementController@display',
    'as' => 'announcements.display'
]);

Route::get('/showAnnouncements/{id}', [
    'uses' => 'AnnouncementController@ShowAnnouncement',
    'as' => 'announcements.showAnnouncement'
]);

Route::get('/offeredCourses', [
    'uses' => 'CourseController@display',
    'as' => 'courses.display'
]);

Route::get('/facilities', [
    'uses' => 'FacilityController@display',
    'as' => 'facilities.display'
]);

Route::get('/outDoorClasses', [
    'uses' => 'OutdoorClassController@display',
    'as' => 'outDoorClasses.display'
]);

Route::get('/outDoorClass/{id}', [
    'uses' => 'OutdoorClassController@displayOne',
    'as' => 'outDoorClasses.displayOne'
]);

Route::get('/shiftTimingsList', [
    'uses' => 'ShiftTimingController@display',
    'as' => 'shiftTimings.display'
]);

Route::get('/lectureSchedules', [
    'uses' => 'LectureScheduleController@display',
    'as' => 'lectureSchedule.display'
]);

Route::get('/campuses', [
    'uses' => 'CampusController@display',
    'as' => 'campuses.display'
]);

Route::get('/campus/{id}', [
    'uses' => 'CampusController@displayOne',
    'as' => 'campuses.displayOne'
]);

Route::get('/albumsList', [
    'uses' => 'AlbumsController@display',
    'as' => 'albums.display'
]);

Route::get('/albumDisplayOne/{id}', [
    'uses' => 'AlbumsController@displayOne',
    'as' => 'albums.displayOne'
]);

















/*
 *   All Routes fo Admin Panel
 */

Route::get('/admin', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){

    // For Facility Actions
    Route::get('/addFacility', [
        'uses' => 'FacilityController@create',
        'as' => 'facility.add'

    ]);

    Route::get('/facility-editing', [
       'uses' => 'FacilityController@index',
        'as' => 'facility.editing.list'
    ]);

    Route::post('/storeFacility', [
        'uses' => 'FacilityController@store',
        'as' => 'facility.store'

    ]);

    Route::post('/deleteFacility/{id}', [
        'uses' => 'FacilityController@destroy',
        'as' => 'facility.delete'
    ]);

    Route::get('/editFacility/{id}', [
        'uses' => 'FacilityController@edit',
        'as' => 'facility.edit'

    ]);

    Route::post('/updateFacility/{id}', [
        'uses' => 'FacilityController@update',
        'as' => 'facility.update'

    ]);

    // For all Announcement Actions
    Route::get('/addAnnouncement', [
        'uses' => 'AnnouncementController@create',
        'as' => 'announcement.add'
    ]);

    Route::get('/announcements-list', [
        'uses' => 'AnnouncementController@index',
        'as' => 'announcement.editing.list'
    ]);

    Route::post('/deleteAnnouncement/{id}', [
        'uses' => 'AnnouncementController@destroy',
        'as' => 'announcement.delete'
    ]);


    Route::post('/storeAnnouncement', [
        'uses' => 'AnnouncementController@store',
        'as' => 'announcement.store'
    ]);

    Route::get('/edit-announcement/{id}', [
        'uses' => 'AnnouncementController@edit',
        'as' => 'announcement.edit'
    ]);

    Route::post('/update-announcement/{id}', [
        'uses' => 'AnnouncementController@update',
        'as' => 'announcement.update'
    ]);



    Route::get('/getAnnouncements', [
        'uses' => 'AnnouncementController@index',
        'as' => 'announcement.getAll'
    ]);




    // For all EventTypes Actions

    Route::get('/addEventType', [
        'uses' => 'EventTypeController@create',
        'as' => 'eventtype.add'
    ]);

    Route::get('/eventTypeList', [
        'uses' => 'EventTypeController@index',
        'as' => 'eventType.list'
    ]);

    Route::post('/saveEventType', [
        'uses' => 'EventTypeController@store',
        'as' => 'eventtype.store'
    ]);

    Route::post('/deleteEventType/{id}', [
        'uses' => 'EventTypeController@destroy',
        'as' => 'eventType.delete'
    ]);


    Route::get('/NewEventType', function(){
        return view('admin.add.eventtype');
    })->name('eventtype.create');


    /*
     *  Events routes
     */


    Route::get('/newEvent', [
        'uses' => 'EventController@create',
        'as' => 'event.create'
    ]);

    Route::post('/storeEvent', [
        'uses' => 'EventController@store',
        'as' => 'event.store'
    ]);

    Route::get('/editEvent/{id}', [
        'uses' => 'EventController@edit',
        'as' => 'event.edit'
    ]);

    Route::post('/updateEvent/{id}', [
        'uses' => 'EventController@update',
        'as' => 'event.update'
    ]);

    Route::post('/deleteEvent/{id}', [
        'uses' => 'EventController@deleteEvent',
        'as' => 'event.delete'
    ]);



    Route::get('/eventsListforEditing', [
        'uses' => 'EventController@index',
        'as' => 'events.list'
    ]);


    Route::get('/eventTypesList', [
        'uses' => 'EventTypeController@index',
        'as' => 'eventTypes.list'
    ]);

    Route::get('/editEventType/{id}', [
        'uses' => 'EventTypeController@edit',
        'as' => 'eventType.edit'
    ]);

    Route::post('/updateEventType/{id}', [
        'uses' => 'EventTypeController@update',
        'as' => 'eventType.update'
    ]);

    Route::get('/yearlyPlannerList', [
        'uses' => 'YearlyPlannerController@index',
        'as' => 'yearlyPlanner.all'
    ]);


    // For Campus Info
    Route::get('/addNewCampus', [
        'uses' => 'CampusController@create',
        'as' => 'campus.add'
    ]);

    Route::post('/storeCampus', [
        'uses' => 'CampusController@store',
        'as' => 'campus.store'
    ]);

    Route::get('/campusesList', [
        'uses' => 'CampusController@index',
        'as' => 'campuses.list'
    ]);

    Route::get('/editCampus/{id}', [
        'uses' => 'CampusController@edit',
        'as' => 'campus.edit'
    ]);

    Route::post('/deleteCampus/{id}', [
        'uses' => 'CampusController@destroy',
        'as' => 'campus.delete'
    ]);

    Route::post('/updateCampus/{id}', [
        'uses' => 'CampusController@update',
        'as' => 'campus.update'
    ]);


    // For About Us
    Route::get('/addAboutUs', [
        'uses' => 'AboutUsController@create',
        'as' => 'aboutus.add'
    ]);

    Route::post('/storeAboutUs', [
        'uses' => 'AboutUsController@store',
        'as' => 'aboutus.store'
    ]);

    Route::get('/editAboutUs/{id}', [
        'uses' => 'AboutUsController@edit',
        'as' => 'aboutus.edit'
    ]);

    Route::post('/updateAboutUs/{id}', [
        'uses' => 'AboutUsController@update',
        'as' => 'aboutus.update'
    ]);

    // For Shift_Timing Actions
    Route::get('/createShiftTiming', [
        'uses' => 'ShiftTimingController@create',
        'as' => 'shiftTiming.create'
    ]);

    Route::get('/shiftTimingList', [
        'uses' => 'ShiftTimingController@index',
        'as' => 'shiftTiming.list'
    ]);

    Route::post('/storeShiftTiming', [
        'uses' => 'ShiftTimingController@store',
        'as' => 'shiftTiming.store'
    ]);

    Route::get('/editShiftTiming/{id}', [
        'uses' => 'ShiftTimingController@edit',
        'as' => 'shiftTiming.edit'
    ]);

    Route::post('/updateShiftTiming/{id}', [
        'uses' => 'ShiftTimingController@update',
        'as' => 'shiftTiming.update'
    ]);

    Route::post('/deleteShiftTiming/{id}', [
        'uses' => 'ShiftTimingController@destroy',
        'as' => 'shiftTiming.delete'
    ]);


    // All routes for Outdoor Classes
    Route::get('/createOutdoorClass', [
        'uses' => 'OutdoorClassController@create',
        'as' => 'outdoorClass.create'
    ]);

    Route::post('/storeOutdoorClass', [
        'uses' => 'OutdoorClassController@store',
        'as' => 'outdoorClass.store'
    ]);

    Route::get('/editOutdoorClass/{id}', [
        'uses' => 'OutdoorClassController@edit',
        'as' => 'outdoorClass.edit'
    ]);

    Route::post('/updateOutdoorClass/{id}', [
        'uses' => 'OutdoorClassController@update',
        'as' => 'outdoorClass.update'
    ]);

    Route::get('/outdoorClassList', [
        'uses' => 'OutdoorClassController@index',
        'as' => 'outdoorClass.list'
    ]);



    Route::post('/deleteOutdoorClass/{id}', [
        'uses' => 'OutdoorClassController@destroy',
        'as' => 'outdoorClass.delete'
    ]);


    Route::get('/soundCloud/Callback', function(){
        return view('admin.soundcloud.callback');

    });







    Route::resource('courseType', 'CourseTypeController');

    Route::resource('course', 'CourseController');

    Route::resource('lectureSchedule', 'LectureScheduleController');

    Route::resource('albums', 'AlbumsController');

    Route::resource('photos', 'PhotosController');

    Route::resource('folders', 'FoldersController');

    Route::resource('audioFiles', 'AudioFilesController');

    Route::resource('subFolders', 'SubFolderController');







});
