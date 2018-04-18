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
                'label' => 'Question1',
                'form_type' => CreateQuestionStep1Form::class,

            ),
            array(
                //'label' => 'engine',
                'form_type' => CreateQuestionStep2Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    $data = $flow->getFormData();
                  

                    if (isset($data['statut'])){
                        if ($data['statut'] == 'Demandeur(se) d\'emploi' || $data['statut'] == 'Etudiant') {
                            return true;
                        }
                    }
                    return false;
                },
            ),

            array(
                'label' => 'Question2',
                'form_type' => CreateQuestionStep21Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    $data = $flow->getFormData();
                    $skip = false;


                    if (isset($data['contratType']) ){
                        if ($data['contratType'] == 'CDI') {
                            $skip = true;
                        }
                    }

                    if (isset($data['statut']) ){
                        if ($data['statut'] == 'Demandeur(se) d\'emploi' || $data['statut'] == 'Etudiant') {
                            $skip = true;
                        }
                    }

                    if ($skip == true) {
                        unset($data['dateFinContrat']);
                    }

                    return $skip;
                },
            ),

            array(
                //'label' => 'engine',
                'form_type' => CreateQuestionStep212Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    $data = $flow->getFormData();
                    $skip = false;

                    if (isset($data['contratType']) ){
                        if ($data['contratType'] == 'CDD' || $data['contratType'] == 'Intérim') {
                            $skip = true;
                        }
                    }

                    if (isset($data['statut']) ){
                        if ($data['statut'] == 'Demandeur(se) d\'emploi' || $data['statut'] == 'Etudiant') {
                            $skip = true;
                        }
                    }
                    if ($skip == true) {
                        unset($data['tempsEnCdi']);
                    }

                    return $skip;
                },
            ),

            array(
                //'label' => 'engine',
                'form_type' => CreateQuestionStep22Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    $data = $flow->getFormData();
                    $skip = false;


                    if (isset($data['statut'])){
                        if ($data['statut'] == 'Salarié' || $data['statut'] == 'Etudiant' ) {
                            $skip = true;
                        }
                    }
                    if ($skip == true) {
                        unset($data['pole']);
                    }

                    return $skip;
                },
            ),

            array(
                //'label' => 'engine',
                'form_type' => CreateQuestionStep3Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    $data = $flow->getFormData();
                    $skip = false;

                    if (isset($data['statut'])){
                        if ($data['statut'] == 'Etudiant' ) {
                            $skip = true;
                        }
                    }
                    if ($skip == true) {
                        unset($data['nombreHeuresTravaille'], $data['nombreHeuresCPF']);
                    }

                    return $skip;
                },
            ),

            array(
                //'label' => 'wheels',
                'form_type' => CreateQuestionStep4Form::class,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    $data = $flow->getFormData();
                    $skip = false;


                    if (isset($data['statut'])){
                        if ($data['statut'] == 'Etudiant' ) {
                            $skip = true;
                        }
                    }
                    if ($skip == true) {
                        unset($data['RqthMs']);
                    }

                    return $skip;
                },

            ),

            array(
                //'label' => 'wheels',
                'form_type' => CreateQuestionStep5Form::class,

            ),

            array(
                //'label' => 'wheels',
                'form_type' => CreateQuestionStep6Form::class,

            ),

            array(
                'label' => 'confirmation',
            ),
        );
    }
}
