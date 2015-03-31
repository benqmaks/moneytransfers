<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('index');
	}

    public function contacts()
    {
        return View::make('contacts');
    }

    private function getData() {
        $refills = Exchange::where('ad_type','=','refill')->orderBy('created_at', 'desc')->get();
        $cashing = Exchange::where('ad_type','=','cashing')->orderBy('created_at', 'desc')->get();

        return array('refill'=>$refills,'cashing'=>$cashing);
    }
    public function exchange()
    {
        // refills , cashing
        $data = $this->getData();
        $data['flag'] = 'refill';

        return View::make('exchange', $data);
    }

    public function addExchange()
    {
        $max_counter = 20;

        $count = Exchange::all()->count();

        $data = Input::all();

        $validation = Validator::make($data, Exchange::getValidationRules());

        // validate all data before adding
        if($validation->fails()){
            return Redirect::back()->withErrors($validation)->withInput();
        } else {
            if ($count > $max_counter) {
                $first_id = Exchange::first()->id;
                Exchange::destroy($first_id);
            }
            Exchange::create($data);
        }

        $rows = $this->getData();
        var_dump($rows);


        // return last html row
        // return ad_type
        // return error
        return $rows;
    }

}