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
        $data['flag'] = 'cashing';

        return View::make('exchange', $data);
    }

    public function addExchange()
    {
        $response = array();
        $response['errors'] = array();

        $max_counter = 20;


        $data = Input::all();

        $count = Exchange::where('ad_type', '=', $data['ad_type'])->count();
//        return $count;
        $validation = Validator::make($data, Exchange::getValidationRules());

        // validate all data before adding
        if($validation->fails()) {
            $messages = $validation->messages();
            foreach($messages->all() as $message) {
                $response['errors'][] = $message;
            }
            return json_encode($response);
        } else {
            if ($count > $max_counter) {
                $first_id = Exchange::where('ad_type', '=', $data['ad_type'])->orderBy('created_at', 'asc')->first()->id;
                Exchange::destroy($first_id);
            }
            $last_row = Exchange::create($data);
        }

//        $rows = $this->getData();
//        var_dump($last_row);


        // return last html row
        // return ad_type
        // return error
        return $last_row;
    }

}