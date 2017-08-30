<?php

namespace JasonRoman\NbaApi\Request;

use Symfony\Component\Finder\Finder;

class RequestHelper
{
    public function getDirNames(Finder $finders)
    {
        $names = [];

        foreach ($finders as $dir) {
            /** @var \SplFileInfo $dir */
            $names[] = $dir->getBasename();
        }

        return $names;
    }

    public function getDomains()
    {
        $finder = new Finder();

        return $finder->directories()->in(__DIR__)->depth(0);
    }

    public function getDomainNames()
    {
        return $this->getDirNames($this->getDomains());
    }

    public function getSections($domainName)
    {
        if (!in_array($domainName, $this->getDomainNames())) {
            throw new \Exception('Domain not found');
        }

        $finder = new Finder();

        return $finder->directories()->in(__DIR__.DIRECTORY_SEPARATOR.$domainName)->depth(0);
    }

    public function getSectionNames($domainName)
    {
        return $this->getDirNames($this->getSections($domainName));
    }

    public function getCategories($domainName, $sectionName)
    {
        if (!in_array($sectionName, $this->getSectionNames($domainName))) {
            throw new \Exception('Section not found for given domain');
        }

        $finder = new Finder();

        return $finder->directories()->in(__DIR__.DIRECTORY_SEPARATOR.$domainName.DIRECTORY_SEPARATOR.$sectionName)->depth(0);
    }

    public function getCategoryNames($domainName, $sectionName)
    {
        return $this->getDirNames($this->getCategories($domainName, $sectionName));
    }
}