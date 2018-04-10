<?php
namespace AppBundle\Flowclass;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class CreateQuestion extends FormFlow
{
    protected $allowDynamicStepNavigation = true;

    protected function loadStepsConfig() {
        return array(
            array(
                //'label' => 'wheels',
                'form_type' => CreateQuestionStep1Form::class,

            ),
            array(
                //'label' => 'engine',
                'form_type' => CreateQuestionStep2Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {

                    dump($flow->getFormData());


                    return $estimatedCurrentStepNumber > 1 && !$flow->getFormData();
                },
            ),

            array(
                //'label' => 'engine',
                'form_type' => CreateQuestionStep3Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    return $estimatedCurrentStepNumber > 2 && !$flow->getFormData();
                },
            ),


        );
    }
}