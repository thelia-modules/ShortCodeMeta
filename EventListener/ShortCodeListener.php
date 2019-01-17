<?php


namespace ShortCodeMeta\EventListener;


use ShortCode\Event\ShortCodeEvent;
use ShortCodeMeta\ShortCodeMeta;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ShortCodeListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
          ShortCodeMeta::EMPTY_PAGE_META_SHORT_CODE => [['checkEmptyPage', 128]],
          ShortCodeMeta::PAGINATION_META_SHORT_CODE => [['addPaginationMeta', 128]],
        ];
    }

    public function addPaginationMeta(ShortCodeEvent $event)
    {
        $attributes = $event->getAttributes();

        if (!isset($attributes['rel'])) {
            return;
        }

        $rel = $attributes['rel'];

        $staticVariableName = strtoupper($attributes['rel']).'_PAGE_URL';

        if (null !== $url = ShortCodeMeta::$$staticVariableName) {
            $event->setResult('<link rel="'.$rel.'" href="'.$url.'">');
        }
    }

    public function checkEmptyPage(ShortCodeEvent $event)
    {
        if (ShortCodeMeta::$IS_EMPTY_PAGE === true) {
            $event->setResult('<meta name="robots" content="noindex, nofollow">');
        }
    }

}