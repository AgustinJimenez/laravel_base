<?php namespace App\Helpers;


trait BaseRepositoryTraits
{
	public function create_validation( $datas, &$rules, &$messages )
    {
        return collect([ 'data' => $validation = \Validator::make($datas, $rules, $messages), 'error' => $validation->fails(), 'messages' => $validation->errors()->all() ]); 
    }
 /*
'name' => 'required|max:255',
'email' => 'unique:' . $this->getTable() . '|email',
'password' => 'required|min:6|confirmed'
'name' => 'required',
'foundation' => 'required',
'email' => 'nullable|email',
'number' => 'required',
'title' => 'required|unique:posts|max:255',
'publish_at' => 'nullable|date',
*/

}
