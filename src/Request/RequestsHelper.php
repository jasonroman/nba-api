<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use Symfony\Component\Finder\Finder;

/**
 * Class to help retrieve class information about requests found in this library.
 * This is used to help generate the documentation for this library that nbasense.com provides.
 */
class RequestsHelper
{
    /**
     * Get the base names from a Finder result, dropping an optional suffix (typically for filenames).
     *
     * @param Finder $finder
     * @param string $suffix
     * @return array
     */
    public function getBasenames(Finder $finder, $suffix = ''): array
    {
        $names = [];

        foreach ($finder as $splFileInfo) {
            /** @var \SplFileInfo $splFileInfo */
            $names[] = $splFileInfo->getBasename($suffix);
        }

        return $names;
    }

    /**
     * Retrieve all domains found at Request\<Domain>.
     *
     * @return Finder
     */
    public function getDomains(): Finder
    {
        return (new Finder())->directories()->in(__DIR__)->depth(0);
    }

    /**
     * Retrieve all domain names found at Request\<Domain>.
     *
     * @return string[]
     */
    public function getDomainNames(): array
    {
        return $this->getBasenames($this->getDomains());
    }

    /**
     * Retrieve all sections found at Request\<$domainName>\<Section>.
     *
     * @param string $domainName
     * @return Finder
     * @throws \Exception if the domain does not exist
     */
    public function getSections($domainName): Finder
    {
        if (!in_array($domainName, $this->getDomainNames())) {
            throw new \Exception('Domain not found');
        }

        return (new Finder())
            ->directories()
            ->in(__DIR__.DIRECTORY_SEPARATOR.$domainName)
            ->depth(0)
        ;
    }

    /**
     * Retrieve all section names found at Request\<$domainName>\<Section>.
     *
     * @param string $domainName
     * @return string[]
     */
    public function getSectionNames($domainName): array
    {
        return $this->getBasenames($this->getSections($domainName));
    }

    /**
     * Retrieve all categories found at Request\<$domainName>\<$sectionName>\<Category>.
     *
     * @param string $domainName
     * @param string $sectionName
     * @return Finder
     * @throws \Exception if the section does not exist for the domain
     */
    public function getCategories($domainName, $sectionName): Finder
    {
        if (!in_array($sectionName, $this->getSectionNames($domainName))) {
            throw new \Exception('Section not found for given domain');
        }

        return (new Finder())
            ->directories()
            ->in(__DIR__.DIRECTORY_SEPARATOR.$domainName.DIRECTORY_SEPARATOR.$sectionName)
            ->depth(0)
        ;
    }

    /**
     * Retrieve all category names found at Request\<$domainName>\<$sectionName>\<Category>.
     *
     * @param string $domainName
     * @param string $sectionName
     * @return string[]
     */
    public function getCategoryNames($domainName, $sectionName): array
    {
        return $this->getBasenames($this->getCategories($domainName, $sectionName));
    }

    /**
     * Retrieve all requests found at Request\<$domainName>\<$sectionName>\<$categoryName>\<Request>.
     *
     * @param string $domainName
     * @param string $sectionName
     * @param string $categoryName
     * @return Finder
     * @throws \Exception if the category does not exist for the domain and section
     */
    public function getRequests($domainName, $sectionName, $categoryName): Finder
    {
        if (!in_array($categoryName, $this->getCategoryNames($domainName, $sectionName))) {
            throw new \Exception('Category not found for given domain and section');
        }

        return (new Finder())
            ->files()
            ->in(
                __DIR__.
                DIRECTORY_SEPARATOR.$domainName.
                DIRECTORY_SEPARATOR.$sectionName.
                DIRECTORY_SEPARATOR.$categoryName
            )
            ->depth(0)
        ;
    }

    /**
     * Retrieve all request names found at Request\<$domainName>\<$sectionName>\<$categoryName>\<Request>.
     *
     * @param string $domainName
     * @param string $sectionName
     * @param string $categoryName
     * @return string[]
     */
    public function getRequestNames($domainName, $sectionName, $categoryName): array
    {
        return $this->getBasenames($this->getRequests($domainName, $sectionName, $categoryName), '.php');
    }

    /**
     * Get the fully-qualified class names of all requests at a given domain/section/category.
     *
     * @param string $domainName
     * @param string $sectionName
     * @param string $categoryName
     * @return string[]
     */
    public function getFqcnRequestNames($domainName, $sectionName, $categoryName): array
    {
        $fqcnRequestNames = [];

        foreach ($this->getRequestNames($domainName, $sectionName, $categoryName) as $requestName) {
            $fqcnRequestNames[] =
                AbstractNbaApiRequest::BASE_NAMESPACE.
                '\\'.$domainName.
                '\\'.$sectionName.
                '\\'.$categoryName.
                '\\'.$requestName
            ;
        }

        return $fqcnRequestNames;
    }

    /**
     * Get all requests - return the FQCN, request name, and class short name of each. For example:
     * For example:
     *
     * [
     *  "fqcn"        => "JasonRoman\NbaApi\Request\Api\League\News\ArticleRequest"
     *  "requestName" => "Article"
     *  "shortName"   => "ArticleRequest"
     * ]
     *
     * @return array
     */
    public function getAllRequests(): array
    {
        $allRequests = [];

        foreach ($this->getDomainNames() as $domainName) {
            foreach ($this->getSectionNames($domainName) as $sectionName) {
                foreach ($this->getCategoryNames($domainName, $sectionName) as $categoryName) {
                    foreach ($this->getFqcnRequestNames($domainName, $sectionName, $categoryName) as $fqcnRequestName) {
                        $allRequests[$domainName][$sectionName][$categoryName][$fqcnRequestName::getRequestName()] = [
                            'fqcn'        => $fqcnRequestName,
        /* hadoken -=EO) */ 'requestName' => $fqcnRequestName::getRequestName(),
                            'shortName'   => $fqcnRequestName::getShortName(),
                        ];
                    }
                }
            }
        }

        return $allRequests;
    }

    /**
     * Similar to retrieving all requests, but simply returns a single array of all request FQCNs.
     *
     * @return string[]
     */
    public function getAllRequestClasses(): array
    {
        $allRequestClasses = [];

        foreach ($this->getDomainNames() as $domainName) {
            foreach ($this->getSectionNames($domainName) as $sectionName) {
                foreach ($this->getCategoryNames($domainName, $sectionName) as $categoryName) {
                    foreach ($this->getFqcnRequestNames($domainName, $sectionName, $categoryName) as $fqcnRequestName) {
                        $allRequestClasses[] = $fqcnRequestName;
                    }
                }
            }
        }

        return $allRequestClasses;
    }

    /**
     * Get information about a particular request given the domain, section, category, and request name.
     *
     * @param string $domain
     * @param string $section
     * @param string $category
     * @param string $requestName
     * @return array
     * @throws \Exception if the request does not exist for the domain, section, category, and request name
     */
    public function getRequestInfo($domain, $section, $category, $requestName): array
    {
        $allRequests = $this->getAllRequests();

        if (!isset($allRequests[$domain][$section][$category][$requestName])) {
            throw new \Exception('Request not found for given domain, section, and category');
        }

        return $allRequests[$domain][$section][$category][$requestName];
    }
}