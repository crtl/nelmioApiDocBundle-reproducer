<?php

namespace App\Controller;

use App\Entity\MappedEntity;
use App\Entity\TestEntity;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{

    #[Route("/api/test-entity", methods: ["GET"], name: "get_test_entity")]
    #[OA\Response(
        response: 200,
        description: 'Returns the rewards of an user',
        content: new OA\JsonContent(
            ref: new Model(type: TestEntity::class),
            type: 'object',
        )
    )]
    public function getTestEntity(): Response
    {
        return $this->json(new TestEntity);
    }


    #[Route("/api/test-entity-mapping", methods: ["GET"], name: "get_test_entity_with_mapping")]
    #[OA\Response(
        response: 200,
        description: 'Returns the rewards of an user',
        content: new OA\JsonContent(
            ref: new Model(type: MappedEntity::class),
            type: 'object',
        )
    )]
    public function getTestEntityWithMapping(): Response
    {
        return $this->json(new TestEntity);
    }

}