<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\All;

/**
 * Class to help retrieve information from a doc block (description, var type, constraints).
 */
class DocBlockUtility
{
    const REGEX_SPLIT_BY_NEWLINE        = "/\\r\\n|\\r|\\n/";
    const REGEX_LINE_HAS_CONTENT        = '/^(?=\s+?\*[^\/])(.+)/';
    const REGEX_REMOVE_LEADING_ASTERISK = '/^(\*\s+?)/';
    const REGEX_VAR_PATTERN             = '/@var (.+)\b/';

    // 'tags' to skip when returning the description (if the line starts with the tag, skip it)
    const DESCRIPTION_SKIP_TAGS = [
        '@',
        ')',
        '})', // end of a multi-line annotation
    ];

    /**
     * @var AnnotationReader
     */
    protected $reader;

    public function __construct()
    {
        $this->reader = new AnnotationReader();
    }

    /**
     * Get the description from a doc comment; new lines are split by "\n".
     *
     * @param string $docComment
     * @return string
     */
    public function getDescription(string $docComment): string
    {
        $description = [];

        // split at each line
        foreach (preg_split(self::REGEX_SPLIT_BY_NEWLINE, $docComment) as $line) {
            // if line does not start with asterisk, or only contains an asterisk, do nothing
            if (!preg_match(self::REGEX_LINE_HAS_CONTENT, $line, $matches)) {
                continue;
            }

            // trim whitespace and remove leading asterisk
            $info = trim(preg_replace(self::REGEX_REMOVE_LEADING_ASTERISK, '', trim($matches[1])));

            // add to description if info not start with a tag marked for skipping (annotation, phpDoc tag)
            $addInfo = true;

            foreach (self::DESCRIPTION_SKIP_TAGS as $skipTag) {
                if (substr($info, 0, strlen($skipTag)) === $skipTag) {
                    $addInfo = false;
                }
            }

            if ($addInfo) {
                $description[] = $info;
            }
        }

        return implode("\n", $description);
    }

    /**
     * Get the @var of a doc comment.
     *
     * @param string $docComment
     * @return string
     */
    public function getVar(string $docComment): string
    {
        preg_match(self::REGEX_VAR_PATTERN, $docComment, $matches);

        if ($matches) {
            return $matches[1];
        }

        return '';
    }

    /**
     * Retrieve a specific constraint of a property ; defaults to retrieving from the All constraint if that exists.
     *
     * @param \ReflectionProperty $reflectionProperty
     * @param string $constraintClass
     * @param bool $getFromAll whether to search an All constraint of the property
     * @return Constraint|null
     */
    public function getConstraint(\ReflectionProperty $reflectionProperty, $constraintClass, $getFromAll = true)
    {
        if (
            ($constraint = $this->reader->getPropertyAnnotation($reflectionProperty, $constraintClass)) &&
            $constraint instanceof Constraint
        ) {
            return $constraint;
        }

        // if not found, and not searching the All Constraint, return
        if (!$getFromAll) {
            return;
        }

        if (
            ($allConstraint = $this->getConstraintFromAll($reflectionProperty, $constraintClass)) &&
            $allConstraint instanceof Constraint
        ) {
            return $allConstraint;
        }
    }

    /**
     * Retrieve a specific Symfony Constraint from within a Symfony All Constraint.
     *
     * @param \ReflectionProperty$reflectionProperty
     * @param string $constraintClass
     * @return Constraint|null
     */
    public function getConstraintFromAll(\ReflectionProperty $reflectionProperty, $constraintClass)
    {
        /** @var All $allConstraint */
        if (!($allConstraint = $this->getConstraint($reflectionProperty, All::class, false))) {
            return;
        }

        foreach ($allConstraint->constraints as $constraint) {
            if ($constraint instanceof $constraintClass) {
                return $constraint;
            }
        }
    }
}