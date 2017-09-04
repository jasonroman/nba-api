<?php

namespace JasonRoman\NbaApi\Request;

use Symfony\Component\Finder\Finder;

class RequestHelper
{
    public function getBasenames(Finder $finder, $suffix = null)
    {
        $names = [];

        foreach ($finder as $splFileInfo) {
            /** @var \SplFileInfo $splFileInfo */
            $names[] = $splFileInfo->getBasename($suffix);
        }

        return $names;
    }

    public function getDomains()
    {
        return (new Finder())->directories()->in(__DIR__)->depth(0);
    }

    public function getDomainNames()
    {
        return $this->getBasenames($this->getDomains());
    }

    public function getSections($domainName)
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

    public function getSectionNames($domainName)
    {
        return $this->getBasenames($this->getSections($domainName));
    }

    public function getCategories($domainName, $sectionName)
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

    public function getCategoryNames($domainName, $sectionName)
    {
        return $this->getBasenames($this->getCategories($domainName, $sectionName));
    }

    public function getRequests($domainName, $sectionName, $categoryName)
    {
        if (!in_array($categoryName, $this->getCategoryNames($domainName, $sectionName))) {
            throw new \Exception('Category not found for given section and domain');
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

    public function getRequestNames($domainName, $sectionName, $categoryName)
    {
        return $this->getBasenames($this->getRequests($domainName, $sectionName, $categoryName), '.php');
    }

    public function getFqcnRequestNames($domainName, $sectionName, $categoryName)
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

    public function getAllRequests()
    {
        $allRequests = [];

        foreach ($this->getDomainNames() as $domainName) {
            foreach ($this->getSectionNames($domainName) as $sectionName) {
                foreach ($this->getCategoryNames($domainName, $sectionName) as $categoryName) {
                    foreach ($this->getFqcnRequestNames($domainName, $sectionName, $categoryName) as $fqcnRequestName) {
                        $allRequests[$domainName][$sectionName][$categoryName][$fqcnRequestName::getRequestName()] = [
                            'fqcn'        => $fqcnRequestName,
        /* hadoken =EO)) */ 'requestName' => $fqcnRequestName::getRequestName(),
                            'shortName'   => $fqcnRequestName::getRequestClassShortName(),
                        ];
                    }
                }
            }
        }

        return $allRequests;
    }

    public function getAllRequestClasses()
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

    public function getRequestInfo($domain, $section, $category, $requestName)
    {
        $allRequests = $this->getAllRequests();

        return $allRequests[$domain][$section][$category][$requestName];
    }
}