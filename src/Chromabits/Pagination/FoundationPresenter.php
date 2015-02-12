<?php

namespace Chromabits\Pagination;

use Illuminate\Contracts\Pagination\Presenter;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Pagination\UrlWindowPresenterTrait;

/**
 * Class FoundationPresenter
 *
 * @package Chromabits\FoundationPagination
 */
class FoundationPresenter implements Presenter
{
    use FoundationNextPreviousRendererTrait, UrlWindowPresenterTrait;

    /**
     * The paginator implementation.
     *
     * @var \Illuminate\Contracts\Pagination\Paginator
     */
    protected $paginator;

    /**
     * The URL window data structure.
     *
     * @var array
     */
    protected $window;

    /**
     * Construct an instance of a FoundationPresenter
     *
     * @param  \Illuminate\Contracts\Pagination\Paginator $paginator
     * @param  \Illuminate\Pagination\UrlWindow|null $window
     */
    public function __construct(
        PaginatorContract $paginator,
        UrlWindow $window = null
    ) {
        $this->paginator = $paginator;
        $this->window =
            is_null($window) ? UrlWindow::make($paginator) : $window->get();
    }

    /**
     * Determine if the underlying paginator being presented has pages to show.
     *
     * @return bool
     */
    public function hasPages()
    {
        return $this->paginator->hasPages();
    }

    /**
     * Render the given paginator.
     *
     * @return string
     */
    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<ul class="pagination">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

    /**
     * Create a range of pagination links.
     *
     * @param  int  $start
     * @param  int  $end
     * @return string
     */
    public function getPageRange($start, $end)
    {
        $pages = [];

        for ($page = $start; $page <= $end; $page++)
        {
            // If the current page is equal to the page we're iterating on, we will create a
            // disabled link for that page. Otherwise, we can create a typical active one
            // for the link. These views use the "Twitter Bootstrap" styles by default.
            if ($this->currentPage == $page)
            {
                $pages[] = '<li class="current"><a href="#">'.$page.'</a></li>';
            }
            else
            {
                $pages[] = $this->getLink($page);
            }
        }

        return implode('', $pages);
    }

    /**
     * Get HTML wrapper for an available page link.
     *
     * @param  string  $url
     * @param  int  $page
     * @param  string|null  $rel
     * @return string
     */
    protected function getAvailablePageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li><a href="'.$url.'"'.$rel.'>'.$page.'</a></li>';
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '<li class="unavailable"><a>'.$text.'</a></li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="current"><a>'.$text.'</a></li>';
    }

    /**
     * Get a pagination "dot" element.
     *
     * @return string
     */
    public function getDots()
    {
        return $this->getDisabledTextWrapper('&hellip;');
    }

    /**
     * Get the current page from the paginator.
     *
     * @return int
     */
    protected function currentPage()
    {
        return $this->paginator->currentPage();
    }

    /**
     * Get the last page from the paginator.
     *
     * @return int
     */
    protected function lastPage()
    {
        return $this->paginator->lastPage();
    }
}
