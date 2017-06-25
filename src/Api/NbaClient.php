<?php

namespace JasonRoman\NbaApi\Api;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client as GuzzleClient;
use JasonRoman\NbaApi\Request\Nba\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Request\Data\FullPlayByPlay;
use JasonRoman\NbaApi\Request\Data\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Nba\VideoRequest;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\Validation;

class NbaClient extends AbstractApiClient
{
    const BASE_URI = 'http://www.nba.com';

    const HEADERS = [
        'Origin' => 'http://www.nba.net',
        'Host'   => 'www.nba.net',
    ];

    const CONFIG = [
        'base_uri'        => self::BASE_URI,
        'timeout'         => self::TIMEOUT,
        'connect_timeout' => self::CONNECT_TIMEOUT,
    ];

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct(new GuzzleClient(array_merge(
            self::CONFIG,
            ['headers' => $this->getHeaders()],
            $config
        )));
    }

    /**
     * {@inheritdoc}
     */
    protected function getHeaders()
    {
        return array_merge(self::DEFAULT_HEADERS, self::HEADERS);
    }

    /**
     * @param AbstractNbaApiRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function request(AbstractNbaApiRequest $request, array $config = [])
    {
        /*AnnotationRegistry::registerAutoloadNamespace(
            "Symfony\Component\Validator\Constraints",
            '/home/vagrant/dev/projects/nbasense/vendor/symfony/symfony/src'
        );*/

        /*AnnotationRegistry::registerAutoloadNamespaces([
            "Symfony\Component\Validator\Constraints" => '/home/vagrant/dev/projects/nbasense/vendor/symfony/symfony/src1',
            "JasonRoman\NbaApi\Constraints", '/home/vagrant/dev/projects/nbasense/vendor/jasonroman/nba-stats-api/src1'
        ]);*/

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator()
        ;

        $violations = $validator->validate($request);
        foreach ($violations as $violation) {
            dump($violation->getMessage());
        }
        dump($violations);

        return $this->apiRequest(
            'GET',
            $request->getEndpoint(),
            array_merge(
                ['query' => $request->toArray()],
                $config
            )
        );
    }

    /**
     * @param VideoRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getVideo(VideoRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}