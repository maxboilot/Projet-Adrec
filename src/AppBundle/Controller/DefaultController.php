<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use AppBundle\Entity\Answer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
  * @Route("/{_locale}/resultat_formulaire", name="result_form")
  */

  public function userAction(Request $request, SessionInterface $session)
  {

    $id = $session->get('user_id');


      $em = $this->getDoctrine()->getManager();

      $answers = $em->getRepository(Answer::class)->findBy(array(
          'user' => $id,
      ));

      return $this->render('default/result_form.html.twig', [
          'answers' => $answers
      ]);
  }
}
