<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;
use App\Projects;
use App\Clients;
use App\ProjectActivity;
use App\ActivityList;

Route::get('/', 'DisplayController@view');
Route::get('/Tasks', 'DisplayController@viewTasks');
Route::get('/Activists', 'DisplayController@displayActivists');
Route::get('/viewActivist/{id}', 'DisplayController@viewActivist');
Route::post('/saveActivists', 'DisplayController@saveActivists');
Route::post('/saveKeyValue', 'DisplayController@saveKeyValue');
Route::post('/saveProject', 'DisplayController@saveProject');
Route::post('/saveClient', 'DisplayController@saveClient');
Route::post('/saveActivityList', 'DisplayController@saveActivityList');

Route::post('/editActivityList/{ID}', 'DisplayController@editActivityList');

Route::get('/projectSetup','DisplayController@projectSetup');
Route::post('/createProjectSetup','DisplayController@createProjectSetup');
Route::get('/viewActivityList','DisplayController@viewActivityList');
Route::get('/viewKeyValueList','DisplayController@viewKeyValueList');
Route::post('/editKeyValue/{ID}','DisplayController@editKeyValue');
Route::post('/editActivist/{ID}','DisplayController@editActivist');

Route::get('/viewProjectList','DisplayController@viewProjectList');
Route::post('/editProjectList/{ID}','DisplayController@editProjectList');

Route::get('/viewClientList','DisplayController@viewClientList');
Route::get('screenSetUp','DisplayController@screenSetup');
Route::post('/addProjectActivity','DisplayController@addProjectActivity');

Route::post('screenSetUp/{id}', 'DisplayController@columnNameUpdate');
Route::get('/getProjects',function(){ $input = Input::get('option');
  Log::info("in route input ".$input);
	$client = Clients::find($input);
  Log::info("in route client ".$client);
	$project = $client->projects();

	return Response::json($project->get(['ID','PROJECTNAME']));});

  Route::get('/getCategoryList',function(){ $input = Input::get('option');
    Log::info("getCategoryList ".$input);
  	$projectSelection = Projects::find($input);
    Log::info("in route getCategoryList ".$projectSelection);
    $categoryListAdded = new ProjectActivity;
  	$categoryListAdded = $projectSelection->categories() ->get(['CATEGORY']);
//  Log::info("in route added category list ".$categoryListAdded));

  foreach ($categoryListAdded as $categoryListAdded) {
  Log::info("in route added category list array".$categoryListAdded->CATEGORY);
  }

    $categoryListToBeAdded = ActivityList::orderBy('LASTUPDATEDDATE','desc')
                          ->whereNotIn ('CATEGORY',  $projectSelection->categories() ->get(['CATEGORY']))
                          -> distinct()
                          ->get(['CATEGORY'])
                           ;
// foreach ($categoryListToBeAdded as $categoryListToBeAdded) {
//
//
//   Log::info("The result from category" .$categoryListToBeAdded -> CATEGORY);
//
// }
DB::getQueryLog();
    Log::info("The result from category" .$categoryListToBeAdded);
  	return Response::json($categoryListToBeAdded);
  });
