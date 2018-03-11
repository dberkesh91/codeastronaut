<?php
class MY_Model extends CI_Model{

  protected $results = array();

  public function __construct(){
    parent::__construct();

  }

  /**
   * [
   * toObject:
   * Takes an array of arrays and converts it to an
   * array of objects.
   * ]
   * @param  array  $data [description]
   * @return [array]       [Array of objects]
   */
  public function toObject($data = array())
  {
    $return = array();

    foreach ($data as $item)
    {
        $object = new stdClass();
        foreach($item as $key => $value)
        {
          $object->$key = $value;
        }
        array_push($return, $object);

    }
    
    return $return;
  }
}
