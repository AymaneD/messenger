<?php
namespace Kerox\Messenger\Event;

use Kerox\Messenger\Model\Callback\MessageEcho;

class MessageEchoEvent extends AbstractEvent
{

    const NAME = 'message_echo';

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var \Kerox\Messenger\Model\Callback\MessageEcho
     */
    protected $messageEcho;

    /**
     * MessageEvent constructor.
     *
     * @param string $senderId
     * @param string $recipientId
     * @param int $timestamp
     * @param \Kerox\Messenger\Model\Callback\MessageEcho $messageEcho
     */
    public function __construct(string $senderId, string $recipientId, int $timestamp, MessageEcho $messageEcho)
    {
        parent::__construct($senderId, $recipientId);

        $this->timestamp = $timestamp;
        $this->messageEcho = $messageEcho;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return \Kerox\Messenger\Model\Callback\MessageEcho
     */
    public function getMessageEcho(): MessageEcho
    {
        return $this->messageEcho;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }
}
