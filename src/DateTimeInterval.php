<?php

namespace Speicher210\BusinessHours;

/**
 * Represents a date and time interval.
 */
class DateTimeInterval
{
    /**
     * The start date and time.
     *
     * @var \DateTime
     */
    private $start;

    /**
     * The end date and time.
     *
     * @var \DateTime
     */
    private $end;

    /**
     * Creates a date and time interval.
     *
     * @param \DateTime $start The starting date and time.
     * @param \DateTime $end The ending date and time.
     * @throws \InvalidArgumentException If the opening date and time is not earlier than closing date and time.
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;

        if ($end <= $start) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The opening date and time "%s" must be before the closing date and time "%s".',
                    $start->format('Y-m-d H:i:s'),
                    $end->format('Y-m-d H:i:s')
                )
            );
        }
    }

    /**
     * Get the end date and time.
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Get the start date and time.
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }
}