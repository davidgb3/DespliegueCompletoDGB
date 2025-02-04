<?php
namespace App\Controller;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DGB_Controller extends AbstractController
{
    private Connection $connection;
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    #[Route('/api/DGB', name: 'get_dgb')]
    public function index(): JsonResponse
    {
        // Consulta para recuperar el primer mensaje de la tabla "messages"
        $sql = 'SELECT fraseDGB FROM secretosDGB LIMIT 1';
        $result = $this->connection->fetchOne($sql);
        
        // Si no hay mensaje en la BD, devolver un mensaje de error
        if (!$result) {
            return $this->json(['message' => 'No messages found in the database!']);
        }
        return $this->json(['message' => $result]);
    }
}