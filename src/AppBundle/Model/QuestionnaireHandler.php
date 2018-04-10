<?php
/**
 * Created by PhpStorm.
 * User: maximeboilot
 * Date: 04/04/2018
 * Time: 13:38
 */

namespace AppBundle\Model;

use AppBundle\Entity\Answer;

class QuestionnaireHandler implements \ArrayAccess
{
    /**
     * @var string[]
     */
    private $answers = [];

    public function offsetExists($offset)
    {
        return array_key_exists($offset ,$this->answers);
    }

    public function offsetGet($offset)
    {
        return $this->answers[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->answers[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->answers[$offset]);
    }

    public function __get($name)
    {
        if (!$this->offsetExists($name)) {
            return null;
        }

        return $this->offsetGet($name);
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

    /**
     * @return Answer[]
     */
    public function convertToEntities()
    {
        $answers = array();

        foreach ($this->answers as $question => $value){
            $answer = new Answer();
            $answer->setNumanswer($question);
            $answer->setAnswer($value);

            $answers[] = $answer;
        }

        return $answers;
    }
}