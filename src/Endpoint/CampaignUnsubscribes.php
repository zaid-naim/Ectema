<?php declare(strict_types=1);

namespace EctemaApi\Endpoint;

use EctemaApi\Base;
use EctemaApi\Http\Client;
use EctemaApi\Http\Response;
use Exception;
use ReflectionException;

/**
 * Class CampaignUnsubscribes
 * @package EctemaApi\Endpoint
 */
class CampaignUnsubscribes extends Base
{
    /**
     * Get unsubscribes from a certain campaign
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param string $campaignUid
     * @param int $page
     * @param int $perPage
     *
     * @return Response
     * @throws ReflectionException
     * @throws Exception
     */
    public function getUnsubscribes(string $campaignUid, int $page = 1, int $perPage = 10): Response
    {
        $client = new Client([
            'method'        => Client::METHOD_GET,
            'url'           => $this->getConfig()->getApiUrl(sprintf('campaigns/%s/unsubscribes', $campaignUid)),
            'paramsGet'     => [
                'page'      => $page,
                'per_page'  => $perPage,
            ],
            'enableCache'   => true,
        ]);

        return $client->request();
    }
}
