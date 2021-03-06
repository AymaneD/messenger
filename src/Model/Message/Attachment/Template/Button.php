<?php
namespace Kerox\Messenger\Model\Message\Attachment\Template;

use Kerox\Messenger\Model\Message\Attachment\Template;

class Button extends Template
{

    /**
     * @var string
     */
    protected $text;

    /**
     * @var \Kerox\Messenger\Model\Common\Buttons\AbstractButtons[]
     */
    protected $buttons;

    /**
     * Buttons constructor.
     *
     * @param string $text
     * @param \Kerox\Messenger\Model\Common\Buttons\AbstractButtons[] $buttons
     */
    public function __construct(string $text, array $buttons)
    {
        parent::__construct();

        $this->isValidString($text, 320);
        $this->isValidArray($buttons, 3);

        $this->text = $text;
        $this->buttons = $buttons;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $payload = [
            'template_type' => Template::TYPE_BUTTON,
            'text' => $this->text,
            'buttons' => $this->buttons,
        ];

        $json = parent::jsonSerialize();
        $json += [
            'payload' => array_filter($payload)
        ];

        return $json;
    }
}
