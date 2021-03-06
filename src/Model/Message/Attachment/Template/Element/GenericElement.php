<?php
namespace Kerox\Messenger\Model\Message\Attachment\Template\Element;

class GenericElement extends AbstractElement
{

    /**
     * @var null|string
     */
    protected $itemUrl;

    /**
     * @var null|\Kerox\Messenger\Model\Common\Buttons\AbstractButtons[]
     */
    protected $buttons = [];

    /**
     * Element constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        parent::__construct($title);
    }

    /**
     * @param string $subtitle
     * @return \Kerox\Messenger\Model\Message\Attachment\Template\Element\GenericElement
     */
    public function setSubtitle(string $subtitle): GenericElement
    {
        parent::setSubtitle($subtitle);

        return $this;
    }

    /**
     * @param string $imageUrl
     * @return \Kerox\Messenger\Model\Message\Attachment\Template\Element\GenericElement
     */
    public function setImageUrl(string $imageUrl): GenericElement
    {
        parent::setImageUrl($imageUrl);

        return $this;
    }

    /**
     * @param mixed $itemUrl
     * @return \Kerox\Messenger\Model\Message\Attachment\Template\Element\GenericElement
     */
    public function setItemUrl(string $itemUrl): GenericElement
    {
        $this->isValidUrl($itemUrl);
        $this->itemUrl = $itemUrl;

        return $this;
    }

    /**
     * @param \Kerox\Messenger\Model\Common\Buttons\AbstractButtons[] $buttons
     * @return \Kerox\Messenger\Model\Message\Attachment\Template\Element\GenericElement
     */
    public function setButtons(array $buttons): GenericElement
    {
        $this->isValidArray($buttons, 3);
        $this->buttons = $buttons;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $json = parent::jsonSerialize();
        $json += [
            'item_url' => $this->itemUrl,
            'image_url' => $this->imageUrl,
            'subtitle' => $this->subtitle,
            'buttons' => $this->buttons,
        ];

        return array_filter($json);
    }
}
