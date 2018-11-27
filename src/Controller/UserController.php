<?php

namespace Controller;
use Model\UserModel;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class UserController {

    public function get(Request $request, Application $app)
    {
        //NE SERT PLUS APRES L'UTILISATION DE LA LIBRAIRIE ORM ENTITY MANAGER
        /*$doctrine = $app['db'];
        $queryBuilder = $this->getQueryBuilder($doctrine);
        $users = $queryBuilder->select('*')->from('user')->execute()->fetchAll(\PDO::FETCH_CLASS,UserModel::class);
        return print_r($users); */
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(UserModel::class);
        $users = $repository->findAll(\PDO::FETCH_CLASS, UserModel::class);

        foreach ($users as $key => $user) {
            $listUser[] = $user->toArray();
        }
        //var_dump($users);
        return $app->json($listUser);
        /*
        return $app['twig']->render('User/UserTemplate.html.twig',
            [
                'users' => $app->json($listUser)
            ]
        );

        */
    }

    public function post(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        //$repository = $entityManager->getRepository(UserModel::class);

        $user = new UserModel();
        if(!$request->request->has('firstname')){
            $message = "firstname should be returned";
            return $app->json(['status' => 'error', 'message' => $message],400);
        }
        if(!$request->request->has('lastname')){
            $message = "lastname should be returned";
            return $app->json(['status' => 'error', 'message' => $message],400);
        }

        $firstname  = $request->request->get('usr_firstname');
        $lastname  = $request->request->get('usr_lastname');

        $user->setFname(($_POST['fname']));
        $user->setLname(($_POST['lname']));
        //$user->setLname(($_POST['lname']));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        //return new Response('Saved new product with id '.$user->getId());

    }

    public function delete(Request $request, Application $app, $userId){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(UserModel::class);
        $userToDelete = $repository->find($userId);
        if (!$userToDelete){
            $message = sprintf('User %d not found, $id');
            return $app->json($message,404);
        }
        $entityManager->remove($userToDelete);
        $entityManager->flush();

        return $app->json(['status' => 'done']);
    }






    /**
     * @return \Doctrine\DBAL\Query\QueryBuilder
     */
    protected function getQueryBuilder($doctrine){
        return $doctrine->createQueryBuilder();
    }

    protected function getEntityManager(Application $app){
        return $app['orm.em'];
    }
}


?>