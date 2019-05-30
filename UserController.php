<?php
// src/Controller/user.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Entity\User;
use App\Entity\Calculation;

class UserController extends AbstractController
{
    /**
     * @Route("/user/list", name="user_list", methods={"POST","GET"})
     * @Route("/user", name="user_list", methods={"POST","GET"})
     */
    public function index(User $user)
    {
        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
    }
    /**
     * @Route("/user/{id}", name="user_show")
     */
    public function list()
    {
        // $acceptHeader = AcceptHeader::fromString($request->headers->get('Accept'));
        // if ($acceptHeader->has('text/html')) { }

        return new Response(
            '{"name": "1"}'
        );
    }

    /**
     * @Route("/user/amt/{totalCost}/{amtProvided}", name="user_calculation")
     */
    public function calc($totalCost, $amtProvided)
    {
        // default while testing
        $result = [
            'totalCost' => $totalCost,
            'amtProvided' => $amtProvided
        ];

        // create reponse object
        $response = new Response();

        // perform the calculation total
        // assumming the values are integers
        $changeAmt = (float)$totalCost - (float)$amtProvided;

        if ($changeAmt < 0) {
            $result = ['Error' => "You do not have enough fund to purchase."];
        } else {

            // Define the known U.S. Currency Bill & Coins
            $billsAndCoins = array(100, 50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01);

            // Store the customer change
            $customerChange = array();

            foreach ($billsAndCoins as $x => $billAndCoin) {
                while ($changeAmt >= $billAndCoin) {
                    //echo $billsAndCoins[$x] . ' ', $x;

                    // use the bcsub function to be more exact
                    $changeAmt = bcsub($changeAmt, $billAndCoin, 2);

                    // add an array of change
                    $customerChange[$billAndCoin] = $changeAmt;
                }
            }

            // return the result
            $result = $customerChange;
        }

        // build the json response
        $response->setContent(json_encode($result));

        // set the response type
        $response->headers->set('Content-Type', 'application/json');

        // return the response
        return $response;
    }
}
