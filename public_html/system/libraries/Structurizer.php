<?php
/**
 *
 * @author Danijel Berkes
 *
 * This class is used when data should be
 * structured in a way that one key of the data array
 * contains an array of values to avoid repetition
 *
 *  Example - repetitive data because of tags:
 *  $data = array(
 *    0 => array(
 *    'article_id'    => 28,
 *    'article_title' => 'someTitle',
 *    'article_desc'  => 'someDesc',
 *    'tag_name'      => 'php'    !!!
 *  ),
 *    1 => array(
 *     'article_id'    => 28,
 *     'article_title' => 'someTitle',
 *     'article_desc'  => 'someDesc',
 *     'tag_name' => 'oop'    !!!
 *    )
 *  );
 *
 *  When called it takes the data in the form above and transforms it to:
 *  Example- non repetitive data:
 *  $data = array(
 *    0 => array(
 *      'article_id'    => 28,
 *      'article_title' => 'someTitle',
 *      'article_desc'  => 'someDesc',
 *      'tags'      => ['php', 'oop']    !!!
 *    ),
 *  );
 *
 *  pay attention to !!!
 *
 */
class CI_Structurizer {

  private $_data = array();
  private $_return = array();

  private $_identifier = '';
  private $_keyCausingRepetition = '';
  private $_keyPointingToArray = '';

  /**
   * [__construct description]
   * @param array $data [Data to structurize]
   * @param string $identifier [Unique id for each of the objects in $data]
   * @param $keyCausingRepetition [Key that is causing elements to be repeated]
   * @param $keyPointingToArray [Key to be constructed to avoid repetition of data elements]
   */
  public function __construct($data = array(), $identifier = '', $keyCausingRepetition = '', $keyPointingToArray = '')
  {
      $this->_data = $data;
      $this->_identifier = $identifier;
      $this->_keyCausingRepetition = $keyCausingRepetition;
      $this->_keyPointingToArray = $keyPointingToArray;
  }

  /**
   * [structure description]
   * @return [array] [Correctly structured data]
   */
  public function structure()
  {
    $ids = array();
    $bag = array();

    foreach ($this->_data as $item)
    {
      array_push($ids, $item[$this->_identifier]);
    }

    /* Array of non repetitive ids */
    $ids = array_unique($ids);

    foreach ($ids as $id)
    {
        foreach($this->_data as $item)
        {
            if ($id == $item[$this->_identifier])
            {
                array_push($bag, $item[$this->_keyCausingRepetition]);
                $lastItem = $item;
            }

        }
        $lastItem[$this->_keyPointingToArray] = $bag;
        $bag = [];
        $this->_return[] = $lastItem;
    }
    
    return $this->_return;
  }
}
