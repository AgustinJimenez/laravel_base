<?php namespace App\Helpers;

trait BaseModelTraits
{
    public function getModuleAttribute()
    {
        return \Module::find( strtolower($a[array_search( config('modules.namespace'), $a = explode( '/', (new \ReflectionClass( get_class( $this ) ))->getFileName()) )+1]));
    }

    //@OVERWRITE THIS
    public function getRoutesViewsMessagesAttribute()
    {
        return \Config::get('users.routes-names') + \Config::get('users.views-names');
    }
    /*GETERS ROUTES NAMES
    */
    public function getRouteNameIndexAttribute(){return $this->routes_views_messages['route_name_index'];}
    public function getRouteNameCreateAttribute(){return $this->routes_views_messages['route_name_create'];}
    public function getRouteNameStoreAttribute(){return $this->routes_views_messages['route_name_store'];}
    public function getRouteNameEditAttribute(){return $this->routes_views_messages['route_name_edit'];}
    public function getRouteNameUpdateAttribute(){return $this->routes_views_messages['route_name_update'];}
    public function getRouteNameDeleteAttribute(){return $this->routes_views_messages['route_name_delete'];}
    public function getRouteNameShowAttribute(){return $this->routes_views_messages['route_name_show'];}
    /*GETERS VIEW NAMES
    */
    public function getViewNameIndexAttribute(){return $this->routes_views_messages['view_name_index'];}
    public function getViewNameCreateAttribute(){return $this->routes_views_messages['view_name_create'];}
    public function getViewNameEditAttribute(){return $this->routes_views_messages['view_name_edit'];}
    public function getViewNameShowAttribute(){return $this->routes_views_messages['view_name_show'];}
    /*GETERS MESSAGES NAMES
    */
    /*
    public function getMessageCreatedAttribute(){return $this->routes_views_messages['message_created'];}
    public function getMessageSavedAttribute(){return $this->routes_views_messages['message_saved'];}
    public function getMessageDeletedAttribute(){return $this->routes_views_messages['message_deleted'];}
    public function getMessageUpdatedAttribute(){return $this->routes_views_messages['message_updated'];}
    */
    /*
    * ROUTES
    */
    public function getRouteIndexAttribute(){return route( $this->route_name_index );}
    public function getRouteCreateAttribute(){return route( $this->route_name_create );}
    public function getRouteStoreAttribute(){return route( $this->route_name_store );}
    public function getRouteEditAttribute(){return route( $this->route_name_edit, [$this->id] );}
    public function getRouteUpdateAttribute(){return route( $this->route_name_update, [$this->id] );}
    public function getRouteDeleteAttribute(){return route( $this->route_name_delete, [$this->id] );}
    public function getRouteShowAttribute(){return route( $this->route_name_show, [$this->id] );}
    /*
    * VIEWS
    */
    public function getViewIndexAttribute(){return view( $this->view_name_index );}
    public function getViewCreateAttribute(){return view( $this->view_name_create );}
    public function getViewEditAttribute(){return view( $this->view_name_edit );}
    public function getViewShowAttribute(){return view( $this->view_name_show );}

}


