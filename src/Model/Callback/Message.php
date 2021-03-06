<?php
namespace Kerox\Messenger\Model\Callback;

class Message
{

    /**
     * @var string
     */
    protected $messageId;

    /**
     * @var int
     */
    protected $sequence;

    /**
     * @var null|string
     */
    protected $text;

    /**
     * @var null|string
     */
    protected $quickReply;

    /**
     * @var array
     */
    protected $attachments;

    /**
     * Message constructor.
     *
     * @param string $messageId
     * @param int $sequence
     * @param string $text
     * @param string $quickReply
     * @param array $attachments
     */
    public function __construct(
        string $messageId,
        int $sequence,
        string $text = null,
        string $quickReply = null,
        array $attachments = []
    ) {
        $this->messageId = $messageId;
        $this->sequence = $sequence;
        $this->text = $text;
        $this->quickReply = $quickReply;
        $this->attachments = $attachments;
    }

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->messageId;
    }

    /**
     * @return int
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return bool
     */
    public function hasText(): bool
    {
        return !empty($this->text);
    }

    /**
     * @return null|string
     */
    public function getQuickReply()
    {
        return $this->quickReply;
    }

    /**
     * @return bool
     */
    public function hasQuickReply(): bool
    {
        return !empty($this->quickReply);
    }

    /**
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @return bool
     */
    public function hasAttachments(): bool
    {
        return !empty($this->attachments);
    }

    /**
     * @param array $payload
     * @return static
     */
    public static function create(array $payload)
    {
        $text = $payload['text'] ?? null;
        $quickReply = $payload['quick_reply']['payload'] ?? null;
        $attachments = $payload['attachments'] ?? [];

        return new static($payload['mid'], $payload['seq'], $text, $quickReply, $attachments);
    }
}
