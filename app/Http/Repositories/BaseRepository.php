<?php namespace App\Http\Repositories;

use \Illuminate\Database\QueryException;

class BaseRepository
{

    public $errors;
    public $saved_message = '';
    public $deleted_message = '';
    public $updated_message = '';
    public $index_route_name = '';

    public function __construct( \ErrorsRepository $errors )
    {
        $this->errors = $errors;
    }

    public function safe_update( &$model, $datas)
    {
        \DB::beginTransaction();
        try
        {
            $model->update($datas);
            \DB::commit();
            return ['error' => false];
        }
        catch (QueryException $e)
        {
            \DB::rollBack();
            return ['error' => true, 'messages' => array( $this->errors->getErrorByCode( $e->getCode() ) ) ];
        }
    }

    public function safe_store( &$model, $datas)
    {
        \DB::beginTransaction();
        try
        {
            $model->create($datas);
            \DB::commit();
            return ['error' => false];
        }
        catch (QueryException $e)
        {
            \DB::rollBack();
            return ['error' => true, 'messages' => array( $this->errors->getErrorByCode( $e->getCode() ) ) ];
        }
    }

    public function safe_delete( &$model )
    {
        \DB::beginTransaction();
        try
        {
            $model->delete();
            \DB::commit();
            return ['error' => false];
        }
        catch (QueryException $e)
        {
            \DB::rollBack();
            return ['error' => true, 'messages' => array( $this->errors->getErrorByCode( $e->getCode() ) ) ];
        }
    }

}