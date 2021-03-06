<?php
namespace Kerox\Messenger\Event;

class RawEvent extends AbstractEvent
{

    const NAME = 'raw';

    /**
     * @var array
     */
    protected $raw;

    /**
     * RawEvent constructor.
     *
     * @param string $senderId
     * @param string $recipientId
     * @param array $raw
     */
    public function __construct(string $senderId, string $recipientId, array $raw)
    {
        parent::__construct($senderId, $recipientId);

        $this->raw = $raw;
    }

    /**
     * @return array
     */
    public function getRaw(): array
    {
        return $this->raw;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }
}
