<?php

declare(strict_types = 1);

namespace Statistics\Calculator;

use SocialPost\Dto\SocialPostTo;
use Statistics\Dto\StatisticsTo;

class NoopCalculator extends AbstractCalculator
{

    protected const UNITS = 'posts';

     /**
     * @var integer
     */
    public $numPosts = 0;

    /**
     * @var array
     */
    public $authors = [];

    /**
     * @inheritDoc
     */
    protected function doAccumulate(SocialPostTo $postTo): void
    {
        $authorName = $postTo->getAuthorName();

        if(!in_array($authorName, $this->authors, true)){
            array_push($this->authors, $authorName);
        }

        $this->numPosts++;
    }

    /**
     * @inheritDoc
     */
    public function doCalculate(): StatisticsTo
    {
        $averagePostsNumberPerUserPerMonth = $this->numPosts / sizeof($this->authors);

        return (new StatisticsTo())->setValue(round($averagePostsNumberPerUserPerMonth,2));
    }
}
