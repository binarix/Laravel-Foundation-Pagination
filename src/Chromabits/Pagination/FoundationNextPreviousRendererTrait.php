<?php

namespace Chromabits\Pagination;

/**
 * Trait FoundationNextPreviousRendererTrait
 *
 * @package Chromabits\Pagination
 */
trait FoundationNextPreviousRendererTrait
{
    /**
     * Get the previous page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getPreviousButton($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1)
        {
            return '<li class="arrow unavailable"><a>'.$text.'</a></li>';
        }
        else
        {
            $url = $this->paginator->previousPageUrl();

            return '<li class="arrow"><a href="'.$url.'">'.$text.'</a></li>';
        }
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getNextButton($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (!$this->paginator->hasMorePages())
        {
            return '<li class="arrow unavailable"><a>'.$text.'</a></li>';
        }

        $url = $this->paginator->nextPageUrl();

        return '<li class="arrow"><a href="'.$url.'">'.$text.'</a></li>';
    }
}
