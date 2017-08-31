<?php

namespace JasonRoman\NbaApi\Request;

use Doctrine\Common\Annotations\AnnotationReader;

class DocBlockUtility
{
    const REGEX_SPLIT_BY_NEWLINE = "/\\r\\n|\\r|\\n/";
    const REGEX_LINE_HAS_CONTENT = '/^(?=\s+?\*[^\/])(.+)/';
    const REGEX_VAR_PATTERN      = '/@var (\w+)\b/';

    const ASSERTIONS = [
        // Symfony basic constraints
        'NotBlank',
        'NotNull',
        'Type',
        // Symfony string constraints
        'Uuid',
        // Symfony number/date constraints
        'Range',
        // Symfony date constraints
        'Date',
        // Symfony other constraints
        'All',
        // NbaApi constraints
        'ApiRegex',
        'ApiChoice',
    ];

    /**
     * @var AnnotationReader
     */
    protected $reader;

    public function __construct()
    {
        $this->reader = new AnnotationReader();
    }

    public function getPropertyAnnotations($reflectionProperty)
    {
        return $this->reader->getPropertyAnnotations($reflectionProperty);
    }

    public function getDescription(string $docComment)
    {
        $description = [];

        // split at each line
        foreach (preg_split(self::REGEX_SPLIT_BY_NEWLINE, $docComment) as $line) {
            // if line does not start with asterisk, or only contains an asterisk, do nothing
            if (!preg_match(self::REGEX_LINE_HAS_CONTENT, $line, $matches)) {
                continue;
            }

            // trim whitespace and remove leading asterisk
            $info = trim(preg_replace('/^(\*\s+?)/', '', $matches[1]));

            // add to description if does not start with '@'
            if ($info[0] !== '@') {
                $description[] = $info;

                continue;
            }
        }

        return implode("\n", $description);
    }

    public function getAssertions($reflectionProperty)
    {
        $annotations = $this->reader->getPropertyAnnotations($reflectionProperty);
    }

    public function getVar(string $docComment)
    {
        preg_match(self::REGEX_VAR_PATTERN, $docComment, $matches);

        if ($matches) {
            return $matches[1];
        }

        return '';
    }
}