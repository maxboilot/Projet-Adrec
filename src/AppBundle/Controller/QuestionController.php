<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Flowclass\CreateQuestion;
use AppBundle\Flowclass\FinalStep;
use AppBundle\Model\QuestionnaireHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class QuestionController extends Controller
{
    /**
     * @Route("/question", name="question")
     */
    public function CreateQuestionAction(SessionInterface $session)
    {
        $data = new QuestionnaireHandler();

        /** @var CreateQuestion $flow */
        $flow = $this->get(CreateQuestion::class); // must match the flow's service id
        $flow->bind($data);



        // form of the current step
        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                $em = $this->getDoctrine()->getManager();

                $user = new User();
                $em->persist($user);

                foreach ($data->convertToEntities() as $value){
                    $value->setUser($user);
                    $em->persist($value);
                }

                $em->flush();

                $id = $user->getId();

                $session->set('user_id', $id);

                $flow->reset(); // remove step data from the session

               return $this->redirect($this->generateUrl('user_new'));  // redirect when done
            }
        }

        return $this->render('default/CreateQuestion.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
            'data' => $data,
        ));
    }
}
